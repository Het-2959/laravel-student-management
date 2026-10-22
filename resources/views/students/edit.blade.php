@extends('layout')

@section('title', 'Edit Student | Student Management System')

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
            margin: 0 0 32px;
            color: #61766a;
            line-height: 1.7;
        }

        .student-form {
            display: grid;
            gap: 20px;
        }

        .student-field {
            display: grid;
            gap: 8px;
        }

        .student-field label {
            color: #18382a;
            font-size: 0.95rem;
            font-weight: 700;
        }

        .student-field input {
            width: 100%;
            min-height: 48px;
            padding: 11px 14px;
            border: 1px solid #cbdacf;
            border-radius: 10px;
            color: #18382a;
            font: inherit;
        }

        .student-field input:focus {
            border-color: #198754;
            outline: 3px solid rgb(25 135 84 / 15%);
        }

        .student-error {
            color: #b42318;
            font-size: 0.9rem;
        }

        .student-form-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .student-submit,
        .student-cancel {
            min-height: 48px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border: 0;
            border-radius: 10px;
            background: #123d2a;
            color: #fff;
            cursor: pointer;
            font: inherit;
            font-weight: 700;
            text-decoration: none;
        }

        .student-submit:hover {
            background: #0b2b1d;
        }

        .student-cancel {
            border: 1px solid #dce9df;
            background: #fff;
            color: #176b40;
        }

        @media (max-width: 480px) {
            .student-page {
                width: min(100% - 32px, 720px);
                padding-block: 32px 48px;
            }
        }
    </style>

    <div class="student-page">
        <section class="student-card" aria-labelledby="student-form-title">
            <span class="eyebrow">Student record #{{ $student->id }}</span>
            <h1 id="student-form-title">Edit student</h1>
            <p class="student-intro">Update the student's name or email address.</p>

            <form class="student-form" method="POST" action="{{ route('students.update', $student) }}">
                @csrf
                @method('PUT')

                <div class="student-field">
                    <label for="name">Student Name</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name', $student->name) }}"
                        autocomplete="name"
                        maxlength="255"
                        required
                        @if ($errors->has('name')) aria-invalid="true" aria-describedby="name-error" @endif
                    >
                    @error('name')
                        <span class="student-error" id="name-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="student-field">
                    <label for="email">Student Email</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email', $student->email) }}"
                        autocomplete="email"
                        maxlength="255"
                        required
                        @if ($errors->has('email')) aria-invalid="true" aria-describedby="email-error" @endif
                    >
                    @error('email')
                        <span class="student-error" id="email-error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="student-form-actions">
                    <button class="student-submit" type="submit">Save Changes</button>
                    <a class="student-cancel" href="{{ route('students.show', $student) }}">Cancel</a>
                </div>
            </form>
        </section>
    </div>
@endsection
