@extends('layout')

@section('title', 'Dashboard | Student Management System')

@section('content')
    <div class="page-shell">
        <section class="hero" aria-labelledby="hero-title">
            <div class="hero-copy enter">
                <span class="eyebrow">Student management dashboard</span>
                <h1 id="hero-title">Welcome to the <span>Student Management System</span></h1>
                <p class="hero-description">
                    Keep student records organized in one place. Add new students, review their details,
                    and update or remove records whenever you need.
                </p>
                <div class="hero-actions">
                    <a class="button button-primary" href="{{ route('students.index') }}">
                        View Students
                        <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12m-5-5 5 5-5 5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <a class="button button-secondary" href="{{ route('students.create') }}">Add a Student</a>
                </div>
                <div class="hero-note">
                    <span class="note-dot" aria-hidden="true"></span>
                    {{ $studentCount }} {{ \Illuminate\Support\Str::plural('student record', $studentCount) }} in your database
                </div>
            </div>

            <div class="code-card enter enter-delay" aria-label="Example Laravel student routes">
                <div class="code-card-top">
                    <div class="window-dots" aria-hidden="true"><i></i><i></i><i></i></div>
                    <span>routes / web.php</span>
                    <span class="code-language">PHP</span>
                </div>
                <div class="code-content">
                    <div class="code-line"><span class="line-number">01</span><code><span class="code-purple">Route</span>::<span class="code-blue">get</span>(<span class="code-yellow">'/'</span>, [DashboardController::class,</code></div>
                    <div class="code-line indent"><span class="line-number">02</span><code><span class="code-yellow">'index'</span>])-&gt;<span class="code-blue">name</span>(<span class="code-yellow">'home'</span>);</code></div>
                    <div class="code-gap"></div>
                    <div class="code-line"><span class="line-number">03</span><code><span class="code-purple">Route</span>::<span class="code-blue">resource</span>(<span class="code-yellow">'students'</span>,</code></div>
                    <div class="code-line indent"><span class="line-number">04</span><code>StudentController::class);</code></div>
                    <div class="code-gap"></div>
                    <div class="code-line"><span class="line-number">05</span><code><span class="code-comment">// One route per CRUD action</span></code></div>
                </div>
                <div class="code-card-bottom">
                    <span><span class="status-dot"></span>Ready to explore</span>
                    <span>Laravel + Blade</span>
                </div>
            </div>
        </section>

        <section class="dashboard-report" aria-labelledby="dashboard-report-title">
            <div class="report-heading">
                <span class="eyebrow">At a glance</span>
                <h2 id="dashboard-report-title">Student and department summary</h2>
            </div>

            <div class="report-stat-grid">
                <article class="report-stat">
                    <span class="card-index">TOTAL STUDENTS</span>
                    <strong class="report-count">{{ $studentCount }}</strong>
                    <p>{{ \Illuminate\Support\Str::plural('student record', $studentCount) }} in the system</p>
                </article>
                <article class="report-stat">
                    <span class="card-index">TOTAL DEPARTMENTS</span>
                    <strong class="report-count">{{ $departmentCount }}</strong>
                    <p>{{ \Illuminate\Support\Str::plural('department', $departmentCount) }} available</p>
                </article>
                <article class="report-stat">
                    <span class="card-index">UNASSIGNED STUDENTS</span>
                    <strong class="report-count">{{ $unassignedStudentCount }}</strong>
                    <p>{{ \Illuminate\Support\Str::plural('student', $unassignedStudentCount) }} without a department</p>
                </article>
            </div>

            <section class="department-report" aria-labelledby="department-report-title">
                <h3 id="department-report-title">Students by department</h3>
                <ul class="department-report-list">
                    @forelse ($departmentStudentCounts as $department)
                        <li>
                            <a href="{{ route('departments.show', $department) }}">
                                {{ $department->name }} <span>({{ $department->code }})</span>
                            </a>
                            <span class="department-report-count">
                                {{ $department->students_count }} {{ \Illuminate\Support\Str::plural('student', $department->students_count) }}
                            </span>
                        </li>
                    @empty
                        <li class="department-report-empty">No departments have been added yet.</li>
                    @endforelse
                </ul>
            </section>
        </section>

        <section class="dashboard-overview" aria-label="Student record summary">
            <article class="dashboard-stat">
                <span class="card-index">TOTAL RECORDS</span>
                <strong class="dashboard-count">{{ $studentCount }}</strong>
                <p>{{ \Illuminate\Support\Str::plural('student', $studentCount) }} currently in the system</p>
                <a href="{{ route('students.index') }}">Browse all students <span aria-hidden="true">→</span></a>
            </article>

            <section class="dashboard-recent" aria-labelledby="recent-students-title">
                <div class="dashboard-recent-heading">
                    <div>
                        <span class="card-index">LATEST RECORDS</span>
                        <h2 id="recent-students-title">Recently added students</h2>
                    </div>
                    <a class="button button-secondary" href="{{ route('students.create') }}">Add student</a>
                </div>
                <ul class="dashboard-student-list">
                    @forelse ($latestStudents as $student)
                        <li>
                            <span>
                                <strong>{{ $student->name }}</strong>
                                <small>{{ $student->email }}</small>
                            </span>
                            <a href="{{ route('students.show', $student) }}">View</a>
                        </li>
                    @empty
                        <li class="dashboard-empty">No student records yet. Add a student to get started.</li>
                    @endforelse
                </ul>
            </section>
        </section>

        <section class="features" aria-labelledby="features-title">
            <div class="section-heading">
                <span class="eyebrow">Quick links</span>
                <h2 id="features-title">Everything you need to manage student records.</h2>
                <p>Choose a section to continue working with the application.</p>
            </div>
            <div class="feature-grid">
                <article class="feature-card">
                    <span class="feature-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none"><path d="M8 5 3 12l5 7m8-14 5 7-5 7m-2-16-4 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <span class="card-index">01 / RECORDS</span>
                    <h3>View Students</h3>
                    <p>See the complete student list and open any record to view or manage its details.</p>
                    <a href="{{ route('students.index') }}">Open student list <span aria-hidden="true">→</span></a>
                </article>
                <article class="feature-card">
                    <span class="feature-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none"><rect x="3.5" y="4.5" width="17" height="15" rx="2.5" stroke="currentColor" stroke-width="1.7"/><path d="M4 9h16m-11 4h7m-7 3h4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                    </span>
                    <span class="card-index">02 / NEW RECORD</span>
                    <h3>Add a Student</h3>
                    <p>Enter a student's name and email address to create a new student record.</p>
                    <a href="{{ route('students.create') }}">Create a record <span aria-hidden="true">→</span></a>
                </article>
                <article class="feature-card">
                    <span class="feature-icon" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none"><rect x="6.5" y="3" width="11" height="18" rx="2" stroke="currentColor" stroke-width="1.7"/><path d="M10 6h4m-3 12h2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/></svg>
                    </span>
                    <span class="card-index">03 / HELP</span>
                    <h3>About &amp; Help</h3>
                    <p>Learn about the application, its Laravel structure, and how to use the student management pages.</p>
                    <a href="{{ route('about') }}">About this application <span aria-hidden="true">→</span></a>
                </article>
            </div>
        </section>

        <section class="home-cta">
            <div>
                <span class="eyebrow">Need a new record?</span>
                <h2>Keep your student list up to date.</h2>
                <p>Add student details with the validated form and save them to the existing SQLite database.</p>
            </div>
            <a class="button button-primary" href="{{ route('students.create') }}">
                Add a Student
                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true"><path d="M4 10h12m-5-5 5 5-5 5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
        </section>
    </div>

