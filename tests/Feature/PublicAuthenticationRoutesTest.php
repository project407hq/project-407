<?php

use Illuminate\Support\Facades\Route;

test('visitor authentication endpoints are unavailable', function (string $path) {
    $this->get($path)->assertNotFound();
    $this->post($path)->assertNotFound();
})->with([
    '/login',
    '/register',
    '/logout',
    '/forgot-password',
    '/reset-password',
    '/reset-password/example-token',
    '/confirm-password',
    '/email/verify',
    '/email/verification-notification',
    '/two-factor-challenge',
    '/auth/login',
    '/auth/register',
]);

test('the public site does not register authentication routes', function () {
    foreach (['login', 'register', 'logout', 'password.request', 'password.email', 'password.reset', 'password.update', 'verification.notice', 'verification.verify'] as $name) {
        expect(Route::has($name))->toBeFalse();
    }
});
