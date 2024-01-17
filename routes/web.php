<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\admin\QuizController;
use App\Http\Controllers\QuizAnswerController;
use App\Http\Controllers\QuizResultController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\ModuleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\admin\CoursesController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\admin\InstituteController;
use App\Http\Controllers\tutor\TutorQuizController;
use App\Http\Controllers\admin\AnnouncementController;
use App\Http\Controllers\tutor\TutorCoursesController;
use App\Http\Controllers\tutor\TutorStudentController;
use App\Http\Controllers\admin\CompanyDetailController;
use App\Http\Controllers\support\SupportQuizController;
use App\Http\Controllers\admin\UserManagementController;
use App\Http\Controllers\support\SupportCourseController;
use App\Http\Controllers\support\SupportModuleController;
use App\Http\Controllers\admin\AdminPasswordResetController;
use App\Http\Controllers\support\SupportAnnouncementController;
use App\Http\Controllers\support\SupportCompanyDetailController;
use App\Http\Controllers\support\SupportPasswordResetController;
use App\Http\Controllers\support\SupportUserManagementController;

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
Route::any('about-us', [HomeController::class, 'about'])->name('about-us');
Route::any('contact-us', [HomeController::class, 'contact'])->name('contact-us');

Route::post('/update-profile', [ProfileController::class, 'updateProfile'])->name('updateProfile');
Route::post('/change-password', [ProfileController::class, 'changePassword'])->name('changePassword');


Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgotPasswordForm');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendPasswordResetLink'])->name('sendPasswordResetLink');

