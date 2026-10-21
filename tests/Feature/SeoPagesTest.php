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
    ['home', 'Custom Software & Fractional CTO'],
    ['services', 'Custom Software & Fractional CTO Services'],
    ['services.fractional-cto', 'Fractional CTO & Engineering Leadership'],
    ['services.custom-software', 'Custom Software & Web Application Development'],
    ['services.automation-integrations', 'Business Automation & Software Integrations'],
    ['approach', 'AI & Human Engineering Judgment'],
    ['about', 'Kevin Whelan, Engineer & Technology Leader'],
    ['contact', 'Contact Kevin Whelan | Software & Fractional CTO'],
]);

it('lists the service landing pages in the sitemap', function () {
    $this->get(route('sitemap'))
        ->assertOk()
        ->assertSee(route('services.fractional-cto'))
        ->assertSee(route('approach'))
        ->assertDontSee(route('work.407-haul-away'))
        ->assertDontSee(route('services.business-websites'))
        ->assertSee(route('services.custom-software'))
        ->assertSee(route('services.automation-integrations'));
});

it('keeps the privacy policy out of search indexes', function () {
    $this->get(route('privacy'))
        ->assertOk()
        ->assertSee('noindex, nofollow');
});

it('redirects retired portfolio and website pages to the current positioning', function (string $source, string $destination) {
    $this->get(route($source))->assertStatus(301)->assertRedirectToRoute($destination);
})->with([
    ['work.index', 'approach'],
    ['work.407-haul-away', 'approach'],
    ['services.business-websites', 'services.custom-software'],
]);

it('presents the two service paths without the old portfolio or employer affiliation', function (string $routeName) {
    $this->get(route($routeName))
        ->assertSuccessful()
        ->assertSee('Custom software', false)
        ->assertSee('fractional', false)
        ->assertDontSee('Saydee')
        ->assertDontSee('407 Haul Away')
        ->assertDontSee('MAGCOM');
})->with(['home', 'services', 'approach', 'about', 'contact']);

it('uses an existing social preview asset for the current positioning', function () {
    $this->get(route('home'))
        ->assertSuccessful()
        ->assertSee(asset('project407-social-v2.png'));

    expect(is_file(public_path('project407-social-v2.png')))->toBeTrue();
});
