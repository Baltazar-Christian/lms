<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\ModuleController;
use App\Http\Controllers\admin\CoursesController;
use App\Http\Controllers\admin\InstituteController;
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
    Route::any('tutors', [UserManagementController::class, 'tutors'])->name('lms.tutors');
    Route::any('add-tutor', [UserManagementController::class, 'addTutor'])->name('lms.add-tutor');
    Route::any('save-tutor', [UserManagementController::class,'saveTutor'])->name('lms.save-tutor');
    Route::any('show-tutor/{id}', [UserManagementController::class,'showTutor'])->name('lms.show-tutor');
    Route::any('edit-tutor/{id}', [UserManagementController::class, 'editTutor'])->name('lms.edit-tutor');
    Route::any('update-tutor/{id}', [UserManagementController::class, 'updateTutor'])->name('lms.update-tutor');
    Route::any('delete-tutor/{id}', [UserManagementController::class, 'deleteTutor'])->name('lms.delete-tutor');

    //  Students routes
    Route::any('students', [UserManagementController::class,'students'])->name('lms.students');
    Route::any('add-student', [UserManagementController::class, 'addStudent'])->name('lms.add-student');
    Route::any('save-student', [UserManagementController::class,'saveStudent'])->name('lms.save-student');
    Route::any('show-student/{id}', [UserManagementController::class,'showStudent'])->name('lms.show-student');
    Route::any('edit-student/{id}', [UserManagementController::class, 'editStudent'])->name('lms.edit-student');
    Route::any('update-student/{id}', [UserManagementController::class, 'updateStudent'])->name('lms.update-student');
    Route::any('delete-student/{id}', [UserManagementController::class, 'deleteStudent'])->name('lms.delete-student');


    // For Institutes

    // Index Page - List of Institutes
    Route::get('/institutes', [InstituteController::class, 'index'])->name('institutes.index');
    // Create Institute Form
    Route::get('/institutes/create', [InstituteController::class, 'create'])->name('institutes.create');
    Route::post('/institutes', [InstituteController::class, 'store'])->name('institutes.store');
    // Edit Institute Form
    Route::get('/institutes/{id}/edit', [InstituteController::class, 'edit'])->name('institutes.edit');
    Route::put('/institutes/{id}', [InstituteController::class, 'update'])->name('institutes.update');
    // Delete Institute
    Route::delete('/institutes/{id}', [InstituteController::class, 'destroy'])->name('institutes.destroy');
    // For Show Institute Details
    Route::get('/institutes/{id}', [InstituteController::class, 'show'])->name('institutes.show');

    //For Modules
    Route::any('modules', [ModuleController::class,'index'])->name('lms.modules');
    Route::any('add-module', [ModuleController::class, 'create'])->name('lms.add-module');
    Route::any('save-module', [ModuleController::class,'store'])->name('lms.save-module');
    Route::any('show-module/{id}', [ModuleController::class,'show'])->name('lms.show-module');
    Route::any('edit-module/{id}', [ModuleController::class, 'edit'])->name('lms.edit-module');
    Route::any('update-module/{id}', [ModuleController::class, 'update'])->name('lms.update-module');
    Route::any('delete-module/{id}', [ModuleController::class, 'destroy'])->name('lms.delete-module');

    //For Courses
    Route::any('courses', [CourseController::class,'index'])->name('lms.courses');
    Route::any('add-course', [CourseController::class, 'create'])->name('lms.add-course');
    Route::any('save-course', [CourseController::class,'store'])->name('lms.save-course');
    Route::any('show-course/{id}', [CourseController::class,'show'])->name('lms.show-course');
    Route::any('edit-course/{id}', [CourseController::class, 'edit'])->name('lms.edit-course');
    Route::any('update-course/{id}', [CourseController::class, 'update'])->name('lms.update-course');
    Route::any('delete-course/{id}', [CourseController::class, 'destroy'])->name('lms.delete-course');



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
