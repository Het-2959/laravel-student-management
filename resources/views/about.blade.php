@extends('layout')

@section('title', 'About | Student Management System')

@section('content')
    <div class="page-shell">
        <section class="about-intro enter">
            <span class="eyebrow">Behind the pages</span>
            <h1>About this <span>project</span></h1>
            <p>A practical guide to managing student records with Laravel, Blade templates, and the application's existing SQLite database.</p>
        </section>

        <section class="about-overview" aria-label="Website and technology overview">
            <article class="about-panel about-purpose">
                <span class="panel-label">01 / THE PURPOSE</span>
                <h2>About This Website</h2>
                <p>This Student Management System demonstrates a complete Laravel CRUD workflow: creating, viewing, updating, and deleting student records.</p>
                <p>Student records are stored in the existing SQLite database. Use the Students page to browse the list, select View or Edit for a record, or choose Add a Student to create one.</p>
            </article>

            <article class="about-panel stack-panel">
                <span class="panel-label">02 / THE TOOLKIT</span>
                <h2>Technology Stack</h2>
                <p>Familiar web technologies, working together.</p>
                <ul class="stack-list">
                    <li><span class="stack-symbol">L</span><span><strong>Laravel</strong><small>Web application framework</small></span></li>
                    <li><span class="stack-symbol">P</span><span><strong>PHP</strong><small>Server-side language</small></span></li>
                    <li><span class="stack-symbol">B</span><span><strong>Blade Templates</strong><small>Reusable page templates</small></span></li>
                    <li><span class="stack-symbol">W</span><span><strong>HTML &amp; CSS</strong><small>Structure and visual design</small></span></li>
                </ul>
            </article>
        </section>

        <section class="how-section" aria-labelledby="how-title">
            <div class="section-heading">
                <span class="eyebrow">A simple flow</span>
                <h2 id="how-title">How It Works</h2>
                <p>Named routes connect each student action to its controller and Blade view.</p>
            </div>
            <div class="flow-grid">
                <article class="flow-card">
                    <span class="flow-number">01</span>
                    <h3>A visitor opens a URL</h3>
                    <p>A visitor opens the student list or submits a form to create, update, or delete a record.</p>
                </article>
                <span class="flow-arrow" aria-hidden="true">→</span>
                <article class="flow-card">
                    <span class="flow-number">02</span>
                    <h3>A route selects a view</h3>
                    <p>Laravel validates the request and calls the matching student controller action.</p>
                </article>
                <span class="flow-arrow" aria-hidden="true">→</span>
                <article class="flow-card">
                    <span class="flow-number">03</span>
                    <h3>Blade builds the page</h3>
                    <p>The controller reads or updates SQLite, then returns the appropriate page or success message.</p>
                </article>
            </div>
        </section>

        <section class="highlights-section">
            <div class="section-heading">
                <span class="eyebrow">Project highlights</span>
                <h2>Designed to stay clear and connected.</h2>
            </div>
            <div class="highlight-grid">
                <article class="highlight-card">
                    <span class="highlight-icon" aria-hidden="true">↗</span>
                    <h3>Named routing</h3>
                    <p>Readable route names make it easier to link pages without hardcoding URLs.</p>
                </article>
                <article class="highlight-card">
                    <span class="highlight-icon" aria-hidden="true">{ }</span>
                    <h3>Reusable templates</h3>
                    <p>One layout keeps the site structure consistent as page content changes.</p>
                </article>
                <article class="highlight-card">
                    <span class="highlight-icon" aria-hidden="true">◎</span>
                    <h3>Consistent navigation</h3>
                    <p>The shared menu highlights the current page and works on small screens too.</p>
                </article>
            </div>
        </section>

        <section class="route-example" aria-labelledby="route-example-title">
            <div class="route-example-copy">
                <span class="eyebrow">A route in a few lines</span>
                <h2 id="route-example-title">Clear, readable, and named.</h2>
                <p>This example connects the <code>/about</code> URL to the <code>about</code> view, then gives the route a name for links.</p>
            </div>
            <pre class="route-code"><code>@verbatim
Route::get('/about', function () {
    return view('about');
})->name('about');
@endverbatim</code></pre>
        </section>
    </div>

@endsection

