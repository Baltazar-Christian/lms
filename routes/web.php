<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\admin\QuizController;
use App\Http\Controllers\QuizAnswerController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\ModuleController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\admin\CoursesController;
use App\Http\Controllers\admin\InstituteController;
use App\Http\Controllers\admin\AnnouncementController;
use App\Http\Controllers\tutor\TutorCoursesController;
use App\Http\Controllers\tutor\TutorStudentController;
use App\Http\Controllers\admin\CompanyDetailController;
use App\Http\Controllers\admin\UserManagementController;
use App\Http\Controllers\admin\AdminPasswordResetController;

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
    Route::any('system-admins', [UserManagementController::class, 'systemAdmins'])->name('lms.system-admins');
    Route::any('add-system-admin', [UserManagementController::class, 'addSystemAdmin'])->name('lms.add-system-admin');
    Route::any('save-system-admin', [UserManagementController::class, 'saveSystemAdmin'])->name('lms.save-system-admin');
    Route::any('show-system-admin/{id}', [UserManagementController::class, 'showSystemAdmin'])->name('lms.show-system-admin');
    Route::any('edit-system-admin/{id}', [UserManagementController::class, 'editSystemAdmin'])->name('lms.edit-system-admin');
    Route::any('update-system-admin/{id}', [UserManagementController::class, 'updateSystemAdmin'])->name('lms.update-system-admin');
    Route::any('delete-system-admin/{id}', [UserManagementController::class, 'deleteSystemAdmin'])->name('lms.delete-system-admin');

    //  Tutors routes
    Route::any('tutors', [UserManagementController::class, 'tutors'])->name('lms.tutors');
    Route::any('add-tutor', [UserManagementController::class, 'addTutor'])->name('lms.add-tutor');
    Route::any('save-tutor', [UserManagementController::class, 'saveTutor'])->name('lms.save-tutor');
    Route::any('show-tutor/{id}', [UserManagementController::class, 'showTutor'])->name('lms.show-tutor');
    Route::any('edit-tutor/{id}', [UserManagementController::class, 'editTutor'])->name('lms.edit-tutor');
    Route::any('update-tutor/{id}', [UserManagementController::class, 'updateTutor'])->name('lms.update-tutor');
    Route::any('delete-tutor/{id}', [UserManagementController::class, 'deleteTutor'])->name('lms.delete-tutor');

    //  Students routes
    Route::any('students', [UserManagementController::class, 'students'])->name('lms.students');
    Route::any('add-student', [UserManagementController::class, 'addStudent'])->name('lms.add-student');
    Route::any('save-student', [UserManagementController::class, 'saveStudent'])->name('lms.save-student');
    Route::any('show-student/{id}', [UserManagementController::class, 'showStudent'])->name('lms.show-student');
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
    Route::any('modules', [ModuleController::class, 'index'])->name('lms.modules');
    Route::any('add-module', [ModuleController::class, 'create'])->name('lms.add-module');
    Route::any('save-module', [ModuleController::class, 'store'])->name('lms.save-module');
    Route::any('show-module/{id}', [ModuleController::class, 'show'])->name('lms.show-module');
    Route::any('edit-module/{id}', [ModuleController::class, 'edit'])->name('lms.edit-module');
    Route::any('update-module/{id}', [ModuleController::class, 'update'])->name('lms.update-module');
    Route::any('delete-module/{id}', [ModuleController::class, 'destroy'])->name('lms.delete-module');

    //For Courses
    Route::any('courses', [CourseController::class, 'index'])->name('lms.courses');
    Route::any('draft-courses', [CourseController::class, 'draft'])->name('lms.draft-courses');
    Route::any('add-course', [CourseController::class, 'create'])->name('lms.add-course');
    Route::any('save-course', [CourseController::class, 'store'])->name('lms.save-course');
    Route::any('show-course/{id}', [CourseController::class, 'show'])->name('lms.show-course');
    Route::any('edit-course/{id}', [CourseController::class, 'edit'])->name('lms.edit-course');
    Route::any('update-course/{id}', [CourseController::class, 'update'])->name('lms.update-course');
    Route::any('delete-course/{id}', [CourseController::class, 'destroy'])->name('lms.delete-course');

    // For Course Content
    Route::group(['prefix' => 'courses'], function () {
        Route::get('/{id}/content/create', [CourseController::class, 'createContent'])->name('lms.courses.create-content');
        Route::post('/{id}/content/save', [CourseController::class, 'saveContent'])->name('lms.courses.save-content');
        Route::get('/{courseId}/content/{contentId}/edit', [CourseController::class, 'editContent'])->name('lms.courses.edit-content');
        Route::put('/{courseId}/content/{contentId}/update', [CourseController::class, 'updateContent'])->name('lms.courses.update-content');
        Route::get('/{courseId}/content/{contentId}', [CourseController::class, 'showCourseContent'])->name('lms.show-course-content');
        Route::delete('/{courseId}/content/{contentId}', [CourseController::class, 'deleteCourseContent'])->name('lms.delete-course-content');

        Route::get('/{courseId}/content/{parentId}/create-subsection', [CourseController::class, 'createSubSection'])->name('lms.create-subsection');


        Route::post('/{courseId}/content/{parentId}/create-subsection', [CourseController::class, 'storeSubsection'])->name('lms.create-subsection');
        Route::get('/{courseId}/content/{contentId}/show-subsection', [CourseController::class, 'showSubSection'])->name('lms.show-subsection');

        Route::get('/{courseId}/content/{contentId}/edit-subsection', [CourseController::class, 'editSubSection'])->name('lms.edit-subsection');

        Route::delete('/{courseId}/content/{contentId}/delete-subsection', [CourseController::class, 'deleteSubSection'])->name('lms.delete-subsection');

        // For Courses  Quizes
        Route::get('/{courseId}/create-quiz', [QuizController::class, 'create'])->name('lms.create-quiz');
        Route::post('/{courseId}/save-quiz', [QuizController::class, 'store'])->name('lms.save-quiz');
        Route::get('/{courseId}/quizzes/{quizId}', [QuizController::class, 'show'])->name('lms.show-quiz');
        Route::get('/{courseId}/quizzes/{quizId}/create-question', [QuizController::class, 'createQuestion'])->name('lms.create-question');
        Route::post('/{courseId}/quizzes/{quizId}/store-question', [QuizController::class, 'storeQuestion'])->name('lms.store-question');

        Route::post('/delete/quizzes/{quizId}', [QuizController::class, 'destroy'])->name('lms.delete-quiz');

        Route::get('/{courseId}/quizzes/{quizId}/questions/{questionId}/create-answer', [QuizController::class, 'createAnswer'])->name('lms.create-answer');
        Route::post('/{courseId}/quizzes/{quizId}/questions/{questionId}/store-answer', [QuizController::class, 'storeAnswer'])->name('lms.store-answer');
        // Show a single question's answers
        Route::get('/{course}/quizzes/{quiz}/questions/{question}/answers', [QuizController::class, 'showQuestionAnswers'])->name('lms.show-question');

        // Show a single answer in detail
        Route::get('/{course}/quizzes/{quiz}/questions/{question}/answers/{answer}', [QuizController::class, 'showAnswerDetail'])->name('lms.show-answer');
    });


    Route::get('/quizzes', [QuizController::class, 'index'])->name('lms.quizzes');
    // Route::get('/quizzes/create', [QuizController::class, 'create'])->name('lms.create-quiz');
    Route::post('/quizzes', [QuizController::class, 'store'])->name('lms.store-quiz');
    // Route::get('/quizzes/{quiz}', [QuizController::class, 'show'])->name('lms.show-quiz');
    Route::get('/quizzes/{quiz}/edit', [QuizController::class, 'edit'])->name('lms.edit-quiz');
    Route::put('/quizzes/{quiz}', [QuizController::class, 'update'])->name('lms.update-quiz');
    Route::delete('/quizzes/{quiz}', [QuizController::class, 'destroy'])->name('lms.delete-quiz');


    // For Announcements
    Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::get('/announcements/create', [AnnouncementController::class, 'create'])->name('announcements.create');
    Route::post('/announcements', [AnnouncementController::class, 'store'])->name('announcements.store');
    Route::get('/announcements/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show');
    Route::delete('/announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');
    Route::get('/announcements/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('announcements.edit');
    Route::put('announcements/{announcement}', [AnnouncementController::class, 'update'])->name('announcements.update');


    // For Company Detail
    Route::get('/company_details', [CompanyDetailController::class, 'index'])->name('company_details.index');
    Route::get('/company_details/create', [CompanyDetailController::class, 'create'])->name('company_details.create');
    Route::post('/company_details', [CompanyDetailController::class, 'store'])->name('company_details.store');
    Route::get('/company_details/{id}/edit', [CompanyDetailController::class, 'edit'])->name('company_details.edit');
    Route::put('/company_details/{id}', [CompanyDetailController::class, 'update'])->name('company_details.update');
    Route::delete('/company_details/{id}', [CompanyDetailController::class, 'destroy'])->name('company_details.destroy');

    //For Password Reset
    Route::get('/admin/reset-user-password', [AdminPasswordResetController::class, 'index'])->name('admin.password.index');

    Route::get('/admin/reset-password/{user}', [AdminPasswordResetController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('/admin/reset-password/{user}', [AdminPasswordResetController::class, 'reset'])->name('admin.password.update');
});

Route::group(['middleware' => 'role:tutor'], function () {
    // Tutor routes
    Route::any('tutor-dashboard', [TutorController::class, 'dashboard'])->name('lms.tutor-dashboard');

    // For Students
    Route::any('tutor-students', [TutorStudentController::class, 'students'])->name('lms.tutor-students');
    Route::any('tutor-blacked-students', [TutorStudentController::class, 'blocked_students'])->name('lms.tutor-blocked-students');
    Route::any('tutor-add-student', [TutorStudentController::class, 'addStudent'])->name('lms.tutor-add-student');
    Route::any('tutor-save-student', [TutorStudentController::class, 'saveStudent'])->name('lms.tutor-save-student');
    Route::any('tutor-show-student/{id}', [TutorStudentController::class, 'showStudent'])->name('lms.tutor-show-student');
    Route::any('tutor-edit-student/{id}', [TutorStudentController::class, 'editStudent'])->name('lms.tutor-edit-student');
    Route::any('tutor-block-student/{id}', [TutorStudentController::class, 'blockStudent'])->name('lms.tutor-block-student');
    Route::any('tutor-activate-student/{id}', [TutorStudentController::class, 'activateStudent'])->name('lms.tutor-activate-student');
    Route::any('tutor-update-student/{id}', [TutorStudentController::class, 'updateStudent'])->name('lms.tutor-update-student');
    Route::any('tutor-delete-student/{id}', [TutorStudentController::class, 'deleteStudent'])->name('lms.tutor-delete-student');

    // For Modules
    Route::any('tutor-modules', [ModuleController::class, 'tutor_modules'])->name('lms.tutor-modules');
    Route::any('tutor-view-module/{id}', [TutorCoursesController::class, 'module_courses'])->name('lms.tutor-view-module');

});

Route::group(['middleware' => 'role:student'], function () {
    // Student routes
    Route::any('student-dashboard', [StudentController::class, 'dashboard'])->name('lms.student-dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
