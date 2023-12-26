<?php

namespace App\Http\Controllers\tutor;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TutorCoursesController extends Controller
{
    // For View Module Courses
    public function module_courses( $id)
    {
        $data['module']= Module::findOrFail($id);
        $data['courses'] = Course::where('module_id',$id)->where('user_id',Auth::user()->user_id)->get();
        return view('tutor.modules.show', $data);

    }

    // For Create Course
    public function create()
    {
        $data['modules'] = Module::all();
        return view('tutor.courses.create', $data);
    }
}
