@props([
    'title' => 'Project 407',
    'description' => 'Websites and practical software for contractors and local service businesses.',
])

@php
    $canonicalUrl = url()->current();
    $socialImageUrl = asset('project407-social.png');
    $shouldIndex = app()->environment('production');
    $organizationSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'ProfessionalService',
        'name' => 'Project 407',
        'url' => config('app.url'),
        'logo' => asset('project407-favicon-512.png'),
        'image' => $socialImageUrl,
        'description' => 'Lead-generating websites and practical software for contractors and local service businesses.',
        'founder' => [
            '@type' => 'Person',
            'name' => 'Kevin Whelan',
        ],
        'areaServed' => [
            [
                '@type' => 'State',
                'name' => 'Massachusetts',
            ],
            [
                '@type' => 'State',
                'name' => 'New Hampshire',
            ],
        ],
    ];
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
            content="Project 407 — websites and software for service businesses"
        >

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $title }}">
        <meta name="twitter:description" content="{{ $description }}">
        <meta name="twitter:image" content="{{ $socialImageUrl }}">

        <link rel="icon" href="/favicon.ico">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <script type="application/ld+json">
            {!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
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