@endsection

@push('styles')
    <style>
        .hero {
            position: relative;
            overflow: hidden;
            min-height: 448px;
            display: grid;
            grid-template-columns: 1.08fr 0.92fr;
            align-items: center;
            gap: 54px;
            padding: clamp(34px, 6vw, 66px);
            border: 1px solid rgb(255 255 255 / 15%);
            border-radius: 28px;
            background:
                radial-gradient(circle at 90% 12%, rgb(91 197 131 / 30%), transparent 19rem),
                radial-gradient(circle at 12% 100%, rgb(44 124 80 / 35%), transparent 22rem),
                linear-gradient(125deg, #123d2a 0%, #155d3b 57%, #198754 100%);
            box-shadow: 0 28px 70px rgb(18 61 42 / 17%);
            color: #fff;
        }

        .hero::before,
        .hero::after {
            position: absolute;
            border: 1px solid rgb(255 255 255 / 9%);
            border-radius: 50%;
            content: "";
            pointer-events: none;
        }

        .hero::before {
            width: 320px;
            height: 320px;
            top: -220px;
            right: 12%;
        }

        .hero::after {
            width: 240px;
            height: 240px;
            right: -145px;
            bottom: -160px;
        }

        .hero-copy {
            position: relative;
            z-index: 1;
        }

        .hero .eyebrow {
            color: #b5e9c6;
        }

        .hero .eyebrow::before {
            background: #76d498;
        }

        .hero h1 {
            max-width: 580px;
            margin: 20px 0 17px;
            color: #fff;
            font-size: clamp(2.45rem, 5vw, 4.15rem);
            font-weight: 780;
            letter-spacing: -0.075em;
            line-height: 1.02;
        }

        .hero h1 span {
            color: #8ee1a9;
        }

        .hero-description {
            max-width: 510px;
            margin: 0;
            color: #d1e8d8;
            font-size: 1.02rem;
            line-height: 1.75;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 11px;
            margin-top: 27px;
        }

        .hero .button-primary {
            background: #fff;
            color: #145b36;
            box-shadow: 0 10px 24px rgb(5 32 18 / 17%);
        }

        .hero .button-primary:hover {
            background: #eaf8ee;
        }

        .hero .button-secondary {
            border-color: rgb(255 255 255 / 29%);
            background: rgb(255 255 255 / 8%);
            color: #fff;
        }

        .hero .button-secondary:hover {
            background: rgb(255 255 255 / 16%);
        }

        .hero-actions svg,
        .home-cta .button svg {
            width: 18px;
            height: 18px;
        }

        .dashboard-overview {
            display: grid;
            grid-template-columns: minmax(200px, 0.7fr) minmax(0, 1.7fr);
            gap: 17px;
            margin-top: 18px;
        }

        .dashboard-stat,
        .dashboard-recent,
        .report-stat,
        .department-report {
            padding: 24px;
            border: 1px solid var(--line);
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 8px 25px rgb(18 61 42 / 3%);
        }

        .dashboard-count {
            display: block;
            margin-top: 12px;
            color: var(--forest);
            font-size: 3.2rem;
            letter-spacing: -0.07em;
            line-height: 1;
        }

        .dashboard-report {
            margin-top: 42px;
        }

        .report-heading {
            margin-bottom: 17px;
        }

        .report-heading h2 {
            margin: 8px 0 0;
            color: var(--forest);
            font-size: clamp(1.45rem, 3vw, 1.9rem);
            letter-spacing: -0.045em;
        }

        .report-stat-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 17px;
        }

        .report-stat {
            min-width: 0;
        }

        .report-count {
            display: block;
            margin-top: 12px;
            color: var(--forest);
            font-size: 2.7rem;
            font-weight: 750;
            letter-spacing: -0.07em;
            line-height: 1;
        }

        .report-stat p {
            margin: 9px 0 0;
            color: var(--muted);
            font-size: 0.88rem;
        }

        .department-report {
            margin-top: 17px;
        }

        .department-report h3 {
            margin: 0;
            color: var(--forest);
            font-size: 1.08rem;
            letter-spacing: -0.025em;
        }

        .department-report-list {
            display: grid;
            gap: 0;
            margin: 15px 0 0;
            padding: 0;
            list-style: none;
        }

        .department-report-list li {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 12px 0;
            border-top: 1px solid #edf3ef;
        }

        .department-report-list a {
            color: #176b40;
            font-weight: 700;
            text-decoration: none;
        }

        .department-report-count {
            flex: 0 0 auto;
            color: var(--muted);
            font-size: 0.86rem;
        }

        .department-report-empty {
            color: var(--muted);
            font-size: 0.9rem;
        }

        .dashboard-stat p {
            margin: 9px 0 18px;
            color: var(--muted);
            font-size: 0.88rem;
        }

        .dashboard-stat > a,
        .dashboard-student-list > li > a,
        .feature-card > a {
            color: #176b40;
            font-size: 0.86rem;
            font-weight: 750;
            text-decoration: none;
        }

        .dashboard-recent-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .dashboard-recent-heading h2 {
            margin: 8px 0 0;
            color: var(--forest);
            font-size: 1.2rem;
            letter-spacing: -0.035em;
        }

        .dashboard-recent-heading .button {
            min-height: 40px;
            padding-inline: 13px;
            font-size: 0.8rem;
        }

        .dashboard-student-list {
            display: grid;
            gap: 0;
            margin: 17px 0 0;
            padding: 0;
            list-style: none;
        }

        .dashboard-student-list li {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            padding: 12px 0;
            border-top: 1px solid #edf3ef;
        }

        .dashboard-student-list li > span {
            display: grid;
            gap: 4px;
            min-width: 0;
        }

        .dashboard-student-list strong {
            overflow: hidden;
            color: #18382a;
            font-size: 0.9rem;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .dashboard-student-list small {
            overflow: hidden;
            color: var(--muted);
            font-size: 0.8rem;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .dashboard-empty {
            color: var(--muted);
            font-size: 0.9rem;
        }

        .hero-note {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-top: 25px;
            color: #c3dfcc;
            font-size: 0.79rem;
        }

        .note-dot,
        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #80dda1;
            box-shadow: 0 0 0 4px rgb(128 221 161 / 12%);
        }

        .code-card {
            position: relative;
            z-index: 1;
            overflow: hidden;
            border: 1px solid rgb(255 255 255 / 12%);
            border-radius: 18px;
            background: #10251d;
            box-shadow: 0 26px 55px rgb(3 25 14 / 30%);
            transform: rotate(1deg);
            transition: transform 220ms ease;
        }

        .code-card:hover {
            transform: rotate(0) translateY(-4px);
        }

        .code-card-top,
        .code-card-bottom {
            min-height: 48px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding-inline: 17px;
            color: #9aafa2;
            font-size: 0.7rem;
        }

        .code-card-top {
            border-bottom: 1px solid rgb(255 255 255 / 8%);
        }

        .window-dots {
            display: flex;
            gap: 5px;
        }

        .window-dots i {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #e47e72;
        }

        .window-dots i:nth-child(2) {
            background: #e5bd67;
        }

        .window-dots i:nth-child(3) {
            background: #72c78d;
        }

        .code-language {
            padding: 4px 7px;
            border-radius: 5px;
            background: rgb(255 255 255 / 7%);
            color: #bbd6c5;
            font-size: 0.6rem;
            font-weight: 750;
            letter-spacing: 0.08em;
        }

        .code-content {
            padding: 19px 14px 17px 8px;
            color: #dce9df;
            font-family: "Cascadia Code", "SFMono-Regular", Consolas, monospace;
            font-size: clamp(0.62rem, 1.1vw, 0.78rem);
            line-height: 1.9;
        }

        .code-line {
            display: flex;
            gap: 15px;
            white-space: nowrap;
        }

        .line-number {
            width: 22px;
            flex: 0 0 auto;
            color: #667c6e;
            text-align: right;
            user-select: none;
        }

        .code-line code {
            font: inherit;
        }

        .code-line.indent code {
            padding-left: 18px;
        }

        .code-purple {
            color: #d0a8f0;
        }

        .code-blue {
            color: #8bd4e8;
        }

        .code-yellow {
            color: #d8d786;
        }

        .code-comment {
            color: #7d9885;
            font-style: italic;
        }

        .code-gap {
            height: 9px;
        }

        .code-card-bottom {
            min-height: 42px;
            border-top: 1px solid rgb(255 255 255 / 8%);
            font-size: 0.65rem;
        }

        .code-card-bottom > span:first-child {
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .code-card-bottom .status-dot {
            width: 6px;
            height: 6px;
        }

        .features {
            padding-top: 86px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 17px;
        }

        .feature-card {
            min-height: 242px;
            padding: 24px;
            border: 1px solid var(--line);
            border-radius: 18px;
            background: #fff;
            box-shadow: 0 8px 25px rgb(18 61 42 / 3%);
            transition: transform 200ms ease, box-shadow 200ms ease, border-color 200ms ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            border-color: #b9dfc5;
            box-shadow: 0 18px 40px rgb(18 61 42 / 9%);
        }

        .feature-icon {
            width: 46px;
            height: 46px;
            display: grid;
            place-items: center;
            border: 1px solid #d5eddd;
            border-radius: 14px;
            background: #edf9f0;
            color: #198754;
        }

        .feature-icon svg {
            width: 23px;
            height: 23px;
        }

        .card-index {
            display: block;
            margin-top: 23px;
            color: #6d9b7e;
            font-size: 0.64rem;
            font-weight: 800;
            letter-spacing: 0.12em;
        }

        .feature-card h3 {
            margin: 8px 0;
            color: var(--forest);
            font-size: 1.13rem;
            letter-spacing: -0.03em;
        }

        .feature-card p {
            margin: 0;
            color: var(--muted);
            font-size: 0.88rem;
            line-height: 1.7;
        }

        .home-cta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            margin-top: 72px;
            padding: 27px 31px;
            border: 1px solid #d8ebdd;
            border-radius: 19px;
            background: linear-gradient(110deg, #e7f7eb, #f5fbf6);
        }

        .home-cta .eyebrow {
            font-size: 0.64rem;
        }

        .home-cta h2 {
            margin: 9px 0 5px;
            color: var(--forest);
            font-size: 1.35rem;
            letter-spacing: -0.04em;
        }

        .home-cta p {
            margin: 0;
            color: var(--muted);
            font-size: 0.86rem;
            line-height: 1.6;
        }

        @media (max-width: 900px) {
            .hero {
                grid-template-columns: 1fr 0.88fr;
                gap: 28px;
                padding: 42px 34px;
            }
        }

        @media (max-width: 700px) {
            .hero {
                grid-template-columns: 1fr;
                gap: 34px;
            }

            .dashboard-overview {
                grid-template-columns: 1fr;
            }

            .report-stat-grid {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                max-width: 560px;
                font-size: clamp(2.7rem, 9vw, 4rem);
            }

            .code-card {
                max-width: 520px;
                width: 100%;
                margin-inline: auto;
                transform: none;
            }

            .feature-grid {
                grid-template-columns: 1fr;
            }

            .feature-card {
                min-height: auto;
            }

            .card-index {
                margin-top: 17px;
            }
        }

        @media (max-width: 520px) {
            .hero {
                gap: 30px;
                padding: 31px 22px;
                border-radius: 22px;
            }

            .hero h1 {
                font-size: clamp(2.35rem, 12vw, 3.35rem);
            }

            .hero-description {
                font-size: 0.94rem;
            }

            .hero-actions {
                align-items: stretch;
                flex-direction: column;
            }

            .hero-actions .button {
                width: 100%;
            }

            .code-content {
                overflow-x: auto;
                font-size: 0.65rem;
            }

            .features {
                padding-top: 60px;
            }

            .home-cta {
                align-items: flex-start;
                flex-direction: column;
                margin-top: 50px;
                padding: 24px 21px;
            }

            .home-cta .button {
                width: 100%;
            }
        }
    </style>
@endpush
