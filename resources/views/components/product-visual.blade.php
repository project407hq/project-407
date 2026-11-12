@props(['product'])

@php
    $name = ucfirst($product);
    $screen = match ($product) {
        'saydee' => 'dashboard with customer requests and next steps',
        'daysie' => 'daily agenda with events from consulting and personal accounts',
        'maeve' => 'invoice follow-up queue with a draft ready for review',
    };
@endphp

<figure class="studio-product-visual studio-product-visual--{{ $product }}">
    <div class="studio-product-visual__devices">
        <div class="studio-product-visual__desktop">
            <div class="studio-product-visual__browser" aria-hidden="true"><i></i><i></i><i></i><span>{{ $product === 'daysie' ? 'DESKTOP WEB PREVIEW' : 'DESKTOP' }}</span></div>
            <img
                src="{{ asset('images/work/'.$product.'/desktop.webp') }}"
                alt="{{ $name }} {{ $product === 'daysie' ? 'development web preview' : 'desktop' }} {{ $screen }}, using sample data"
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
    <figcaption>{{ $product === 'daysie' ? 'DEVELOPMENT BUILD' : 'DESKTOP & MOBILE' }} · SAMPLE DATA</figcaption>
</figure>
