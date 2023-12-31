<?php

namespace App\Http\Controllers\support;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportAnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->get();

        return view('support.announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('support.announcements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'attachment' => 'file|mimes:pdf,docx|max:10240|nullable',
            'status' => 'in:draft,published',
        ]);

        $attachmentPath = $request->file('attachment')->store('attachments', 'public');

        Announcement::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'attachment' => $attachmentPath,
            'status' => $request->input('status'),
        ]);

        return redirect()->route('support-announcements.index')->with('success', 'Announcement created successfully.');
    }

    public function show(Announcement $announcement)
    {
        return view('support.announcements.show', compact('announcement'));
    }

    public function edit(Announcement $announcement)
    {
        return view('support.announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            // 'attachment' => 'file|mimes:pdf,docx|max:10240',
            'status' => 'in:draft,published',
        ]);

        // $attachmentPath = $request->file('attachment')->store('attachments', 'public');

        $announcement->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            // 'attachment' => $attachmentPath,
            'status' => $request->input('status'),
        ]);

        return redirect()->route('support-announcements.index')->with('success', 'Announcement updated successfully.');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('support-announcements.index')->with('success', 'Announcement deleted successfully.');
    }
}
