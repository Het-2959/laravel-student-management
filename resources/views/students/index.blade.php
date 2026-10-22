@extends('layout')

@section('title', 'Students | Student Management System')

@section('content')
    <style>
        .student-page {
            width: min(960px, calc(100% - 48px));
            margin-inline: auto;
            padding-block: 48px 76px;
        }

        .student-heading {
            display: flex;
            flex-wrap: wrap;
            align-items: end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 28px;
        }

        .student-heading h1 {
            margin: 12px 0 0;
            color: #123d2a;
            font-size: clamp(2rem, 6vw, 3rem);
            letter-spacing: -0.055em;
            line-height: 1.1;
        }

        .student-add-link {
            display: inline-flex;
            min-height: 46px;
            align-items: center;
            justify-content: center;
            padding: 11px 18px;
            border-radius: 10px;
            background: #123d2a;
            color: #fff;
            font-weight: 700;
            text-decoration: none;
        }

        .student-add-link:hover {
            background: #0b2b1d;
        }

        .student-notice {
            margin-bottom: 20px;
            padding: 14px 16px;
            border: 1px solid #a9ddbb;
            border-radius: 10px;
            background: #effaf2;
            color: #176b40;
        }

        .student-table-wrap {
            overflow-x: auto;
            border: 1px solid #dfebe3;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 20px 55px rgb(18 61 42 / 9%);
        }

        .student-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .student-table th,
        .student-table td {
            padding: 16px 20px;
            border-bottom: 1px solid #dfebe3;
        }

        .student-table th {
            background: #f4faf6;
            color: #123d2a;
            font-size: 0.85rem;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .student-table tbody tr:last-child td {
            border-bottom: 0;
        }

        .student-empty {
            padding: 32px 20px;
            color: #61766a;
            text-align: center;
        }

        .student-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .student-actions a,
        .student-actions button {
            padding: 7px 10px;
            border: 1px solid #dce9df;
            border-radius: 8px;
            background: #fff;
            color: #176b40;
            cursor: pointer;
            font: inherit;
            font-size: 0.82rem;
            font-weight: 700;
            text-decoration: none;
        }

        .student-actions button {
            border-color: #f1d4d1;
            color: #b42318;
        }

        @media (max-width: 480px) {
            .student-page {
                width: min(100% - 32px, 960px);
                padding-block: 32px 48px;
            }
        }
    </style>

    <div class="student-page">
        <div class="student-heading">
            <div>
                <span class="eyebrow">Student records</span>
                <h1>Students</h1>
            </div>
            <a class="student-add-link" href="{{ route('students.create') }}">Add a student</a>
        </div>

        @if (session('success'))
            <div class="student-notice" role="status">{{ session('success') }}</div>
        @endif

        <div class="student-table-wrap">
            <table class="student-table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                <div class="student-actions">
                                    <a href="{{ route('students.show', $student) }}">View</a>
                                    <a href="{{ route('students.edit', $student) }}">Edit</a>
                                    <form method="POST" action="{{ route('students.destroy', $student) }}" onsubmit="return confirm('Are you sure you want to delete this student? This action cannot be undone.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="student-empty" colspan="4">No students have been added yet. Add one to get started.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
