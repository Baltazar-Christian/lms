@extends('layouts.master')

@section('content')
    <div class="container mt-2 mb-5 "
        {{-- style="border: 1px solid #ddd; border-radius: 8px; background-color: #fff; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);" --}}
        >

        <div class="card">
            <div class="card-header">
                {{-- <h5 class="text-start text-dark"> --}}
                    {{-- <i class="fa fa-book text-warning"></i>
                    {{ $course->title }} --}}

                <div class="mt-4 d-flex justify-content-end">
                    <a href="{{ route('lms.edit-course', $course->id) }}" class="btn btn-dark mx-1"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('lms.delete-course', $course->id) }}" method="post" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mx-1" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                    </form>
                    <a href="{{ route('lms.courses.create-content', $course->id) }}" class="btn btn-primary me-2">Add Content</a>
                    <a href="{{ route('lms.create-quiz', $course->id) }}" class="btn btn-info me-2">Add Quiz</a>


                </div>
            {{-- </h5> --}}
            </div>

            <div class="card-body p-2">



        <div class="col-5 mx-auto mt-4">
            @if ($course->cover_image)
                <img src="{{ asset('storage/covers/' . $course->cover_image) }}" alt="{{ $course->title }} Cover Image"
                    width="100%" class="img-fluid rounded mx-auto shadow mb-4">

            @endif
        </div>
        <p><strong>Title:</strong> ${{ $course->title }}</p>
        <p><strong>Price:</strong> ${{ $course->price }}</p>
        <p><strong>Duration:</strong> {{ $course->duration_in_minutes }} minutes</p>
        <p><strong>Published:</strong> {{ $course->is_published ? 'Yes' : 'No' }}</p>

        <p class="lead text-muted">{{ $course->description }}</p>
        <hr>

        {{-- Display course contents --}}
        <h6 class="mt-4 mb-3"> <i class="fa fa-list text-warning"></i> Course Contents</h6>
        @forelse ($contents as $content)

            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">{{ $content->title }}</h3>
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="{{ route('lms.show-course-content', ['courseId' => $course->id, 'contentId' => $content->id]) }}"
                            class="btn btn-sm btn-dark ms-2"><i class="fa fa-eye"></i> </a>
                        <a href="{{ asset('storage/' . $content->file_path) }}" target="_blank"
                            class="btn btn-sm btn-dark  ms-2"><i class="fa fa-download"></i></a>

                        <a href="{{ route('lms.courses.edit-content', ['courseId' => $course->id, 'contentId' => $content->id]) }}"
                            class="btn btn-sm btn-warning ms-2"><i class="fa fa-edit"></i></a>
                        <!-- Add the delete button -->
                        <form
                            action="{{ route('lms.delete-course-content', ['courseId' => $course->id, 'contentId' => $content->id]) }}"
                            method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger ms-2"><i class="fa fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>

        @empty
            <p class="text-muted">No contents available for this course.</p>
        @endforelse

        {{-- For Quizzes --}}
        <h6 class="mt-4 mb-3"> <i class="fa fa-list text-warning"></i> Quizzes</h6>
        @forelse ($quizzes as $quiz)
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">{{ $quiz->title }}</h3>
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="{{ route('lms.show-quiz', ['courseId' => $course->id, 'quizId' => $quiz->id]) }}"
                            class="btn btn-sm btn-primary ms-2">View </a>
                        {{-- <a href="{{ route('lms.edit-quiz', ['courseId' => $course->id, 'quizId' => $quiz->id]) }}"
                            class="btn btn-sm btn-warning ms-2">Edit</a> --}}
                        <!-- Add the delete button -->
                        {{-- <form
                            action="{{ route('lms.delete-quiz', ['quizId' => $quiz->id]) }}"
                            method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger ms-2">Delete</button>
                        </form> --}}
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">No quizzes available for this course.</p>
        @endforelse

    </div>

    </div>
@endsection
