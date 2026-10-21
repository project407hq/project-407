<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');

Route::view('/services', 'pages.services')
    ->name('services');

Route::redirect('/services/business-websites', '/services/custom-software', 301)
    ->name('services.business-websites');

Route::view('/services/fractional-cto', 'pages.services.fractional-cto')
    ->name('services.fractional-cto');

Route::view('/services/custom-software', 'pages.services.custom-software')
    ->name('services.custom-software');

Route::view('/services/automation-integrations', 'pages.services.automation-integrations')
    ->name('services.automation-integrations');

Route::view('/approach', 'pages.work.index')->name('approach');

Route::redirect('/work', '/approach', 301)->name('work.index');

Route::redirect('/work/407-haul-away', '/approach', 301)->name('work.407-haul-away');

Route::view('/about', 'pages.about')
    ->name('about');

Route::view('/contact', 'pages.contact')
    ->name('contact');

Route::view('/privacy', 'pages.privacy')
    ->name('privacy');

Route::get('/sitemap.xml', function () {
    $urls = [
        route('home'),
        route('services'),
        route('services.custom-software'),
        route('services.automation-integrations'),
        route('services.fractional-cto'),
        route('approach'),
        route('about'),
        route('contact'),
    ];

    return response()
        ->view('sitemap', ['urls' => $urls])
        ->header('Content-Type', 'application/xml');
})->name('sitemap');

Route::get('/robots.txt', function () {
    $contents = app()->environment('production')
        ? "User-agent: *\nDisallow:\n\nSitemap: ".route('sitemap')."\n"
        : "User-agent: *\nDisallow: /\n";

    return response($contents, 200)
        ->header('Content-Type', 'text/plain');
});
