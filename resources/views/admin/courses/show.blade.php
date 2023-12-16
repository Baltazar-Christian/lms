<!-- resources/views/courses/show.blade.php -->

@extends('layouts.master')

@section('content')
    <h1>{{ $course->title }}</h1>

    <p><strong>Description:</strong> {{ $course->description }}</p>
    <p><strong>Price:</strong> {{ $course->price }}</p>
    <p><strong>Duration (minutes):</strong> {{ $course->duration_in_minutes }}</p>
    <p><strong>Published:</strong> {{ $course->is_published ? 'Yes' : 'No' }}</p>

    @if ($course->cover_image)
        <img src="{{ asset('storage/covers/' . $course->cover_image) }}" alt="Course Cover Image">
    @endif

    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit Course</a>

    <form action="{{ route('courses.destroy', $course->id) }}" method="post" style="display: inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Course</button>
    </form>
@endsection
