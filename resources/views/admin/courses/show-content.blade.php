@extends('layouts.master')

@section('content')
    <div class="container mt-3 mx-auto mb-5 p-4 card rounded shadow mx-1">

        <h4 class="text-start text-dark"> <div class="fa fa-book"></div> {{ $course->title }} - Course Content</h4>

        <hr>
        {{-- Display content details --}}

        <div class="mt-4">
            <h2>Sub-Sections</h2>

            <ul class="list-group">
                {{-- Loop through sub-sections --}}
                @forelse ($subContents as $subContent)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ $subContent->title }}</span>

                        {{-- Add buttons to view/edit/delete sub-section --}}
                        <div class="btn-group" role="group">
                            <a href="{{ route('lms.show-subsection', ['courseId' => $course->id, 'contentId' => $subContent->id]) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('lms.edit-subsection', ['courseId' => $course->id, 'contentId' => $subContent->id]) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('lms.delete-subsection', ['courseId' => $course->id, 'contentId' => $subContent->id]) }}" class="btn btn-danger">Delete</a>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item">No sub-sections available for this content.</li>
                @endforelse
            </ul>
            {{-- Add button to create a new sub-section --}}
            <a href="{{ route('lms.create-subsection', ['courseId' => $course->id, 'parentId' => $content->id]) }}" class="btn btn-primary float-end mt-3">Create Sub-Section</a>
        </div>
         <div class="mt-4">
            <h2>Quizes</h2>

            <ul class="list-group">
                {{-- Loop through sub-sections --}}
                @forelse ($subContents as $subContent)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ $subContent->title }}</span>

                        {{-- Add buttons to view/edit/delete sub-section --}}
                        <div class="btn-group" role="group">
                            <a href="{{ route('lms.show-subsection', ['courseId' => $course->id, 'contentId' => $subContent->id]) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('lms.edit-subsection', ['courseId' => $course->id, 'contentId' => $subContent->id]) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('lms.delete-subsection', ['courseId' => $course->id, 'contentId' => $subContent->id]) }}" class="btn btn-danger">Delete</a>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item">No Quizes available for this content.</li>
                @endforelse
            </ul>
            {{-- Add button to create a new sub-section --}}
            <a href="{{ route('lms.create-quiz' ) }}" class="btn btn-primary float-end mt-3">Create Quiz</a>
        </div>
    </div>
@endsection
