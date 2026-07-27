<x-layout
    title="Start a Project | Project 407"
    description="Tell Project 407 about your website or software project. Work directly with an experienced software developer who understands local service businesses."
>
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-cream">
        <div
            aria-hidden="true"
            class="absolute -left-32 top-12 h-80 w-80 rounded-full bg-orange/10 blur-3xl"
        ></div>

        <div
            aria-hidden="true"
            class="absolute -right-32 bottom-0 h-96 w-96 rounded-full bg-navy/10 blur-3xl"
        ></div>

        <div class="site-container relative py-16 sm:py-20 lg:py-24">
            <div class="max-w-4xl">
                <p class="eyebrow">
                    Start a project
                </p>

                <h1 class="display-title mt-6">
                    Tell me what you’re trying to
                    <span class="text-orange">build or improve.</span>
                </h1>

                <p class="lead mt-6 max-w-2xl">
                    You don’t need a technical plan or a perfectly defined
                    project. Start by telling me about your business, the
                    problem, and what a better result would look like.
                </p>
            </div>
        </div>
    </section>

    {{-- Developer introduction --}}
    <section class="border-y border-navy/10 bg-white">
        <div class="site-container py-14 sm:py-16 lg:py-20">
            <div class="grid items-center gap-10 lg:grid-cols-[0.85fr_1.15fr] lg:gap-16">
                <div>
                    <p class="eyebrow">
                        Work directly with the developer
                    </p>

                    <h2 class="mt-5 text-3xl font-extrabold leading-tight text-ink sm:text-4xl">
                        No salespeople, outsourcing, or confusing handoffs.
                    </h2>
                </div>

                <div>
                    <p class="text-lg leading-8 text-slate">
                        Hi, I’m Kevin, the owner and developer behind Project 407.
                        I’m a software engineer who also owns and operates
                        <span class="font-bold text-ink">407 Haul Away LLC</span>,
                        a local service business serving Northern Massachusetts
                        and Southern New Hampshire.
                    </p>

                    <p class="mt-5 text-lg leading-8 text-slate">
                        That means I understand what service businesses actually
                        need from a website—not just how to make one look good.
                        Whether you need a new website, improvements to an
                        existing site, or custom software to simplify your
                        operations, you’ll work directly with me from our first
                        conversation through launch.
                    </p>

                    <div class="mt-7 flex flex-wrap gap-3">
                        <span class="rounded-full bg-cream px-4 py-2 text-sm font-bold text-ink">
                            ✓ Direct communication
                        </span>

                        <span class="rounded-full bg-cream px-4 py-2 text-sm font-bold text-ink">
                            ✓ Local business experience
                        </span>

                        <span class="rounded-full bg-cream px-4 py-2 text-sm font-bold text-ink">
                            ✓ No outsourced development
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Form and supporting information --}}
    <section class="section-space bg-white">
        <div class="site-container">
            <div class="grid items-start gap-12 lg:grid-cols-[1.15fr_0.65fr] lg:gap-20">
                <div class="surface-card p-6 sm:p-8 lg:p-10">
                    <div class="mb-8 border-b border-navy/10 pb-7">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-orange-dark">
                            Project inquiry
                        </p>

                        <h2 class="mt-3 text-2xl font-extrabold text-ink sm:text-3xl">
                            Let’s start with a few details.
                        </h2>

                        <p class="mt-3 leading-7 text-slate">
                            Share whatever you know right now. We can work
                            through the remaining details together.
                        </p>

                        <p class="mt-3 text-sm font-semibold text-ink/70">
                            I personally review every inquiry and will work with
                            you directly from the first conversation through launch.
                        </p>
                    </div>

                    <livewire:project-inquiry-form />
                </div>

                <aside class="space-y-5">
                    {{-- Direct contact options --}}
                    <div class="rounded-panel border border-navy/10 bg-cream p-7 sm:p-8">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-orange-dark">
                            Other ways to reach me
                        </p>

                        <h2 class="mt-3 text-xl font-extrabold text-ink">
                            Prefer to call or email?
                        </h2>

                        <p class="mt-3 text-sm leading-6 text-slate">
                            The project form is the best way to provide all the
                            details, but you’re also welcome to contact me directly.
                        </p>

                        <div class="mt-7 space-y-6">
                            <div class="flex items-start gap-4">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white text-orange shadow-sm">
                                    <svg
                                        aria-hidden="true"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106a1.125 1.125 0 0 0-1.173.417l-.97 1.293a1.125 1.125 0 0 1-1.21.38 12.035 12.035 0 0 1-7.143-7.143 1.125 1.125 0 0 1 .38-1.21l1.293-.97c.365-.274.531-.74.417-1.173L6.963 3.102A1.125 1.125 0 0 0 5.872 2.25H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"
                                        />
                                    </svg>
                                </div>

                                <div>
                                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-slate">
                                        Phone
                                    </p>

                                    <a
                                        href="tel:+19788779784"
                                        class="mt-1 inline-block font-extrabold text-ink transition hover:text-orange-dark focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange focus-visible:ring-offset-4"
                                    >
                                        (978) 877-9784
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-white text-orange shadow-sm">
                                    <svg
                                        aria-hidden="true"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0-8.69 5.52a2.25 2.25 0 0 1-2.42 0L2.25 6.75"
                                        />
                                    </svg>
                                </div>

                                <div class="min-w-0">
                                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-slate">
                                        Email
                                    </p>

                                    <a
                                        href="mailto:kevin@project-407.com"
                                        class="mt-1 inline-block break-all font-extrabold text-ink transition hover:text-orange-dark focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-orange focus-visible:ring-offset-4"
                                    >
                                        kevin@project-407.com
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="mt-7 border-t border-navy/10 pt-5">
                            <p class="text-sm leading-6 text-slate">
                                <span class="font-extrabold text-ink">
                                    Typical response time:
                                </span>

                                Within one business day.
                            </p>
                        </div>
                    </div>

                    {{-- Process --}}
                    <div class="dark-panel relative overflow-hidden p-7 sm:p-8">
                        <div
                            aria-hidden="true"
                            class="absolute -right-20 -top-20 h-56 w-56 rounded-full bg-orange/15 blur-3xl"
                        ></div>

                        <div class="relative">
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-orange">
                                What happens next?
                            </p>

                            <ol class="mt-7 space-y-6">
                                <li class="flex gap-4">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white/10 text-sm font-extrabold text-orange">
                                        1
                                    </span>

                                    <div>
                                        <h3 class="font-extrabold text-white">
                                            I review your inquiry
                                        </h3>

                                        <p class="mt-2 text-sm leading-6 text-white/60">
                                            I’ll look at your business, goals,
                                            and the type of help you need.
                                        </p>
                                    </div>
                                </li>

                                <li class="flex gap-4">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white/10 text-sm font-extrabold text-orange">
                                        2
                                    </span>

                                    <div>
                                        <h3 class="font-extrabold text-white">
                                            We schedule a conversation
                                        </h3>

                                        <p class="mt-2 text-sm leading-6 text-white/60">
                                            We’ll discuss the project and work
                                            through any questions needed to
                                            understand it.
                                        </p>
                                    </div>
                                </li>

                                <li class="flex gap-4">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white/10 text-sm font-extrabold text-orange">
                                        3
                                    </span>

                                    <div>
                                        <h3 class="font-extrabold text-white">
                                            I recommend the next step
                                        </h3>

                                        <p class="mt-2 text-sm leading-6 text-white/60">
                                            If the project is a good fit, you’ll
                                            receive a clear proposed direction
                                            without a high-pressure sales pitch.
                                        </p>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>

                    {{-- Helpful inquiry details --}}
                    <div class="rounded-panel bg-cream p-7">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-orange-dark">
                            A good starting point
                        </p>

                        <ul class="mt-5 space-y-4 text-sm font-semibold text-ink">
                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 text-orange">✓</span>
                                What your business does
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 text-orange">✓</span>
                                What currently isn’t working
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 text-orange">✓</span>
                                What you would like to improve
                            </li>

                            <li class="flex items-start gap-3">
                                <span class="mt-0.5 text-orange">✓</span>
                                Any timeline you have in mind
                            </li>
                        </ul>
                    </div>

                    {{-- Reassurance --}}
                    <div class="rounded-panel border border-navy/10 bg-white p-7">
                        <p class="font-extrabold text-ink">
                            Not sure what you need?
                        </p>

                        <p class="mt-3 text-sm leading-6 text-slate">
                            That’s completely fine. Describe the problem or goal
                            and select “I’m not sure yet” in the form. I’ll help
                            you determine the most practical next step.
                        </p>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</x-layout>
