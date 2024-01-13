<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        if (Auth::user()->status == '1') {
            Auth::logout();

            // Redirect or respond as needed
            return redirect('/login')->with('msg', 'Sorry, your account is blocked.');
        } else {
            switch (auth()->user()->role) {
                case 'admin':
                    return '/admin-dashboard';
                case 'tutor':
                    return '/tutor-dashboard';
                case 'support':
                    return '/support-dashboard';
                case 'student':
                    return '/student-dashboard';
                default:
                    return '/home';
            }
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
