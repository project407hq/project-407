<footer class="studio-footer">
    <div class="studio-footer__top">
        <a href="{{ route('home') }}" class="studio-footer__brand" aria-label="Project 407 home"><strong>PROJECT</strong><span>407<i>_</i></span></a>
        <p>I’m Kevin Whelan. I build custom software, improve existing applications, and connect business systems. I also offer technical advice and fractional CTO support. Based in Dunstable, Massachusetts; working across MA, NH, and remotely.</p>
    </div>
    <div class="studio-footer__links">
        <nav aria-label="Footer navigation"><a href="{{ route('approach') }}">Approach</a><a href="{{ route('services') }}">Services</a><a href="{{ route('services.custom-software') }}">Custom software</a><a href="{{ route('services.ai-app-help') }}">AI-built app help</a><a href="{{ route('services.automation-integrations') }}">Automation &amp; integrations</a><a href="{{ route('services.fractional-cto') }}">Fractional CTO</a><a href="{{ route('products.index') }}">Products</a><a href="{{ route('about') }}">About</a><a href="{{ route('contact') }}">Contact</a></nav>
        <a class="studio-footer__start" href="{{ route('contact') }}#inquiry">DISCUSS YOUR PROJECT <span>↗</span></a>
    </div>
    <div class="studio-footer__bottom"><span>© {{ now()->year }} PROJECT 407</span><span>MA · NH · REMOTE</span><a href="{{ route('privacy') }}">PRIVACY</a></div>
</footer>
