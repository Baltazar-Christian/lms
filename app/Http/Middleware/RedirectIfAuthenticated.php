<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->status=='1') {
                    Auth::logout();

                // Redirect or respond as needed
                return redirect()->route('login')->with('msg', 'Sorry, your Account is blocked !.');
                }
                else{
                    switch (auth()->user()->role) {
                        case 'admin':
                            return redirect('/admin-dashboard');
                        case 'support':
                            return redirect('/support-dashboard');
                        case 'tutor':
                            return redirect('/tutor-dashboard');
                        case 'student':
                            return redirect('/student-dashboard');
                        default:

                            return redirect('/home');
                    }
                }

            }
        }

        return $next($request);
    }
}
