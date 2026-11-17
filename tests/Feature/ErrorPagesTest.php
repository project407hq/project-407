<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Exceptions;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Vite;

beforeEach(function () {
    config()->set('app.debug', false);

    Route::get('/_tests/errors/{status}', function (int $status): never {
        abort($status, 'Sensitive exception details must stay private.', [
            'Retry-After' => '60',
            'Allow' => 'GET',
        ]);
    });
});

test('HTTP errors show branded recovery pages without exposing exception details', function (int $status) {
    $this->get('/_tests/errors/'.$status)
        ->assertStatus($status)
        ->assertSeeText('PROJECT')
        ->assertSeeText('407')
        ->assertSeeText('BACK TO HOME')
        ->assertSee('mailto:kevin@project-407.com', false)
        ->assertSee('tel:+19788779784', false)
        ->assertSee('noindex, nofollow')
        ->assertHeader('X-Robots-Tag', 'noindex, nofollow')
        ->assertDontSee('Sensitive exception details')
        ->assertDontSee('Stack trace')
        ->assertDontSee('/build/assets/');
})->with([400, 401, 402, 403, 404, 405, 408, 419, 422, 429, 500, 502, 503, 504]);

test('missing pages have a useful branded 404', function () {
    $this->get('/a-page-that-does-not-exist')
        ->assertNotFound()
        ->assertSeeText('That page is not here.')
        ->assertSeeText('The link may be out of date');
});

test('unexpected exceptions are reported and show a safe branded 500', function () {
    Exceptions::fake();

    Route::get('/_tests/unexpected-error', function (): never {
        throw new RuntimeException('Private database credentials and query details.');
    });

    $this->get('/_tests/unexpected-error')
        ->assertInternalServerError()
        ->assertSeeText('A hiccup on our side.')
        ->assertDontSee('Private database credentials');

    Exceptions::assertReported(RuntimeException::class);
});

test('error pages still render without a Vite manifest', function () {
    Vite::useManifestFilename('missing-error-test-manifest.json');

    $this->get('/_tests/errors/500')
        ->assertInternalServerError()
        ->assertSeeText('A hiccup on our side.');
});

test('JSON clients receive JSON errors with safe server messages and original headers', function (int $status) {
    $response = $this->getJson('/_tests/errors/'.$status)
        ->assertStatus($status)
        ->assertHeader('Content-Type', 'application/json')
        ->assertHeader('Retry-After', '60')
        ->assertJsonStructure(['message'])
        ->assertDontSee('<!DOCTYPE html>', false);

    if ($status >= 500) {
        $response->assertJsonPath('message', 'We could not complete this request. Please try again later or contact kevin@project-407.com.')
            ->assertDontSee('Sensitive exception details');
    }
})->with([404, 419, 429, 500, 503]);

test('API paths receive JSON errors without an Accept header', function () {
    Route::get('/api/_tests/error', function (): never {
        abort(500, 'Private server details.');
    });

    $this->get('/api/_tests/error')
        ->assertInternalServerError()
        ->assertHeader('Content-Type', 'application/json')
        ->assertJsonStructure(['message'])
        ->assertDontSee('Private server details');
});

test('JSON validation errors retain helpful field messages', function () {
    Route::post('/_tests/validation', fn (Request $request): array => $request->validate([
        'name' => ['required'],
    ]));

    $this->postJson('/_tests/validation')
        ->assertUnprocessable()
        ->assertJsonValidationErrors('name');
});

test('recovery pages preserve status-specific guidance and HTTP headers', function () {
    $this->get('/_tests/errors/419')->assertSeeText('Copy any message you have written');
    $this->get('/_tests/errors/429')->assertHeader('Retry-After', '60');
    $this->get('/_tests/errors/405')->assertHeader('Allow', 'GET');
    $this->get('/_tests/errors/503')->assertSeeText('temporarily unavailable');
});
