@extends('layouts.student')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Enrolled Courses for {{ $user->name }}</h1>

        <!-- Search Form -->
        <form action="{{ route('students.searchCourses', $user) }}" method="get" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for a course">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <!-- Display Enrolled Courses -->
        <div class="row">
            @forelse($enrolledCourses as $course)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="{{ route('student-courses.show', $course) }}"> <!-- Updated link -->

                        <img src="{{ asset('storage/covers/'.$course->image_url) }}" class="card-img-top" alt="{{ $course->name }}">
                        <div class="card-body">
                            <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                                <!-- ... Existing course icon or image ... -->
                                <i class="fab fa-html5 fa-2x text-white-75"></i>
                            </div>
                            <div class="fs-sm text-white-75">
                                {{ $course->lessons_count }} lessons &bull; {{ $course->duration }}
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <h4 class="mb-1">{{ $course->title }}</h4>
                            <p class="text-muted">
                                <!-- ... Existing course content ... -->
                                Description: {{ $course->description }}
                            </p>
                            <div class="fs-sm text-muted">{{ $course->created_at->format('F d, Y') }}</div>
                            <!-- Unenroll button -->
                            <form action="{{ route('students.unenrollSelf', ['student' => $user, 'course' => $course]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger form-control">Unenroll</button>
                            </form>
                        </div>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>No enrolled courses yet.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection