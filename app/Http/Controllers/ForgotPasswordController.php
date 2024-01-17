<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgotPassword');
    }

    public function sendPasswordResetLink(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Generate a unique reset token (you can use Str::random or any other method)
            $resetToken = Str::random(60);

            // Save the token to the user's record in the database
            $user->update(['reset_token' => $resetToken]);

            // Send the password reset email
            Mail::to($user->email)->send(new PasswordResetMail($user, $resetToken));

            return back()->with('message','Password reset email sent.');
        }

        return back()->with('message', 'User not found.');
    }


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $response = Password::sendResetLink($request->only('email'));

        return $response == Password::RESET_LINK_SENT
            ? back()->with('status', trans($response))
            : back()->withErrors(['email' => trans($response)]);
    }


    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $response = Password::reset($request->only(
            'email', 'password', 'password_confirmation', 'token'
        ), function ($user, $password) {
            $user->forceFill(['password' => bcrypt($password)])->save();
        });

        return $response == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', trans($response))
            : back()->withErrors(['email' => trans($response)]);
    }
}
