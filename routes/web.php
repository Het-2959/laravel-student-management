<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Login and registration routes for guests
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.submit');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.submit');
});

// Logout route for authenticated users
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Public pages
Route::get('/', [DashboardController::class, 'index'])
    ->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Protected CRUD modules
Route::resource('students', StudentController::class)
    ->middleware('auth');

Route::resource('departments', DepartmentController::class)
    ->middleware('auth');
