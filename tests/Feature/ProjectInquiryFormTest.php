<?php

use App\Models\ProjectInquiry;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Exceptions;
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
        ->assertSet('submitted', true)
        ->assertDispatched('project-inquiry-submitted', service: 'website');

    $inquiry = ProjectInquiry::sole();

    expect($inquiry)
        ->name->toBe('Taylor Smith')
        ->email->toBe('taylor@example.com')
        ->business_name->toBe('Smith Contracting')
        ->service->toBe('website');
});

test('a visitor can reach out with a question without having a project brief', function () {
    Livewire::test('project-inquiry-form')
        ->set('name', 'Morgan Lee')
        ->set('email', 'morgan@example.com')
        ->set('service', 'question')
        ->set('message', 'Could you help me understand whether my current process needs custom software?')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('submitted', true);

    expect(ProjectInquiry::sole()->service)->toBe('question');
});

test('required inquiry fields are validated', function (string $field) {
    Livewire::test('project-inquiry-form')
        ->call('submit')
        ->assertHasErrors($field)
        ->assertNotDispatched('project-inquiry-submitted');
})->with([
    'name',
    'email',
    'message',
]);

test('an inquiry needs only a name email and message', function () {
    Livewire::test('project-inquiry-form')
        ->set('name', 'Morgan Lee')
        ->set('email', 'morgan@example.com')
        ->set('message', 'Please help us improve our existing application.')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('submitted', true)
        ->assertDispatched('project-inquiry-submitted', service: 'not-sure');

    expect(ProjectInquiry::sole())
        ->service->toBe('not-sure')
        ->phone->toBeNull()
        ->business_name->toBeNull();
});

test('service page context is carried into the inquiry', function (string $service) {
    Livewire::withQueryParams(['service' => $service])->test('project-inquiry-form')
        ->assertSet('service', $service)
        ->assertSet('showOptionalDetails', false)
        ->set('name', 'Morgan Lee')
        ->set('email', 'morgan@example.com')
        ->set('message', 'Please help us with this project.')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertDispatched('project-inquiry-submitted', service: $service);

    expect(ProjectInquiry::sole()->service)->toBe($service);
})->with(['software', 'support', 'advisory']);

test('unrecognized service context is ignored safely', function (mixed $service) {
    Livewire::withQueryParams(['service' => $service])->test('project-inquiry-form')
        ->assertSet('service', 'not-sure');
})->with([
    'unknown string' => ['unexpected-value'],
    'array context' => [['support']],
]);

test('validation failures are tracked without counting a saved lead', function () {
    Livewire::test('project-inquiry-form')
        ->call('submit')
        ->assertDispatched('project-inquiry-failed', reason: 'validation')
        ->assertNotDispatched('project-inquiry-submitted');
});

test('the honeypot rejects automated submissions', function () {
    Livewire::test('project-inquiry-form')
        ->set('name', 'Automated Visitor')
        ->set('email', 'bot@example.com')
        ->set('service', 'website')
        ->set('message', 'This message is long enough to pass validation.')
        ->set('website', 'https://spam.example.com')
        ->call('submit')
        ->assertHasErrors(['website' => ['max']])
        ->assertNotDispatched('project-inquiry-submitted');

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
        ->assertDispatched('project-inquiry-failed', reason: 'rate_limited')
        ->assertSet('submitted', false)
        ->assertNotDispatched('project-inquiry-submitted');

    expect(ProjectInquiry::count())->toBe(0);
});

test('inquiry categories are stored without requiring a business name', function (string $service) {
    Livewire::test('project-inquiry-form')
        ->set('name', 'Morgan Lee')
        ->set('email', 'morgan@example.com')
        ->set('service', $service)
        ->set('message', 'We would like to discuss an opportunity and your availability.')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('submitted', true);

    expect(ProjectInquiry::sole())
        ->service->toBe($service)
        ->business_name->toBeNull();
})->with(['employment', 'collaboration', 'advisory', 'software', 'support', 'not-sure']);

test('the contact form offers the current software and leadership inquiry paths', function () {
    $this->get(route('contact'))
        ->assertSuccessful()
        ->assertSee('Custom software or application')
        ->assertSee('Fractional CTO or engineering leadership')
        ->assertSee('Existing software or AI-built app help')
        ->assertSee('Help figuring out the next step');
});

test('a repeated submit does not store or track another inquiry', function () {
    $component = Livewire::test('project-inquiry-form')
        ->set('name', 'Morgan Lee')
        ->set('email', 'morgan@example.com')
        ->set('service', 'software')
        ->set('message', 'We would like help with an existing application.')
        ->call('submit')
        ->assertDispatched('project-inquiry-submitted', service: 'software');

    $component->call('submit')->assertNotDispatched('project-inquiry-submitted');

    expect(ProjectInquiry::count())->toBe(1);
});

test('failed inquiry saves preserve the message and give a direct contact fallback', function () {
    Exceptions::fake();

    ProjectInquiry::creating(function (): never {
        throw new RuntimeException('Private storage failure details.');
    });

    try {
        Livewire::test('project-inquiry-form')
            ->set('name', 'Morgan Lee')
            ->set('email', 'morgan@example.com')
            ->set('service', 'software')
            ->set('message', 'Please help us improve our existing application.')
            ->call('submit')
            ->assertHasErrors('form')
            ->assertDispatched('project-inquiry-failed', reason: 'server')
            ->assertSet('submitted', false)
            ->assertSet('name', 'Morgan Lee')
            ->assertSet('email', 'morgan@example.com')
            ->assertSet('message', 'Please help us improve our existing application.')
            ->assertSee('We could not confirm that your message was saved.')
            ->assertSee('kevin@project-407.com')
            ->assertDontSee('Private storage failure details.')
            ->assertNotDispatched('project-inquiry-submitted');

        expect(ProjectInquiry::count())->toBe(0);
        Exceptions::assertReported(RuntimeException::class);
    } finally {
        Event::forget('eloquent.creating: '.ProjectInquiry::class);
    }
});

test('rate limiter failures give a recoverable error without losing the message', function () {
    Exceptions::fake();
    RateLimiter::shouldReceive('increment')->once()->andThrow(new RuntimeException('Private cache failure.'));

    Livewire::test('project-inquiry-form')
        ->set('name', 'Morgan Lee')
        ->set('email', 'morgan@example.com')
        ->set('service', 'software')
        ->set('message', 'Please help us improve our existing application.')
        ->call('submit')
        ->assertHasErrors('form')
        ->assertSet('submitted', false)
        ->assertSet('message', 'Please help us improve our existing application.')
        ->assertDontSee('Private cache failure.')
        ->assertNotDispatched('project-inquiry-submitted');

    expect(ProjectInquiry::count())->toBe(0);
    Exceptions::assertReported(RuntimeException::class);
});

test('inquiry validation errors explain how to correct each field', function (string $field, string $value, string $message) {
    Livewire::test('project-inquiry-form')
        ->set('name', 'Morgan Lee')
        ->set('email', 'morgan@example.com')
        ->set('service', 'software')
        ->set('message', 'Please help us improve our existing application.')
        ->set($field, $value)
        ->call('submit')
        ->assertHasErrors($field)
        ->assertSee($message)
        ->assertSee('Please check the details below.')
        ->assertNotDispatched('project-inquiry-submitted');
})->with([
    ['name', '', 'Please enter your name so Kevin knows who to reply to.'],
    ['email', 'invalid', 'Please enter a valid email address, such as name@example.com.'],
    ['service', 'invalid', 'Please choose one of the available inquiry options.'],
    ['message', '', 'Please add a few sentences about what you would like help with.'],
]);
