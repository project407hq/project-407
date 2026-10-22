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

it('serves crawler guidance through Laravel without a static file overriding it', function () {
    expect(is_file(public_path('robots.txt')))->toBeFalse();

    $this->app->instance('env', 'production');

    $this->get('/robots.txt')
        ->assertOk()
        ->assertHeader('Content-Type', 'text/plain; charset=utf-8')
        ->assertSee("User-agent: *\nDisallow:\n", false)
        ->assertSee('Sitemap: '.route('sitemap'), false);
});

it('blocks crawling and indexing outside production', function () {
    $this->get('/robots.txt')->assertOk()->assertSee('Disallow: /', false);
    $this->get(route('home'))->assertOk()->assertSee('noindex, nofollow');
});

it('allows production marketing pages to be indexed with a clean canonical URL', function () {
    $this->app->instance('env', 'production');

    $this->get(route('services.fractional-cto').'?utm_source=linkedin')
        ->assertOk()
        ->assertSee('index, follow')
        ->assertSee('href="'.route('services.fractional-cto').'"', false)
        ->assertDontSee('utm_source');
});

it('describes service pages with connected service and breadcrumb structured data', function (string $routeName, string $serviceName) {
    $response = $this->get(route($routeName))->assertOk();

    preg_match('/<script type="application\/ld\+json">\s*(.*?)\s*<\/script>/s', $response->getContent(), $matches);
    $data = json_decode($matches[1], true, flags: JSON_THROW_ON_ERROR);
    $nodes = collect($data['@graph'])->keyBy('@type');

    expect($nodes['Service']['name'])->toBe($serviceName)
        ->and($nodes['Service']['url'])->toBe(route($routeName))
        ->and($nodes['Service']['provider']['@id'])->toBe($nodes['Organization']['@id'])
        ->and($nodes['Organization']['sameAs'])->toContain('https://www.linkedin.com/company/project407/')
        ->and($nodes['WebPage']['mainEntity']['@id'])->toBe($nodes['Service']['@id'])
        ->and($nodes['WebPage']['breadcrumb']['@id'])->toBe($nodes['BreadcrumbList']['@id'])
        ->and($nodes['BreadcrumbList']['itemListElement'])->toHaveCount(3)
        ->and($nodes['BreadcrumbList']['itemListElement'][2]['item'])->toBe(route($routeName));
})->with([
    ['services.custom-software', 'Custom Software & Web Application Development'],
    ['services.fractional-cto', 'Fractional CTO & Engineering Leadership'],
    ['services.automation-integrations', 'Business Automation & Software Integrations'],
]);
