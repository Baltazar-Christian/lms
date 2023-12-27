@extends('layouts.student')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">All Courses</h1>

        <!-- Search Form -->
        <form action="{{ route('student-courses.search') }}" method="get" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for a course">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <!-- Display All Courses -->
        <div class="row">
            @forelse($courses as $course)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/covers/'.$course->image_url) }}" class="card-img-top" alt="{{ $course->name }}">
                        <div class="card-body">
                            <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                                <!-- ... Existing course icon or image ... -->
                                <i class="fab fa-html5 fa-2x text-white-75"></i>
                            </div>
                            <h5 class="card-title">{{ $course->title }}</h5>
                            <p class="card-text">{{ $course->description }}</p>
                            <!-- Add more course details as needed -->

                            <!-- Enroll button -->
                            <form action="{{ route('students.enrollSelf', ['student' => auth()->user(), 'course' => $course]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success form-control">Enroll</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>No courses available.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
