<?php

namespace App\Http\Controllers;

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
        return view('admin.dashboard');
    }
}
