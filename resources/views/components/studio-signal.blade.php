<div {{ $attributes->merge(['class' => 'signal-stage relative']) }} data-signal-stage>
    <div aria-hidden="true" class="absolute -inset-8 rounded-full bg-violet/20 blur-3xl"></div>

    <div class="signal-plane relative overflow-hidden rounded-panel border border-white/15 bg-[#111019] shadow-[0_40px_120px_rgba(0,0,0,0.45)]" data-signal-plane>
        <div class="flex items-center justify-between border-b border-white/10 px-4 py-3 sm:px-5">
            <div class="flex items-center gap-2" aria-hidden="true">
                <span class="h-2 w-2 rounded-full bg-coral"></span>
                <span class="h-2 w-2 rounded-full bg-orange"></span>
                <span class="h-2 w-2 rounded-full bg-violet"></span>
            </div>

            <p class="mono-label text-white/40">Project 407 / Signal canvas</p>
            <span class="flex items-center gap-2 font-mono text-[0.625rem] font-semibold text-orange">
                <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-orange"></span>
                ONLINE
            </span>
        </div>

        <div class="relative min-h-[31rem] overflow-hidden p-5 sm:p-7">
            <div aria-hidden="true" class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.045)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.045)_1px,transparent_1px)] bg-[size:36px_36px]"></div>
            <div aria-hidden="true" class="absolute left-1/2 top-1/2 h-72 w-72 -translate-x-1/2 -translate-y-1/2 rounded-full border border-violet/30"></div>
            <div aria-hidden="true" class="absolute left-1/2 top-1/2 h-52 w-52 -translate-x-1/2 -translate-y-1/2 rounded-full border border-dashed border-white/15"></div>

            <svg aria-hidden="true" class="absolute inset-0 h-full w-full text-violet/35" viewBox="0 0 600 500" fill="none" preserveAspectRatio="none">
                <path d="M90 105 300 250 512 92M300 250 495 408M300 250 104 405" stroke="currentColor" stroke-width="1" stroke-dasharray="5 8" />
                <circle cx="300" cy="250" r="5" fill="currentColor" />
            </svg>

            <div class="absolute left-1/2 top-1/2 grid h-32 w-32 -translate-x-1/2 -translate-y-1/2 place-items-center border border-orange/50 bg-orange text-white shadow-[0_0_80px_rgba(49,87,255,0.24)] sm:h-40 sm:w-40" data-reveal-item>
                <div class="text-center">
                    <p class="font-display text-4xl font-semibold tracking-[-0.08em] sm:text-5xl">4|07</p>
                    <p class="mt-2 font-mono text-[0.5625rem] font-semibold uppercase tracking-[0.18em]">Build signal</p>
                </div>
            </div>

            <div class="absolute left-4 top-8 w-40 rounded-xl border border-white/10 bg-white/5 p-4 backdrop-blur-md sm:left-8 sm:w-44" data-reveal-item>
                <p class="mono-label text-violet">Input / 01</p>
                <p class="mt-2 text-sm font-semibold text-white">A business problem worth solving.</p>
            </div>

            <div class="absolute right-4 top-7 w-36 rounded-xl border border-white/10 bg-white/5 p-4 backdrop-blur-md sm:right-8 sm:w-44" data-reveal-item>
                <p class="mono-label text-orange">Mode</p>
                <div class="mt-3 flex flex-wrap gap-1.5 font-mono text-[0.5625rem] text-white/65">
                    <span class="rounded bg-white/10 px-2 py-1">WEB</span>
                    <span class="rounded bg-white/10 px-2 py-1">SYSTEM</span>
                    <span class="rounded bg-white/10 px-2 py-1">FLOW</span>
                </div>
            </div>

            <div class="absolute bottom-7 left-4 w-44 rounded-xl border border-violet/30 bg-violet/15 p-4 backdrop-blur-md sm:left-8 sm:w-52" data-reveal-item>
                <p class="mono-label text-violet">Process</p>
                <div class="mt-3 space-y-2 font-mono text-[0.625rem] text-white/55">
                    <p><span class="text-orange">01</span> Understand the friction</p>
                    <p><span class="text-orange">02</span> Design the right move</p>
                    <p><span class="text-orange">03</span> Ship something useful</p>
                </div>
            </div>

            <div class="absolute bottom-8 right-4 w-40 border border-orange/30 bg-orange p-4 text-white sm:right-8 sm:w-48" data-reveal-item>
                <p class="mono-label text-white/60">Output</p>
                <p class="mt-2 text-sm font-semibold">Less friction.<br>More forward motion.</p>
                <div class="mt-3 h-1 overflow-hidden bg-white/20"><span class="block h-full w-[82%] bg-white"></span></div>
            </div>
        </div>
    </div>
</div>
