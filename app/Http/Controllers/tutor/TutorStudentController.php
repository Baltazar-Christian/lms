<?php

namespace App\Http\Controllers\tutor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TutorStudentController extends Controller
{
        // For All Students
        public function students()
        {
            $users = User::where('role','student')->get();
            return view('tutor.students.index', compact('users'));
        }

        // For Register Tutor
        public function addStudent()
        {
            return view('tutor.students.create');
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
            return view('tutor.students.show', compact('user'));
        }

        // For Edit Student
        public function editStudent($id)
        {
            $user = User::findOrFail($id);
            return view('tutor.students.edit', compact('user'));
        }

        // For Update Student
        public function updateStudent(Request $request, $id)
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

            return redirect()->route('lms.students')->with('success', 'Student was updated successfully');
        }

}
