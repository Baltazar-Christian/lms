<?php

namespace App\Http\Controllers\tutor;

use App\Models\Quiz;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\CourseContent;
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

    // For Show Course
    public function show($id)
    {
        $course = Course::findOrFail($id);
        $contents=CourseContent::where('course_id',$course->id)->where('parent_id',NULL)->get();
        $quizzes=Quiz::where('course_id',$course->id)->get();

        return view('tutor.courses.show', compact('course','contents','quizzes'));
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

         // Handle cover image update
         if ($request->hasFile('cover_image')) {

            // Upload the new cover image
            $coverImage = $request->file('cover_image');
            $imageName = time() . '.' . $coverImage->getClientOriginalExtension();
            $coverImage->storeAs('covers', $imageName, 'public'); // Adjust the storage path as needed

            // Update the request data to include the new cover image name
            $request->merge(['cover_image' => $imageName]);
        }


        $request['user_id']=Auth::user()->id;

        Course::create($request->all());

        $module=Module::findOrFail($request->module_id)->first();;

        return redirect()->route('lms.tutor-view-module',$module->id)->with('success', 'Course created successfully.');
    }


    public function edit($id)
    {
        $data['modules'] = Module::all();
        $data['course'] = Course::findOrFail($id);
        return view('admin.courses.edit', $data);
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
        if ($request->hasFile('file')) {

            // Upload the new cover image
            $coverImage = $request->file('file');
            $imageName = time() . '.' . $coverImage->getClientOriginalExtension();
            $coverImage->storeAs('course_contents', $imageName, 'public'); // Adjust the storage path as needed
            // Update the request data to include the new cover image name
            $filePath=$imageName;
        }

        // Create the sub-section
        $subSection = CourseContent::create([
            'course_id' => $courseId,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'file_path' => $filePath,
            'duration' => $request->input('duration'),
        ]);

        return redirect()->route('lms.tutor-show-course', $courseId)->with('success', 'Course content created successfully');
    }
}
