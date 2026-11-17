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

        <x-saydee-walkthrough :compact="true" :show-other-products="true" />

        <figure class="project-recommendation">
            <div><p class="studio-kicker">CORPORATE ENGINEERING EXPERIENCE</p><blockquote>“He contributed to platform initiatives that helped drive roughly a 20% reduction in OpEx, working across teams to improve how our services were built, deployed, and maintained.”</blockquote></div>
            <figcaption>MICHAEL MEYER III<span>Former Engineering Manager,<br>Trader Interactive</span></figcaption>
        </figure>

        <section class="studio-section studio-advisory home-support" aria-label="Focused technical help and leadership">
            <article>
                <p class="studio-kicker">HELP WITH YOUR AI-BUILT APP</p>
                <h2 id="ai-app-heading" class="studio-heading">Started an app with AI?</h2>
                <p class="studio-lead">Keep building it yourself and bring me in for guidance, a code review, a focused fix, or launch support. A session or a small piece of development can be the whole engagement.</p>
                <a class="studio-advisory__link" href="{{ route('services.ai-app-help') }}">GET HELP WITH YOUR AI-BUILT APP <span aria-hidden="true">↗</span></a>
            </article>
            <article>
                <p class="studio-kicker">ALSO AVAILABLE / FRACTIONAL CTO</p>
                <h2 class="studio-heading">A clearer direction for your team.</h2>
                <p class="studio-lead">Evaluate a vendor, review an application, or turn competing priorities into a plan your team can deliver. Start with one decision or bring me in for ongoing fractional CTO support.</p>
                <a class="studio-advisory__link" href="{{ route('services.fractional-cto') }}">EXPLORE FRACTIONAL CTO SUPPORT <span aria-hidden="true">↗</span></a>
            </article>
        </section>

        <section class="ember-founder ember-founder--compact">
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
                <p class="ember-founder__note">Software should perform the work, not create another place for humans to work. I automate routine steps around the systems you already use, with people in control of approvals and exceptions. I use AI to move the build forward, then review permissions, integrations, failure paths, and release checks. <a href="{{ route('approach') }}">See how I work.</a></p>
                <div class="ember-founder__facts"><span>LARAVEL · PHP · APIS</span><span>VUE · REACT · TYPESCRIPT</span><span>AWS · DEPLOYMENT · INTEGRATIONS</span></div>
                <a href="{{ route('about') }}">MEET KEVIN <span aria-hidden="true">↗</span></a>
            </div>
        </section>

        <x-project-start />

        <section class="ember-cta">
            <p>HAVE SOFTWARE THAT NEEDS TO GET BUILT OR IMPROVED?</p>
            <h2>Tell me what you’re<br>trying to accomplish.</h2>
            <a href="{{ route('contact') }}#inquiry">DISCUSS YOUR PROJECT <span aria-hidden="true">↗</span></a>
        </section>
    </div>
</x-layout>
