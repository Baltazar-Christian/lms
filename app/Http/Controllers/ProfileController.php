<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
        // Validate the form data
        $request->validate([
            'one-profile-edit-name' => 'required|string|max:255',
            'one-profile-edit-email' => 'required|email|max:255',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add appropriate image validation rules
        ]);

        // Update user profile
        $user = User::where('id',Auth::user()->id)->first();
        $user->name = $request->input('one-profile-edit-name');
        $user->email = $request->input('one-profile-edit-email');

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->update();

        // Redirect or respond as needed
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function changePassword(Request $request)
    {
        // Validate the form data
        $request->validate([
            'one-profile-edit-password' => 'required|string',
            'one-profile-edit-password-new' => 'required|string|min:8',
            'one-profile-edit-password-new-confirm' => 'required|string|same:one-profile-edit-password-new',
        ]);

        // Check if the current password matches the user's password
        if (!Hash::check($request->input('one-profile-edit-password'), Auth::user()->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        // Update user password
        $user = User::where('id',Auth::user()->id)->first();
        $user->password = Hash::make($request->input('one-profile-edit-password-new'));
        $user->update();

        // Log out the user
        Auth::logout();

        // Redirect or respond as needed
        return redirect()->route('login')->with('success', 'Password changed successfully. Please log in with your new password.');
    }
}
