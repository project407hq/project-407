<?php

use App\Models\ProjectInquiry;
use App\ProjectInquiryNotifier;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use function Illuminate\Support\defer;

new class extends Component
{
    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public string $businessName = '';

    public string $service = 'not-sure';

    public bool $showOptionalDetails = false;

    public string $message = '';

    public string $website = '';

    public bool $submitted = false;

    public function mount(): void
    {
        $service = request()->query('service');

        if (is_string($service) && in_array($service, ['website', 'software', 'support', 'advisory', 'employment', 'collaboration', 'question', 'not-sure'], true)) {
            $this->service = $service;
        }
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email:rfc', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'businessName' => ['nullable', 'string', 'max:150'],
            'service' => [
                'required',
                'in:website,software,support,advisory,employment,collaboration,question,not-sure',
            ],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
            'website' => ['nullable', 'max:0'],
        ];
    }

    protected function messages(): array
    {
        return [
            'name.required' => 'Please enter your name so Kevin knows who to reply to.',
            'name.max' => 'Please keep your name to 100 characters or fewer.',
            'email.required' => 'Please enter an email address where Kevin can reach you.',
            'email.email' => 'Please enter a valid email address, such as name@example.com.',
            'email.max' => 'Please use an email address with 255 characters or fewer.',
            'phone.max' => 'Please keep your phone number to 30 characters or fewer.',
            'businessName.max' => 'Please keep the business or organization name to 150 characters or fewer.',
            'service.required' => 'Please select what best describes your message.',
            'service.in' => 'Please choose one of the available inquiry options.',
            'message.required' => 'Please add a few sentences about what you would like help with.',
            'message.min' => 'Please share a little more so Kevin can respond helpfully.',
            'message.max' => 'Please keep your message to 3,000 characters or fewer. You can share more when Kevin replies.',
            'website.max' => 'We could not submit this form. Please email Kevin directly instead.',
        ];
    }

    public function submit(): void
    {
        if ($this->submitted) {
            return;
        }

        $this->name = trim($this->name);
        $this->email = trim($this->email);
        $this->phone = trim($this->phone);
        $this->businessName = trim($this->businessName);
        $this->message = trim($this->message);

        $this->resetErrorBag('form');

        $this->service = $this->service ?: 'not-sure';

        try {
            $validated = $this->validate();
        } catch (ValidationException $exception) {
            $this->dispatch('project-inquiry-failed', reason: 'validation');

            throw $exception;
        }

        try {
            $rateLimitKey = 'project-inquiry:'.request()->ip();

            if (RateLimiter::increment($rateLimitKey, decaySeconds: 3600) > 5) {
                $this->addError(
                    'form',
                    'Too many messages have been sent from this connection. Please wait before trying again, or email Kevin directly.',
                );
                $this->dispatch('project-inquiry-failed', reason: 'rate_limited');

                return;
            }

            $inquiry = ProjectInquiry::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?: null,
                'business_name' => $validated['businessName'] ?: null,
                'service' => $validated['service'],
                'message' => $validated['message'],
            ]);
        } catch (Throwable $exception) {
            report($exception);

            $this->addError(
                'form',
                'We could not confirm that your message was saved. Your details are still here. Please email or call Kevin directly instead.',
            );
            $this->dispatch('project-inquiry-failed', reason: 'server');

            return;
        }

        defer(fn () => app(ProjectInquiryNotifier::class)->sendToDiscord($inquiry));

        $this->reset([
            'name',
            'email',
            'phone',
            'businessName',
            'service',
            'message',
            'website',
            'showOptionalDetails',
        ]);

        $this->submitted = true;

        $this->dispatch('project-inquiry-submitted', service: $inquiry->service);
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
            'showOptionalDetails',
        ]);

        $this->submitted = false;
    }
};
?>

