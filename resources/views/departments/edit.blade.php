@extends('layout')

@section('title', 'Edit Department | Student Management System')

@section('content')
    <style>
        .department-page { width: min(720px, calc(100% - 48px)); margin-inline: auto; padding-block: 48px 76px; }
        .department-card { padding: clamp(24px, 5vw, 48px); border: 1px solid #dfebe3; border-radius: 24px; background: #fff; box-shadow: 0 20px 55px rgb(18 61 42 / 9%); }
        .department-card h1 { margin: 12px 0; color: #123d2a; font-size: clamp(2rem, 6vw, 3rem); letter-spacing: -.055em; line-height: 1.1; }
        .department-intro { margin: 0 0 32px; color: #61766a; line-height: 1.7; }
        .department-form { display: grid; gap: 20px; }
        .department-field { display: grid; gap: 8px; }
        .department-field label { color: #18382a; font-size: .95rem; font-weight: 700; }
        .department-field input, .department-field textarea { width: 100%; min-height: 48px; padding: 11px 14px; border: 1px solid #cbdacf; border-radius: 10px; color: #18382a; font: inherit; }
        .department-field textarea { min-height: 120px; resize: vertical; }
        .department-field input:focus, .department-field textarea:focus { border-color: #198754; outline: 3px solid rgb(25 135 84 / 15%); }
        .department-error { color: #b42318; font-size: .9rem; }
        .department-actions { display: flex; flex-wrap: wrap; gap: 10px; }
        .department-submit, .department-cancel { min-height: 48px; display: inline-flex; align-items: center; justify-content: center; padding: 12px 20px; border: 0; border-radius: 10px; background: #123d2a; color: #fff; cursor: pointer; font: inherit; font-weight: 700; text-decoration: none; }
        .department-submit:hover { background: #0b2b1d; }
        .department-cancel { border: 1px solid #dce9df; background: #fff; color: #176b40; }
        @media (max-width: 480px) { .department-page { width: min(100% - 32px, 720px); padding-block: 32px 48px; } }
    </style>

    <div class="department-page">
        <section class="department-card" aria-labelledby="department-form-title">
            <span class="eyebrow">Department #{{ $department->id }}</span>
            <h1 id="department-form-title">Edit department</h1>
            <p class="department-intro">Update the department name, code, or description.</p>

            <form class="department-form" method="POST" action="{{ route('departments.update', $department) }}">
                @csrf
                @method('PUT')
                <div class="department-field">
                    <label for="name">Department name</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $department->name) }}" maxlength="255" required @if ($errors->has('name')) aria-invalid="true" aria-describedby="name-error" @endif>
                    @error('name') <span class="department-error" id="name-error">{{ $message }}</span> @enderror
                </div>
                <div class="department-field">
                    <label for="code">Department code</label>
                    <input id="code" name="code" type="text" value="{{ old('code', $department->code) }}" maxlength="20" required @if ($errors->has('code')) aria-invalid="true" aria-describedby="code-error" @endif>
                    @error('code') <span class="department-error" id="code-error">{{ $message }}</span> @enderror
                </div>
                <div class="department-field">
                    <label for="description">Description <span>(optional)</span></label>
                    <textarea id="description" name="description" maxlength="1000" @if ($errors->has('description')) aria-invalid="true" aria-describedby="description-error" @endif>{{ old('description', $department->description) }}</textarea>
                    @error('description') <span class="department-error" id="description-error">{{ $message }}</span> @enderror
                </div>
                <div class="department-actions">
                    <button class="department-submit" type="submit">Save Changes</button>
                    <a class="department-cancel" href="{{ route('departments.show', $department) }}">Cancel</a>
                </div>
            </form>
        </section>
    </div>
@endsection
