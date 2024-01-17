<?php

namespace App\Http\Controllers\tutor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TutorStudentController extends Controller
{
    // For All Students
    public function students()
    {
        $users = User::where('role', 'student')->where('institute_id', Auth::user()->institute_id)->where('status', 0)->get();
        return view('tutor.students.index', compact('users'));
    }
    // For Blocked Student
    public function blocked_students()
    {
        $users = User::where('role', 'student')->where('institute_id', Auth::user()->institute_id)->where('status', 1)->get();
        return view('tutor.students.blocked', compact('users'));
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
            'role' => 'student',
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('lms.students')->with('success', 'Student was registered successfully');
    }

    // For View Student
    public function showStudent($id)
    {
        $user = User::findOrFail($id);
        $enrolledCourses = $user->courses()->get();
        $quizResults = $user->quizResults()->with('quiz')->get();

        return view('tutor.students.show', compact('user', 'enrolledCourses', 'quizResults'));
    }

    // For Edit Student
    public function editStudent($id)
    {
        $user = User::findOrFail($id);

        return view('tutor.students.edit', compact('user'));
    }

    // For Block Student
    public function blockStudent($id)
    {
        $user = User::findOrFail($id);
        $user->status = 1;
        $user->update();

        return back()->with('success', 'Student Was Blocked Successfully!');
    }

    // For Activate Student
    public function activateStudent($id)
    {
        $user = User::findOrFail($id);
        $user->status = 0;
        $user->update();

        return back()->with('success', 'Student Was Activated Successfully!');
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

    // For Delete Student
    public function deleteStudent($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Student was deleted successfully');
    }
}
