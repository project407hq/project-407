@props(['title', 'description', 'eyebrow', 'headline', 'accent', 'intro', 'problems', 'deliverables', 'outcomes'])

<x-layout :title="$title" :description="$description">
    <div class="studio-page">
        <section class="studio-intro">
            <div class="studio-intro__line"><span>{{ $eyebrow }}</span><span>PROJECT 407 · MA · NH · REMOTE</span></div>
            <h1>{{ $headline }} <em>{{ $accent }}</em></h1>
            <div class="studio-intro__foot"><a href="#details">EXPLORE THE SERVICE ↓</a><p>{{ $intro }}</p></div>
        </section>

        <section id="details" class="studio-section">
            <div class="studio-split">
                <div><p class="studio-kicker">WHEN THIS HELPS</p><h2 class="studio-heading">A good fit when the current experience is holding the business back.</h2></div>
                <ol class="studio-list">@foreach($problems as $index => $problem)<li><span>0{{ $index + 1 }}</span><strong>{{ $problem[0] }}</strong><p>{{ $problem[1] }}</p></li>@endforeach</ol>
            </div>
        </section>

        <section class="studio-section studio-section--muted">
            <div class="studio-split">
                <div><p class="studio-kicker">WHAT PROJECT 407 CAN BUILD</p><h2 class="studio-heading">A focused scope around the result you need.</h2></div>
                <div class="service-page-grid">@foreach($deliverables as $deliverable)<article><span>＋</span><h3>{{ $deliverable[0] }}</h3><p>{{ $deliverable[1] }}</p></article>@endforeach</div>
            </div>
        </section>

        <section class="studio-section studio-section--dark">
            <p class="studio-kicker">WHAT SUCCESS LOOKS LIKE</p>
            <div class="studio-proof">@foreach($outcomes as $index => $outcome)<article><span>0{{ $index + 1 }}</span><h3>{{ $outcome[0] }}</h3><p>{{ $outcome[1] }}</p></article>@endforeach</div>
        </section>

        <section class="ember-cta"><p>HAVE THIS PROBLEM—or JUST A QUESTION?</p><h2>You don’t need a brief<br>to start a conversation.</h2><a href="{{ route('contact') }}">ASK KEVIN ABOUT IT <span>↗</span></a></section>
    </div>
</x-layout>
