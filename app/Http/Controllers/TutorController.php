<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Require authentication for all tutor routes
        $this->middleware('role:tutor'); // Require tutor role for all tutor routes
    }

    public function dashboard()
    {
        return view('tutor.dashboard');
    }
}
