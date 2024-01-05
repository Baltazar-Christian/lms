<!-- resources/views/courses/edit-content.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Edit Course Content</h1>

        <form action="{{ url('courses/update-course/'.$course->id.'/content'.'/'. $content->id.'/update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Include validation errors if any --}}
            @include('partials.errors')

            <div class="form-group">
                <label for="title">Content Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $content->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Content Description</label>
                <textarea name="description" id="description" class="form-control" rows="4">{{ $content->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="file_path">Replace File</label>
                <input type="file" name="file_path" id="file_path" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Update Content</button>
        </form>
    </div>
@endsection
