<section id="products" class="studio-products" aria-labelledby="products-heading">
    <header class="studio-products__intro">
        <div>
            <p class="studio-kicker">BUILT BY PROJECT 407</p>
            <h2 id="products-heading">Products I’m building.<br>Work you can explore.</h2>
        </div>
        <p>Saydee, Daysie, Maeve, and Remi are my own products at different stages of development. Explore the screens and the decisions behind each build to see how I approach connected systems and routine work.</p>
    </header>

    <div class="studio-products__grid">
        <article class="studio-product">
            <a class="studio-product__visual-link" href="{{ route('products.saydee') }}" aria-label="Explore the Saydee project"><x-product-visual product="saydee" /></a>
            <div class="studio-product__meta"><span>01 / CUSTOMER REQUESTS</span><span class="studio-product__status">Available</span></div>
            <h3>Saydee</h3>
            <p>Turn customer requests into reviewed details, quotes, and connected jobs. Keep the next step in view as work moves forward.</p>
            <p class="studio-product__craft">Request capture · Approval flows · Connected records</p>
            <a class="studio-product__link" href="{{ route('products.saydee') }}">EXPLORE SAYDEE <span aria-hidden="true">↗</span></a>
        </article>

        <article class="studio-product">
            <a class="studio-product__visual-link" href="{{ route('products.daysie') }}" aria-label="Explore the Daysie project"><x-product-visual product="daysie" /></a>
            <div class="studio-product__meta"><span>02 / EMAIL &amp; CALENDAR</span><span class="studio-product__status">In development</span></div>
            <h3>Daysie</h3>
            <p>Building toward less coordination across inboxes and calendars, with the right account, privacy boundaries, and decisions brought back to you.</p>
            <p class="studio-product__craft">Multiple accounts · Mobile experience · Calendar checks</p>
            <a class="studio-product__link" href="{{ route('products.daysie') }}">EXPLORE DAYSIE <span aria-hidden="true">↗</span></a>
        </article>

        <article class="studio-product">
            <a class="studio-product__visual-link" href="{{ route('products.maeve') }}" aria-label="Explore the Maeve project"><x-product-visual product="maeve" /></a>
            <div class="studio-product__meta"><span>03 / INVOICE FOLLOW-UP</span><span class="studio-product__status">Early access</span></div>
            <h3>Maeve</h3>
            <p>Prepare and manage follow-up on overdue invoices. Review messages, track customer replies, and see when a situation needs your attention.</p>
            <p class="studio-product__craft">Background workflows · Message review · Payment context</p>
            <a class="studio-product__link" href="{{ route('products.maeve') }}">EXPLORE MAEVE <span aria-hidden="true">↗</span></a>
        </article>

        <article class="studio-product">
            <a class="studio-product__visual-link" href="{{ route('products.remi') }}" aria-label="Explore the Remi project"><x-product-visual product="remi" /></a>
            <div class="studio-product__meta"><span>04 / PEOPLE &amp; CONNECTIONS</span><span class="studio-product__status">In development</span></div>
            <h3>Remi</h3>
            <p>Meet someone once. Find them when it matters. Share a card, keep a private memory, and find people again from the details you remember.</p>
            <p class="studio-product__craft">Card exchange · Private context · Grounded recall</p>
            <a class="studio-product__link" href="{{ route('products.remi') }}">EXPLORE REMI <span aria-hidden="true">↗</span></a>
        </article>
    </div>

    <div class="studio-products__foot"><p>Have a workflow that needs this kind of thinking?</p><a href="{{ route('contact') }}#inquiry">DISCUSS YOUR PROJECT <span aria-hidden="true">↗</span></a></div>
</section>
