@props([
    'title' => 'Project 407',
    'description' => 'Custom software and fractional CTO leadership with AI-assisted delivery and human accountability.',
    'index' => true,
    'serviceName' => null,
    'breadcrumbs' => [],
])

@php
    $canonicalUrl = url()->current();
    $socialImageUrl = asset('project407-social-v2.png');
    $shouldIndex = app()->environment('production') && $index;
    $siteUrl = rtrim(config('app.url'), '/');
    $structuredData = [
        '@context' => 'https://schema.org',
        '@graph' => [
            ['@type' => 'WebSite', '@id' => $siteUrl.'/#website', 'url' => $siteUrl, 'name' => 'Project 407', 'description' => 'Custom software development and fractional CTO leadership for growing businesses.', 'publisher' => ['@id' => $siteUrl.'/#business']],
            ['@type' => 'Organization', '@id' => $siteUrl.'/#business', 'name' => 'Project 407', 'url' => $siteUrl, 'logo' => asset('project407-favicon-512.png'), 'image' => $socialImageUrl, 'email' => 'kevin@project-407.com', 'telephone' => '+1-978-877-9784', 'description' => 'Independent custom software development, fractional CTO leadership, and engineering advisory from Kevin Whelan.', 'founder' => ['@id' => $siteUrl.'/#kevin-whelan'], 'areaServed' => [['@type' => 'State', 'name' => 'Massachusetts'], ['@type' => 'State', 'name' => 'New Hampshire'], ['@type' => 'Country', 'name' => 'United States']], 'sameAs' => ['https://www.linkedin.com/company/project407/'], 'knowsAbout' => ['Fractional CTO', 'Engineering Leadership', 'Technical Advisory', 'Custom Software Development', 'Web Application Development', 'Internal Tool Development', 'Business Automation', 'API and Software Integrations']],
            ['@type' => 'Person', '@id' => $siteUrl.'/#kevin-whelan', 'name' => 'Kevin Whelan', 'url' => $siteUrl.'/about', 'sameAs' => ['https://www.linkedin.com/in/kpwhelan'], 'jobTitle' => 'Software Engineer & Technology Leader', 'knowsAbout' => ['Laravel', 'PHP', 'Vue', 'React', 'TypeScript', 'AWS', 'API development', 'Custom software development', 'Website development']],
        ],
    ];

    $page = [
        '@type' => 'WebPage',
        '@id' => $canonicalUrl.'/#webpage',
        'url' => $canonicalUrl,
        'name' => $title,
        'description' => $description,
        'isPartOf' => ['@id' => $siteUrl.'/#website'],
        'about' => ['@id' => $siteUrl.'/#business'],
    ];

    if ($serviceName) {
        $page['mainEntity'] = ['@id' => $canonicalUrl.'/#service'];
        $structuredData['@graph'][] = [
            '@type' => 'Service',
            '@id' => $canonicalUrl.'/#service',
            'name' => $serviceName,
            'serviceType' => $serviceName,
            'description' => $description,
            'url' => $canonicalUrl,
            'provider' => ['@id' => $siteUrl.'/#business'],
            'areaServed' => ['Massachusetts', 'New Hampshire', 'United States'],
        ];
    }

    if ($breadcrumbs !== []) {
        $page['breadcrumb'] = ['@id' => $canonicalUrl.'/#breadcrumb'];
        $structuredData['@graph'][] = [
            '@type' => 'BreadcrumbList',
            '@id' => $canonicalUrl.'/#breadcrumb',
            'itemListElement' => array_map(
                fn (array $breadcrumb, int $position): array => [
                    '@type' => 'ListItem',
                    'position' => $position + 1,
                    'name' => $breadcrumb['name'],
                    'item' => $breadcrumb['url'],
                ],
                $breadcrumbs,
                array_keys($breadcrumbs),
            ),
        ];
    }

    $structuredData['@graph'][] = $page;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1"
        >

        <title>{{ $title }}</title>

        <meta
            name="description"
            content="{{ $description }}"
        >

        <meta
            name="robots"
            content="{{ $shouldIndex ? 'index, follow' : 'noindex, nofollow' }}"
        >

        <link
            rel="canonical"
            href="{{ $canonicalUrl }}"
        >

        <meta
            property="og:title"
            content="{{ $title }}"
        >

        <meta
            property="og:description"
            content="{{ $description }}"
        >

        <meta
            property="og:type"
            content="website"
        >

        <meta
            property="og:url"
            content="{{ $canonicalUrl }}"
        >

        <meta property="og:site_name" content="Project 407">
        <meta property="og:image" content="{{ $socialImageUrl }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta
            property="og:image:alt"
            content="Project 407 — custom software and fractional CTO leadership"
        >

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $title }}">
        <meta name="twitter:description" content="{{ $description }}">
        <meta name="twitter:image" content="{{ $socialImageUrl }}">

        <link rel="icon" href="/favicon.ico">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <script type="application/ld+json">
            {!! json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>

        @if(config('services.google_analytics.id'))
            <script
                async
                src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.id') }}"
            ></script>

            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', '{{ config('services.google_analytics.id') }}');
            </script>
        @endif

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>

    <body>
        <x-navigation />

        <main>
            {{ $slot }}
        </main>

        <x-footer />

        @livewireScripts
    </body>
</html>
