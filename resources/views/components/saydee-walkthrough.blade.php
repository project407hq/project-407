@props(['showVisual' => true, 'showOtherProducts' => false, 'compact' => false])

<section id="saydee-walkthrough" class="studio-products featured-build" aria-labelledby="saydee-walkthrough-heading">
    <header class="studio-products__intro">
        <div><p class="studio-kicker">BUILT BY PROJECT 407</p><h2 id="saydee-walkthrough-heading">Inside a working<br>product: Saydee.</h2><span class="studio-product__status">Available on web</span></div>
        <p>I built Saydee to prepare customer requests for review and keep quotes and jobs connected. It is my own available product.@unless ($compact) This is one example workflow; those capabilities can also be used independently.@endunless</p>
    </header>
    <div @class(['featured-build__body', 'featured-build__body--text' => ! $showVisual])>
        @if ($showVisual)
            <div><x-product-visual product="saydee" /><p class="featured-build__caption">Desktop and mobile web views with sample data.</p></div>
        @endif
        @if ($compact)
            <div class="featured-build__summary">
                <h3>The work behind it</h3>
                <p>Voice, text, and screenshot capture, a review step before saving, and related records that carry customer details forward.</p>
                <h3>For your project</h3>
                <p>The same work applies to customer portals, approval steps, and applications that need to share information. I can help you define and build the part your business needs.</p>
            </div>
        @else
            <ol class="featured-build__steps">
                <li><span>01</span><div><h3>Prepare and review the request</h3><p>A voice note, pasted message, or screenshot can supply the starting details. The owner checks what Saydee prepares before saving.</p></div></li>
                <li><span>02</span><div><h3>Keep the quote connected</h3><p>Customer and request context stays connected as the owner prepares a quote. Preparing, approving, and sending are separate actions.</p></div></li>
                <li><span>03</span><div><h3>Carry accepted work into a job</h3><p>An accepted quote can carry forward into a job, keeping the customer and quote context available as the work progresses.</p></div></li>
            </ol>
        @endif
    </div>
    @unless ($compact)
        <div class="featured-build__decision">
            <h3>The decisions behind the build</h3>
            <p>Preparing information, approving it, and sending a message are separate actions. I keep those differences clear so people can check details and control what happens next. That same care applies to customer portals, approvals, and integrations I can build for your business.</p>
        </div>
    @endunless
    <div class="featured-build__actions">
        <a href="{{ route('contact') }}#inquiry">DISCUSS YOUR PROJECT <span aria-hidden="true">↗</span></a>
        @if ($showVisual)
            <a href="{{ route('products.saydee') }}#saydee-walkthrough">SEE HOW I BUILT SAYDEE <span aria-hidden="true">↗</span></a>
        @endif
    </div>
    @unless ($compact)
        <p class="featured-build__demo"><a href="https://getsaydee.com">Visit Saydee to try its sample demo ↗</a>. Demo AI, email, and accounting actions are simulated or disabled.</p>
    @endunless
    @if ($showOtherProducts)
        <div class="featured-build__other"><p>More products I’m building</p><nav aria-label="More product builds"><a href="{{ route('products.daysie') }}">Daysie · In development ↗</a><a href="{{ route('products.maeve') }}">Maeve · Early access ↗</a><a href="{{ route('products.remi') }}">Remi · Waitlist open ↗</a><a href="{{ route('products.index') }}">All products ↗</a></nav></div>
    @endif
</section>
