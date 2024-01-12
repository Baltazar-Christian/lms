<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    // NotificationController.php

    public function create()
    {
        $courses = Course::all();
        return view('notifications.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'message' => 'required|string',
        ]);

        $course = Course::find($request->course_id);
        $message = $request->message;

        // Notify enrolled students
        $enrolledStudents = $course->students;

        foreach ($enrolledStudents as $student) {
            $student->notify(new CourseNotification($course, $message));
        }

        return redirect()->route('notifications.create')->with('success', 'Notification sent successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
