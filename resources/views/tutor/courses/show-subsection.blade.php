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

        @if ($subsection->type === 'video')
        <video width="100%" controls>
            <source src="{{ asset('public/storage/course_contents/' . $subsection->file_path) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @endif
    <hr>
    <h2>{{ $subsection->title }}</h2>
    <p> {!! $subsection->description !!}</p>
    <p>Type: {{ $subsection->type }}</p>
    <p>Duration: {{ $subsection->duration }} minutes</p>
    {{-- Display content details --}}
    <p>
        {!! $subsection->description !!}
    </p>


    @if ($subsection->type != 'video' || $subsection->type!='text')
    <div class="col-12">
    <hr>
        {{-- Display other file types or embed PDF viewer --}}
        <a href="{{ asset('public/storage/course_contents/' . $subsection->file_path) }}" target="_blank"
            type="button" class="btn btn-sm btn-dark float-end mt-2 mb-3">
        <i class="fa fa-download"></i>
        Download Attachment
        </a>
        <br>
    </div>
    @endif


    </div>
</div>
</div>

@endsection
