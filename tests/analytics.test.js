import assert from 'node:assert/strict';
import { test } from 'node:test';
import { registerAnalyticsTracking } from '../resources/js/analytics.js';

function trackingHarness() {
    const target = new EventTarget();
    const recorded = [];

    registerAnalyticsTracking(target, (name, parameters) => recorded.push({ name, parameters }));

    return { target, recorded };
}

test('saved inquiries send an allowlisted payload without inquiry content', () => {
    const { target, recorded } = trackingHarness();

    target.dispatchEvent(new CustomEvent('project-inquiry-submitted', {
        detail: { service: 'software', email: 'test@example.com', message: 'Private inquiry' },
    }));

    assert.deepEqual(recorded, [{
        name: 'generate_lead',
        parameters: { form_name: 'project_inquiry', service: 'software' },
    }]);
});

test('invalid categories and ordinary form submissions do not count as leads', () => {
    const { target, recorded } = trackingHarness();

    target.dispatchEvent(new Event('submit'));
    target.dispatchEvent(new CustomEvent('project-inquiry-submitted', { detail: {} }));
    target.dispatchEvent(new CustomEvent('project-inquiry-submitted', {
        detail: { service: 'personal information' },
    }));

    assert.deepEqual(recorded, []);
});

test('submission attempts contain no inquiry values and do not count as leads', () => {
    const { target, recorded } = trackingHarness();

    target.dispatchEvent(new CustomEvent('project-inquiry-attempted', {
        detail: { email: 'private@example.com', message: 'Private content', service: 'software' },
    }));

    assert.deepEqual(recorded, [{
        name: 'inquiry_submit_attempt', parameters: { form_name: 'project_inquiry' },
    }]);
});

for (const reason of ['validation', 'rate_limited', 'server', 'session_expired', 'network', 'request']) {
    test(`${reason} failures send only a recognized reason`, () => {
        const { target, recorded } = trackingHarness();

        target.dispatchEvent(new CustomEvent('project-inquiry-failed', {
            detail: { reason, email: 'private@example.com', message: 'Private content', exception: 'SQL details' },
        }));

        assert.deepEqual(recorded, [{
            name: 'inquiry_submit_failed',
            parameters: { form_name: 'project_inquiry', failure_reason: reason },
        }]);
    });
}

test('unrecognized failure values are never sent to analytics', () => {
    const { target, recorded } = trackingHarness();

    target.dispatchEvent(new CustomEvent('project-inquiry-failed', { detail: { reason: 'private inquiry content' } }));
    target.dispatchEvent(new CustomEvent('project-inquiry-failed', { detail: {} }));

    assert.deepEqual(recorded, []);
});

for (const [href, method] of [['tel:+15555550123', 'phone'], ['mailto:test@example.com', 'email']]) {
    test(`${method} clicks are recorded separately without the destination`, () => {
        const recorded = [];
        const listeners = {};

        registerAnalyticsTracking({ addEventListener: (name, listener) => { listeners[name] = listener; } },
            (name, parameters) => recorded.push({ name, parameters }));

        listeners.click({ target: { closest: () => ({ getAttribute: () => href }) } });

        assert.deepEqual(recorded, [{ name: 'contact_click', parameters: { contact_method: method } }]);
    });
}

test('a normal navigation click does not count as contact or a lead', () => {
    const recorded = [];
    const listeners = {};

    registerAnalyticsTracking({ addEventListener: (name, listener) => { listeners[name] = listener; } },
        (name, parameters) => recorded.push({ name, parameters }));

    listeners.click({ target: { closest: () => ({ getAttribute: () => '/services' }) } });

    assert.deepEqual(recorded, []);
});
