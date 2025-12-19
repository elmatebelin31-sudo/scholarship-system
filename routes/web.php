<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;

// ---------------------------------
// Homepage
// ---------------------------------
Route::get('/', function () {
    return view('welcome');
});

// ---------------------------------
// Resources
// ---------------------------------
Route::resource('students', StudentController::class);
Route::resource('scholarships', ScholarshipController::class);
Route::resource('applications', ApplicationController::class);

// ---------------------------------
// Student Auth
// ---------------------------------
Route::prefix('student')->group(function () {
    Route::get('login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
    Route::post('login', [StudentAuthController::class, 'login'])->name('student.login.submit');
    Route::get('register', [StudentAuthController::class, 'showRegisterForm'])->name('student.register');
    Route::post('register', [StudentAuthController::class, 'register'])->name('student.register.submit');
    Route::post('logout', [StudentAuthController::class, 'logout'])->name('student.logout');

    Route::middleware(['auth', 'student'])->group(function () {
        Route::get('home', function () {
            return view('welcome');
        })->name('student.home');
    });
});

// ---------------------------------
// Admin Auth + Admin Panel
// ---------------------------------
Route::prefix('admin')->group(function () {
    // Admin login/logout
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Protected admin routes
    Route::middleware(['auth', 'admin'])->group(function () {
        // Admin dashboard
        Route::get('home', function () {
            return view('welcome'); // Replace with admin dashboard view if you want
        })->name('admin.home');

        // Admin creation
        Route::get('create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('store', [AdminController::class, 'store'])->name('admin.store');

        // Application approval
        Route::get('applications', [AdminController::class, 'index'])->name('admin.applications');
        Route::post('applications/{application}/approve', [AdminController::class, 'approve'])->name('admin.applications.approve');
        Route::post('applications/{application}/reject', [AdminController::class, 'reject'])->name('admin.applications.reject');
    });
    Route::get('/admin/applications', [ApplicationController::class, 'index'])->name('admin.applications.index');
    Route::get('/admin/applications/{application}', [ApplicationController::class, 'show']
)->name('applications.show');

});

