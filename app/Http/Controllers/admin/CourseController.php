<?php

namespace App\Http\Controllers\admin;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\CourseContent;
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


    // Add the following methods

    public function createContent($courseId)
    {
        $course = Course::findOrFail($courseId);
        return view('admin.courses.create-content', compact('course'));
    }

    public function saveContent(Request $request, $courseId)
    {
        // $this->validateContent($request);


        $content = new CourseContent($request->all());
        $content->course_id = $courseId;

        // Handle file upload and storage here...
        $content->file_path = $this->uploadFile($request, 'file_path', 'course_contents');

        $content->save();

        return redirect()->route('lms.show-course', $courseId)->with('success', 'Course content created successfully');
    }

    public function editContent($courseId, $contentId)
    {
        $course = Course::findOrFail($courseId);
        $content = CourseContent::findOrFail($contentId);
        return view('admin.courses.edit-content', compact('course', 'content'));
    }

    public function updateContent(Request $request, $courseId, $contentId)
    {
        $this->validateContent($request);

        $content = CourseContent::findOrFail($contentId);
        $content->update($request->all());

        // Handle file update if needed...
        if ($request->hasFile('file_path')) {
            // Delete the old file
            Storage::delete('public/' . $content->file_path);

            // Upload the new file
            $content->file_path = $this->uploadFile($request, 'file_path', 'course_contents');
            $content->save();
        }

        return redirect()->route('lms.show-course', $courseId)->with('success', 'Course content updated successfully');
    }

    // Additional methods...

    private function uploadFile(Request $request, $field, $folder)
    {
        if ($request->hasFile($field) && $request->file($field)->isValid()) {
            $file = $request->file($field);
            $fileName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs($folder, $fileName, 'public');
            return $filePath;
        }

        return null;
    }

    private function validateContent(Request $request)
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'required|mimes:jpg,png,pdf,doc,docx|max:2048',
        ]);
    }

}

