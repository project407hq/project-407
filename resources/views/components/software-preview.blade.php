<div {{ $attributes->merge(['class' => 'overflow-hidden rounded-panel border border-navy/10 bg-white shadow-card']) }}>
    <div class="flex items-center justify-between gap-4 border-b border-navy/10 px-4 py-3 sm:px-5">
        <div class="flex items-center gap-2">
            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-orange font-extrabold text-white">S</span>
            <div>
                <p class="text-sm font-extrabold text-ink">Saydee</p>
                <p class="text-[0.625rem] font-bold uppercase tracking-[0.14em] text-slate">Built by Project 407</p>
            </div>
        </div>
        <span class="hidden rounded-full bg-orange/10 px-3 py-1 text-xs font-bold text-orange-dark sm:inline-flex">Customer momentum</span>
    </div>

    <div class="grid min-h-[28rem] sm:grid-cols-[11rem_1fr]">
        <aside class="hidden bg-navy p-4 sm:block">
            <nav aria-label="Saydee interface preview">
                <ul class="space-y-2 text-sm font-semibold text-white/55">
                    <li class="rounded-xl bg-white/10 px-3 py-2.5 text-white">Dashboard</li>
                    <li class="px-3 py-2.5">Leads</li>
                    <li class="px-3 py-2.5">Customers</li>
                    <li class="px-3 py-2.5">Follow-ups</li>
                    <li class="px-3 py-2.5">Pipeline</li>
                </ul>
            </nav>
        </aside>

        <div class="bg-cream p-4 sm:p-6">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.14em] text-orange-dark">Monday overview</p>
                    <h3 class="mt-1 text-xl font-extrabold text-ink sm:text-2xl">Keep every customer moving forward.</h3>
                </div>
                <span class="inline-flex w-fit rounded-full bg-navy px-4 py-2 text-xs font-bold text-white">+ New lead</span>
            </div>

            <div class="mt-6 grid gap-3 sm:grid-cols-3">
                <div class="rounded-2xl border border-navy/10 bg-white p-4">
                    <p class="text-[0.625rem] font-bold uppercase tracking-[0.14em] text-slate">Open leads</p>
                    <p class="mt-2 text-2xl font-extrabold text-ink">12</p>
                    <p class="mt-1 text-xs font-semibold text-orange-dark">3 added this week</p>
                </div>
                <div class="rounded-2xl border border-orange/30 bg-white p-4">
                    <p class="text-[0.625rem] font-bold uppercase tracking-[0.14em] text-slate">Follow-ups due</p>
                    <p class="mt-2 text-2xl font-extrabold text-ink">4</p>
                    <p class="mt-1 text-xs font-semibold text-orange-dark">2 need attention</p>
                </div>
                <div class="rounded-2xl border border-navy/10 bg-white p-4">
                    <p class="text-[0.625rem] font-bold uppercase tracking-[0.14em] text-slate">Open pipeline</p>
                    <p class="mt-2 text-2xl font-extrabold text-ink">$8,450</p>
                    <p class="mt-1 text-xs font-semibold text-slate">Across 6 opportunities</p>
                </div>
            </div>

            <div class="mt-4 rounded-2xl border border-navy/10 bg-white p-4 sm:p-5">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <p class="font-extrabold text-ink">Needs your attention</p>
                        <p class="mt-1 text-xs text-slate">The next useful action for each relationship</p>
                    </div>
                    <span class="text-xs font-bold text-orange-dark">View all</span>
                </div>

                <div class="mt-4 divide-y divide-navy/10">
                    @foreach ([
                        ['initials' => 'SM', 'name' => 'Sarah Mitchell', 'detail' => 'Annual plan inquiry', 'status' => 'Follow up today'],
                        ['initials' => 'MT', 'name' => 'Mike Thompson', 'detail' => 'Project consultation', 'status' => 'Overdue'],
                        ['initials' => 'JR', 'name' => 'Jessica Rivera', 'detail' => 'Team onboarding', 'status' => 'Tomorrow'],
                    ] as $customer)
                        <div class="flex items-center gap-3 py-3 first:pt-0 last:pb-0">
                            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-mist text-xs font-extrabold text-navy">{{ $customer['initials'] }}</span>
                            <div class="min-w-0 flex-1">
                                <p class="truncate text-sm font-extrabold text-ink">{{ $customer['name'] }}</p>
                                <p class="truncate text-xs text-slate">{{ $customer['detail'] }}</p>
                            </div>
                            <span class="hidden rounded-full bg-orange/10 px-2.5 py-1 text-[0.625rem] font-bold text-orange-dark md:inline-flex">{{ $customer['status'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
