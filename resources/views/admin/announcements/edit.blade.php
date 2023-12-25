<!-- resources/views/announcements/edit.blade.php -->

@extends('layouts.master')

@section('content')
    <h1>Edit Announcement</h1>

    <form action="{{ route('announcements.update', $announcement->id) }}" method="post">
        @csrf
        @method('PUT')

        {{-- Include validation errors if any --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $announcement->title }}" required>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="4" required>{{ $announcement->content }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="published" {{ $announcement->status === 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ $announcement->status === 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Announcement</button>
    </form>
@endsection
