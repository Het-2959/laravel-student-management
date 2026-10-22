@extends('layout')

@section('title', 'Student Details | Student Management System')

@section('content')
    <style>
        .student-page {
            width: min(720px, calc(100% - 48px));
            margin-inline: auto;
            padding-block: 48px 76px;
        }

        .student-card {
            padding: clamp(24px, 5vw, 48px);
            border: 1px solid #dfebe3;
            border-radius: 24px;
            background: #fff;
            box-shadow: 0 20px 55px rgb(18 61 42 / 9%);
        }

        .student-card h1 {
            margin: 12px 0;
            color: #123d2a;
            font-size: clamp(2rem, 6vw, 3rem);
            letter-spacing: -0.055em;
            line-height: 1.1;
        }

        .student-intro {
            margin: 0 0 28px;
            color: #61766a;
            line-height: 1.7;
        }

        .student-details {
            display: grid;
            gap: 0;
            margin: 0;
            border-top: 1px solid #dfebe3;
        }

        .student-details div {
            display: grid;
            grid-template-columns: minmax(110px, 0.45fr) 1fr;
            gap: 18px;
            padding: 16px 0;
            border-bottom: 1px solid #dfebe3;
        }

        .student-details dt {
            color: #61766a;
            font-size: 0.9rem;
            font-weight: 700;
        }

        .student-details dd {
            margin: 0;
            color: #18382a;
            overflow-wrap: anywhere;
        }

        .student-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 28px;
        }

        .student-action,
        .student-delete {
            min-height: 44px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 16px;
            border: 1px solid #dce9df;
            border-radius: 10px;
            background: #fff;
            color: #176b40;
            cursor: pointer;
            font: inherit;
            font-weight: 700;
            text-decoration: none;
        }

        .student-delete {
            border-color: #f1d4d1;
            color: #b42318;
        }

        .student-notice {
            margin-bottom: 20px;
            padding: 14px 16px;
            border: 1px solid #a9ddbb;
            border-radius: 10px;
            background: #effaf2;
            color: #176b40;
        }

        @media (max-width: 480px) {
            .student-page {
                width: min(100% - 32px, 720px);
                padding-block: 32px 48px;
            }

            .student-details div {
                grid-template-columns: 1fr;
                gap: 6px;
            }
        }
    </style>

    <div class="student-page">
        @if (session('success'))
            <div class="student-notice" role="status">{{ session('success') }}</div>
        @endif

        <section class="student-card" aria-labelledby="student-details-title">
            <span class="eyebrow">Student record #{{ $student->id }}</span>
            <h1 id="student-details-title">Student details</h1>
            <p class="student-intro">Review the saved information for this student.</p>

            <dl class="student-details">
                <div>
                    <dt>Student name</dt>
                    <dd>{{ $student->name }}</dd>
                </div>
                <div>
                    <dt>Email address</dt>
                    <dd>{{ $student->email }}</dd>
                </div>
                <div>
                    <dt>Department</dt>
                    <dd>{{ $student->department?->name ?? 'Not assigned' }}</dd>
                </div>
                <div>
                    <dt>Record created</dt>
                    <dd>{{ $student->created_at?->format('F j, Y') ?? 'Not available' }}</dd>
                </div>
            </dl>

            <div class="student-actions">
                <a class="student-action" href="{{ route('students.edit', $student) }}">Edit student</a>
                <a class="student-action" href="{{ route('students.index') }}">Back to students</a>
                <form method="POST" action="{{ route('students.destroy', $student) }}" onsubmit="return confirm('Are you sure you want to delete this student? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button class="student-delete" type="submit">Delete student</button>
                </form>
            </div>
        </section>
    </div>
@endsection
