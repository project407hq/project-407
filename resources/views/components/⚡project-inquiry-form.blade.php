<?php

use App\Models\ProjectInquiry;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

new class extends Component
{
    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public string $businessName = '';

    public string $service = '';

    public string $message = '';

    public string $website = '';

    public bool $submitted = false;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email:rfc', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'businessName' => ['nullable', 'string', 'max:150'],
            'service' => [
                'required',
                'in:website,software,support,not-sure',
            ],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
            'website' => ['nullable', 'max:0'],
        ];
    }

    protected function messages(): array
    {
        return [
            'service.required' => 'Please select the service you are interested in.',
            'message.min' => 'Please tell us a little more about your project.',
            'website.max' => 'Unable to submit this form.',
        ];
    }

    public function submit(): void
    {
        $this->name = trim($this->name);
        $this->email = trim($this->email);
        $this->phone = trim($this->phone);
        $this->businessName = trim($this->businessName);
        $this->message = trim($this->message);

        $validated = $this->validate();

        $rateLimitKey = 'project-inquiry:'.request()->ip();

        if (RateLimiter::tooManyAttempts($rateLimitKey, 5)) {
            $this->addError(
                'form',
                'Too many inquiries have been submitted. Please wait before trying again.',
            );

            return;
        }

        RateLimiter::hit($rateLimitKey, 3600);

        $inquiry = ProjectInquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?: null,
            'business_name' => $validated['businessName'] ?: null,
            'service' => $validated['service'],
            'message' => $validated['message'],
        ]);

        $this->sendDiscordNotification($inquiry);

        $this->reset([
            'name',
            'email',
            'phone',
            'businessName',
            'service',
            'message',
            'website',
        ]);

        $this->submitted = true;
    }

    private function sendDiscordNotification(ProjectInquiry $inquiry): void
    {
        $webhookUrl = config(
            'services.discord.project_inquiries_webhook'
        );

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
                                    'value' => $inquiry->business_name
                                        ?: 'Not provided',
                                    'inline' => true,
                                ],
                                [
                                    'name' => 'Email',
                                    'value' => $inquiry->email,
                                    'inline' => true,
                                ],
                                [
                                    'name' => 'Phone',
                                    'value' => $inquiry->phone
                                        ?: 'Not provided',
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

    public function startAnotherInquiry(): void
    {
        $this->reset([
            'name',
            'email',
            'phone',
            'businessName',
            'service',
            'message',
            'website',
        ]);

        $this->submitted = false;
    }
};
?>

