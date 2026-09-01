<div {{ $attributes->merge(['class' => 'dark-panel relative overflow-hidden p-6 sm:p-8']) }}>
    <div aria-hidden="true" class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-orange/15 blur-3xl"></div>
    <div aria-hidden="true" class="absolute -bottom-24 -left-20 h-56 w-56 rounded-full bg-navy-light blur-3xl"></div>

    <div class="relative">
        <div class="flex items-center justify-between gap-4">
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-orange">Two perspectives</p>
            <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs font-semibold text-white/60">One partner</span>
        </div>

        <div class="mt-8 grid gap-4 sm:grid-cols-2">
            <article class="rounded-2xl border border-white/10 bg-white/5 p-5" data-reveal-item>
                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-orange/15 text-orange">
                    <svg aria-hidden="true" class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                        <path d="m8 9-3 3 3 3M16 9l3 3-3 3M14 5l-4 14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <p class="mt-5 text-xs font-bold uppercase tracking-[0.14em] text-white/45">Engineering</p>
                <h2 class="mt-2 text-xl font-extrabold text-white">Build it right.</h2>
                <p class="mt-2 text-sm leading-6 text-white/60">Reliable systems, thoughtful design, and maintainable code.</p>
            </article>

            <article class="rounded-2xl border border-white/10 bg-white/5 p-5" data-reveal-item>
                <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-white/10 text-white">
                    <svg aria-hidden="true" class="h-5 w-5" viewBox="0 0 24 24" fill="none">
                        <path d="M4 20h16M6 20V8l6-4 6 4v12M9 12h6M9 16h6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <p class="mt-5 text-xs font-bold uppercase tracking-[0.14em] text-white/45">Ownership</p>
                <h2 class="mt-2 text-xl font-extrabold text-white">Solve what matters.</h2>
                <p class="mt-2 text-sm leading-6 text-white/60">Leads, customers, daily operations, and real-world constraints.</p>
            </article>
        </div>

        <div class="relative mt-4 overflow-hidden rounded-2xl bg-orange p-5 text-ink" data-reveal-item>
            <div aria-hidden="true" class="absolute -right-8 -top-8 h-24 w-24 rounded-full border-[18px] border-white/15"></div>
            <div class="relative flex items-center gap-4">
                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-ink text-white">✓</span>
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-ink/55">Where they meet</p>
                    <p class="mt-1 text-lg font-extrabold">Useful technology built around the business.</p>
                </div>
            </div>
        </div>
    </div>
</div>
