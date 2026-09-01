<x-layout
    title="Website Design & Custom Software in MA & NH | Project 407"
    description="Project 407 designs business websites, custom software, internal tools, automations, and integrations for companies in Massachusetts, New Hampshire, and across the United States."
>
    <main class="ember-home">
        <section class="ember-hero">
            <div class="ember-hero__orbit" aria-hidden="true"></div>
            <div class="ember-hero__monogram" aria-hidden="true">407</div>

            <div class="ember-hero__content">
                <p>KEVIN WHELAN’S INDEPENDENT SOFTWARE STUDIO</p>
                <h1>Websites and software<br>built to move business<br><em>forward.</em></h1>
                <div class="ember-hero__summary">
                    <p>Project 407 is Kevin Whelan’s independent studio - designing business websites, custom software, automations, and integrations for companies in Massachusetts, New Hampshire, and beyond.</p>
                    <a href="{{ route('about') }}">MEET KEVIN <span aria-hidden="true">＋</span></a>
                </div>
            </div>

            <div class="ember-hero__scroll" aria-hidden="true"><span></span> SCROLL</div>
        </section>

        <section class="ember-work">
            <header>
                <div>
                    <p>SELECTED WORK</p>
                    <h2>Proof, not promises.</h2>
                </div>
                <p>Real client work and clearly identified Project 407 products.</p>
            </header>

            <article class="ember-project ember-project--showcase">
                <figure class="ember-product ember-product--actual ember-product--site">
                    <a href="{{ route('work.407-haul-away') }}" aria-label="View the 407 Haul Away website case study">
                        <img src="{{ asset('images/work/407-haul-away/homepage-wide.webp') }}" alt="Actual 407 Haul Away website homepage" width="1836" height="803" loading="lazy" decoding="async">
                    </a>
                    <figcaption><span>LIVE CLIENT WEBSITE</span><a href="{{ route('work.407-haul-away') }}">VIEW CASE STUDY ↗</a></figcaption>
                </figure>
                <div class="ember-project__caption">
                    <span>01 / CLIENT WEBSITE</span>
                    <h3>407 Haul Away</h3>
                    <p>Clearer positioning. Stronger credibility. An easier path to a quote.</p>
                </div>
            </article>

            <article class="ember-project ember-project--showcase">
                <figure class="ember-product ember-product--actual">
                    <a href="https://getsaydee.com/" target="_blank" rel="noreferrer" aria-label="Visit the live Saydee product website">
                        <img src="{{ asset('images/work/saydee/dashboard.png') }}" alt="Actual Saydee customer momentum dashboard showing leads, follow-ups, pipeline value, and opportunities needing attention" width="780" height="680" loading="lazy" decoding="async">
                    </a>
                    <figcaption><span>ACTUAL SAYDEE PRODUCT INTERFACE</span><a href="https://getsaydee.com/" target="_blank" rel="noreferrer">VIEW LIVE PRODUCT ↗</a></figcaption>
                </figure>
                <div class="ember-project__caption">
                    <span>02 / PROJECT 407 PRODUCT</span>
                    <h3>Saydee</h3>
                    <p>A live early-access customer system designed, built, and operated by Kevin.</p>
                </div>
            </article>
        </section>

        <section class="ember-capabilities">
            <div>
                <p>WHAT PROJECT 407 BUILDS</p>
                <h2>One partner from the first question to the finished product.</h2>
            </div>
            <ol>
                <li><span>01</span><strong>Web strategy &amp; design</strong><p>Clarify the story, build trust, and create a direct path to action.</p></li>
                <li><span>02</span><strong>Custom software</strong><p>Replace awkward processes with a focused system built around the work.</p></li>
                <li><span>03</span><strong>Automation &amp; support</strong><p>Connect tools, remove repetition, and keep improving after launch.</p></li>
            </ol>
            <a href="{{ route('services') }}">VIEW SERVICES <span aria-hidden="true">＋</span></a>
        </section>

        <section class="studio-trust" aria-labelledby="trust-title">
            <header>
                <p>BUILT RESPONSIBLY</p>
                <h2 id="trust-title">Modern tools. Human judgment. Clear accountability.</h2>
            </header>
            <div class="studio-trust__grid">
                <article><span>01 / SECURITY</span><h3>Considered from the beginning.</h3><p>Sensible access controls, protected credentials, dependable hosting, monitoring, and maintainable systems—not security theater added after launch.</p></article>
                <article><span>02 / AI</span><h3>Used where it improves the work.</h3><p>AI can accelerate research, prototyping, testing, and repetitive implementation. Kevin still reviews the work and remains responsible for the result.</p></article>
                <article><span>03 / ENGAGEMENT</span><h3>No mystery around the work.</h3><p>A clear recommendation, defined scope, visible progress, and a billing structure that fits the project before development begins.</p></article>
            </div>
            <a href="{{ route('services') }}#responsible-build">HOW THE WORK IS BUILT <span aria-hidden="true">↗</span></a>
        </section>

        <section class="ember-founder">
            <div class="ember-founder__signal" aria-label="A direct working relationship between your business and Kevin Whelan">
                <header><span>DIRECT LINE / 01</span><span>NO HANDOFFS</span></header>
                <div class="ember-founder__initials" aria-hidden="true"><span>K</span><span>W</span></div>
                <div class="ember-founder__connection"><strong>YOUR BUSINESS</strong><i aria-hidden="true">↔</i><strong>KEVIN</strong></div>
                <footer><span>FOUNDER</span><span>DESIGNER</span><span>ENGINEER</span></footer>
            </div>
            <div class="ember-founder__story">
                <p>THE PERSON BEHIND PROJECT 407</p>
                <h2>A studio relationship.<br>A direct collaborator.</h2>
                <p class="ember-founder__lead">Project 407 is Kevin Whelan’s independent software studio. You work directly with the senior full-stack engineer designing and building your project—without agency overhead or layers of handoffs.</p>
                <div class="ember-founder__facts"><span>LARAVEL · PHP · APIS</span><span>VUE · REACT · TYPESCRIPT</span><span>AWS · DEPLOYMENT · INTEGRATIONS</span></div>
                <blockquote>“Kevin quickly established himself as a dependable and thoughtful engineer who consistently delivered meaningful results.”</blockquote>
                <cite>MICHAEL MEYER III · FORMER ENGINEERING MANAGER, TRADER INTERACTIVE</cite>
                <a href="{{ route('about') }}">MEET KEVIN <span aria-hidden="true">↗</span></a>
            </div>
        </section>

        <section class="ember-cta">
            <p>A PROJECT, AN IDEA, OR A QUESTION</p>
            <h2>You don’t need to have<br>it all figured out.</h2>
            <a href="{{ route('contact') }}">TALK DIRECTLY WITH KEVIN <span aria-hidden="true">↗</span></a>
        </section>
    </main>
</x-layout>
