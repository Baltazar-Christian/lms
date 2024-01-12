<?php

namespace App\Http\Controllers;

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
