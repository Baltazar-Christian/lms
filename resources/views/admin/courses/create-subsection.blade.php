<!-- resources/views/courses/create-subsection.blade.php -->

@extends('layouts.master')

@section('content')
    <h1>Create Sub-Section</h1>

    <form action="{{ route('lms.create-subsection', ['courseId' => $course->id, 'parentId' => $parentContent->id]) }}" method="post" enctype="multipart/form-data">
        @csrf

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
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="type">Content Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="pdf">PDF</option>
                <option value="image">Image</option>
                <option value="video">Video</option>
            </select>
        </div>

        <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="file" id="file" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="duration">Duration (minutes)</label>
            <input type="number" name="duration" id="duration" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Create Sub-Section</button>
    </form>
@endsection
