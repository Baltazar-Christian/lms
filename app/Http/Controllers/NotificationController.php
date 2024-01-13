<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Notification;
use Illuminate\Http\Request;


class NotificationController extends Controller
{
    // View all notifications
    public function index()
    {
        $notifications = Notification::all();

        return view('tutor.notifications.index', compact('notifications'));
    }
    public function create()
    {
        $courses = Course::all();
        return view('tutor.notifications.create', compact('courses'));
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
    // View a single notification
    public function show(Notification $notification)
    {
        return view('tutor.notifications.show', compact('notification'));
    }

    // Edit a notification (if needed)
    public function edit(Notification $notification)
    {
        return view('tutor.notifications.edit', compact('notification'));
    }

    // Update a notification (if needed)
    public function update(Request $request, Notification $notification)
    {
        // Add logic to update the notification

        return redirect()->route('tutor.notifications.index')->with('success', 'Notification updated successfully.');
    }

    // Delete a notification
    public function destroy(Notification $notification)
    {
        $notification->delete();

        return redirect()->route('tutor.notifications.index')->with('success', 'Notification deleted successfully.');
    }

}
