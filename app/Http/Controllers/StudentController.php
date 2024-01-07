<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseContent;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Require authentication for all student routes
        $this->middleware('role:student'); // Require student role for all student routes
    }

    public function dashboard()
    {
        $data['enrolled'] = Auth::user()->courses->count(); // Assuming 'courses' is the relationship name
        $data['available']=Course::count();
        $data['incomplete']=Enrollment::where('user_id',Auth::user()->id)->where('is_completed',0)->count();
        $data['complete']=Enrollment::where('user_id',Auth::user()->id)->where('is_completed',1)->count();


        $data['courses']=Course::get();
        $data['student']=User::with('courses')->find(Auth::user()->id);;
        return view('student.dashboard',$data);
    }

    public function enrollSelf(Request $request, User $student, Course $course)
    {
        $student->courses()->attach($course->id);

        // return redirect()->route('students.show', $student->id)->with('success', 'Enrolled in the course successfully');

        return back()->with('success', 'Enrolled in the course successfully');

    }

    public function unenrollSelf(Request $request, User $student, Course $course)
    {
        $student->courses()->detach($course->id);

        // return redirect()->route('students.show', $student->id)->with('success', 'Unenrolled from the course successfully');
        return back()->with('success', 'Unenrolled from the course successfully');
    }

    public function enrolledCourses(User $user)
    {
        $enrolledCourses = $user->courses; // Assuming 'courses' is the relationship name

        return view('student.enrolled_courses', compact('enrolledCourses', 'user'));
    }

    public function completedCourses(User $user)
    {
        $enrolledCourses = Enrollment::where('user_id',Auth::user()->id)->where('is_completed',1)->get(); // Assuming 'courses' is the relationship name

        return view('student.completed_courses', compact('enrolledCourses', 'user'));
    }

    public function searchCourses(User $user, Request $request)
    {
        $search = $request->input('search');
        $courses = Course::where('title', 'like', "%$search%")->get();

        return view('student.search_courses', compact('courses', 'user', 'search'));
    }

    public function allCourses()
    {
        $courses = Course::all();

        return view('student.all_courses', compact('courses'));
    }

    public function searchCourses1(Request $request)
    {
        $search = $request->input('search');
        $courses = Course::where('title', 'like', "%$search%")->get();

        return view('student.search_course', compact('courses', 'search'));
    }


    public function show(Course $course)
    {
        $courseContents = $course->contents;
        $student=Auth::user();
        $contents=CourseContent::where('course_id',$course->id)->where('parent_id',0)->get();

        return view('student.show_course', compact('course', 'courseContents','student','contents'));
    }


    public function show_content(CourseContent $content)
    {
        $contents=CourseContent::where('course_id',$content->course_id)->where('parent_id',0)->get();

        return view('student.show_content', compact('content','contents'));
    }


    public function markAsComplete(User $user, CourseContent $content) {
        $user->completedContents()->attach($content->id, ['is_completed' => true]);

        // Check if all contents are completed, update course status if true
        if ($user->completedContents->count() === $content->course->contents->count()) {
            $user->enrolledCourses()->updateExistingPivot($content->course->id, ['is_completed' => true]);
        }

        return redirect()->back();
    }

}
