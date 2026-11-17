@props(['title', 'description', 'eyebrow', 'headline', 'accent', 'intro', 'problems', 'deliverables', 'outcomes', 'engagements' => [], 'stages' => [], 'relatedLinks' => [], 'faqs' => [], 'inquiryService' => 'software', 'fitHeading' => 'A good fit when the current experience is holding the business back.'])

<x-layout
    :title="$title"
    :description="$description"
    :inquiry-service="$inquiryService"
    :service-name="str($title)->before(' |')->toString()"
    :breadcrumbs="[['name' => 'Home', 'url' => route('home')], ['name' => 'Services', 'url' => route('services')], ['name' => str($title)->before(' |')->toString(), 'url' => url()->current()]]"
>
    <div class="studio-page service-page">
        <section class="studio-intro">
            <div class="studio-intro__line"><span>{{ $eyebrow }}</span><span>PROJECT 407 · MA · NH · REMOTE</span></div>
            <h1>{{ $headline }} <em>{{ $accent }}</em></h1>
            <div class="studio-intro__foot">
                @isset($introAction)
                    {{ $introAction }}
                @else
                    <a href="#details">EXPLORE THE SERVICE ↓</a>
                @endisset
                <p>{{ $intro }}</p>
            </div>
        </section>

        {{ $slot }}

        <section id="details" class="studio-section">
            <div class="studio-split">
                <div><p class="studio-kicker">WHEN THIS HELPS</p><h2 class="studio-heading">{{ $fitHeading }}</h2></div>
                <ol class="studio-list">@foreach($problems as $index => $problem)<li><span>0{{ $index + 1 }}</span><strong>{{ $problem[0] }}</strong><p>{{ $problem[1] }}</p></li>@endforeach</ol>
            </div>
        </section>

        <section class="studio-section studio-section--muted">
            <div class="studio-split">
                <div><p class="studio-kicker">WHAT THE ENGAGEMENT CAN INCLUDE</p><h2 class="studio-heading">A focused scope around the result you need.</h2></div>
                <div class="service-page-grid">@foreach($deliverables as $deliverable)<article><span>＋</span><h3>{{ $deliverable[0] }}</h3><p>{{ $deliverable[1] }}</p></article>@endforeach</div>
            </div>
        </section>

        @if ($engagements !== [])
            <section class="studio-section service-examples" aria-labelledby="examples-heading">
                <div class="studio-split">
                    <div><p class="studio-kicker">POSSIBLE STARTING POINTS</p><h2 id="examples-heading" class="studio-heading">What an engagement can look like.</h2><p class="service-examples__note">These are examples of scope we can discuss. The right starting point depends on your systems, priorities, and budget.</p></div>
                    <div class="service-page-grid">
                        @foreach ($engagements as $engagement)
                            <article @if (isset($engagement['id'])) id="{{ $engagement['id'] }}" @endif><h3>{{ $engagement['title'] }}</h3><p>{{ $engagement['description'] }}</p><p><strong>You receive:</strong> {{ $engagement['deliverable'] }}</p></article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <section class="studio-section studio-section--dark">
            <p class="studio-kicker">WHAT SUCCESS LOOKS LIKE</p>
            <div class="studio-proof">@foreach($outcomes as $index => $outcome)<article><span>0{{ $index + 1 }}</span><h3>{{ $outcome[0] }}</h3><p>{{ $outcome[1] }}</p></article>@endforeach</div>
        </section>

        @if ($stages !== [])
            <section class="studio-section studio-section--muted">
                <div class="studio-split">
                    <div><p class="studio-kicker">SCOPE, DELIVERY &amp; INVESTMENT</p><h2 class="studio-heading">Agree on the work before it starts.</h2><p class="service-examples__note">Based in Dunstable, Massachusetts. Serving Massachusetts, New Hampshire, and businesses remotely across the United States.</p></div>
                    <ol class="studio-list">
                        @foreach ($stages as $stage)
                            <li><span>{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><strong>{{ $stage['title'] }}</strong><p>{{ $stage['description'] }}</p></li>
                        @endforeach
                    </ol>
                </div>
            </section>
        @endif

        @if ($relatedLinks !== [])
            <section class="studio-section service-related" aria-labelledby="related-heading">
                <div class="studio-split">
                    <div><p class="studio-kicker">SEE THE THINKING IN PRACTICE</p><h2 id="related-heading" class="studio-heading">Explore the work and related services.</h2></div>
                    <div class="studio-product-story__context">
                        @foreach ($relatedLinks as $relatedLink)
                            <article><h3><a href="{{ $relatedLink['url'] }}">{{ $relatedLink['title'] }} <span aria-hidden="true">↗</span></a></h3><p>{{ $relatedLink['description'] }}</p></article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        @if ($faqs !== [])
            <section class="studio-section"><div class="studio-split">
                <div><p class="studio-kicker">COMMON QUESTIONS</p><h2 class="studio-heading">Before we start.</h2></div>
                <ol class="studio-list">
                    @foreach ($faqs as $index => $faq)
                        <li><span>0{{ $index + 1 }}</span><strong>{{ $faq[0] }}</strong><p>{{ $faq[1] }}</p></li>
                    @endforeach
                </ol>
            </div></section>
        @endif

        <section class="ember-cta"><p>TALK THROUGH YOUR NEXT STEP</p><h2>You don’t need a brief<br>to start a conversation.</h2><a href="{{ route('contact', ['service' => $inquiryService]) }}#inquiry">DISCUSS YOUR PROJECT <span>↗</span></a></section>
    </div>
</x-layout>
