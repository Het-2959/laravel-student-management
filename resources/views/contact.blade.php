@extends('layout')

@section('title', 'Contact | Student Management System')

@section('content')
    <div class="page-shell contact-shell">
        <section class="contact-card enter" aria-labelledby="contact-title">
            <div class="contact-copy">
                <span class="eyebrow">A friendly hello</span>
                <h1 id="contact-title">Let’s <span>Connect</span></h1>
                <p>Thanks for stopping by. Explore the project, see how its pages are built, and learn how Laravel routes and Blade templates work together.</p>
                <a class="button button-primary" href="{{ route('home') }}">
                    Back to Home
                    <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M16 10H4m5 5-5-5 5-5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </a>
            </div>
            <div class="contact-mark" aria-hidden="true">
                <div class="mark-orbit orbit-one"></div>
                <div class="mark-orbit orbit-two"></div>
                <div class="mark-core">
                    <svg viewBox="0 0 64 64" fill="none">
                        <path d="M15 22h34M15 32h34M15 42h22" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                        <circle cx="47" cy="43" r="8" fill="#198754" stroke="#fff" stroke-width="3"/>
                    </svg>
                </div>
                <span class="mark-caption">Built with care</span>
            </div>
        </section>

        <section class="contact-details" aria-label="Project information">
            <article class="info-card">
                <span class="info-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none"><path d="M4 7.5 12 4l8 3.5v9L12 20l-8-3.5v-9Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="m4.5 7.8 7.5 3.4 7.5-3.4M12 11.5V20" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/></svg>
                </span>
                <span class="info-label">PROJECT</span>
                <h2>Student Management System</h2>
                <p>A compact, multi-page Laravel project.</p>
            </article>
            <article class="info-card">
                <span class="info-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none"><path d="M7 5.5c0-1.1.9-2 2-2h6c1.1 0 2 .9 2 2V19a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2V5.5Z" stroke="currentColor" stroke-width="1.7"/><path d="M10 7h4m-3 11h2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                </span>
                <span class="info-label">FRAMEWORK</span>
                <h2>Laravel</h2>
                <p>Routes, views, and reusable Blade layouts.</p>
            </article>
            <article class="info-card">
                <span class="info-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none"><path d="M5 4.5h10l4 4V20H5V4.5Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/><path d="M14.5 4.8v4h4M8 13h8m-8 3.5h6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <span class="info-label">PURPOSE</span>
                <h2>College Practical</h2>
                <p>A hands-on example of multi-page navigation.</p>
            </article>
        </section>

        <p class="contact-footnote">This page is for exploring the project. It does not collect or submit messages.</p>
    </div>

@endsection

@push('styles')
    <style>
        .contact-shell {
            padding-top: 54px;
        }

        .contact-card {
            position: relative;
            overflow: hidden;
            min-height: 350px;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            align-items: center;
            gap: 24px;
            padding: clamp(31px, 6vw, 62px);
            border: 1px solid #d8ebe0;
            border-radius: 26px;
            background:
                radial-gradient(circle at 87% 11%, rgb(191 235 204 / 75%), transparent 21rem),
                linear-gradient(115deg, #fff 16%, #f1faf3 100%);
            box-shadow: var(--shadow);
        }

        .contact-copy {
            position: relative;
            z-index: 1;
            max-width: 560px;
        }

        .contact-copy h1 {
            margin: 17px 0 13px;
            color: var(--forest);
            font-size: clamp(2.7rem, 6vw, 4.4rem);
            letter-spacing: -0.08em;
            line-height: 1;
        }

        .contact-copy h1 span {
            color: var(--emerald);
        }

        .contact-copy p {
            max-width: 500px;
            margin: 0;
            color: var(--muted);
            font-size: 1rem;
            line-height: 1.8;
        }

        .contact-copy .button {
            margin-top: 25px;
        }

        .contact-copy .button svg {
            width: 18px;
            height: 18px;
        }

        .contact-mark {
            position: relative;
            width: min(100%, 310px);
            aspect-ratio: 1;
            display: grid;
            justify-self: center;
            place-items: center;
        }

        .mark-orbit {
            position: absolute;
            inset: 8%;
            border: 1px solid rgb(25 135 84 / 15%);
            border-radius: 50%;
        }

        .orbit-two {
            inset: 21%;
            border-style: dashed;
            border-color: rgb(25 135 84 / 24%);
            animation: slow-turn 32s linear infinite;
        }

        .mark-core {
            width: 122px;
            height: 122px;
            display: grid;
            place-items: center;
            border: 1px solid rgb(25 135 84 / 10%);
            border-radius: 38px;
            background: rgb(255 255 255 / 86%);
            box-shadow: 0 20px 45px rgb(18 61 42 / 13%);
            color: var(--forest);
            transform: rotate(-7deg);
        }

        .mark-core svg {
            width: 58px;
            height: 58px;
            transform: rotate(7deg);
        }

        .mark-caption {
            position: absolute;
            right: 1%;
            bottom: 16%;
            padding: 9px 13px;
            border: 1px solid #d8ebe0;
            border-radius: 999px;
            background: #fff;
            box-shadow: 0 8px 18px rgb(18 61 42 / 8%);
            color: #25774a;
            font-size: 0.69rem;
            font-weight: 750;
        }

        @keyframes slow-turn {
            to {
                transform: rotate(360deg);
            }
        }

        .contact-details {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
            margin-top: 23px;
        }

        .info-card {
            min-height: 194px;
            padding: 21px;
            border: 1px solid var(--line);
            border-radius: 17px;
            background: #fff;
            box-shadow: 0 8px 25px rgb(18 61 42 / 3%);
            transition: transform 190ms ease, box-shadow 190ms ease, border-color 190ms ease;
        }

        .info-card:hover {
            transform: translateY(-4px);
            border-color: #b9dfc5;
            box-shadow: 0 15px 34px rgb(18 61 42 / 8%);
        }

        .info-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            margin-bottom: 16px;
            border-radius: 13px;
            background: #edf9f0;
            color: var(--emerald);
        }

        .info-icon svg {
            width: 22px;
            height: 22px;
        }

        .info-label {
            display: block;
            color: #619371;
            font-size: 0.62rem;
            font-weight: 850;
            letter-spacing: 0.13em;
        }

        .info-card h2 {
            margin: 7px 0 5px;
            color: var(--forest);
            font-size: 1rem;
            letter-spacing: -0.025em;
        }

        .info-card p {
            margin: 0;
            color: var(--muted);
            font-size: 0.8rem;
            line-height: 1.6;
        }

        .contact-footnote {
            margin: 18px 0 0;
            color: #718579;
            font-size: 0.76rem;
            text-align: center;
        }

        @media (max-width: 760px) {
            .contact-card {
                grid-template-columns: 1fr 0.7fr;
            }

            .contact-mark {
                width: min(100%, 250px);
            }

            .contact-details {
                grid-template-columns: 1fr;
            }

            .info-card {
                min-height: auto;
            }
        }

        @media (max-width: 560px) {
            .contact-shell {
                padding-top: 30px;
            }

            .contact-card {
                grid-template-columns: 1fr;
                gap: 4px;
                padding: 30px 23px 22px;
                border-radius: 22px;
            }

            .contact-mark {
                width: min(72vw, 225px);
                margin-top: 10px;
            }

            .contact-copy h1 {
                font-size: clamp(2.8rem, 13vw, 3.7rem);
            }

            .contact-copy .button {
                width: 100%;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .orbit-two {
                animation: none;
            }
        }
    </style>
@endpush
