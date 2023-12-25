<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPasswordResetController extends Controller
{

    public function index()
    {
        $users = User::get();
        return view('admin.password.index', compact('users'));
    }

    public function showResetForm(User $user)
    {
        return view('admin.password.reset', ['user' => $user]);
    }

    public function reset(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::broker()->reset(
            ['email' => $user->email, 'token' => $request->token, 'password' => $request->password]
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('admin.dashboard')->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
