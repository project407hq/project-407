<x-layout
    title="Custom Software Development & Integrations | Project 407"
    description="Build an application, improve existing software, or connect your business systems. Work directly with Kevin Whelan in Massachusetts, New Hampshire, and remotely."
>
    <div class="ember-home">
        <section class="ember-hero">
            <div class="ember-hero__orbit" aria-hidden="true"></div>
            <div class="ember-hero__monogram" aria-hidden="true">407</div>

            <div class="ember-hero__content">
                <p>MASSACHUSETTS · NEW HAMPSHIRE · REMOTE</p>
                <h1>Custom software<br>for the work your<br><em>business needs done.</em></h1>
                <div class="ember-hero__summary">
                    <p>I’m Kevin Whelan. I build web applications, improve existing software, and connect business systems to reduce manual work. You work directly with me, from deciding what to build through launch.</p>
                    <a href="{{ route('contact') }}#inquiry">DISCUSS YOUR PROJECT <span aria-hidden="true">↗</span></a>
                </div>
            </div>

            <div class="ember-hero__scroll" aria-hidden="true"><span></span> SCROLL</div>
        </section>

        <x-project-starting-points />

        <figure class="project-recommendation">
            <div><p class="studio-kicker">CORPORATE ENGINEERING EXPERIENCE</p><blockquote>“He contributed to platform initiatives that helped drive roughly a 20% reduction in OpEx, working across teams to improve how our services were built, deployed, and maintained.”</blockquote></div>
            <figcaption>MICHAEL MEYER III<span>Former Engineering Manager,<br>Trader Interactive</span></figcaption>
        </figure>

        <x-saydee-walkthrough :compact="true" :show-other-products="true" />

        <section class="ember-founder">
            <div class="ember-founder__signal" aria-label="A direct working relationship between your business and Kevin Whelan">
                <header><span>DIRECT LINE / 01</span><span>NO HANDOFFS</span></header>
                <div class="ember-founder__initials" aria-hidden="true"><span>K</span><span>W</span></div>
                <div class="ember-founder__connection"><strong>YOUR BUSINESS</strong><i aria-hidden="true">↔</i><strong>KEVIN</strong></div>
                <footer><span>ENGINEER</span><span>ADVISOR</span><span>PARTNER</span></footer>
            </div>
            <div class="ember-founder__story">
                <p>CORPORATE EXPERIENCE · DIRECT COLLABORATION</p>
                <h2>A hands-on builder.<br>A technology partner.</h2>
                <p class="ember-founder__lead">You work with the person writing the code and making the technical decisions. My background includes production software, integrations, and cross-team platform work. I bring that experience to building your application and keeping it running after launch.</p>
                <div class="ember-founder__facts"><span>LARAVEL · PHP · APIS</span><span>VUE · REACT · TYPESCRIPT</span><span>AWS · DEPLOYMENT · INTEGRATIONS</span></div>
                <a href="{{ route('about') }}">MEET KEVIN <span aria-hidden="true">↗</span></a>
            </div>
        </section>

        <section class="studio-section">
            <div class="studio-split">
                <div><p class="studio-kicker">START WITH THE VALUE</p><h2 class="studio-heading">What should get better for your business?</h2></div>
                <div><p class="studio-lead">Give customers a way to use your service online. Stop copying the same information between tools. Get an existing application ready for its next release. Start with the change you need in your business.</p><p class="studio-lead mt-8">Software should perform the work, not create another place for humans to work. Wherever practical, I build around the systems you already use, automate routine steps, and leave people in control of approvals and exceptions.</p></div>
            </div>
            <div class="studio-proof">
                <article><span>01 / CAPACITY</span><h3>Less routine work.</h3><p>Reduce re-entry, manual checks, and handoffs so your team has time for work that needs them.</p></article>
                <article><span>02 / PRODUCT</span><h3>An idea made useful.</h3><p>Give customers a focused first version that solves a real problem and creates something you can learn from.</p></article>
                <article><span>03 / DIRECTION</span><h3>A clearer next move.</h3><p>Understand the tradeoffs, choose priorities, and invest in technology with a plan your team can deliver.</p></article>
            </div>
        </section>

        <x-project-start />

        <section class="studio-section studio-advisory">
            <div class="studio-split">
                <div><p class="studio-kicker">ALSO AVAILABLE / FRACTIONAL CTO</p><h2 class="studio-heading">Know what to build next.<br>Give your team a clear direction.</h2></div>
                <div><p class="studio-lead">If technology decisions keep landing on you, I can help evaluate a vendor, review an application, or turn competing priorities into a plan your team can deliver. Start with one decision or bring me in for ongoing fractional CTO support.</p><a class="studio-advisory__link" href="{{ route('services.fractional-cto') }}">EXPLORE FRACTIONAL CTO SUPPORT <span aria-hidden="true">↗</span></a></div>
            </div>
        </section>

        <section class="studio-trust" aria-labelledby="trust-title">
            <header>
                <p>A HUMAN IN AN AI WORLD</p>
                <h2 id="trust-title">AI moves the work forward. An engineer owns the outcome.</h2>
            </header>
            <div class="studio-trust__grid">
                <article><span>01 / EMBRACE THE TOOLS</span><h3>Bring what you have.</h3><p>An idea, existing code, or an AI-built prototype can be a starting point. I use AI to help explore and build, then review the work against what your application needs to do.</p></article>
                <article><span>02 / APPLY EXPERIENCE</span><h3>Look beyond the demo.</h3><p>I check who can access the data, what happens when a connection fails, and how changes reach your users. Testing and a plan for running the software are part of the build.</p></article>
                <article><span>03 / STAY ACCOUNTABLE</span><h3>Know where the project stands.</h3><p>You see working progress and get a clear account of what has been tested and what needs attention. I stay your direct contact through the work.</p></article>
            </div>
            <a href="{{ route('approach') }}">WHY AN EXPERIENCED ENGINEER STILL MATTERS <span aria-hidden="true">↗</span></a>
        </section>

        <section class="ember-cta">
            <p>HAVE SOFTWARE THAT NEEDS TO GET BUILT OR IMPROVED?</p>
            <h2>Tell me what you’re<br>trying to accomplish.</h2>
            <a href="{{ route('contact') }}#inquiry">DISCUSS YOUR PROJECT <span aria-hidden="true">↗</span></a>
        </section>
    </div>
</x-layout>
