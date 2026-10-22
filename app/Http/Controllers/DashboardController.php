<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $studentCount = Student::query()->count();
        $latestStudents = Student::query()
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->limit(5)
            ->get();

        return view('home', compact('studentCount', 'latestStudents'));
    }
}
