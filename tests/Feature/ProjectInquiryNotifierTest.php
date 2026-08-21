<?php

use App\Models\ProjectInquiry;
use App\ProjectInquiryNotifier;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

test('project inquiry details are sent to Discord', function () {
    config()->set(
        'services.discord.project_inquiries_webhook',
        'https://discord.example.com/webhook',
    );
    Http::fake();

    $inquiry = new ProjectInquiry([
        'name' => 'Taylor Smith',
        'email' => 'taylor@example.com',
        'phone' => '978-555-0123',
        'business_name' => 'Smith Contracting',
        'service' => 'website',
        'message' => 'We need a website that generates better local leads.',
    ]);

    app(ProjectInquiryNotifier::class)->sendToDiscord($inquiry);

    Http::assertSent(function (Request $request): bool {
        return $request->url() === 'https://discord.example.com/webhook'
            && $request['embeds'][0]['description'] === 'We need a website that generates better local leads.'
            && $request['embeds'][0]['fields'][1]['value'] === 'Website';
    });
});

test('no Discord request is sent when the webhook is not configured', function () {
    config()->set('services.discord.project_inquiries_webhook');
    Http::fake();

    app(ProjectInquiryNotifier::class)->sendToDiscord(new ProjectInquiry([
        'name' => 'Taylor Smith',
        'email' => 'taylor@example.com',
        'service' => 'website',
        'message' => 'We need a website that generates better local leads.',
    ]));

    Http::assertNothingSent();
});
