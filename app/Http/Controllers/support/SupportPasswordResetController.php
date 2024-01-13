<?php

namespace App\Http\Controllers\support;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;


class SupportPasswordResetController extends Controller
{

    public function index()
    {
        $users = User::whereNot('role','admin')->whereNot('role','support')->get();
        return view('support.password.index', compact('users'));
    }

    public function showResetForm(User $user)
    {
        return view('support.password.reset', ['user' => $user]);
    }

    public function reset(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        // Update the user's password in the database
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // You can add additional logic or checks here if needed

        return redirect()->route('support.password.index')->with('success', 'Password reset successfully');
    }
}
