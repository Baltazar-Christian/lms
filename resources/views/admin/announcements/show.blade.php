@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1>{{ $announcement->title }}</h1>
        <p>Status: {{ ucfirst($announcement->status) }}</p>
        <p>Content: {{ $announcement->content }}</p>

        @if ($announcement->attachment)
            <p>Attachment: <a href="{{ asset('storage/' . $announcement->attachment) }}" target="_blank">Download</a></p>
        @endif

        <a href="{{ route('announcements.index') }}" class="btn btn-primary mt-3">Back to Announcements</a>
        <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-warning mt-3">Edit</a>

        <form action="{{ route('announcements.destroy', $announcement->id) }}" method="post" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </div>
@endsection
