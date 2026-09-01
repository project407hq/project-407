const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (! prefersReducedMotion && 'IntersectionObserver' in window) {
    const revealRoots = [
        ...document.querySelectorAll(
            'main > section > .site-container, main > section > .site-container-narrow',
        ),
    ];

    revealRoots.forEach((element, index) => {
        element.dataset.reveal = index === 0 ? 'intro' : 'section';

        const staggeredElements = element.querySelectorAll(
            '.interactive-card, .surface-card, [data-reveal-item]',
        );

        staggeredElements.forEach((staggeredElement, staggeredIndex) => {
            staggeredElement.dataset.revealItem = '';
            staggeredElement.style.setProperty(
                '--reveal-delay',
                `${Math.min(staggeredIndex, 5) * 70}ms`,
            );
        });
    });

    document.documentElement.classList.add('reveal-ready');

    const revealObserver = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (! entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            });
        },
        {
            rootMargin: '0px 0px -10% 0px',
            threshold: 0.12,
        },
    );

    revealRoots.forEach((element) => revealObserver.observe(element));

    if (window.matchMedia('(pointer: fine)').matches) {
        document.querySelectorAll('[data-signal-stage]').forEach((stage) => {
            stage.addEventListener('pointermove', (event) => {
                const bounds = stage.getBoundingClientRect();
                const x = ((event.clientX - bounds.left) / bounds.width - 0.5) * 2;
                const y = ((event.clientY - bounds.top) / bounds.height - 0.5) * 2;

                stage.style.setProperty('--signal-x', (x * 1.8).toFixed(2));
                stage.style.setProperty('--signal-y', (y * 1.4).toFixed(2));
            });

            stage.addEventListener('pointerleave', () => {
                stage.style.setProperty('--signal-x', '0');
                stage.style.setProperty('--signal-y', '0');
            });
        });
    }
}
