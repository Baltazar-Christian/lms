<!-- resources/views/courses/edit.blade.php -->

@extends('layouts.master')

@section('content')
    <h1>Edit Course</h1>

    <form action="{{ route('courses.update', $course->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Include validation errors if any --}}
        @include('partials.errors')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $course->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ $course->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $course->price }}" required>
        </div>

        <div class="form-group">
            <label for="duration_in_minutes">Duration (minutes)</label>
            <input type="number" name="duration_in_minutes" id="duration_in_minutes" class="form-control" value="{{ $course->duration_in_minutes }}" required>
        </div>

        <div class="form-group">
            <label for="is_published">Published</label>
            <select name="is_published" id="is_published" class="form-control">
                <option value="1" {{ $course->is_published ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ !$course->is_published ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="form-group">
            <label for="cover_image">Course Cover Image</label>
            <input type="file" name="cover_image" id="cover_image" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Update Course</button>
    </form>
@endsection
