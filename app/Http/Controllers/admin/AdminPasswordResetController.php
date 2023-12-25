<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;


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

        // Update the user's password in the database
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // You can add additional logic or checks here if needed

        return redirect()->route('admin.dashboard')->with('status', 'Password reset successfully');
    }
}
