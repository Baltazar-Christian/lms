<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserManagementController extends Controller
{
    // ========================================================================
    // FOR STYSTEM ADMINS
    // =======================================================================


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

    // For Edit System Admin
    public function editSystemAdmin($id)
    {
        $user = User::findOrFail($id);
        return view('admin.system_admins.edit', compact('user'));
    }

    // For Update System Admin
    public function updateSystemAdmin(Request $request, $id)
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

    // For Delete System Admin
    public function deleteSystemAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('lms.system-admins')->with('success', 'User deleted successfully');
    }


    // ========================================================================
    // FOR TUTORS
    // =======================================================================



    // For All Tutors
    public function tutors()
    {
        $users = User::where('role','tutor')->get();
        return view('admin.tutors.index', compact('users'));
    }

    // For Register Tutor
    public function addTutor()
    {
        return view('admin.tutors.create');
    }

    public function saveTutor(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role'=>'tutor',
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('lms.tutors')->with('success', 'Tutor was registered successfully');
    }

    // For View System Administrator Details
    public function showTutor($id)
    {
        $user = User::findOrFail($id);
        return view('admin.tutors.show', compact('user'));
    }

    // For Edit System Admin
    public function editTutor($id)
    {
        $user = User::findOrFail($id);
        return view('admin.system_admins.edit', compact('user'));
    }

    // For Update System Admin
    public function updateTutor(Request $request, $id)
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

        return redirect()->route('lms.tutors')->with('success', 'User updated successfully');
    }

    // For Delete System Admin
    public function deleteTutor($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('lms.tutors')->with('success', 'User deleted successfully');
    }

}
