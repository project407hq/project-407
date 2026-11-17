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
            <div class="studio-product__meta"><span>01 / CUSTOMER FOLLOW-THROUGH</span><span class="studio-product__status">Available on web</span></div>
            <h3>Saydee</h3>
            <p>Capture a request, review the details, and keep the next step moving. Add quotes and connected jobs when the work needs them.</p>
            <p class="studio-product__craft">Customer requests · Quotes · Follow-through</p>
            <a class="studio-product__link" href="{{ route('products.saydee') }}">EXPLORE SAYDEE <span aria-hidden="true">↗</span></a>
        </article>

        <article class="studio-product">
            <a class="studio-product__visual-link" href="{{ route('products.daysie') }}" aria-label="Explore the Daysie project"><x-product-visual product="daysie" /></a>
            <div class="studio-product__meta"><span>02 / EMAIL &amp; CALENDAR</span><span class="studio-product__status">In development</span></div>
            <h3>Daysie</h3>
            <p>A little less to think about. Bring your Google and Outlook inboxes and calendars together, with help for the replies, meetings, and follow-ups that need you.</p>
            <p class="studio-product__craft">Google &amp; Outlook · Replies · Meeting coordination</p>
            <a class="studio-product__link" href="{{ route('products.daysie') }}">EXPLORE DAYSIE <span aria-hidden="true">↗</span></a>
        </article>

        <article class="studio-product">
            <a class="studio-product__visual-link" href="{{ route('products.maeve') }}" aria-label="Explore the Maeve project"><x-product-visual product="maeve" /></a>
            <div class="studio-product__meta"><span>03 / INVOICE FOLLOW-UP</span><span class="studio-product__status">Early access</span></div>
            <h3>Maeve</h3>
            <p>Start with an overdue invoice, review a prepared reminder, and keep replies, payment promises, and recorded payments together.</p>
            <p class="studio-product__craft">Invoice reminders · Customer replies · Payment updates</p>
            <a class="studio-product__link" href="{{ route('products.maeve') }}">EXPLORE MAEVE <span aria-hidden="true">↗</span></a>
        </article>

        <article class="studio-product">
            <a class="studio-product__visual-link" href="{{ route('products.remi') }}" aria-label="Explore the Remi project"><x-product-visual product="remi" /></a>
            <div class="studio-product__meta"><span>04 / PEOPLE &amp; CONNECTIONS</span><span class="studio-product__status">Waitlist open</span></div>
            <h3>Remi</h3>
            <p>Meet someone once. Find them when it matters. Keep a current card, private memories, and a path to introductions that both people approve.</p>
            <p class="studio-product__craft">Shared cards · Private memories · Thoughtful introductions</p>
            <a class="studio-product__link" href="{{ route('products.remi') }}">EXPLORE REMI <span aria-hidden="true">↗</span></a>
        </article>
    </div>

    <div class="studio-products__foot"><p>Have a workflow that needs this kind of thinking?</p><a href="{{ route('contact') }}#inquiry">DISCUSS YOUR PROJECT <span aria-hidden="true">↗</span></a></div>
</section>
