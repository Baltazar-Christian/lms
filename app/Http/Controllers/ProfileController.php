<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
