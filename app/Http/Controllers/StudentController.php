<?php
namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->input('search');
        $departmentId = $request->input('department_id');

        $students = Student::with('department')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->when($departmentId, function ($query, $departmentId) {
                $query->where('department_id', $departmentId);
            })
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();

        $departments = Department::orderBy('name')->get();

        return view('students.index', compact(
            'students',
            'departments',
            'search',
            'departmentId'
        ));
    }

    public function create(): View
    {
        $departments = Department::orderBy('name')->get();

        return view('students.create', compact('departments'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:students,email'],
            'department_id' => [
                'nullable',
                'integer',
                'exists:departments,id',
            ],
        ]);

        Student::create($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student added successfully.');
    }

    public function show(Student $student): View
    {
        $student->load('department');

        return view('students.show', compact('student'));
    }

    public function edit(Student $student): View
    {
        $departments = Department::orderBy('name')->get();

        return view('students.edit', compact('student', 'departments'));
    }

    public function update(Request $request, Student $student): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('students', 'email')->ignore($student->id),
            ],
            'department_id' => [
                'nullable',
                'integer',
                'exists:departments,id',
            ],
        ]);

        $student->update($validated);

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
