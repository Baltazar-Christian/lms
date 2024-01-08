<?php

namespace App\Http\Controllers\support;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportUserManagementController extends Controller
{
    // ========================================================================
    // FOR STYSTEM ADMINS
    // =======================================================================

    public function __construct()
    {
        $this->middleware('auth'); // Require authentication for all support routes
        $this->middleware('role:support'); // Require support role for all support routes
    }

    // For All System Admins
    public function systemAdmins()
    {
        $users = User::where('role','support')->get();
        return view('support.system_admins.index', compact('users'));
    }

    // For Register System Admin
    public function addSystemAdmin()
    {
        return view('support.system_admins.create');
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
        return view('support.system_admins.show', compact('user'));
    }

    // For Edit System Admin
    public function editSystemAdmin($id)
    {
        $user = User::findOrFail($id);
        return view('support.system_admins.edit', compact('user'));
    }

    // For Update System Admin
    public function updateSystemAdmin(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
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
        return view('support.tutors.index', compact('users'));
    }

    // For Register Tutor
    public function addTutor()
    {
        return view('support.tutors.create');
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

    // For View Tutor
    public function showTutor($id)
    {
        $user = User::findOrFail($id);
        return view('support.tutors.show', compact('user'));
    }

    // For Edit Tutor
    public function editTutor($id)
    {
        $user = User::findOrFail($id);
        return view('support.tutors.edit', compact('user'));
    }

    // For Update Tutor
    public function updateTutor(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
        ]);

        return redirect()->route('lms.tutors')->with('success', 'Tutor was updated successfully');
    }

    // For Delete Tutor
    public function deleteTutor($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('lms.tutors')->with('success', 'Tutor was deleted successfully');
    }

    // ========================================================================
    // FOR STUDENTS
    // =======================================================================

    // For All Students
    public function students()
    {
        $users = User::where('role','student')->get();
        return view('support.students.index', compact('users'));
    }

    // For Register Tutor
    public function addStudent()
    {
        return view('support.students.create');
    }

    // For Save Student
    public function saveStudent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role'=>'student',
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('lms.students')->with('success', 'Student was registered successfully');
    }

    // For View Student
    public function showStudent($id)
    {
        $user = User::findOrFail($id);
        return view('support.students.show', compact('user'));
    }

    // For Edit Student
    public function editStudent($id)
    {
        $user = User::findOrFail($id);
        return view('support.students.edit', compact('user'));
    }

    // For Update Student
    public function updateStudent(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => $request->has('password') ? bcrypt($request->input('password')) : $user->password,
        ]);

        return redirect()->route('lms.students')->with('success', 'Student was updated successfully');
    }

    // For Delete Student
    public function deleteStudent($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('lms.students')->with('success', 'Student was deleted successfully');
    }

    // For All Users
        // For All Students
        public function user_password()
        {
            $users = User::get();
            return view('support.password.index', compact('users'));
        }
}
