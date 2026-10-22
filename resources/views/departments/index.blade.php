@extends('layout')

@section('title', 'Departments | Student Management System')

@section('content')
    <style>
        .department-page { width: min(960px, calc(100% - 48px)); margin-inline: auto; padding-block: 48px 76px; }
        .department-heading { display: flex; flex-wrap: wrap; align-items: end; justify-content: space-between; gap: 20px; margin-bottom: 28px; }
        .department-heading h1 { margin: 12px 0 0; color: #123d2a; font-size: clamp(2rem, 6vw, 3rem); letter-spacing: -.055em; line-height: 1.1; }
        .department-button { min-height: 44px; display: inline-flex; align-items: center; justify-content: center; padding: 10px 16px; border: 0; border-radius: 10px; background: #123d2a; color: #fff; cursor: pointer; font: inherit; font-weight: 700; text-decoration: none; }
        .department-button:hover { background: #0b2b1d; }
        .department-notice { margin-bottom: 20px; padding: 14px 16px; border: 1px solid #a9ddbb; border-radius: 10px; background: #effaf2; color: #176b40; }
        .department-search { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 20px; }
        .department-search label { align-self: center; color: #61766a; font-weight: 700; }
        .department-search input { min-height: 44px; flex: 1 1 240px; padding: 10px 14px; border: 1px solid #cbdacf; border-radius: 10px; font: inherit; }
        .department-table-wrap { overflow-x: auto; border: 1px solid #dfebe3; border-radius: 16px; background: #fff; box-shadow: 0 20px 55px rgb(18 61 42 / 9%); }
        .department-table { width: 100%; border-collapse: collapse; text-align: left; }
        .department-table th, .department-table td { padding: 16px 20px; border-bottom: 1px solid #dfebe3; vertical-align: top; }
        .department-table th { background: #f4faf6; color: #123d2a; font-size: .85rem; letter-spacing: .04em; text-transform: uppercase; }
        .department-table tbody tr:last-child td { border-bottom: 0; }
        .department-actions { display: flex; flex-wrap: wrap; align-items: center; gap: 8px; }
        .department-actions a, .department-actions button { padding: 7px 10px; border: 1px solid #dce9df; border-radius: 8px; background: #fff; color: #176b40; cursor: pointer; font: inherit; font-size: .82rem; font-weight: 700; text-decoration: none; }
        .department-actions button { border-color: #f1d4d1; color: #b42318; }
        .department-empty { padding: 32px 20px; color: #61766a; text-align: center; }
        .department-pagination { margin-top: 20px; }
        @media (max-width: 480px) { .department-page { width: min(100% - 32px, 960px); padding-block: 32px 48px; } }
    </style>

    <div class="department-page">
        <div class="department-heading">
            <div>
                <span class="eyebrow">Academic structure</span>
                <h1>Departments</h1>
            </div>
            <a class="department-button" href="{{ route('departments.create') }}">Add a department</a>
        </div>

        @if (session('success'))
            <div class="department-notice" role="status">{{ session('success') }}</div>
        @endif

        <form class="department-search" method="GET" action="{{ route('departments.index') }}" role="search">
            <label for="department-search">Search</label>
            <input id="department-search" name="search" type="search" value="{{ $search }}" placeholder="Search by department name or code">
            <button class="department-button" type="submit">Search</button>
            @if ($search !== '')
                <a class="department-button" href="{{ route('departments.index') }}">Clear</a>
            @endif
        </form>

        <div class="department-table-wrap">
            <table class="department-table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                        <th scope="col">Students</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($departments as $department)
                        <tr>
                            <td>{{ $department->name }}</td>
                            <td>{{ $department->code }}</td>
                            <td>{{ $department->students_count }}</td>
                            <td>
                                <div class="department-actions">
                                    <a href="{{ route('departments.show', $department) }}">View</a>
                                    <a href="{{ route('departments.edit', $department) }}">Edit</a>
                                    <form method="POST" action="{{ route('departments.destroy', $department) }}" onsubmit="return confirm('Delete this department? Existing students will remain and become unassigned.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="department-empty" colspan="4">
                                {{ $search !== '' ? 'No departments matched your search.' : 'No departments have been added yet.' }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($departments->hasPages())
            <div class="department-pagination">{{ $departments->links() }}</div>
        @endif
    </div>
@endsection
