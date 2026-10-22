<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $hasStudentsTable = Schema::hasTable('students');
        $hasDepartmentsTable = Schema::hasTable('departments');
        $hasDepartmentColumn = $hasStudentsTable && Schema::hasColumn('students', 'department_id');

        $studentCount = $hasStudentsTable ? Student::query()->count() : 0;
        $departmentCount = $hasDepartmentsTable ? Department::query()->count() : 0;
        $unassignedStudentCount = $hasStudentsTable
            ? ($hasDepartmentColumn
                ? Student::query()->whereNull('department_id')->count()
                : $studentCount)
            : 0;
        $departmentStudentCounts = $hasDepartmentsTable
            ? ($hasStudentsTable
                ? Department::query()->withCount('students')->orderBy('name')->get()
                : Department::query()->orderBy('name')->get()->each(
                    fn (Department $department) => $department->setAttribute('students_count', 0)
                ))
            : collect();
        $latestStudents = $hasStudentsTable
            ? Student::query()
                ->orderByDesc('created_at')
                ->orderByDesc('id')
                ->limit(5)
                ->get()
            : collect();

        return view('home', compact(
            'studentCount',
            'departmentCount',
            'unassignedStudentCount',
            'departmentStudentCounts',
            'latestStudents'
        ));
    }
}
