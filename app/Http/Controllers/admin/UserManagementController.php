<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserManagementController extends Controller
{
    // For All System Admins
    public function systemAdmins()
    {
        $users = User::all();
        return view('admin.system_admins.index', compact('users'));
    }

    // For Register System Admin
    public function addSystemAdmin()
    {
        return view('admin.system_admins.create');
    }

    public function saveSystemAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role'=>'administrator',
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('lms.system-admins')->with('success', 'User created successfully');
    }

    // For View System Administrator Details
    public function showSystemAdmin($id)
    {
        $user = User::findOrFail($id);
        return view('admin.system_admins.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->has('password') ? bcrypt($request->input('password')) : $user->password,
        ]);

        return redirect()->route('lms.system-admins')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('lms.system-admins')->with('success', 'User deleted successfully');
    }
}
