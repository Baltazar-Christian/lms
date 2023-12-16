@extends('layouts.master')

@section('content')
    <div style="max-width: 600px; margin: 0 auto;">
        @if ($course->cover_image)
        <img src="{{ asset('storage/covers/' . $course->cover_image) }}" alt="Course Cover Image" style="max-width: 100%; margin-bottom: 20px;">
    @endif
        <h1 style="color: #333; font-family: 'Arial', sans-serif;">{{ $course->title }}</h1>

        <p><strong>Description:</strong> {{ $course->description }}</p>
        <p><strong>Price:</strong> ${{ $course->price }}</p>
        <p><strong>Duration (minutes):</strong> {{ $course->duration_in_minutes }} minutes</p>
        <p><strong>Published:</strong> {{ $course->is_published ? 'Yes' : 'No' }}</p>

    

        <a href="{{ route('lms.edit-course', $course->id) }}" class="btn btn-warning" style="display: block; margin-bottom: 10px;">Edit Course</a>

        <form action="{{ route('lms.delete-course', $course->id) }}" method="post" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Course</button>
        </form>
    </div>
@endsection
