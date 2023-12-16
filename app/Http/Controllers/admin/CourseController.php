<?php

namespace App\Http\Controllers\admin;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }



    public function create()
    {
        $data['modules'] = Module::all();
        return view('admin.courses.create',$data);
    }

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

            $imageName= $request->file('cover_image')->store('covers', 'public'); // Adjust the storage path as needed
            $request->merge(['cover_image' => $imageName]);
        }

        Course::create($request->all());

        return redirect()->route('lms.courses')->with('success', 'Course created successfully.');
    }

    public function show( $id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.show', compact('course'));
    }

    public function edit( $id)
    {
        $data['modules'] = Module::all();
        $data['course'] = Course::findOrFail($id);
        return view('admin.courses.edit', $data);
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'duration_in_minutes' => 'required|integer',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date',
            'cover_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the course by its ID
        $course = Course::findOrFail($id);

        // Handle cover image update
        if ($request->hasFile('cover_image')) {
            // Delete the old cover image if it exists
            if ($course->cover_image) {
                Storage::disk('public')->delete('covers/' . $course->cover_image);
            }

            // Upload the new cover image
            $coverImage = $request->file('cover_image');
            $imageName = time() . '.' . $coverImage->getClientOriginalExtension();
            $coverImage->storeAs('covers', $imageName, 'public'); // Adjust the storage path as needed

            // Update the request data to include the new cover image name
            $request->merge(['cover_image' => $imageName]);

            // dd( $request->merge(['cover_image' => $imageName]));
        }

        // Update the course with the merged request data
        $course->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'duration_in_minutes' => $request->input('duration_in_minutes'),
            'is_published' => $request->input('is_published'),
            'published_at' => $request->input('published_at'),
            'cover_image' => $request->input('cover_image', $course->cover_image), // keep the existing value if not provided
        ]);

        // Redirect to the courses index with a success message
        return redirect()->route('lms.courses')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course)
    {
        // Delete the cover image
        if ($course->cover_image) {
            Storage::disk('public')->delete('covers/' . $course->cover_image);
        }

        $course->delete();

        return redirect()->route('lms.courses')->with('success', 'Course deleted successfully.');
    }
}