Route::group(['middleware' => 'role:admin'], function () {
    // Admin routes
    Route::any('admin-dashboard', [AdminController::class, 'dashboard'])->name('lms.admin-dashboard');
    Route::any('admin-profile', [AdminController::class, 'profile'])->name('lms.admin-profile');

    Route::any('admin-mode', [AdminController::class, 'mode'])->name('lms.change-mode');


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

    // For Inactive Institute
    Route::get('/inactive-institutes', [InstituteController::class, 'inactive'])->name('institutes.inactive');

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
        Route::any('update-course/{courseId}/content/{contentId}/update', [CourseController::class, 'updateContent'])->name('lms.courses.update-content');
        Route::get('/{courseId}/content/{contentId}', [CourseController::class, 'showCourseContent'])->name('lms.show-course-content');
        Route::delete('/{courseId}/content/{contentId}', [CourseController::class, 'deleteCourseContent'])->name('lms.delete-course-content');

        Route::get('/{courseId}/content/{parentId}/create-subsection', [CourseController::class, 'createSubSection'])->name('lms.create-subsection');


        Route::post('/{courseId}/content/{parentId}/create-subsection', [CourseController::class, 'storeSubsection'])->name('lms.create-subsection');
        Route::get('/{courseId}/content/{contentId}/show-subsection', [CourseController::class, 'showSubSection'])->name('lms.show-subsection');

        Route::get('/{courseId}/content/{contentId}/edit-subsection', [CourseController::class, 'editSubSection'])->name('lms.edit-subsection');

        Route::delete('/{courseId}/content/{contentId}/delete-subsection', [CourseController::class, 'deleteSubSection'])->name('lms.delete-subsection');

        Route::post('/{courseId}/enrollments/{studentId}/approve', [CourseController::class, 'approve'])->name('lms.approve-enrollment');
        Route::post('/{courseId}/enrollments/{studentId}/reject', [CourseController::class, 'reject'])->name('lms.reject-enrollment');

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
    Route::post('/quizzes', [QuizController::class, 'store'])->name('lms.store-quiz');
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



// start of support
Route::group(['middleware' => 'role:support'], function () {
    // Admin routes
    Route::any('support-dashboard', [SupportController::class, 'dashboard'])->name('lms.support-dashboard');
    Route::any('support-profile', [SupportController::class, 'profile'])->name('lms.support-profile');

    Route::any('support-mode', [SupportController::class, 'mode'])->name('support.change-mode');



    //  Tutors routes
    Route::any('support-tutors', [SupportUserManagementController::class, 'tutors'])->name('lms.support-tutors');
    Route::any('support-add-tutor', [SupportUserManagementController::class, 'addTutor'])->name('lms.support-add-tutor');
    Route::any('support-save-tutor', [SupportUserManagementController::class, 'saveTutor'])->name('lms.support-save-tutor');
    Route::any('support-show-tutor/{id}', [SupportUserManagementController::class, 'showTutor'])->name('lms.support-show-tutor');
    Route::any('support-edit-tutor/{id}', [SupportUserManagementController::class, 'editTutor'])->name('lms.support-edit-tutor');
    Route::any('support-update-tutor/{id}', [SupportUserManagementController::class, 'updateTutor'])->name('lms.support-update-tutor');
    Route::any('support-delete-tutor/{id}', [SupportUserManagementController::class, 'deleteTutor'])->name('lms.support-delete-tutor');

    //  Students routes
    Route::any('support-students', [SupportUserManagementController::class, 'students'])->name('lms.support-students');
    Route::any('support-add-student', [SupportUserManagementController::class, 'addStudent'])->name('lms.support-add-student');
    Route::any('support-save-student', [SupportUserManagementController::class, 'saveStudent'])->name('lms.support-save-student');
    Route::any('support-show-student/{id}', [SupportUserManagementController::class, 'showStudent'])->name('lms.support-show-student');
    Route::any('support-edit-student/{id}', [SupportUserManagementController::class, 'editStudent'])->name('lms.support-edit-student');
    Route::any('support-update-student/{id}', [SupportUserManagementController::class, 'updateStudent'])->name('lms.support-update-student');
    Route::any('support-delete-student/{id}', [SupportUserManagementController::class, 'deleteStudent'])->name('lms.support-delete-student');



    //For Modules
    Route::any('support-modules', [SupportModuleController::class, 'index'])->name('lms.support-modules');
    Route::any('support-add-module', [SupportModuleController::class, 'create'])->name('lms.support-add-module');
    Route::any('support-save-module', [SupportModuleController::class, 'store'])->name('lms.support-save-module');
    Route::any('support-show-module/{id}', [SupportModuleController::class, 'show'])->name('lms.support-show-module');
    Route::any('support-edit-module/{id}', [SupportModuleController::class, 'edit'])->name('lms.support-edit-module');
    Route::any('support-update-module/{id}', [SupportModuleController::class, 'update'])->name('lms.support-update-module');
    Route::any('support-delete-module/{id}', [SupportModuleController::class, 'destroy'])->name('lms.support-delete-module');

    //For Courses
    Route::any('support-courses', [SupportCourseController::class, 'index'])->name('lms.support-courses');
    Route::any('support-draft-courses', [SupportCourseController::class, 'draft'])->name('lms.support-draft-courses');
    Route::any('support-add-course', [SupportCourseController::class, 'create'])->name('lms.support-add-course');
    Route::any('support-save-course', [SupportCourseController::class, 'store'])->name('lms.support-save-course');
    Route::any('support-show-course/{id}', [SupportCourseController::class, 'show'])->name('lms.support-show-course');
    Route::any('support-edit-course/{id}', [SupportCourseController::class, 'edit'])->name('lms.support-edit-course');
    Route::any('support-update-course/{id}', [SupportCourseController::class, 'update'])->name('lms.support-update-course');
    Route::any('support-delete-course/{id}', [SupportCourseController::class, 'destroy'])->name('lms.support-delete-course');

    // For Course Content
    Route::group(['prefix' => 'support-courses'], function () {

        Route::get('/{id}/content/create', [SupportCourseController::class, 'createContent'])->name('lms.support-courses.create-content');
        Route::any('/{id}/content/save', [SupportCourseController::class, 'saveContent'])->name('lms.support-courses.save-content');
        Route::get('/{courseId}/content/{contentId}/edit', [SupportCourseController::class, 'editContent'])->name('lms.support-courses.edit-content');
        Route::any('update-course/{courseId}/content/{contentId}/update', [SupportCourseController::class, 'updateContent'])->name('lms.support-courses.update-content');
        Route::get('/{courseId}/content/{contentId}', [SupportCourseController::class, 'showCourseContent'])->name('lms.support-show-course-content');
        Route::any('/{courseId}/delete-content/{contentId}', [SupportCourseController::class, 'deleteCourseContent'])->name('lms.support-delete-course-content');

        Route::get('/{courseId}/content/{parentId}/create-subsection', [SupportCourseController::class, 'createSubSection'])->name('lms.support-create-subsection');
        Route::any('/{courseId}/content/{parentId}/store-subsection', [SupportCourseController::class, 'storeSubsection'])->name('lms.support-save-subsection');
        Route::get('/{courseId}/content/{contentId}/show-subsection', [SupportCourseController::class, 'showSubSection'])->name('lms.support-show-subsection');

        Route::get('/{courseId}/content/{contentId}/edit-subsection', [SupportCourseController::class, 'editSubSection'])->name('lms.support-edit-subsection');

        Route::delete('/{courseId}/content/{contentId}/delete-subsection', [SupportCourseController::class, 'deleteSubSection'])->name('lms.support-delete-subsection');

        Route::post('/{courseId}/enrollments/{studentId}/approve', [SupportCourseController::class, 'approve'])->name('lms.support-approve-enrollment');
        Route::post('/{courseId}/enrollments/{studentId}/reject', [SupportCourseController::class, 'reject'])->name('lms.support-reject-enrollment');

        // For Courses  Quizes
        Route::get('/{courseId}/create-quiz', [SupportQuizController::class, 'create'])->name('lms.support-create-quiz');
        Route::post('/{courseId}/save-quiz', [SupportQuizController::class, 'store'])->name('lms.support-save-quiz');
        Route::get('/{courseId}/quizzes/{quizId}', [SupportQuizController::class, 'show'])->name('lms.support-show-quiz');
        Route::get('/{courseId}/quizzes/{quizId}/create-question', [SupportQuizController::class, 'createQuestion'])->name('lms.support-create-question');
        Route::post('/{courseId}/quizzes/{quizId}/store-question', [SupportQuizController::class, 'storeQuestion'])->name('lms.support-store-question');
        Route::post('/support-quizzes/update-question/{quizId}', [SupportQuizController::class, 'updateQuestion'])->name('lms.support-update-question');
        Route::any('/support-quizzes/delete-question/{quizId}', [SupportQuizController::class, 'deleteQuestion'])->name('lms.support-delete-question');
        Route::any('/support-quizzes/delete-answer/{quizId}', [SupportQuizController::class, 'deleteAnswer'])->name('lms.support-delete-answer');

        Route::post('/support-delete/quizzes/{quizId}', [SupportQuizController::class, 'destroy'])->name('lms.support-delete-quiz');

        Route::get('/{courseId}/quizzes/{quizId}/answers/{questionId}/create-answer', [SupportQuizController::class, 'createAnswer'])->name('lms.support-create-answer');
        Route::post('/{courseId}/quizzes/{quizId}/save-answer/{questionId}/store-answer', [SupportQuizController::class, 'storeAnswer'])->name('lms.support-store-answer');

        // Show a single question's answers
        Route::get('/{course}/quizzes/{quiz}/questions/{question}/answers', [SupportQuizController::class, 'showQuestionAnswers'])->name('lms.support-show-question');
        Route::get('/{course}/quizzes/{quiz}/editquestions/{question}/answers', [SupportQuizController::class, 'editQuestion'])->name('lms.support-edit-question');
        Route::get('/quizzes/support-editquestions/{question}/answers', [SupportQuizController::class, 'editAnswer'])->name('lms.support-edit-answer');



        // Show a single answer in detail
        Route::get('/{course}/quizzes/{quiz}/questions/{question}/answers/{answer}', [SupportQuizController::class, 'showAnswerDetail'])->name('lms.support-show-answer');
    });

    Route::post('/support-quiz-answer/update', [SupportQuizController::class, 'updateAnswer'])->name('lms.support-updated-quiz-answer');

    Route::get('/support-quizzes', [SupportQuizController::class, 'index'])->name('lms.support-quizzes');
    Route::post('/support-quizzes', [SupportQuizController::class, 'store'])->name('lms.support-store-quiz');
    Route::get('/support-quizzes/{quiz}/edit', [SupportQuizController::class, 'edit'])->name('lms.support-edit-quiz');
    Route::any('/support-quizzes/{quiz}', [SupportQuizController::class, 'update'])->name('lms.support-update-quiz');
    Route::delete('/support-quizzes/{quiz}', [SupportQuizController::class, 'destroy'])->name('lms.support-delete-quiz');


    // For Announcements
    Route::get('/support-announcements', [SupportAnnouncementController::class, 'index'])->name('support-announcements.index');
    Route::get('/support-announcements/create', [SupportAnnouncementController::class, 'create'])->name('support-announcements.create');
    Route::post('/support-announcements', [SupportAnnouncementController::class, 'store'])->name('support-announcements.store');
    Route::get('/support-announcements/{announcement}', [SupportAnnouncementController::class, 'show'])->name('support-announcements.show');
    Route::delete('/support-announcements/{announcement}', [SupportAnnouncementController::class, 'destroy'])->name('support-announcements.destroy');
    Route::get('/support-announcements/{announcement}/edit', [SupportAnnouncementController::class, 'edit'])->name('support-announcements.edit');
    Route::put('support-announcements/{announcement}', [SupportAnnouncementController::class, 'update'])->name('support-announcements.update');


    // For Company Detail
    Route::get('/support_company_details', [SupportCompanyDetailController::class, 'index'])->name('support-company_details.index');
    Route::get('/support_company_details/create', [SupportCompanyDetailController::class, 'create'])->name('support-company_details.create');
    Route::post('/support_company_details', [SupportCompanyDetailController::class, 'store'])->name('support-company_details.store');
    Route::get('/support_company_details/{id}/edit', [SupportCompanyDetailController::class, 'edit'])->name('support-company_details.edit');
    Route::put('/support_company_details/{id}', [SupportCompanyDetailController::class, 'update'])->name('support-company_details.update');
    Route::delete('/support_company_details/{id}', [SupportCompanyDetailController::class, 'destroy'])->name('support-company_details.destroy');

    //For Password Reset
    Route::get('/support/reset-user-password', [SupportPasswordResetController::class, 'index'])->name('support.password.index');
    Route::get('/support/reset-password/{user}', [SupportPasswordResetController::class, 'showResetForm'])->name('support.password.reset');
    Route::post('/support/reset-password/{user}', [SupportPasswordResetController::class, 'reset'])->name('support.password.update');
});
// end of support
Route::group(['middleware' => 'role:tutor'], function () {
    // Tutor routes
    Route::any('tutor-dashboard', [TutorController::class, 'dashboard'])->name('lms.tutor-dashboard');
    Route::any('tutor-profile', [TutorController::class, 'profile'])->name('lms.tutor-profile');

    Route::any('tutor-mode', [TutorController::class, 'mode'])->name('tutor.change-mode');

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

    //For Courses
    Route::any('add-tutor-course/{id}', [TutorCoursesController::class, 'create'])->name('lms.add-tutor-course');
    Route::any('save-tutor-course', [TutorCoursesController::class, 'store'])->name('lms.save-tutor-course');
    Route::any('show-tutor-course/{id}', [TutorCoursesController::class, 'show'])->name('lms.show-tutor-course');
    Route::any('edit-tutor-course/{id}', [TutorCoursesController::class, 'edit'])->name('lms.edit-tutor-course');
    Route::any('update-tutor-course/{id}', [TutorCoursesController::class, 'update'])->name('lms.update-tutor-course');
    Route::any('delete-tutor-course/{id}', [TutorCoursesController::class, 'destroy'])->name('lms.delete-tutor-course');
    // For Course Content
    Route::group(['prefix' => 'tutor-courses'], function () {
        Route::get('/{id}/content/create', [TutorCoursesController::class, 'createContent'])->name('lms.tutor-courses.create-content');
        Route::post('/{id}/content/save', [TutorCoursesController::class, 'saveContent'])->name('lms.tutor-courses.save-content');
        Route::get('/{courseId}/content/{contentId}/edit', [TutorCoursesController::class, 'editContent'])->name('lms.tutor-courses.edit-content');
        Route::put('update-content/{courseId}/content/{contentId}/update', [TutorCoursesController::class, 'updateContent'])->name('lms.tutor-courses.update-content');
        Route::get('/{courseId}/content/{contentId}', [TutorCoursesController::class, 'showCourseContent'])->name('lms.tutor-show-course-content');
        Route::any('/{courseId}/delete-content/{contentId}', [TutorCoursesController::class, 'deleteCourseContent'])->name('lms.tutor-delete-course-content');

        Route::get('/{courseId}/content/{parentId}/create-subsection', [TutorCoursesController::class, 'createSubSection'])->name('lms.tutor-create-subsection');

        Route::post('/{courseId}/enrollments/{studentId}/approve', [TutorCoursesController::class, 'approve'])->name('lms.tutor-approve-enrollment');
        Route::post('/{courseId}/enrollments/{studentId}/reject', [TutorCoursesController::class, 'reject'])->name('lms.tutor-reject-enrollment');


        Route::post('/{courseId}/content/{parentId}/store-subsection', [TutorCoursesController::class, 'storeSubsection'])->name('lms.tutor-store-subsection');
        Route::get('/{courseId}/content/{contentId}/show-subsection', [TutorCoursesController::class, 'showSubSection'])->name('lms.tutor-show-subsection');

        Route::get('/{courseId}/content/{contentId}/edit-subsection', [CourseController::class, 'editSubSection'])->name('lms.tutor-edit-subsection');

        Route::delete('/{courseId}/content/{contentId}/delete-subsection', [TutorCoursesController::class, 'deleteCourseContent'])->name('lms.tutor-delete-subsection');

        // For Courses  Quizes
        Route::get('/{courseId}/create-quiz', [TutorQuizController::class, 'create'])->name('lms.tutor-create-quiz');
        Route::post('/{courseId}/save-quiz', [TutorQuizController::class, 'store'])->name('lms.tutor-store-quiz');
        Route::get('/{courseId}/quizzes/{quizId}', [TutorQuizController::class, 'show'])->name('lms.tutor-show-quiz');
        Route::get('/{courseId}/quizzes/{quizId}/create-question', [TutorQuizController::class, 'createQuestion'])->name('lms.tutor-create-question');
        Route::post('/{courseId}/quizzes/{quizId}/store-question', [TutorQuizController::class, 'storeQuestion'])->name('lms.tutor-store-question');
        Route::post('/tutor-quizzes/update-question/{quizId}', [TutorQuizController::class, 'updateQuestion'])->name('lms.tutor-update-question');
        Route::any('/tutor-quizzes/delete-question/{quizId}', [TutorQuizController::class, 'deleteQuestion'])->name('lms.tutor-delete-question');
        Route::any('/tutor-quizzes/delete-answer/{quizId}', [TutorQuizController::class, 'deleteAnswer'])->name('lms.tutor-delete-answer');



        Route::get('/{courseId}/tutor-quizzes/{quizId}/questions/{questionId}/create-answer', [TutorQuizController::class, 'createAnswer'])->name('lms.tutor-create-answer');
        Route::post('/{courseId}/tutor-quizzes/{quizId}/questions/{questionId}/store-answer', [TutorQuizController::class, 'storeAnswer'])->name('lms.tutor-store-answer');


        Route::post('/delete/quizzes/{quizId}', [TutorQuizController::class, 'destroy'])->name('lms.tutor-delete-quiz');
    });

    Route::get('/tutor-quizzes/{quiz}/edit', [TutorQuizController::class, 'edit'])->name('lms.tutor-edit-quiz');
    Route::any('/update-tutor-quizzes/{quiz}', [TutorQuizController::class, 'update'])->name('lms.tutor-update-quiz');
    Route::delete('/tutor-quizzes/{quiz}', [TutorQuizController::class, 'destroy'])->name('lms.tutor-delete-quiz');


    // Show a single question's answers
    Route::get('/{course}/tutor-quizzes/{quiz}/questions/{question}/answers', [TutorQuizController::class, 'showQuestionAnswers'])->name('lms.tutor-show-question');
    Route::get('/{course}/tutor-quizzes/{quiz}/editquestions/{question}/answers', [TutorQuizController::class, 'editQuestion'])->name('lms.tutor-edit-question');
    Route::get('/quizzes/tutor-editquestions/{question}/answers', [TutorQuizController::class, 'editAnswer'])->name('lms.tutor-edit-answer');

    Route::post('/tutor-quiz-answer/update', [TutorQuizController::class, 'updateAnswer'])->name('lms.tutor-updated-quiz-answer');



    // Show a single answer in detail
    Route::get('/{course}/tutor-quizzes/{quiz}/questions/{question}/answers/{answer}', [TutorQuizController::class, 'showAnswerDetail'])->name('lms.tutor-show-answer');



    Route::get('/notifications/index', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/create', [NotificationController::class, 'create'])->name('notifications.create');
    Route::post('/notifications/store', [NotificationController::class, 'store'])->name('notifications.store');

    // View all notifications

    // View a single notification
    Route::get('/notifications/{notification}', [NotificationController::class, 'show'])->name('notifications.show');

    // Edit a notification (if needed)
    Route::get('/notifications/{notification}/edit', [NotificationController::class, 'edit'])->name('notifications.edit');

    // Update a notification (if needed)
    Route::put('/notifications/{notification}', [NotificationController::class, 'update'])->name('notifications.update');

    // Delete a notification
    Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
});

Route::group(['middleware' => 'role:student'], function () {
    // Student routes
    Route::any('student-dashboard', [StudentController::class, 'dashboard'])->name('lms.student-dashboard');
    Route::any('student-profile', [StudentController::class, 'profile'])->name('lms.student-profile');

    Route::any('/user/{user}/content/{content}/mark-as-complete', [StudentController::class, 'markAsComplete'])->name('content.mark-as-complete');

    Route::post('students/{student}/enroll/{course}', [StudentController::class, 'enrollSelf'])->name('students.enrollSelf');
    Route::post('students/{student}/unenroll/{course}', [StudentController::class, 'unenrollSelf'])->name('students.unenrollSelf');
    Route::get('students/{user}/enrolled-courses', [StudentController::class, 'enrolledCourses'])
        ->name('student.enrolledCourses');

    Route::get('students/{user}/completed-courses', [StudentController::class, 'completedCourses'])
        ->name('student.completedCourses');

    Route::get('students/{user}/incomplete-courses', [StudentController::class, 'incompleteCourses'])
        ->name('student.incompleteCourses');

    Route::get('students/{user}/search-courses', [StudentController::class, 'searchCourses'])
        ->name('students.searchCourses');

    Route::get('student-courses', [StudentController::class, 'allCourses'])
        ->name('courses.allCourses');

    Route::get('student-courses/search', [StudentController::class, 'searchCourses1'])
        ->name('student-courses.search');
    Route::get('student-module-courses/{id}', [StudentController::class, 'moduleCourses'])
        ->name('student-courses.module');


    Route::get('student-courses/{course}', [StudentController::class, 'show'])
        ->name('student-courses.show');

    Route::get('student-unenrolled-courses/{course}', [StudentController::class, 'show_unenrolled'])
        ->name('student-unenrolled-courses.show');


    Route::get('contents/{content}', [StudentController::class, 'show_content'])
        ->name('contents.show');

    Route::get('student/{courseId}/quizzes/{quizId}', [QuizResultController::class, 'show'])->name('lms.student-show-quiz');

    Route::post('/quizzes/{quiz}/results', [QuizResultController::class, 'store'])->name('quiz.results.store');

    Route::get('quizzes-results/{quiz}/results/{result}',  [QuizResultController::class, 'showResult'])->name('quizzes.result.show');

    Route::get('/student-notifications/{notification}', [StudentController::class, 'show_notification'])->name('student-notifications.show');
    Route::get('/all-student-notifications/all', [StudentController::class, 'all_notifications'])->name('student-notifications.all');

    Route::post('/notifications/{notification}/mark-as-seen', [StudentController::class, 'markAsSeen'])
        ->name('notifications.markAsSeen');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
