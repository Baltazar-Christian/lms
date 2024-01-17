<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Course;
use App\Models\Module;
use App\Models\Instute;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\CourseContent;
use Illuminate\Support\Facades\Auth;

class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Require authentication for all tutor routes
        $this->middleware('role:tutor'); // Require tutor role for all tutor routes
    }

    public function dashboard()
    {

        $data['active_students'] = User::where('role', 'student')->where('status',0)->count();
        $data['blocked_students'] = User::where('role', 'student')->where('status',1)->count();
        $data['tutors'] = User::where('role', 'tutor')->count();
        $data['modules'] = Module::count();
        $data['courses'] = Course::count();
        $data['institutes'] = Instute::count();
        $data['announcements'] = Announcement::count();
        $data['contents'] = CourseContent::count();
        $data['quizzes'] = Quiz::count();

        return view('tutor.dashboard', $data);
    }


    public function profile( )
    {
        $user = User::where('id', Auth::user()->id)->first();

        return view("tutor.profile");
    }

    public function mode(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->mode = $request->mode;
        $user->update();

        return back();
    }
}
