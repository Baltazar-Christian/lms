@extends('layouts.student')

@section('content')
    <div class="container mt-5">
        <h5 class="mb-2"> <i class="fa fa-book text-warning"></i> All Courses</h5>

        <!-- Search Form -->
        <form action="{{ route('student-courses.search') }}" method="get" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for a course">
                <button type="submit" class="btn btn-warning"> <i class="fa fa-search"></i> Search</button>
            </div>
        </form>
        <div class="row">

            <div class="col-md-9">

                <!-- Display All Courses -->
                <div class="row">
                    @forelse($courses as $course)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <a href="{{ route('student-courses.show', $course) }}"> <!-- Updated link -->

                                    <img src="{{ asset('public/storage/covers/' . $course->cover_image) }}" width="150px"
                                        height="150px" class="card-img-top" alt="{{ $course->name }}">
                                    <div class="card-body">

                                        <h6 class="card-title text-dark">{{ $course->title }}</h5>
                                            <p class="card-text text-dark">{{ $course->price }}</p>
                                            <!-- Add more course details as needed -->

                                            <!-- Enroll button -->
                                            <form
                                                action="{{ route('students.enrollSelf', ['student' => auth()->user(), 'course' => $course]) }}"
                                                method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-success form-control">Enroll</button>
                                            </form>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p>No courses available.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>
                        <i class="fa fa-list text-warning"></i>
                        CATEGORIES
                    </h5>
                </div>
                <div class="card-body">

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
