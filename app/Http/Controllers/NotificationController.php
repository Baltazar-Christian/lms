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
            // 'user_id' => 'required|exists:users,id',
            'course_id' => 'nullable|exists:courses,id',
            'message' => 'required|string',
            // 'read' => 'boolean',
        ]);

        Notification::create($request->all());

        return redirect()->route('notifications.index')->with('success', 'Notification created successfully');

        // return redirect()->route('notifications.create')->with('success', 'Notification sent successfully.');
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
        $request->validate([
            // 'user_id' => 'required|exists:users,id',
            'course_id' => 'nullable|exists:courses,id',
            'message' => 'required|string',
            // 'read' => 'boolean',
        ]);

        $notification->update($request->all());

        return redirect()->route('notifications.index')->with('success', 'Notification updated successfully');
    }

    // Delete a notification
    public function destroy(Notification $notification)
    {
        $notification->delete();

        return redirect()->route('tutor.notifications.index')->with('success', 'Notification deleted successfully.');
    }



    public function openNotification(Notification $notification)
    {
        // Attach the authenticated user to the notification
        Auth::user()->notifications()->syncWithoutDetaching([$notification->id]);

        // Optionally mark the notification as "read" or perform other actions

        return redirect()->route('notifications.show', $notification)
            ->with('success', 'Notification opened successfully');
    }

}
