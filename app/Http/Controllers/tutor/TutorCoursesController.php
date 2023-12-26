<?php

namespace App\Http\Controllers\tutor;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TutorCoursesController extends Controller
{
    // For View Module Courses
    public function module_courses( $id)
    {
        $data['module']= Module::findOrFail($id);
        $data['courses'] = Course::where('module_id',$id)->where('user_id',Auth::user()->id)->get();
        return view('tutor.modules.show', $data);

    }

    // For Create Course
    public function create($id)
    {
        $data['module'] = Module::findOrFail($id);
        return view('tutor.courses.create', $data);
    }


    // For Saving Course
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'required|string|unique:courses',
            'price' => 'required|numeric',
            'duration_in_minutes' => 'required|integer',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle cover image upload and storage
        if ($request->hasFile('cover_image')) {

            $imageName = $request->file('cover_image')->store('covers', 'public'); // Adjust the storage path as needed
            $request->merge(['cover_image' => $imageName]);
        }
        $request['user_id']=Auth::user()->id;

        Course::create($request->all());

        $module=Module::findOrFail($request->module_id)->first();;

        return redirect()->route('lms.tutor-view-module',$module->id)->with('success', 'Course created successfully.');
    }
}