@push('styles')
    <style>
        .about-intro {
            max-width: 740px;
            margin: 0 auto 37px;
            text-align: center;
        }

        .about-intro .eyebrow {
            justify-content: center;
        }

        .about-intro h1 {
            margin: 15px 0 13px;
            color: var(--forest);
            font-size: clamp(2.6rem, 6vw, 4.3rem);
            letter-spacing: -0.075em;
            line-height: 1.02;
        }

        .about-intro h1 span {
            color: var(--emerald);
        }

        .about-intro p {
            max-width: 635px;
            margin: 0 auto;
            color: var(--muted);
            font-size: 1.05rem;
            line-height: 1.75;
        }

        .about-overview {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 18px;
        }

        .about-panel {
            padding: 29px;
            border: 1px solid var(--line);
            border-radius: 20px;
            background: #fff;
            box-shadow: 0 10px 32px rgb(18 61 42 / 4%);
        }

        .about-purpose {
            background:
                radial-gradient(circle at 100% 0, rgb(221 245 229 / 78%), transparent 18rem),
                #fff;
        }

        .panel-label {
            color: #4b9366;
            font-size: 0.67rem;
            font-weight: 800;
            letter-spacing: 0.13em;
        }

        .about-panel h2 {
            margin: 16px 0 13px;
            color: var(--forest);
            font-size: 1.55rem;
            letter-spacing: -0.045em;
        }

        .about-panel p {
            color: var(--muted);
            font-size: 0.92rem;
            line-height: 1.78;
        }

        .about-panel p:last-child {
            margin-bottom: 0;
        }

        .stack-panel > p {
            margin-bottom: 17px;
        }

        .stack-list {
            display: grid;
            gap: 10px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .stack-list li {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border: 1px solid #e8f0ea;
            border-radius: 12px;
            background: #fbfdfb;
        }

        .stack-symbol {
            width: 34px;
            height: 34px;
            display: grid;
            flex: 0 0 auto;
            place-items: center;
            border-radius: 10px;
            background: var(--mint);
            color: #17663d;
            font-size: 0.8rem;
            font-weight: 800;
        }

        .stack-list strong,
        .stack-list small {
            display: block;
        }

        .stack-list strong {
            color: var(--forest);
            font-size: 0.85rem;
        }

        .stack-list small {
            margin-top: 2px;
            color: var(--muted);
            font-size: 0.73rem;
        }

        .how-section {
            padding-top: 76px;
        }

        .flow-grid {
            display: grid;
            grid-template-columns: 1fr auto 1fr auto 1fr;
            align-items: center;
            gap: 12px;
        }

        .flow-card {
            min-height: 185px;
            padding: 21px;
            border: 1px solid var(--line);
            border-radius: 16px;
            background: #fff;
        }

        .flow-number {
            color: #58a575;
            font-size: 0.72rem;
            font-weight: 850;
            letter-spacing: 0.1em;
        }

        .flow-card h3 {
            margin: 15px 0 8px;
            color: var(--forest);
            font-size: 1rem;
            letter-spacing: -0.025em;
        }

        .flow-card p {
            margin: 0;
            color: var(--muted);
            font-size: 0.82rem;
            line-height: 1.7;
        }

        .flow-card code,
        .route-example-copy code {
            padding: 2px 5px;
            border-radius: 5px;
            background: #edf7f0;
            color: #17663d;
            font-family: "Cascadia Code", Consolas, monospace;
            font-size: 0.85em;
        }

        .flow-arrow {
            color: #70ab83;
            font-size: 1.15rem;
        }

        .highlights-section {
            padding-top: 75px;
        }

        .highlight-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 15px;
        }

        .highlight-card {
            padding: 22px;
            border: 1px solid #dcebe0;
            border-radius: 16px;
            background: linear-gradient(150deg, #fff, #f7fcf8);
            transition: transform 180ms ease, box-shadow 180ms ease;
        }

        .highlight-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 13px 30px rgb(18 61 42 / 8%);
        }

        .highlight-icon {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: var(--mint);
            color: #17663d;
            font-size: 1.05rem;
            font-weight: 800;
        }

        .highlight-card h3 {
            margin: 16px 0 7px;
            color: var(--forest);
            font-size: 0.98rem;
        }

        .highlight-card p {
            margin: 0;
            color: var(--muted);
            font-size: 0.82rem;
            line-height: 1.65;
        }

        .route-example {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            align-items: center;
            gap: 28px;
            margin-top: 72px;
            padding: 30px;
            border-radius: 20px;
            background:
                radial-gradient(circle at 5% 5%, rgb(37 124 73 / 22%), transparent 18rem),
                linear-gradient(120deg, #123d2a, #185b3a);
            color: #fff;
        }

        .route-example .eyebrow {
            color: #b5e9c6;
        }

        .route-example .eyebrow::before {
            background: #76d498;
        }

        .route-example-copy h2 {
            margin: 13px 0 10px;
            color: #fff;
            font-size: 1.65rem;
            letter-spacing: -0.05em;
        }

        .route-example-copy p {
            margin: 0;
            color: #cce3d3;
            font-size: 0.88rem;
            line-height: 1.7;
        }

        .route-example-copy code {
            background: rgb(255 255 255 / 12%);
            color: #d9f3e1;
        }

        .route-code {
            overflow-x: auto;
            margin: 0;
            padding: 19px 21px;
            border: 1px solid rgb(255 255 255 / 10%);
            border-radius: 14px;
            background: #10251d;
            color: #d8e9dd;
            font: 0.83rem/1.85 "Cascadia Code", "SFMono-Regular", Consolas, monospace;
            tab-size: 4;
        }

        @media (max-width: 820px) {
            .about-overview {
                grid-template-columns: 1fr;
            }

            .flow-grid {
                grid-template-columns: 1fr;
            }

            .flow-card {
                min-height: auto;
            }

            .flow-arrow {
                justify-self: center;
                transform: rotate(90deg);
            }

            .route-example {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .about-intro {
                text-align: left;
            }

            .about-intro .eyebrow {
                justify-content: flex-start;
            }

            .about-panel {
                padding: 23px;
            }

            .highlight-grid {
                grid-template-columns: 1fr;
            }

            .how-section,
            .highlights-section {
                padding-top: 56px;
            }

            .route-example {
                gap: 20px;
                margin-top: 54px;
                padding: 23px;
            }
        }
    </style>
@endpush
