import { registerAnalyticsTracking } from './analytics';

registerAnalyticsTracking(document, (eventName, parameters) => {
    if (typeof window.gtag === 'function') {
        window.gtag('event', eventName, parameters);
    }
});

const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

if ('IntersectionObserver' in window && 'animate' in Element.prototype) {
    const revealSelector = [
        '.ember-hero__content > *',
        '.studio-intro > *',
        '.studio-split > *',
        '.studio-products__intro > *',
        '.studio-products__grid > *',
        '.studio-product-story__overview > .studio-product-visual',
        '.studio-proof > *',
        '.home-support > article',
        '.studio-trust > header > *',
        '.studio-trust__grid > *',
        '.studio-trust > a',
        '.ember-capabilities > div, .ember-capabilities > a, .ember-capabilities li',
        '.ember-founder > *',
        '.project-recommendation > *',
        '.studio-project-map > div',
        '.studio-list > li',
        '.service-page-grid > *',
        '.studio-engagement__options > *',
        '.project-start__options > *',
        '.featured-build__body > *',
        '.featured-build__steps > li',
        '.featured-build__decision > *',
        '.featured-build__actions, .featured-build__other',
        '.studio-form > aside > *, .studio-contact-lines > *',
        '.studio-form__panel > p, .studio-form__panel > h2',
        '.studio-legal > section',
        '.ember-cta > *',
        '.studio-footer > *',
    ].join(', ');
    const activeReveals = new Map();
    const siblingCounts = new Map();

    const revealObserver = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (! entry.isIntersecting) {
                    return;
                }

                observer.unobserve(entry.target);

                const element = entry.target;

                if (
                    reducedMotion.matches
                    || entry.boundingClientRect.top < 0
                    || element.matches(':target')
                    || element.closest(':target')
                    || element.querySelector(':target, :focus')
                    || element.matches(':focus-within')
                ) {
                    return;
                }

                const animation = element.animate(
                    [
                        { opacity: 0, translate: '0 16px' },
                        { opacity: 1, translate: '0 0' },
                    ],
                    {
                        duration: 600,
                        delay: Number(element.dataset.revealDelay),
                        easing: 'cubic-bezier(0.22, 1, 0.36, 1)',
                        fill: 'backwards',
                    },
                );

                activeReveals.set(element, animation);
                animation.addEventListener('finish', () => activeReveals.delete(element));
                animation.addEventListener('cancel', () => activeReveals.delete(element));
            });
        },
        {
            rootMargin: '0px 0px -32px 0px',
            threshold: 0,
        },
    );

    document.querySelectorAll(revealSelector).forEach((element) => {
        if (element.querySelector(revealSelector)) {
            return;
        }

        const siblingIndex = siblingCounts.get(element.parentElement) ?? 0;

        siblingCounts.set(element.parentElement, siblingIndex + 1);
        element.dataset.revealDelay = Math.min(siblingIndex, 3) * 60;
        revealObserver.observe(element);
    });

    reducedMotion.addEventListener('change', () => {
        if (reducedMotion.matches) {
            activeReveals.forEach((animation) => animation.cancel());
        }
    });

    document.addEventListener('focusin', (event) => {
        activeReveals.forEach((animation, element) => {
            if (element.contains(event.target)) {
                animation.cancel();
            }
        });
    });
}

if (window.matchMedia('(pointer: fine)').matches) {
    document.querySelectorAll('[data-signal-stage]').forEach((stage) => {
        stage.addEventListener('pointermove', (event) => {
            if (reducedMotion.matches) {
                return;
            }

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
