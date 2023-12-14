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

    //  Tutors routes
    Route::any('tutors', [AdminController::class, 'tutors'])->name('lms.tutors');
    Route::any('add-tutor', [AdminController::class, 'addTutor'])->name('lms.add-tutor');
    Route::any('save-tutor', [AdminController::class,'saveTutor'])->name('lms.save-tutor');
    Route::any('show-tutor/{id}', [AdminController::class,'showTutor'])->name('lms.show-tutor');
    Route::any('edit-tutor/{id}', [AdminController::class, 'editTutor'])->name('lms.edit-tutor');
    Route::any('update-tutor/{id}', [AdminController::class, 'updateTutor'])->name('lms.update-tutor');
    Route::any('delete-tutor/{id}', [AdminController::class, 'deleteTutor'])->name('lms.delete-tutor');

    //  Students routes
    Route::any('students', [AdminController::class,'students'])->name('lms.students');
    Route::any('add-student', [AdminController::class, 'addStudent'])->name('lms.add-student');
    Route::any('save-student', [AdminController::class,'saveStudent'])->name('lms.save-student');
    Route::any('show-student/{id}', [AdminController::class,'showStudent'])->name('lms.show-student');
    Route::any('edit-student/{id}', [AdminController::class, 'editStudent'])->name('lms.edit-student');
    Route::any('update-student/{id}', [AdminController::class, 'updateStudent'])->name('lms.update-student');
    Route::any('delete-student/{id}', [AdminController::class, 'deleteStudent'])->name('lms.delete-student');

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
