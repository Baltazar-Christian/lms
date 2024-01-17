<?php

namespace App\Http\Controllers\support;

use App\Models\Quiz;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CourseContent;
use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SupportCourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); // Require authentication for all support routes
        $this->middleware('role:support'); // Require support role for all support routes
    }

    public function index()
    {
        $courses = Course::where('is_published', 1)->latest()->get();
        return view('support.courses.index', compact('courses'));
    }


    public function draft()
    {
        $courses = Course::where('is_published', 0)->latest()->get();
        return view('support.courses.published', compact('courses'));
    }

    public function create()
    {
        $data['modules'] = Module::all();
        return view('support.courses.create', $data);
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
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        ]);

        // Handle cover image update
        $imageName = Null;
            if ($request->hasFile('cover_image')) {
                // Delete the old cover image if it exists

                // Upload the new cover image
                $coverImage = $request->file('cover_image');
                $imageName = time() . '.' . $coverImage->getClientOriginalExtension();

                $coverImage->storeAs('covers', $imageName, 'public'); // Adjust the storage path as needed

                // Update the request data to include the new cover image name
                $request->merge(['cover_image' => $imageName]);
            }
        $request['cover_image']=$imageName;
        $request['user_id'] = Auth::user()->id;


        $module=$request->module_id;
        $course=new Course();
        $course->create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => $request->input('slug'),
            'price' => $request->input('price'),
            'module_id' => $module,
            'user_id'=>Auth::user()->id,
            'duration_in_minutes' => $request->input('duration_in_minutes'),
            'is_published' => $request->input('is_published'),
            'published_at' => $request->input('published_at'),
            'cover_image' => $imageName, // keep the existing value if not provided
        ]);

        $module = Module::findOrFail($request->module_id)->first();
        if ($request->is_published) {
            return redirect()->route('lms.support-courses')->with('success', 'Course created successfully.');

        }
        else {
            return redirect()->route('lms.support-draft-courses')->with('success', 'Course created successfully.');

        }
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        $contents = CourseContent::where('course_id', $course->id)->where('parent_id', 0)->get();
        $enrolledStudents = $course->students;

        $quizzes = Quiz::where('course_id', $course->id)->get();

        return view('support.courses.show', compact('course', 'contents', 'quizzes', 'enrolledStudents'));
    }


    public function approve($courseId, $studentId)
    {
        $course = Course::find($courseId);

        // Check if the user is enrolled in the course
        if (!$course->students()->where('user_id', $studentId)->exists()) {
            abort(404); // You can handle this case based on your application's logic
        }

        // Update the enrollment status to 'approved'
        $course->students()->updateExistingPivot($studentId, ['approval_status' => 'approved']);

        return redirect()->back()->with('success', 'Enrollment approved successfully.');
    }

    public function reject($courseId, $studentId)
    {
        $course = Course::find($courseId);

        // Check if the user is enrolled in the course
        if (!$course->students()->where('user_id', $studentId)->exists()) {
            abort(404); // You can handle this case based on your application's logic
        }

        // Update the enrollment status to 'rejected'
        $course->students()->updateExistingPivot($studentId, ['approval_status' => 'rejected']);

        return redirect()->back()->with('success', 'Enrollment rejected successfully.');
    }

    public function edit($id)
    {
        $data['modules'] = Module::all();
        $data['course'] = Course::findOrFail($id);
        return view('support.courses.edit', $data);
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
        if ($request->is_published) {
            return redirect()->route('lms.support-courses')->with('success', 'Course created successfully.');

        }
        else {
            return redirect()->route('lms.support-draft-courses')->with('success', 'Course created successfully.');

        }
        }

    public function destroy($course)
    {
        $course = Course::where('id', $course)->first();
        // Delete the cover image
        if ($course->cover_image) {
            Storage::disk('public')->delete('covers/' . $course->cover_image);
        }

        $course->delete();

        return back()->with('success', 'Course deleted successfully.');
    }


    // Add the following methods

    public function createContent($courseId)
    {
        $course = Course::findOrFail($courseId);
        return view('support.courses.create-content', compact('course'));
    }

    public function saveContent(Request $request, $courseId)
    {
        // $this->validateContent($request);


        // $file = $request->file('file');
        // $filePath = $file->store('course_contents');
        // Handle cover image
        $filePath='Null';
        if ($request->hasFile('file')) {

            // Upload the new cover image
            $coverImage = $request->file('file');
            $imageName = time() . '.' . $coverImage->getClientOriginalExtension();
            $coverImage->storeAs('course_contents', $imageName, 'public'); // Adjust the storage path as needed
            // Update the request data to include the new cover image name
            $filePath = $imageName;
        }

        // Create the sub-section
        $subSection = CourseContent::create([
            'course_id' => $courseId,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'url' => $request->input('url'),
            'file_path' => $filePath,
            'duration' => $request->input('duration'),
        ]);

        return redirect()->route('lms.support-show-course', $courseId)->with('success', 'Course content created successfully');
    }

    public function editContent($courseId, $contentId)
    {
        $course = Course::findOrFail($courseId);
        $content = CourseContent::findOrFail($contentId);
        return view('support.courses.edit-content', compact('course', 'content'));
    }

    public function updateContent(Request $request, $courseId, $contentId)
    {
        // $this->validateContent($request);

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

        return redirect()->route('lms.support-show-course', $courseId)->with('success', 'Course content updated successfully');
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

    public function showCourseContent($courseId, $contentId)
    {
        $course = Course::findOrFail($courseId);
        $content = CourseContent::findOrFail($contentId);
        $subContents = CourseContent::where('parent_id', $content->id)->get();

        return view('support.courses.show-content', compact('course', 'content', 'subContents'));
    }

    public function deleteCourseContent($courseId, $contentId)
    {
        $content = CourseContent::findOrFail($contentId);

        if ($content->file_path != Null) {
            // Delete the file from storage
            Storage::delete($content->file_path);
        }

        // Delete the database record
        $content->delete();

        return redirect()->back()->with('success', 'Course content deleted successfully.');
    }

    public function createSubsection($courseId, $parentId)
    {
        // Retrieve course and parent content
        $course = Course::findOrFail($courseId);
        $parentContent = CourseContent::findOrFail($parentId);

        return view('support.courses.create-subsection', compact('course', 'parentContent'));
    }

    public function storeSubsection(Request $request, $courseId, $parentId)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:text,pdf,image,video',
            'file' => 'nullable|mimes:pdf,jpeg,png,mp4|max:2048', // Adjust the allowed file types and size
            'duration' => 'nullable|integer',
        ]);

        // Upload the file
        $filePath=Null;
        if ($request->hasFile('file')) {

            // Upload the new cover image
            $coverImage = $request->file('file');
            $imageName = time() . '.' . $coverImage->getClientOriginalExtension();
            $coverImage->storeAs('course_contents', $imageName, 'public'); // Adjust the storage path as needed
            // Update the request data to include the new cover image name
            $filePath = $imageName;
        }

        // Create the sub-section
        $subSection = CourseContent::create([
            'course_id' => $courseId,
            'parent_id' => $parentId,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'url' => $request->input('url'),
            'file_path' => $filePath,
            'duration' => $request->input('duration'),
        ]);

        // Redirect to the course content page
        return redirect()->route('lms.support-show-subsection', ['courseId' => $courseId, 'contentId' => $subSection->id]);
    }

    public function showSubsection($courseId, $subsectionId)
    {
        // Retrieve course and sub-section content
        $course = Course::findOrFail($courseId);
        $subsection = CourseContent::findOrFail($subsectionId);

        return view('support.courses.show-subsection', compact('course', 'subsection'));
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
