<header
    x-data="{ open: false, scrolled: window.scrollY > 16 }"
    x-effect="document.documentElement.classList.toggle('overflow-hidden', open)"
    @scroll.window="scrolled = window.scrollY > 16"
    @keydown.escape.window="open = false"
    :class="{ 'is-scrolled': scrolled && ! open }"
    class="ember-nav"
>
    <a href="{{ route('home') }}" class="ember-nav__logo" aria-label="Project 407 home">
        <strong>PROJECT</strong>
        <span>407<i aria-hidden="true">_</i></span>
    </a>

    <div class="ember-nav__actions">
        <a href="{{ route('contact') }}">ASK OR START</a>
        <button type="button" @click="open = ! open" :aria-expanded="open.toString()" aria-controls="main-menu" aria-label="Toggle navigation">
            <span></span><span></span>
        </button>
    </div>

    <div
        x-cloak
        x-show="open"
        id="main-menu"
        class="ember-nav__menu"
        x-transition:enter="transition duration-300 ease-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-200 ease-in"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    >
        <nav aria-label="Main navigation">
            <a href="{{ route('work.index') }}" @click="open = false"><span>01</span>Work</a>
            <a href="{{ route('services') }}" @click="open = false"><span>02</span>Services</a>
            <a href="{{ route('about') }}" @click="open = false"><span>03</span>About</a>
            <a href="{{ route('contact') }}" @click="open = false"><span>04</span>Contact</a>
        </nav>
        <p>Have a project, a rough idea, or just a question? Kevin would be glad to hear it.</p>
    </div>
</header>
