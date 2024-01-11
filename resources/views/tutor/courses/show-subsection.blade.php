<!-- resources/views/courses/show-subsection.blade.php -->

@extends('layouts.tutor')

@section('content')

<div class="container mt-2">
<div class="card">
    <div class="card-header">
        <h5>Sub-Section Details

            <a href="{{ route('lms.tutor-show-course-content', ['courseId' => $subsection->course->id, 'contentId' => $subsection->parent_id]) }}" class="btn btn-sm btn-dark float-end">
                <i class="fa fa-list"></i> Back
            </a>        </h5>

    </div>
    <div class="card-body">

        <h2>{{ $subsection->title }}</h2>
        <p> {!! $subsection->description !!}</p>
        <p>Type: {{ $subsection->type }}</p>
        <p>Duration: {{ $subsection->duration }} minutes</p>

        @if ($subsection->type === 'video')
            <video width="100%" controls>
                <source src="{{ asset('public/storage/course_contents/' . $subsection->file_path) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        @else
            {{-- Display other file types or embed PDF viewer --}}
            {{-- Adjust this part based on your actual requirements --}}
            <a href="{{ asset('public/storage/course_contents/' . $subsection->file_path) }}" target="_blank">View File</a>
        @endif

        {{-- Add more details or customize the display based on your requirements --}}
    </div>
</div>
</div>

@endsection
