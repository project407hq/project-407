<?php

use Illuminate\Testing\TestResponse;

it('renders every indexable marketing page with canonical metadata', function (string $routeName, string $titlePhrase) {
    /** @var TestResponse $response */
    $response = $this->get(route($routeName));

    $response
        ->assertOk()
        ->assertSeeText($titlePhrase)
        ->assertSee('rel="canonical"', false)
        ->assertSee('application/ld+json', false);
})->with([
    ['home', 'Website Design & Custom Software'],
    ['services', 'Business Websites, Custom Software & Automation'],
    ['services.business-websites', 'Business Website Design & Development'],
    ['services.custom-software', 'Custom Software & Web Application Development'],
    ['services.automation-integrations', 'Business Automation & Software Integrations'],
    ['work.index', 'Website Design & Software Development Portfolio'],
    ['about', 'Kevin Whelan, Software Engineer'],
    ['contact', 'Start a Website or Custom Software Project'],
]);

it('lists the service landing pages in the sitemap', function () {
    $this->get(route('sitemap'))
        ->assertOk()
        ->assertSee(route('services.business-websites'))
        ->assertSee(route('services.custom-software'))
        ->assertSee(route('services.automation-integrations'));
});

it('keeps the privacy policy out of search indexes', function () {
    $this->get(route('privacy'))
        ->assertOk()
        ->assertSee('noindex, nofollow');
});