<div>
    @if ($submitted)
        <div
            class="rounded-panel border border-orange/20 bg-orange/10 p-7 sm:p-9"
            role="status"
        >
            <span class="flex h-14 w-14 items-center justify-center rounded-full bg-orange text-ink">
                <svg
                    aria-hidden="true"
                    class="h-7 w-7"
                    viewBox="0 0 24 24"
                    fill="none"
                >
                    <path
                        d="m5 12 4 4L19 6"
                        stroke="currentColor"
                        stroke-width="2.2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
            </span>

            <h2 class="mt-6 text-2xl font-extrabold text-ink">
                Your inquiry has been received.
            </h2>

            <p class="mt-3 max-w-xl leading-7 text-slate">
                Thanks for reaching out. I’ll review the details and get back
                to you to discuss the project and the best next step.
            </p>

            <button
                type="button"
                wire:click="startAnotherInquiry"
                class="button-secondary mt-7"
            >
                Send Another Inquiry
            </button>
        </div>
    @else
        <form wire:submit="submit" novalidate>
            {{-- Honeypot --}}
            <div
                aria-hidden="true"
                class="absolute -left-[9999px] top-auto h-px w-px overflow-hidden"
            >
                <label for="website">
                    Website
                </label>

                <input
                    id="website"
                    type="text"
                    wire:model="website"
                    tabindex="-1"
                    autocomplete="off"
                >
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                {{-- Name --}}
                <div>
                    <label for="name" class="form-label">
                        Your name
                        <span class="text-orange-dark">*</span>
                    </label>

                    <input
                        id="name"
                        type="text"
                        wire:model.blur="name"
                        class="form-control"
                        @error('name') aria-invalid="true" aria-describedby="name-error" @enderror
                        autocomplete="name"
                        placeholder="John Doe"
                    >

                    @error('name')
                        <p id="name-error" class="form-error">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="form-label">
                        Email address
                        <span class="text-orange-dark">*</span>
                    </label>

                    <input
                        id="email"
                        type="email"
                        wire:model.blur="email"
                        class="form-control"
                        @error('email') aria-invalid="true" aria-describedby="email-error" @enderror
                        autocomplete="email"
                        placeholder="you@business.com"
                    >

                    @error('email')
                        <p id="email-error" class="form-error">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Phone --}}
                <div>
                    <label for="phone" class="form-label">
                        Phone number
                        <span class="font-normal text-slate">(optional)</span>
                    </label>

                    <input
                        id="phone"
                        type="tel"
                        wire:model.blur="phone"
                        class="form-control"
                        @error('phone') aria-invalid="true" aria-describedby="phone-error" @enderror
                        autocomplete="tel"
                        placeholder="(978) 555-0123"
                    >

                    @error('phone')
                        <p id="phone-error" class="form-error">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Business --}}
                <div>
                    <label for="businessName" class="form-label">
                        Business name
                        <span class="font-normal text-slate">(optional)</span>
                    </label>

                    <input
                        id="businessName"
                        type="text"
                        wire:model.blur="businessName"
                        class="form-control"
                        @error('businessName') aria-invalid="true" aria-describedby="business-name-error" @enderror
                        autocomplete="organization"
                        placeholder="Your Business LLC"
                    >

                    @error('businessName')
                        <p id="business-name-error" class="form-error">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>

            {{-- Service --}}
            <fieldset class="mt-6">
                <legend class="form-label">
                    What can we help with?
                    <span class="text-orange-dark">*</span>
                </legend>

                <div class="mt-3 grid gap-3 sm:grid-cols-2">
                    <label class="cursor-pointer">
                        <input
                            type="radio"
                            wire:model="service"
                            value="website"
                            class="peer sr-only"
                        >

                        <span class="flex h-full items-center gap-3 rounded-2xl border border-navy/15 bg-white p-4 font-bold text-ink transition hover:border-orange/50 peer-checked:border-orange peer-checked:bg-orange/10 peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-orange">
                            <span @class([
                                'flex h-9 w-9 shrink-0 items-center justify-center rounded-xl transition-colors',
                                'bg-navy text-white' => $service === 'website',
                                'bg-orange/15 text-orange-dark' => $service !== 'website',
                            ])>
                                01
                            </span>

                            A new or redesigned website
                        </span>
                    </label>

                    <label class="cursor-pointer">
                        <input
                            type="radio"
                            wire:model="service"
                            value="software"
                            class="peer sr-only"
                        >

                        <span class="flex h-full items-center gap-3 rounded-2xl border border-navy/15 bg-white p-4 font-bold text-ink transition hover:border-orange/50 peer-checked:border-orange peer-checked:bg-orange/10 peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-orange">
                            <span @class([
                                'flex h-9 w-9 shrink-0 items-center justify-center rounded-xl transition-colors',
                                'bg-navy text-white' => $service === 'software',
                                'bg-orange/15 text-orange-dark' => $service !== 'software',
                            ])>
                                02
                            </span>

                            Custom software
                        </span>
                    </label>

                    <label class="cursor-pointer">
                        <input
                            type="radio"
                            wire:model="service"
                            value="support"
                            class="peer sr-only"
                        >

                        <span class="flex h-full items-center gap-3 rounded-2xl border border-navy/15 bg-white p-4 font-bold text-ink transition hover:border-orange/50 peer-checked:border-orange peer-checked:bg-orange/10 peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-orange">
                            <span @class([
                                'flex h-9 w-9 shrink-0 items-center justify-center rounded-xl transition-colors',
                                'bg-navy text-white' => $service === 'support',
                                'bg-orange/15 text-orange-dark' => $service !== 'support',
                            ])>
                                03
                            </span>

                            Support or improvements
                        </span>
                    </label>

                    <label class="cursor-pointer">
                        <input
                            type="radio"
                            wire:model="service"
                            value="not-sure"
                            class="peer sr-only"
                        >

                        <span class="flex h-full items-center gap-3 rounded-2xl border border-navy/15 bg-white p-4 font-bold text-ink transition hover:border-orange/50 peer-checked:border-orange peer-checked:bg-orange/10 peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-orange">
                            <span @class([
                                'flex h-9 w-9 shrink-0 items-center justify-center rounded-xl transition-colors',
                                'bg-navy text-white' => $service === 'not-sure',
                                'bg-mist text-ink' => $service !== 'not-sure',
                            ])>
                                ?
                            </span>

                            I’m not sure yet
                        </span>
                    </label>
                </div>

                @error('service')
                    <p id="service-error" class="form-error">
                        {{ $message }}
                    </p>
                @enderror
            </fieldset>

            {{-- Message --}}
            <div class="mt-6">
                <label for="message" class="form-label">
                    Tell us about your project
                    <span class="text-orange-dark">*</span>
                </label>

                <textarea
                    id="message"
                    wire:model.live.debounce="message"
                    maxlength="3000"
                    class="form-control min-h-40 resize-y"
                    @error('message') aria-invalid="true" aria-describedby="message-error" @enderror
                    placeholder="What does your business do? What would you like to build or improve?"
                ></textarea>

                <div class="mt-2 flex items-start justify-between gap-4">
                    @error('message')
                        <p id="message-error" class="text-sm font-semibold text-red-700">
                            {{ $message }}
                        </p>
                    @else
                        <p class="text-sm text-slate">
                            A few sentences are plenty to get started.
                        </p>
                    @enderror

                    <span class="text-xs text-slate">
                        {{ strlen($this->message) }}/3000
                    </span>
                </div>
            </div>

            @error('form')
                <p class="form-error mt-6" role="alert">
                    {{ $message }}
                </p>
            @enderror

            <div class="mt-8 flex flex-col items-start gap-4 sm:flex-row sm:items-center">
                <button
                    type="submit"
                    class="button-primary justify-center hover:cursor-pointer"
                    wire:loading.attr="disabled"
                    wire:target="submit"
                >
                    <span wire:loading.remove wire:target="submit">
                        Send Project Inquiry
                    </span>

                    <span wire:loading wire:target="submit">
                        Sending…
                    </span>

                    <svg
                        wire:loading.remove
                        wire:target="submit"
                        aria-hidden="true"
                        class="h-4 w-4"
                        viewBox="0 0 20 20"
                        fill="none"
                    >
                        <path
                            d="M4 10h12M11 5l5 5-5 5"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                </button>

                <p class="text-sm leading-6 text-slate">
                    No pressure and no obligation.
                </p>
            </div>
        </form>
    @endif
</div>
