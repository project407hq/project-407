<footer class="studio-footer">
    <div class="studio-footer__top">
        <a href="{{ route('home') }}" class="studio-footer__brand" aria-label="Project 407 home"><strong>PROJECT</strong><span>407<i>_</i></span></a>
        <p>Have a project, a rough idea, or just a question? Reach out—no polished brief or commitment required.</p>
    </div>
    <div class="studio-footer__links">
        <nav aria-label="Footer navigation"><a href="{{ route('work.index') }}">Work</a><a href="{{ route('services') }}">Services</a><a href="{{ route('about') }}">About</a><a href="{{ route('contact') }}">Contact</a></nav>
        <a class="studio-footer__start" href="{{ route('contact') }}">START A CONVERSATION <span>↗</span></a>
    </div>
    <div class="studio-footer__bottom"><span>© {{ now()->year }} PROJECT 407</span><span>MA · NH · REMOTE</span><a href="{{ route('privacy') }}">PRIVACY</a></div>
</footer>
