<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#123D2A">
    <title>@yield('title', 'Student Management System')</title>
    <style>
        :root {
            color-scheme: light;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: #18382a;
            background: #f4faf6;
            font-synthesis: none;
            text-rendering: optimizeLegibility;
            --forest: #123d2a;
            --forest-deep: #0b2b1d;
            --emerald: #198754;
            --mint: #ddf5e5;
            --paper: #ffffff;
            --muted: #61766a;
            --line: #dfebe3;
            --shadow: 0 20px 55px rgb(18 61 42 / 9%);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            min-width: 320px;
            min-height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            background:
                radial-gradient(ellipse at 8% 14%, rgb(221 245 229 / 56%), transparent 28rem),
                #f4faf6;
        }

        a {
            color: inherit;
        }

        button,
        a {
            -webkit-tap-highlight-color: transparent;
        }

        a:focus-visible,
        button:focus-visible {
            outline: 3px solid #6fd19b;
            outline-offset: 4px;
        }

        .site-header {
            position: relative;
            z-index: 5;
            border-bottom: 1px solid rgb(18 61 42 / 7%);
            background: rgb(255 255 255 / 88%);
            backdrop-filter: blur(16px);
        }

        .header-inner,
        .footer-inner,
        .page-shell {
            width: min(1120px, calc(100% - 48px));
            margin-inline: auto;
        }

        .header-inner {
            min-height: 82px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: var(--forest);
            font-size: 1rem;
            font-weight: 750;
            letter-spacing: -0.035em;
            text-decoration: none;
            white-space: nowrap;
        }

        .brand-mark {
            width: 42px;
            height: 42px;
            display: grid;
            flex: 0 0 auto;
            place-items: center;
            border-radius: 14px;
            background: linear-gradient(145deg, #198754, #12613b);
            box-shadow: 0 8px 18px rgb(25 135 84 / 20%);
        }

        .brand-mark svg {
            width: 24px;
            height: 24px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .header-badge {
            padding: 7px 11px;
            border: 1px solid #d1ebd9;
            border-radius: 999px;
            background: #effaf2;
            color: #17663d;
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 0.09em;
            white-space: nowrap;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .nav-links a {
            position: relative;
            padding: 10px 15px;
            border-radius: 999px;
            color: #52665a;
            font-size: 0.91rem;
            font-weight: 650;
            text-decoration: none;
            transition: color 180ms ease, background 180ms ease, transform 180ms ease;
        }

        .nav-links a:hover {
            transform: translateY(-1px);
            background: #f0f8f2;
            color: var(--forest);
        }

        .nav-links a.active {
            background: var(--mint);
            color: #145b36;
        }

        .menu-toggle {
            display: none;
            width: 42px;
            height: 42px;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: #fff;
            color: var(--forest);
            cursor: pointer;
        }

        .menu-toggle svg {
            width: 21px;
            height: 21px;
        }

        main {
            width: 100%;
            flex: 1;
        }

        .page-shell {
            padding-block: 48px 76px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: #25774a;
            font-size: 0.72rem;
            font-weight: 800;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .eyebrow::before {
            width: 20px;
            height: 2px;
            border-radius: 2px;
            background: var(--emerald);
            content: "";
        }

        .section-heading {
            max-width: 660px;
            margin-bottom: 28px;
        }

        .section-heading h2 {
            margin: 12px 0 10px;
            color: var(--forest);
            font-size: clamp(1.8rem, 3.2vw, 2.45rem);
            letter-spacing: -0.055em;
            line-height: 1.12;
        }

        .section-heading p,
        .body-copy {
            color: var(--muted);
            font-size: 1rem;
            line-height: 1.8;
        }

        .button {
            min-height: 48px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 0 19px;
            border: 1px solid transparent;
            border-radius: 12px;
            font-size: 0.92rem;
            font-weight: 750;
            text-decoration: none;
            transition: transform 180ms ease, box-shadow 180ms ease, background 180ms ease;
        }

        .button:hover {
            transform: translateY(-2px);
        }

        .button-primary {
            background: var(--emerald);
            color: #fff;
            box-shadow: 0 10px 22px rgb(25 135 84 / 22%);
        }

        .button-primary:hover {
            background: #147346;
            box-shadow: 0 14px 28px rgb(25 135 84 / 28%);
        }

        .button-secondary {
            border-color: #dce9df;
            background: #fff;
            color: var(--forest);
        }

        .button-secondary:hover {
            background: #f5fbf6;
            box-shadow: 0 8px 18px rgb(18 61 42 / 8%);
        }

        .site-footer {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 90% 20%, rgb(25 135 84 / 27%), transparent 17rem),
                var(--forest);
            color: #eaf5ed;
        }

        .footer-inner {
            min-height: 134px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            padding-block: 27px;
        }

        .footer-copy p {
            margin: 5px 0 0;
            color: #bbd3c3;
            font-size: 0.84rem;
        }

        .footer-copy strong {
            font-size: 0.94rem;
            letter-spacing: -0.02em;
        }

        .footer-links {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-links a {
            color: #d7e8dc;
            font-size: 0.86rem;
            text-decoration: none;
            transition: color 160ms ease;
        }

        .footer-links a:hover {
            color: #8fe1ac;
        }

        .enter {
            animation: rise-in 650ms both;
        }

        .enter-delay {
            animation-delay: 110ms;
        }

        @keyframes rise-in {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 760px) {
            .header-inner {
                min-height: 72px;
                flex-wrap: wrap;
                gap: 0 14px;
                padding-block: 13px;
            }

            .brand {
                margin-right: auto;
            }

            .header-right {
                gap: 10px;
            }

            .menu-toggle {
                display: inline-flex;
            }

            .nav-links {
                display: none;
                width: 100%;
                flex-direction: column;
                align-items: stretch;
                gap: 5px;
                padding-top: 12px;
            }

            .nav-links.is-open {
                display: flex;
            }

            .nav-links a {
                border-radius: 10px;
            }

            .page-shell {
                padding-block: 36px 58px;
            }
        }

        @media (max-width: 520px) {
            .header-inner,
            .footer-inner,
            .page-shell {
                width: min(100% - 32px, 1120px);
            }

            .brand {
                gap: 9px;
                font-size: 0.91rem;
            }

            .brand-mark {
                width: 38px;
                height: 38px;
                border-radius: 12px;
            }

            .header-badge {
                padding: 6px 8px;
                font-size: 0.59rem;
            }

            .footer-inner {
                align-items: flex-start;
                flex-direction: column;
                gap: 17px;
            }

            .footer-links {
                gap: 16px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <a class="brand" href="{{ route('home') }}" aria-label="Student Management System home">
                <span class="brand-mark" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none">
                        <path d="M4.5 17.8 8 6.2h2.1l3.5 11.6h-2.2l-.8-2.9H7.5l-.8 2.9H4.5Zm3.5-4.7h2.1L9 9.2l-1 3.9ZM15 17.8V6.2h4.1c2.1 0 3.4 1.1 3.4 3 0 1.3-.7 2.2-1.8 2.6 1.4.3 2.2 1.3 2.2 2.8 0 2-1.4 3.2-3.6 3.2H15Zm2-6.8h1.8c1.1 0 1.7-.5 1.7-1.5s-.6-1.5-1.7-1.5H17v3Zm0 5h2c1.2 0 1.8-.6 1.8-1.7s-.6-1.7-1.8-1.7h-2V16Z" fill="white"/>
                    </svg>
                </span>
                <span>Student Management System</span>
            </a>

            <div class="header-right">
                <span class="header-badge">PRACTICAL 10</span>
                <button class="menu-toggle" type="button" aria-label="Open navigation menu" aria-expanded="false" aria-controls="primary-navigation">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true">
                        <path d="M4 7h16M4 12h16M4 17h16"/>
                    </svg>
                </button>
            </div>

            <nav class="nav-links" id="primary-navigation" aria-label="Main navigation">
                <a href="{{ route('home') }}" @if (request()->routeIs('home')) class="active" aria-current="page" @endif>Home</a>
                <a href="{{ route('students.index') }}" @if (request()->routeIs('students.*')) class="active" aria-current="page" @endif>Students</a>
                <a href="{{ route('about') }}" @if (request()->routeIs('about')) class="active" aria-current="page" @endif>About</a>
                <a href="{{ route('contact') }}" @if (request()->routeIs('contact')) class="active" aria-current="page" @endif>Contact</a>
            </nav>
        </div>
    </header>

    <main id="main-content">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-copy">
                <strong>&copy; {{ date('Y') }} Student Management System</strong>
                <p>Student records managed with Laravel, Blade, and SQLite.</p>
            </div>
            <nav class="footer-links" aria-label="Footer navigation">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('students.index') }}">Students</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('contact') }}">Contact</a>
            </nav>
        </div>
    </footer>
    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const primaryNavigation = document.querySelector('#primary-navigation');

        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';

            menuToggle.setAttribute('aria-expanded', String(!isExpanded));
            menuToggle.setAttribute('aria-label', isExpanded ? 'Open navigation menu' : 'Close navigation menu');
            primaryNavigation.classList.toggle('is-open', !isExpanded);
        });
    </script>
    @stack('scripts')
</body>
</html>
