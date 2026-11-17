@props(['status'])

@php
    [$heading, $description, $guidance] = match ((int) $status) {
        401 => ['This page needs permission.', 'This part of the site is not available to visitors.', 'You can explore the public site, or contact Kevin if you expected to find something here.'],
        403 => ['This page is off limits.', 'You do not have permission to open this page.', 'Head back to the public site, or contact Kevin if you think this is a mistake.'],
        404 => ['That page is not here.', 'The link may be out of date, or the address may have a typo.', 'Start at the homepage, explore the services, or reach Kevin directly.'],
        405 => ['Try opening a page instead.', 'This address does not accept that kind of request.', 'Return to the homepage and use the site links. If you were sending a message, contact Kevin directly.'],
        408 => ['That request took too long.', 'The connection ended before the site could finish responding.', 'Check your connection and open the page again. If you were sending a message, contact Kevin directly.'],
        419 => ['This page needs a refresh.', 'Your session expired, so the site could not accept this request.', 'Copy any message you have written before reloading the form, or send it to Kevin by email instead.'],
        422 => ['Check the request details.', 'The site could not process the information in this request.', 'Return to the form and check the highlighted fields. You can also contact Kevin directly.'],
        429 => ['A moment to catch up.', 'Too many requests have come from this connection.', 'Please wait before trying again. If you need to reach Kevin now, use email or phone below.'],
        503 => ['We will be back.', 'The site is temporarily unavailable.', 'Please try again later. You can still reach Kevin directly by email or phone.'],
        default => (int) $status >= 500
            ? ['A hiccup on our side.', 'Something went wrong while the site was handling this request.', 'Please try opening the page again later. If you were sending a message, email or call Kevin directly.']
            : ['This request needs another path.', 'The site could not complete this request.', 'Return to the homepage, or contact Kevin for help.'],
    };
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <meta name="theme-color" content="#1b1b1a">
        <title>{{ $status }} — {{ $heading }} | Project 407</title>
        <link rel="icon" href="{{ url('/favicon.ico') }}">
        <style>
            :root { color-scheme: dark; font-family: 'Instrument Sans', system-ui, -apple-system, sans-serif; background: #1b1b1a; color: #f3f1ec; }
            * { box-sizing: border-box; }
            body { margin: 0; }
            a { color: inherit; text-underline-offset: .25em; }
            a:focus-visible { outline: 2px solid #ff3f46; outline-offset: 6px; }
            .error-shell { display: flex; min-height: 100svh; flex-direction: column; padding: 2.5rem clamp(1.25rem, 4vw, 4rem) 1.5rem; }
            .error-header { display: flex; align-items: center; justify-content: space-between; gap: 2rem; }
            .error-brand { font-size: 1.35rem; font-weight: 750; letter-spacing: -.04em; text-decoration: none; }
            .error-brand strong, .error-brand i { color: #ff3f46; }
            .error-brand i { font-style: normal; }
            .error-header > span, .error-label, .error-footer { font-size: .72rem; letter-spacing: .13em; line-height: 1.6; }
            .error-header > span { color: #aaa9a3; }
            .error-main { display: grid; width: 100%; max-width: 86rem; flex: 1; grid-template-columns: 1.15fr .85fr; align-content: center; align-items: center; gap: 4rem; margin-inline: auto; padding-block: 6rem; }
            .error-label { margin: 0 0 1.5rem; color: #ff3f46; font-weight: 700; }
            h1 { max-width: 11ch; margin: 0; font-size: clamp(3.25rem, 6.5vw, 7rem); font-weight: 600; letter-spacing: -.055em; line-height: 1; text-wrap: balance; }
            .error-description { max-width: 35rem; margin: 2rem 0 0; font-size: clamp(1.1rem, 1.7vw, 1.4rem); line-height: 1.6; }
            .error-guidance { max-width: 35rem; margin: 1rem 0 0; color: #aaa9a3; line-height: 1.75; }
            .error-actions { display: flex; flex-wrap: wrap; align-items: center; gap: 1.25rem 2rem; margin-top: 2.5rem; }
            .error-primary { display: inline-flex; min-height: 3rem; align-items: center; justify-content: space-between; gap: 2rem; padding: .9rem 1.35rem; border-radius: 2rem; background: #ff3f46; color: #1b1b1a; font-size: .75rem; font-weight: 750; letter-spacing: .08em; text-decoration: none; }
            .error-secondary { padding-block: .75rem; font-size: .75rem; font-weight: 700; letter-spacing: .08em; }
            .error-signal { display: grid; aspect-ratio: 1; place-content: center; border: 1px solid #3a3a36; border-radius: 50%; }
            .error-signal strong { color: transparent; font-size: clamp(6rem, 16vw, 16rem); font-weight: 600; letter-spacing: -.08em; line-height: 1; -webkit-text-stroke: 1px #77766f; }
            .error-signal span { margin-top: 1.5rem; color: #ff3f46; font-size: .7rem; letter-spacing: .18em; text-align: center; }
            .error-contact { display: flex; flex-wrap: wrap; gap: .75rem 2rem; padding-block: 1.5rem; border-top: 1px solid #454540; font-size: .9rem; line-height: 1.6; }
            .error-contact > span { color: #aaa9a3; }
            .error-footer { display: flex; flex-wrap: wrap; justify-content: space-between; gap: .75rem 2rem; padding-top: 1rem; border-top: 1px solid #454540; color: #aaa9a3; }
            @media (max-width: 800px) {
                .error-shell { padding-top: 1.5rem; }
                .error-header > span { display: none; }
                .error-main { grid-template-columns: 1fr; gap: 2rem; padding-block: 4rem; }
                .error-signal { display: none; }
                h1 { font-size: clamp(3rem, 12vw, 5rem); }
                .error-contact { flex-direction: column; }
            }
        </style>
    </head>
    <body>
        <div class="error-shell">
            <header class="error-header">
                <a class="error-brand" href="{{ url('/') }}" aria-label="Project 407 home"><strong>PROJECT</strong> 407<i aria-hidden="true">_</i></a>
                <span>INDEPENDENT ENGINEERING / DIRECT CONNECTION</span>
            </header>
            <main class="error-main">
                <div>
                    <p class="error-label">{{ $status }} / A CLEAR NEXT STEP</p>
                    <h1>{{ $heading }}</h1>
                    <p class="error-description">{{ $description }}</p>
                    <p class="error-guidance">{{ $guidance }}</p>
                    <nav class="error-actions" aria-label="Recovery options">
                        <a class="error-primary" href="{{ url('/') }}">BACK TO HOME <span aria-hidden="true">↗</span></a>
                        <a class="error-secondary" href="{{ url('/services') }}">EXPLORE SERVICES</a>
                    </nav>
                </div>
                <div class="error-signal" aria-hidden="true"><strong>{{ $status }}</strong><span>PROJECT 407 / STILL CONNECTED</span></div>
            </main>
            <div class="error-contact" aria-label="Contact Kevin directly">
                <span>REACH KEVIN DIRECTLY</span>
                <a href="mailto:kevin@project-407.com">kevin@project-407.com</a>
                <a href="tel:+19788779784">(978) 877-9784</a>
            </div>
            <footer class="error-footer"><span>PROJECT 407</span><span>MASSACHUSETTS · NEW HAMPSHIRE · REMOTE</span></footer>
        </div>
    </body>
</html>