<div data-inquiry-form>
    @if ($submitted)
        <div
            class="rounded-panel border border-orange/20 bg-orange/10 p-7 sm:p-9"
            role="status"
        >
            <span class="flex h-14 w-14 items-center justify-center rounded-full bg-orange text-white">
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
                Thanks for reaching out. Kevin will review your message and
                follow up using the email address you provided.
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
        <form name="project_inquiry" wire:submit="submit" novalidate>
            <div wire:ignore data-request-error hidden class="mb-6 rounded-xl border border-orange/30 bg-orange/10 p-5" role="alert" tabindex="-1">
                <p data-request-error-message class="font-semibold text-ink"></p>
                <p class="mt-3 text-sm leading-6">Contact Kevin at <a class="underline" href="mailto:kevin@project-407.com">kevin@project-407.com</a> or <a class="underline" href="tel:+19788779784">(978) 877-9784</a>.</p>
                <a data-request-refresh hidden class="mt-3 inline-block text-sm font-bold underline" href="{{ route('contact') }}#inquiry">Copy your message, then reload the form</a>
            </div>

            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-orange/30 bg-orange/10 p-5" role="alert" tabindex="-1" data-validation-summary>
                    <p class="font-bold text-ink">{{ $errors->has('form') ? 'Your message needs another way through.' : 'Please check the details below.' }}</p>
                    <ul class="mt-3 list-disc space-y-2 pl-5 text-sm leading-6 text-ink">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @if ($errors->has('form') || $errors->has('website'))
                        <p class="mt-3 text-sm leading-6">You can reach Kevin at <a class="underline" href="mailto:kevin@project-407.com">kevin@project-407.com</a> or <a class="underline" href="tel:+19788779784">(978) 877-9784</a>.</p>
                    @endif
                </div>
            @endif

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
                <div>
                    <label for="name" class="form-label">Your name <span class="text-orange-dark">*</span></label>
                    <input id="name" type="text" wire:model="name" class="form-control" required maxlength="100" autocomplete="name" placeholder="Your name"
                        @error('name') aria-invalid="true" aria-describedby="name-error" @enderror>
                    @error('name') <p id="name-error" class="form-error">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="email" class="form-label">Email address <span class="text-orange-dark">*</span></label>
                    <input id="email" type="email" wire:model="email" class="form-control" required maxlength="255" autocomplete="email" placeholder="you@business.com"
                        @error('email') aria-invalid="true" aria-describedby="email-error" @enderror>
                    @error('email') <p id="email-error" class="form-error">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-6">
                <label for="message" class="form-label">Your message <span class="text-orange-dark">*</span></label>
                <textarea id="message" wire:model="message" required maxlength="3000" class="form-control min-h-40 resize-y" placeholder="What would you like to build or improve? A few sentences, a relevant link, and any timing are enough."
                    @error('message') aria-invalid="true" aria-describedby="message-error" @enderror></textarea>
                <div class="mt-2 flex items-start justify-between gap-4">
                    @error('message')
                        <p id="message-error" class="text-sm font-semibold text-red-700">{{ $message }}</p>
                    @else
                        <p class="text-sm text-slate">You don’t need a finished project brief.</p>
                    @enderror
                    <span class="text-xs text-slate" x-text="$wire.message.length + '/3000'">{{ mb_strlen($this->message) }}/3000</span>
                </div>
            </div>

            <details class="inquiry-details" @toggle="$wire.showOptionalDetails = $el.open"
                @if ($showOptionalDetails || $errors->hasAny(['phone', 'businessName', 'service'])) open @endif>
                <summary>Add project details <span>(optional)</span></summary>
                <div class="grid gap-6 pt-5 sm:grid-cols-2">
                    <div>
                        <label for="phone" class="form-label">Phone number <span class="font-normal text-slate">(optional)</span></label>
                        <input id="phone" type="tel" wire:model="phone" class="form-control" maxlength="30" autocomplete="tel" placeholder="(978) 555-0123"
                            @error('phone') aria-invalid="true" aria-describedby="phone-error" @enderror>
                        @error('phone') <p id="phone-error" class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="businessName" class="form-label">Business or organization <span class="font-normal text-slate">(optional)</span></label>
                        <input id="businessName" type="text" wire:model="businessName" class="form-control" maxlength="150" autocomplete="organization" placeholder="Your business"
                            @error('businessName') aria-invalid="true" aria-describedby="business-name-error" @enderror>
                        @error('businessName') <p id="business-name-error" class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="service" class="form-label">What brings you here? <span class="font-normal text-slate">(optional)</span></label>
                        <select id="service" wire:model="service" class="form-control"
                            @error('service') aria-invalid="true" aria-describedby="service-error" @enderror>
                            <option value="not-sure">Help figuring out the next step</option>
                            <option value="software">Custom software or application</option>
                            <option value="support">Existing software or AI-built app help</option>
                            <option value="advisory">Fractional CTO or engineering leadership</option>
                            <option value="website">Website project</option>
                            <option value="question">General question</option>
                            <option value="collaboration">Business collaboration</option>
                            <option value="employment">Employment or leadership opportunity</option>
                        </select>
                        @error('service') <p id="service-error" class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>
            </details>

            <div class="mt-8 flex flex-col items-start gap-4 sm:flex-row sm:items-center">
                <button
                    type="submit"
                    class="button-primary justify-center hover:cursor-pointer"
                    wire:loading.attr="disabled"
                    wire:target="submit"
                >
                    <span wire:loading.remove wire:target="submit">
                        Send Message
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

