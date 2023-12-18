<!-- Example content view with video support -->
@extends('layouts.master')

@section('content')
    <h1>Course Content</h1>

    {{-- Display content details --}}

    <div class="mt-3">
        <h2>Sub-Sections</h2>

        <ul>
            {{-- Loop through sub-sections --}}
            @foreach ($content->subContents as $subContent)
                <li>
                    {{ $subContent->title }}

                    {{-- Add a link to view/edit/delete sub-section --}}
                    <a href="{{ route('lms.show-content', ['courseId' => $course->id, 'contentId' => $subContent->id]) }}">View</a>
                    <a href="{{ route('lms.edit-subsection', ['courseId' => $course->id, 'contentId' => $subContent->id]) }}">Edit</a>
                    <a href="{{ route('lms.delete-subsection', ['courseId' => $course->id, 'contentId' => $subContent->id]) }}">Delete</a>
                </li>
            @endforeach
        </ul>

        {{-- Add button to create a new sub-section --}}
        <a href="{{ route('lms.create-subsection', ['courseId' => $course->id, 'parentId' => $content->id]) }}" class="btn btn-primary">Create Sub-Section</a>
    </div>
@endsection
