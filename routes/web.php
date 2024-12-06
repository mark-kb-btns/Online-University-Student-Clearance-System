<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClearanceController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\StudentLoginController;
use App\Http\Controllers\DepartmentDashboardController;
use App\Http\Controllers\DepartmentLoginController;
use App\Http\Controllers\ClearanceAdminLoginController;
use App\Http\Controllers\ClearanceAdminDashboardController;
use App\Http\Controllers\StudentInfoController;
use App\Http\Controllers\ClearanceAdminAuditController;
use App\Http\Controllers\ClearanceAdminSettingsController;
use App\Http\Controllers\ClearanceRequestController;
use App\Http\Controllers\DepartmentCheckController;
use App\Http\Controllers\RegistrarCheckController;
use App\Http\Controllers\ClearanceStatusController;

Route::get('/', function () {
    return view('index');
});

Route::get('/student_dashboard', function () {
    return view('student_dashboard');
})->middleware('auth');


// Display login form (each role)
Route::get('/login', function () {
    return view('login');  // Loads the login Blade view
})->name('login');

//login route for student
Route::post('/login', [App\Http\Controllers\StudentLoginController::class, 'login']);

//Handle logout
Route::post('/logout', [StudentLoginController::class, 'logout'])->name('logout');

//Route::put('/users/{id}/update-password', [StudentLoginController::class, 'updatePassword']);

Route::post('/create-clearance-request', [ClearanceController::class, 'createClearanceRequest'])->name('create-clearance-request');

Route::post('/upload-clearance-file', [ClearanceController::class, 'uploadClearanceFile'])->name('upload.clearance.file');

//redirect login route to studentt dashbaord
Route::get('/student_dashboard', [StudentDashboardController::class, 'studentDashboard'])->name('student_dashboard');

Route::get('/get-clearance-status/{clearance_id}', [StudentDashboardController::class, 'getStatus']);



//login route for department
Route::post('/department/login', [DepartmentLoginController::class, 'department_login'])->name('department.login');
//Route::get('/department_dashboard', [DepartmentDashboardController::class, 'departmentDashboard'])->name('department.dashboard');

//redirect route for department dashboard
Route::get('/department_dashboard', [DepartmentDashboardController::class, 'departmentstats'])->name('department.dashboard');

//login route for clearance admin
Route::post('/clearance_admin_login', [ClearanceAdminLoginController::class, 'clearanceadmin_login'])->name('clearanceadmin.login');

Route::get('/clearance_admin_dashboard', [ClearanceAdminDashboardController::class, 'index'])->name('clearance_admin_dashboard');


//Ensure only authorized users can access the admin dashboard:
/*Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('clearance_admin_dashboard', [ClearanceAdminDashboardController::class, 'index'])->name('clearanceadmin.dashboard');
});*/


// Route for displaying the dashboard
Route::get('/clearance-admin-dashboard/{id}', [ClearanceAdminDashboardController::class, 'index'])->name('clearance_admin_dashboard');


// Route for updating student's information
Route::put('/students/{id}', [ClearanceAdminDashboardController::class, 'update'])->name('students.update');

Route::get('/clearance_admin_manager', [ClearanceAdminDashboardController::class, 'gettable'])->name('clearance.admin.manager');

Route::post("/clearance_admin_manager", [ClearanceAdminDashboardController::class, 'register'])->name('students.store');


Route::get('/audit-logs', [ClearanceAdminAuditController::class, 'index'])->name('audit.logs');



//Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/clearance_admin_settings', [ClearanceAdminSettingsController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/create', [ClearanceAdminSettingsController::class, 'create'])->name('admin.users.create');
    Route::post('admin/users', [ClearanceAdminSettingsController::class, 'store'])->name('admin.users.store');
    Route::get('admin/users/{id}/edit', [ClearanceAdminSettingsController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{id}', [ClearanceAdminSettingsController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/users/{id}', [ClearanceAdminSettingsController::class, 'destroy'])->name('admin.users.destroy');
//});

//Route::get('/department_dashboard', [DepartmentDashboardController::class, 'index'])->name('department.dashboard');


Route::post('/clearance-requests', [ClearanceRequestController::class, 'store']);
Route::get('/clearance-requests/{id}', [ClearanceRequestController::class, 'show']);

Route::post('/department-checks/{clearance_id}', [DepartmentCheckController::class, 'store'])->name('clearance-hold.update');
Route::post('/department-checks/update/{check_id}', [DepartmentCheckController::class, 'updateStatus']);

Route::post('/registrar-checks/{clearance_id}', [RegistrarCheckController::class, 'store'])->name('clearance-status.update');

Route::post('/clearance-status/update/{student_id}', [ClearanceStatusController::class, 'updateStatus']);
