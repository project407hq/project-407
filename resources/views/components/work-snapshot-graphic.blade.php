<div {{ $attributes->merge(['class' => 'relative']) }}>
    <div aria-hidden="true" class="absolute -inset-5 rotate-2 rounded-panel border border-orange/20"></div>

    <div class="relative overflow-hidden rounded-panel border border-navy/10 bg-white p-4 shadow-card sm:p-5">
        <div class="flex items-center justify-between gap-4 border-b border-navy/10 pb-4">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-orange-dark">Selected work</p>
                <p class="mt-1 text-sm font-extrabold text-ink">Different tools. Clear business purpose.</p>
            </div>
            <span class="flex h-9 w-9 items-center justify-center rounded-full bg-navy text-white">↗</span>
        </div>

        <div class="mt-4 grid gap-4 sm:grid-cols-2">
            <article class="overflow-hidden rounded-2xl border border-navy/10 bg-cream" data-reveal-item>
                <div class="aspect-[16/10] overflow-hidden bg-mist">
                    <img src="{{ asset('images/work/407-haul-away/homepage-desktop.webp') }}" alt="407 Haul Away website project" width="1440" height="900" class="h-full w-full object-cover object-top" loading="lazy" decoding="async">
                </div>
                <div class="p-4">
                    <p class="text-[0.625rem] font-bold uppercase tracking-[0.14em] text-orange-dark">Completed website</p>
                    <h2 class="mt-2 font-extrabold text-ink">407 Haul Away</h2>
                    <p class="mt-2 text-xs leading-5 text-slate">Clearer positioning and an easier path to a quote.</p>
                </div>
            </article>

            <article class="rounded-2xl border border-navy/10 bg-navy p-4 text-white" data-reveal-item>
                <div class="rounded-xl border border-white/10 bg-white/5 p-4">
                    <div class="flex items-center justify-between gap-3">
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-orange font-extrabold">S</span>
                        <span class="rounded-full bg-white/10 px-2.5 py-1 text-[0.625rem] font-bold text-white/60">PRODUCT</span>
                    </div>
                    <div class="mt-5 grid grid-cols-2 gap-2">
                        <div class="rounded-lg bg-white/10 p-3"><span class="block text-lg font-extrabold">12</span><span class="text-[0.625rem] text-white/50">OPEN LEADS</span></div>
                        <div class="rounded-lg border border-orange/30 bg-orange/10 p-3"><span class="block text-lg font-extrabold">4</span><span class="text-[0.625rem] text-white/50">FOLLOW-UPS</span></div>
                    </div>
                </div>
                <p class="mt-4 text-[0.625rem] font-bold uppercase tracking-[0.14em] text-orange">Project 407 product</p>
                <h2 class="mt-2 font-extrabold">Saydee</h2>
                <p class="mt-2 text-xs leading-5 text-white/60">Customer momentum and clearer next actions.</p>
            </article>
        </div>

        <div class="mt-4 grid grid-cols-3 gap-2 text-center text-[0.625rem] font-bold uppercase tracking-[0.1em] text-slate">
            <span class="rounded-xl bg-cream px-2 py-3">Clarify</span>
            <span class="rounded-xl bg-cream px-2 py-3">Simplify</span>
            <span class="rounded-xl bg-cream px-2 py-3">Move forward</span>
        </div>
    </div>
</div>
