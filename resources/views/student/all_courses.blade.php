@extends('layouts.student')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">All Courses</h1>

        <!-- Search Form -->
        <form action="{{ route('courses.search') }}" method="get" class="mb-4">
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
                        <img src="{{ $course->image_url }}" class="card-img-top" alt="{{ $course->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->name }}</h5>
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
