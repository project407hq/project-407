export function registerAnalyticsTracking(eventTarget, trackEvent) {
    eventTarget.addEventListener('project-inquiry-attempted', () => {
        trackEvent('inquiry_submit_attempt', { form_name: 'project_inquiry' });
    });

    eventTarget.addEventListener('project-inquiry-failed', (event) => {
        const reasons = new Set([
            'validation', 'rate_limited', 'server', 'session_expired', 'network', 'request',
        ]);

        if (reasons.has(event.detail?.reason)) {
            trackEvent('inquiry_submit_failed', {
                form_name: 'project_inquiry',
                failure_reason: event.detail.reason,
            });
        }
    });

    eventTarget.addEventListener('project-inquiry-submitted', (event) => {
        const services = new Set([
            'website', 'software', 'support', 'advisory',
            'employment', 'collaboration', 'question', 'not-sure',
        ]);

        if (! services.has(event.detail?.service)) {
            return;
        }

        trackEvent('generate_lead', {
            form_name: 'project_inquiry',
            service: event.detail.service,
        });
    });

    eventTarget.addEventListener('click', (event) => {
        const link = event.target.closest?.('a[href]');
        const destination = link?.getAttribute('href');
        const contactMethod = destination?.startsWith('tel:')
            ? 'phone'
            : destination?.startsWith('mailto:') ? 'email' : null;

        if (contactMethod) {
            trackEvent('contact_click', { contact_method: contactMethod });
        }
    });
}
