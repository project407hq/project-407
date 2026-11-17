@props(['product', 'name', 'status', 'summary', 'problem', 'solution', 'considerations', 'relevance', 'availability', 'productUrl' => null])

<x-layout
    :title="$name.' | Built by Project 407'"
    :description="$summary"
    :breadcrumbs="[
        ['name' => 'Home', 'url' => route('home')],
        ['name' => 'Products', 'url' => route('products.index')],
        ['name' => $name, 'url' => route('products.'.$product)],
    ]"
>
    <div class="studio-page studio-product-story">
        <section class="studio-intro studio-product-story__intro">
            <div class="studio-intro__line"><span>BUILT BY PROJECT 407 / {{ strtoupper($name) }}</span><span>{{ strtoupper($status) }}</span></div>
            <h1>{{ $name }}<br><em>By Kevin.</em></h1>
            <div class="studio-intro__foot"><a href="#the-build">EXPLORE THE BUILD ↓</a><p>{{ $summary }}</p></div>
        </section>

        <section id="the-build" class="studio-section studio-product-story__overview">
            <div class="studio-split">
                <div><p class="studio-kicker">AN INDEPENDENT PRODUCT</p><h2 class="studio-heading">The work behind the product.</h2></div>
                <div class="studio-product-story__context">
                    <div><h3>The problem</h3><p>{{ $problem }}</p></div>
                    <div><h3>The product</h3><p>{{ $solution }}</p></div>
                </div>
            </div>
            <x-product-visual :product="$product" />
        </section>

        {{ $walkthrough ?? '' }}

        <section class="studio-section studio-section--muted" aria-labelledby="engineering-heading">
            <div class="studio-split">
                <div><p class="studio-kicker">THE EVERYDAY DETAILS</p><h2 id="engineering-heading" class="studio-heading">What makes it useful.</h2></div>
                <ol class="studio-list">
                    @foreach ($considerations as $consideration)
                        <li><span>{{ str_pad((string) $loop->iteration, 2, '0', STR_PAD_LEFT) }}</span><strong>{{ $consideration['title'] }}</strong><p>{{ $consideration['description'] }}</p></li>
                    @endforeach
                </ol>
            </div>
        </section>

        <section class="studio-section">
            <div class="studio-split">
                <div><p class="studio-kicker">FOR YOUR BUSINESS</p><h2 class="studio-heading">Bring that thinking to your software.</h2></div>
                <div class="studio-product-story__context">
                    <p class="studio-lead">{{ $relevance }}</p>
                    <p>For your own business, I can help <a href="{{ route('services.custom-software') }}">build an application</a>, <a href="{{ route('services.automation-integrations') }}">connect the tools your team uses</a>, or <a href="{{ route('services.fractional-cto') }}">plan your next move</a>.</p>
                    <div class="studio-product-story__availability">
                        <span class="studio-product__status">{{ $status }}</span><p>{{ $availability }}</p>
                        @if ($productUrl)
                            <a class="studio-product__link" href="{{ $productUrl }}">VISIT {{ strtoupper($name) }} <span aria-hidden="true">↗</span></a>
                        @endif
                    </div>
                    <a class="studio-product-story__back" href="{{ route('products.index') }}">← ALL PRODUCTS</a>
                </div>
            </div>
        </section>

        <section class="ember-cta"><p>HAVE A WORKFLOW OR PRODUCT IDEA?</p><h2>Let’s put your<br>software to work.</h2><a href="{{ route('contact') }}#inquiry">DISCUSS YOUR PROJECT <span aria-hidden="true">↗</span></a></section>
    </div>
</x-layout>
