<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClearanceController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\StudentLoginController;
use App\Http\Controllers\DepartmentDashboardController;
use App\Http\Controllers\DepartmentLoginController;

Route::get('/', function () {
    return view('index');
});

Route::get('/student_dashboard', function () {
    return view('student_dashboard');
})->middleware('auth');


// Display login form
Route::get('/login', function () {
    return view('login');  // Loads the login Blade view
})->name('login');

// Handle login form submission
Route::post('/login', [App\Http\Controllers\StudentLoginController::class, 'login']);


Route::post('/logout', [StudentLoginController::class, 'logout'])->name('logout');


Route::put('/users/{id}/update-password', [StudentLoginController::class, 'updatePassword']);


Route::get('/student_dashboard', function () {
    return view('student_dashboard');
})->middleware('auth');


Route::post('/create-clearance-request', [ClearanceController::class, 'createClearanceRequest'])->name('create-clearance-request');

//login route for studentt
Route::get('/student_dashboard', [StudentDashboardController::class, 'studentDashboard'])->name('student_dashboard');

//login route for department
Route::post('/department/login', [DepartmentLoginController::class, 'login'])->name('department.login');
Route::get('/department_dashboard', [DepartmentDashboardController::class, 'departmentDashboard'])->name('department.dashboard');


Route::get('/department_dashboard', [DepartmentDashboardController::class, 'departmentstats'])->name('department.dashboard');

