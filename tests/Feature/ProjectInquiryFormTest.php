<?php

use App\Models\ProjectInquiry;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Livewire;

uses(LazilyRefreshDatabase::class);

beforeEach(function () {
    config()->set('services.discord.project_inquiries_webhook');
    RateLimiter::clear('project-inquiry:127.0.0.1');
});

test('contact page contains the project inquiry form', function () {
    $this->get(route('contact'))
        ->assertSuccessful()
        ->assertSeeLivewire('project-inquiry-form');
});

test('a valid project inquiry is stored', function () {
    Livewire::test('project-inquiry-form')
        ->set('name', 'Taylor Smith')
        ->set('email', 'taylor@example.com')
        ->set('phone', '978-555-0123')
        ->set('businessName', 'Smith Contracting')
        ->set('service', 'website')
        ->set('message', 'We need a website that generates better local leads.')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('submitted', true);

    $inquiry = ProjectInquiry::sole();

    expect($inquiry)
        ->name->toBe('Taylor Smith')
        ->email->toBe('taylor@example.com')
        ->business_name->toBe('Smith Contracting')
        ->service->toBe('website');
});

test('required inquiry fields are validated', function (string $field) {
    Livewire::test('project-inquiry-form')
        ->call('submit')
        ->assertHasErrors($field);
})->with([
    'name',
    'email',
    'service',
    'message',
]);

test('the honeypot rejects automated submissions', function () {
    Livewire::test('project-inquiry-form')
        ->set('name', 'Automated Visitor')
        ->set('email', 'bot@example.com')
        ->set('service', 'website')
        ->set('message', 'This message is long enough to pass validation.')
        ->set('website', 'https://spam.example.com')
        ->call('submit')
        ->assertHasErrors(['website' => ['max']]);

    expect(ProjectInquiry::count())->toBe(0);
});

test('project inquiries are rate limited', function () {
    RateLimiter::hit('project-inquiry:127.0.0.1', 3600);
    RateLimiter::hit('project-inquiry:127.0.0.1', 3600);
    RateLimiter::hit('project-inquiry:127.0.0.1', 3600);
    RateLimiter::hit('project-inquiry:127.0.0.1', 3600);
    RateLimiter::hit('project-inquiry:127.0.0.1', 3600);

    Livewire::test('project-inquiry-form')
        ->set('name', 'Taylor Smith')
        ->set('email', 'taylor@example.com')
        ->set('service', 'website')
        ->set('message', 'We need a website that generates better local leads.')
        ->call('submit')
        ->assertHasErrors('form')
        ->assertSet('submitted', false);

    expect(ProjectInquiry::count())->toBe(0);
});