@script
<script>
    $wire.interceptRequest(({ request, onSend, onError, onFailure, onSuccess }) => {
        const isSubmission = [...request.messages].some(
            (message) => [...message.actions].some((action) => action.name === 'submit'),
        );
        const trackFailure = (reason) => {
            if (isSubmission) {
                $wire.$el.dispatchEvent(new CustomEvent('project-inquiry-failed', {
                    bubbles: true,
                    detail: { reason },
                }));
            }
        };

        onSend(() => {
            if (isSubmission && ! $wire.submitted) {
                $wire.$el.dispatchEvent(new CustomEvent('project-inquiry-attempted', { bubbles: true }));
            }
        });

        const showError = (message, needsRefresh = false) => {
            const alert = $wire.$el.querySelector('[data-request-error]');

            if (! alert) {
                return;
            }

            alert.querySelector('[data-request-error-message]').textContent = message;
            alert.querySelector('[data-request-refresh]').hidden = ! needsRefresh;
            alert.hidden = false;

            if (isSubmission) {
                alert.focus({ preventScroll: true });
                alert.scrollIntoView({ behavior: 'instant', block: 'center' });
            }
        };

        onError(({ response, preventDefault }) => {
            preventDefault();
            trackFailure(response.status === 419 ? 'session_expired'
                : response.status === 429 ? 'rate_limited'
                    : response.status >= 500 ? 'server' : 'request');

            const messages = {
                419: 'This form has expired. Copy your message before reloading the form, or email Kevin directly.',
                429: 'Too many requests have come from this connection. Please wait before trying again, or contact Kevin directly.',
                503: 'The site is temporarily unavailable. Your details are still here. Please contact Kevin directly.',
            };

            showError(
                messages[response.status] ?? 'We could not confirm that your changes or message reached the site. Your details are still here. Please contact Kevin directly.',
                response.status === 419,
            );
        });

        onFailure(() => {
            trackFailure('network');
            showError('The connection was interrupted. We could not confirm that your changes or message reached the site. Your details are still here. Check your connection, or contact Kevin directly.');
        });

        onSuccess(() => {
            const alert = $wire.$el.querySelector('[data-request-error]');

            if (alert) {
                alert.hidden = true;
            }
        });
    });

    $wire.interceptMessage('submit', ({ onSuccess }) => {
        onSuccess(({ onRender }) => {
            onRender(() => {
                const summary = $wire.$el.querySelector('[data-validation-summary]');

                if (summary) {
                    summary.focus({ preventScroll: true });
                    summary.scrollIntoView({ behavior: 'instant', block: 'center' });
                }
            });
        });
    });
</script>
@endscript
