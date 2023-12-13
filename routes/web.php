<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\admin\UserManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'role:admin'], function () {
    // Admin routes
    Route::any('admin-dashboard', [AdminController::class, 'dashboard'])->name('lms.admin-dashboard');


    //  System Admins routes
    Route::any('system-admins', [UserManagementController::class,'systemAdmins'])->name('lms.system-admins');
    Route::any('add-system-admin', [UserManagementController::class, 'addSystemAdmin'])->name('lms.add-system-admin');
    Route::any('save-system-admin', [UserManagementController::class, 'saveSystemAdmin'])->name('lms.save-system-admin');
    Route::any('show-system-admin/{id}', [UserManagementController::class, 'showSystemAdmin'])->name('lms.show-system-admin');
    Route::any('edit-system-admin/{id}', [UserManagementController::class, 'editSystemAdmin'])->name('lms.edit-system-admin');
    Route::any('update-system-admin/{id}', [UserManagementController::class, 'updateSystemAdmin'])->name('lms.update-system-admin');
    Route::any('delete-system-admin/{id}', [UserManagementController::class, 'deleteSystemAdmin'])->name('lms.delete-system-admin');

    //  Teachers routes
    Route::any('teachers', [AdminController::class, 'teachers'])->name('lms.teachers');
    Route::any('add-teacher', [AdminController::class, 'addTeacher'])->name('lms.add-teacher');

});

Route::group(['middleware' => 'role:tutor'], function () {
    // Tutor routes
    Route::any('tutor-dashboard', [TutorController::class, 'dashboard'])->name('lms.tutor-dashboard');

});

Route::group(['middleware' => 'role:student'], function () {
    // Student routes
    Route::any('student-dashboard', [StudentController::class, 'dashboard'])->name('lms.student-dashboard');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
