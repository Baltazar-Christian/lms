<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
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
        $data['courses']=Course::get();
        $data['student']=User::with('courses')->find(Auth::user()->id);;
        return view('student.dashboard',$data);
    }

    public function enrollSelf(Request $request, User $student, Course $course)
    {
        $student->courses()->attach($course->id);

        return redirect()->route('students.show', $student->id)->with('success', 'Enrolled in the course successfully');
    }

    public function unenrollSelf(Request $request, User $student, Course $course)
    {
        $student->courses()->detach($course->id);

        return redirect()->route('students.show', $student->id)->with('success', 'Unenrolled from the course successfully');
    }
}
