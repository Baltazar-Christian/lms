@extends('layouts.master')

@section('content')
    <div class="container card mt-5 mb-5 p-4" style="border: 1px solid #ddd; border-radius: 8px;  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">

        <h1 class="text-center text-dark">{{ $course->title }}</h1>

        <div class="col-8 mx-auto mt-4">
            @if ($course->cover_image)
                <img src="{{ asset('storage/covers/' . $course->cover_image) }}" alt="{{ $course->title }} Cover Image" class="img-fluid rounded shadow mb-4">
            @endif
        </div>

        <p class="lead text-muted">{{ $course->description }}</p>
        <p><strong>Price:</strong> ${{ $course->price }}</p>
        <p><strong>Duration:</strong> {{ $course->duration_in_minutes }} minutes</p>
        <p><strong>Published:</strong> {{ $course->is_published ? 'Yes' : 'No' }}</p>

        <hr>

        {{-- Display course contents --}}
        <h2 class="mt-4 mb-3">Course Contents</h2>
        @forelse ($course->contents as $content)
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">{{ $content->title }}</h3>
                    <p class="card-text">{{ $content->description }}</p>
                    <a href="{{ asset('storage/' . $content->file_path) }}" target="_blank" class="btn btn-sm btn-secondary">Download</a>
                    <a href="{{ route('lms.show-course-content', ['courseId' => $course->id, 'contentId' => $content->id]) }}" class="btn btn-sm btn-primary">View Content</a>
                    <a href="{{ route('lms.courses.edit-content', ['courseId' => $course->id, 'contentId' => $content->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                </div>
            </div>
        @empty
            <p>No contents available for this course.</p>
        @endforelse

        <div class="mt-4 d-flex justify-content-end">
            <a href="{{ route('lms.edit-course', $course->id) }}" class="btn btn-warning me-2">Edit Course</a>
            <a href="{{ route('lms.courses.create-content', $course->id) }}" class="btn btn-primary me-2">Add Content</a>

            <form action="{{ route('lms.delete-course', $course->id) }}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Course</button>
            </form>
        </div>
    </div>
@endsection
