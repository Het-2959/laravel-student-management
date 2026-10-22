@extends('layout')

@section('title', 'Department Details | Student Management System')

@section('content')
    <style>
        .department-page { width: min(840px, calc(100% - 48px)); margin-inline: auto; padding-block: 48px 76px; }
        .department-card { padding: clamp(24px, 5vw, 48px); border: 1px solid #dfebe3; border-radius: 24px; background: #fff; box-shadow: 0 20px 55px rgb(18 61 42 / 9%); }
        .department-card h1 { margin: 12px 0; color: #123d2a; font-size: clamp(2rem, 6vw, 3rem); letter-spacing: -.055em; line-height: 1.1; }
        .department-intro { margin: 0 0 28px; color: #61766a; line-height: 1.7; }
        .department-details { display: grid; margin: 0; border-top: 1px solid #dfebe3; }
        .department-details div { display: grid; grid-template-columns: minmax(130px, .4fr) 1fr; gap: 18px; padding: 16px 0; border-bottom: 1px solid #dfebe3; }
        .department-details dt { color: #61766a; font-size: .9rem; font-weight: 700; }
        .department-details dd { margin: 0; color: #18382a; overflow-wrap: anywhere; }
        .department-students { margin-top: 32px; }
        .department-students h2 { margin: 0 0 14px; color: #123d2a; font-size: 1.25rem; }
        .department-student-list { margin: 0; padding: 0; list-style: none; }
        .department-student-list li { display: flex; flex-wrap: wrap; justify-content: space-between; gap: 8px 18px; padding: 13px 0; border-top: 1px solid #dfebe3; }
        .department-student-list a { color: #176b40; font-weight: 700; }
        .department-actions { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 28px; }
        .department-action, .department-delete { min-height: 44px; display: inline-flex; align-items: center; justify-content: center; padding: 10px 16px; border: 1px solid #dce9df; border-radius: 10px; background: #fff; color: #176b40; cursor: pointer; font: inherit; font-weight: 700; text-decoration: none; }
        .department-delete { border-color: #f1d4d1; color: #b42318; }
        @media (max-width: 480px) { .department-page { width: min(100% - 32px, 840px); padding-block: 32px 48px; } .department-details div { grid-template-columns: 1fr; gap: 6px; } }
    </style>

    <div class="department-page">
        <section class="department-card" aria-labelledby="department-details-title">
            <span class="eyebrow">Department #{{ $department->id }}</span>
            <h1 id="department-details-title">{{ $department->name }}</h1>
            <p class="department-intro">Department details and its associated students.</p>

            <dl class="department-details">
                <div><dt>Department code</dt><dd>{{ $department->code }}</dd></div>
                <div><dt>Description</dt><dd>{{ $department->description ?: 'No description provided.' }}</dd></div>
                <div><dt>Students</dt><dd>{{ $department->students->count() }}</dd></div>
                <div><dt>Created</dt><dd>{{ $department->created_at?->format('F j, Y') ?? 'Not available' }}</dd></div>
            </dl>

            <section class="department-students" aria-labelledby="department-students-title">
                <h2 id="department-students-title">Related students</h2>
                <ul class="department-student-list">
                    @forelse ($department->students as $student)
                        <li>
                            <span>{{ $student->name }} <span>({{ $student->email }})</span></span>
                            <a href="{{ route('students.show', $student) }}">View student</a>
                        </li>
                    @empty
                        <li>No students are assigned to this department.</li>
                    @endforelse
                </ul>
            </section>

            <div class="department-actions">
                <a class="department-action" href="{{ route('departments.edit', $department) }}">Edit department</a>
                <a class="department-action" href="{{ route('departments.index') }}">Back to departments</a>
                <form method="POST" action="{{ route('departments.destroy', $department) }}" onsubmit="return confirm('Delete this department? Existing students will remain and become unassigned.')">
                    @csrf
                    @method('DELETE')
                    <button class="department-delete" type="submit">Delete department</button>
                </form>
            </div>
        </section>
    </div>
@endsection
