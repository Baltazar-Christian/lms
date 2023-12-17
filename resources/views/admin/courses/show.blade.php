@extends('layouts.master')

@section('content')
    <div class="col-12 mt-2 m-2" style=" margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">

        <h1 style="color: #333; font-family: 'Arial', sans-serif; margin-bottom: 20px;">{{ $course->title }}</h1>

        <div class="col-5 mx-auto">
            @if ($course->cover_image)
            <img src="{{ asset('storage/covers/' . $course->cover_image) }}" alt="{{ $course->title }} Cover Image" style="max-width: 100%; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-bottom: 20px;">
        @endif
        </div>

        <p style="font-size: 16px; line-height: 1.6; color: #555; margin-bottom: 15px;"><strong>Description:</strong> {{ $course->description }}</p>
        <p style="font-size: 16px; line-height: 1.6; color: #555; margin-bottom: 15px;"><strong>Price:</strong> ${{ $course->price }}</p>
        <p style="font-size: 16px; line-height: 1.6; color: #555; margin-bottom: 15px;"><strong>Duration (minutes):</strong> {{ $course->duration_in_minutes }} minutes</p>
        <p style="font-size: 16px; line-height: 1.6; color: #555; margin-bottom: 15px;"><strong>Published:</strong> {{ $course->is_published ? 'Yes' : 'No' }}</p>

        <hr>
                {{-- Display course contents --}}
                <h2>Course Contents</h2>
                @foreach ($course->contents as $content)
                    <div>
                        <h3>{{ $content->title }}</h3>
                        <p>{{ $content->description }}</p>
                        <a href="{{ asset('storage/' . $content->file_path) }}" target="_blank">Download</a>
                        <a href="{{ route('lms.courses.edit-content', ['courseId' => $course->id, 'contentId' => $content->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                    </div>
                    <hr>
                @endforeach
        <div style="margin-top: 20px;">
            <a href="{{ route('lms.edit-course', $course->id) }}" class="btn btn-warning float-end" style="margin-right: 10px;">Edit Course</a>
                    {{-- Add content button --}}
            <a href="{{ route('lms.courses.create-content', $course->id) }}" class="btn btn-primary"  style="margin-right: 10px;">Add Content</a>

            <form action="{{ route('lms.delete-course', $course->id) }}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger float-end" onclick="return confirm('Are you sure?')">Delete Course</button>
            </form>
        </div>
    </div>
@endsection
