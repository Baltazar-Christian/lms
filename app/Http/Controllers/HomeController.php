<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\CompanyDetail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


     public function about()
     {
        $data['company_detail']=CompanyDetail::first();

         return view('about',$data);
     }

     public function contact()
     {
        $data['company_detail']=CompanyDetail::first();

         return view('contact',$data);
     }

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware('auth');
        $data['enrolled'] = Auth::user()->courses->count(); // Assuming 'courses' is the relationship name
        $data['available']=Course::where('is_published',1)->count();
        $data['incomplete']=Enrollment::where('user_id',Auth::user()->id)->where('is_completed',0)->count();
        $data['complete']=Enrollment::where('user_id',Auth::user()->id)->where('is_completed',1)->count();

        $data['courses']=Course::latest()->where('is_published',1)->limit(4)->get();
        $data['student']=User::with('courses')->find(Auth::user()->id);;
        return view('student.dashboard',$data); $data['enrolled'] = Auth::user()->courses->count(); // Assuming 'courses' is the relationship name

    }



}
