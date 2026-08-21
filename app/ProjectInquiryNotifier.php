<?php

namespace App;

use App\Models\ProjectInquiry;
use Illuminate\Support\Facades\Http;

class ProjectInquiryNotifier
{
    public function sendToDiscord(ProjectInquiry $inquiry): void
    {
        $webhookUrl = config('services.discord.project_inquiries_webhook');

        if (blank($webhookUrl)) {
            return;
        }

        $service = match ($inquiry->service) {
            'website' => 'Website',
            'software' => 'Custom software',
            'support' => 'Support or improvements',
            'not-sure' => 'Not sure yet',
            default => ucfirst($inquiry->service),
        };

        try {
            Http::connectTimeout(3)
                ->timeout(5)
                ->post($webhookUrl, [
                    'username' => 'Project 407 Leads',
                    'allowed_mentions' => [
                        'parse' => [],
                    ],
                    'embeds' => [
                        [
                            'title' => 'New Project Inquiry',
                            'description' => $inquiry->message,
                            'color' => 16022058,
                            'fields' => [
                                [
                                    'name' => 'Name',
                                    'value' => $inquiry->name,
                                    'inline' => true,
                                ],
                                [
                                    'name' => 'Service',
                                    'value' => $service,
                                    'inline' => true,
                                ],
                                [
                                    'name' => 'Business',
                                    'value' => $inquiry->business_name ?: 'Not provided',
                                    'inline' => true,
                                ],
                                [
                                    'name' => 'Email',
                                    'value' => $inquiry->email,
                                    'inline' => true,
                                ],
                                [
                                    'name' => 'Phone',
                                    'value' => $inquiry->phone ?: 'Not provided',
                                    'inline' => true,
                                ],
                            ],
                            'footer' => [
                                'text' => 'Project 407 website',
                            ],
                            'timestamp' => now()->toIso8601String(),
                        ],
                    ],
                ])
                ->throw();
        } catch (\Throwable $exception) {
            report($exception);
        }
    }
}
