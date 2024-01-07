<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Module;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Require authentication for all admin routes
        $this->middleware('role:admin'); // Require admin role for all admin routes
    }

    public function dashboard()
    {
        $data['students']=User::where('role','student')->count();
        $data['tutors']=User::where('role','tutor')->count();
        $data['modules']=Module::count();
        $data['courses']=Course::count();
        return view('admin.dashboard',$data);
    }


}
