@props(['product'])

@php
    $name = ucfirst($product);
    $screen = match ($product) {
        'saydee' => 'dashboard with customer requests and next steps',
        'daysie' => 'daily agenda with events from consulting and personal accounts',
        'maeve' => 'invoice follow-up queue with a draft ready for review',
        'remi' => 'contact cards and saved connections',
    };
    $isDevelopmentBuild = in_array($product, ['daysie', 'remi'], true);
@endphp

<figure class="studio-product-visual studio-product-visual--{{ $product }}">
    <div class="studio-product-visual__devices">
        <div class="studio-product-visual__desktop">
            <div class="studio-product-visual__browser" aria-hidden="true"><i></i><i></i><i></i><span>{{ match ($product) { 'daysie' => 'DESKTOP WEB PREVIEW', 'remi' => 'PUBLIC CARD ON DESKTOP', default => 'DESKTOP' } }}</span></div>
            <img
                src="{{ asset('images/work/'.$product.'/desktop.webp') }}"
                alt="{{ $product === 'remi' ? 'Remi public contact card on desktop, using sample data' : $name.' '.($product === 'daysie' ? 'development web preview' : 'desktop').' '.$screen.', using sample data' }}"
                width="1440"
                height="900"
                loading="lazy"
                decoding="async"
            >
        </div>
        <div class="studio-product-visual__mobile">
            <span class="studio-product-visual__mobile-label" aria-hidden="true">MOBILE</span>
            <div class="studio-product-visual__phone">
                <img
                    src="{{ asset('images/work/'.$product.'/mobile.webp') }}"
                    alt="{{ $name }} mobile {{ $screen }}, using sample data"
                    width="390"
                    height="844"
                    loading="lazy"
                    decoding="async"
                >
            </div>
        </div>
    </div>
    <figcaption>{{ $isDevelopmentBuild ? 'DEVELOPMENT BUILD' : 'DESKTOP & MOBILE' }} · SAMPLE DATA</figcaption>
</figure>
