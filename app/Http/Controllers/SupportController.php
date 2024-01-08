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

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Require authentication for all support routes
        $this->middleware('role:support'); // Require support role for all support routes
    }

    public function dashboard()
    {
        $data['students']=User::where('role','student')->count();
        $data['tutors']=User::where('role','tutor')->count();
        $data['modules']=Module::count();
        $data['courses']=Course::count();
        $data['institutes']=Instute::count();
        $data['announcements']=Announcement::count();
        $data['contents']=CourseContent::count();
        $data['quizzes']=Quiz::count();

        return view('support.dashboard',$data);
    }


    public function mode(Request $request){
            $user=User::where('id',Auth::user()->id)->first();
            $user->mode=$request->mode;
            $user->update();
            
            return back();
    }

}
