@extends('layouts.master')

@section('content')
    <div class="container mt-5 mb-5 p-4" style="border: 1px solid #ddd; border-radius: 8px; background-color: #fff; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">

        <h1 class="text-center text-dark">{{ $course->title }} - {{ $content->title }}</h1>

        <p class="lead text-muted">{{ $content->description }}</p>

        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ asset('storage/' . $content->file_path) }}" target="_blank" class="btn btn-primary">View Content</a>
        </div>

        <hr>

        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ route('lms.courses.edit-content', ['courseId' => $course->id, 'contentId' => $content->id]) }}" class="btn btn-warning me-2">Edit Content</a>
{{--
            <form action="{{ route('lms.courses.delete-content', ['courseId' => $course->id, 'contentId' => $content->id]) }}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Content</button>
            </form> --}}
        </div>
    </div>
@endsection
