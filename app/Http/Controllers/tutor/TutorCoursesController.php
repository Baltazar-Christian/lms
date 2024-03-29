<?php

namespace App\Http\Controllers\tutor;

use App\Models\Quiz;
use App\Models\Course;
use App\Models\Module;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use App\Models\CourseContent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class TutorCoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Require authentication for all tutor routes
        $this->middleware('role:tutor'); // Require tutor role for all tutor routes
    }

    // For View Module Courses
    public function module_courses($id)
    {
        $data['module'] = Module::findOrFail($id);
        $data['courses'] = Course::where('module_id', $id)
        ->where('user_id', Auth::user()->id)
        ->latest()->get();
        return view('tutor.modules.show', $data);
    }

    // For Create Course
    public function create($id)
    {
        $data['module'] = Module::findOrFail($id);
        return view('tutor.courses.create', $data);
    }

    // For Show Course
    public function show($id)
    {
        $course = Course::findOrFail($id);
        $contents = CourseContent::where('course_id', $course->id)->where('parent_id', 0)->get();
        $enrolledStudents = $course->students;

        $quizzes = Quiz::where('course_id', $course->id)->get();

        return view('tutor.courses.show', compact('course', 'contents', 'quizzes', 'enrolledStudents'));
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
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:20480',
        ]);

        // Handle cover image update
        $imageName = Null;


            if ($request->hasFile('cover_image')) {

                // Upload the new cover image
                $coverImage = $request->file('cover_image');


                $imageName = time() . '.' . $coverImage->getClientOriginalExtension();
                $coverImage->storeAs('covers', $imageName, 'public'); // Adjust the storage path as needed

            }
        // $request['cover_image']=$imageName;

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
        // Course::create($request->all());

        $module = Module::findOrFail($request->module_id)->first();;

        return redirect()->route('lms.tutor-view-module', $module->id)->with('success', 'Course created successfully.');
    }

    public function editContent($courseId, $contentId)
    {
        $course = Course::findOrFail($courseId);
        $content = CourseContent::findOrFail($contentId);
        return view('tutor.courses.edit-content', compact('course', 'content'));
    }

    public function edit($id)
    {
        $data['modules'] = Module::all();
        $data['course'] = Course::findOrFail($id);
        return view('tutor.courses.edit', $data);
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
        return redirect()->route('lms.tutor-view-module', $course->module->id)->with('success', 'Course Updated successfully.');

    }


    public function showSubsection($courseId, $subsectionId)
    {
        // Retrieve course and sub-section content
        $course = Course::findOrFail($courseId);
        $subsection = CourseContent::findOrFail($subsectionId);

        return view('tutor.courses.show-subsection', compact('course', 'subsection'));
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

        return redirect()->route('lms.show-tutor-course', $courseId)->with('success', 'Course content updated successfully');
    }

    public function storeSubsection(Request $request, $courseId, $parentId)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:text,pdf,image,video',
            'file' => 'nullable|mimes:pdf,jpeg,png,mp4|max:20480000', // Adjust the allowed file types and size
            'duration' => 'nullable|integer',
            'url' => 'nullable|string',

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
        return redirect()->route('lms.tutor-show-course-content', ['courseId' => $courseId, 'contentId' => $parentId]);
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
        return view('tutor.courses.create-content', compact('course'));
    }

    public function saveContent(Request $request, $courseId)
    {
        // $this->validateContent($request);


        // $file = $request->file('file');
        // $filePath = $file->store('course_contents');
        // Handle cover image update
        $filePath = Null;
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

        return redirect()->route('lms.show-tutor-course', $courseId)->with('success', 'Course content created successfully');
    }



    public function showCourseContent($courseId, $contentId)
    {
        $course = Course::findOrFail($courseId);
        $content = CourseContent::findOrFail($contentId);
        $subContents = CourseContent::where('parent_id', $content->id)->get();

        return view('tutor.courses.show-content', compact('course', 'content', 'subContents'));
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


    public function createSubsection($courseId, $parentId)
    {
        // Retrieve course and parent content
        $course = Course::findOrFail($courseId);
        $parentContent = CourseContent::findOrFail($parentId);

        return view('tutor.courses.create-subsection', compact('course', 'parentContent'));
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



    // Approval function in your EnrollmentController.php
    public function approveEnrollment(Enrollment $enrollment)
    {
        $enrollment->update(['approval_status' => 'approved']);

        // Notify the user about the approval
        // You can implement this based on your notification system
        // For example, sending an email to the user
        event(new EnrollmentApproved($enrollment));

        return redirect()->route('courses.show', $enrollment->course->id)->with('success', 'Enrollment approved.');
    }
}
