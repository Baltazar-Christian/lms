<!-- resources/views/courses/show.blade.php -->

@extends('layouts.student')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <img src="{{ asset('storage/covers/'.$course->cover_image ) }}" class="card-img-top" alt="{{ $course->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text">{{ $course->description }}</p>
                        <!-- Add more course details as needed -->
                    </div>
                </div>

                <!-- Enroll button -->
                <form action="{{ route('students.enrollSelf', ['student' => auth()->user(), 'course' => $course]) }}" method="post" class="mt-3">
                    @csrf
                    <button type="submit" class="btn btn-success">Enroll</button>
                </form>
            </div>

            <!-- Display Course Contents -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Course Contents</h2>
                        <ul class="list-group list-group-flush">
                            @forelse($courseContents as $content)
                                <li class="list-group-item">
                                    <a href="{{ route('contents.show', $content) }}">{{ $content->title }}</a>
                                </li>
                                <!-- Add more content details as needed -->
                            @empty
                                <li class="list-group-item">No contents available for this course.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Contents for Enrolled Courses -->
        <div class="mt-5">
            <h2>Enrolled Courses</h2>
            <div class="row">
                @foreach(auth()->user()->courses as $enrolledCourse)
                <div class="col-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $enrolledCourse->title }}</h5>
                            <p class="card-text">{{ $enrolledCourse->description }}</p>
                            <!-- Add more course details as needed -->

                            <a href="{{ route('student-courses.show', $enrolledCourse) }}" class="form-control btn btn-primary">View Course</a>
                        </div>
                    </div>
                </div>

            @endforeach
            </div>

        </div>
    </div>
@endsection
