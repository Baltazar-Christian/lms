<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Require authentication for all student routes
        $this->middleware('role:student'); // Require student role for all student routes
    }

    public function dashboard()
    {
        return view('student.dashboard');
    }
}
