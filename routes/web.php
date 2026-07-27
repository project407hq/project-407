<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');

Route::view('/services', 'pages.services')
    ->name('services');

Route::view('/work', 'pages.work.index')
    ->name('work.index');

Route::view('/work/407-haul-away', 'pages.work.407-haul-away')
    ->name('work.407-haul-away');

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
        route('work.index'),
        route('work.407-haul-away'),
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
