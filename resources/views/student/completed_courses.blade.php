@extends('layouts.student')

@section('content')
    <div class="container mt-5">
        <h5 class="mb-4"> <i class="fa fa-book text-warning"></i> Completed Courses </h5>

        <!-- Search Form -->
        <form action="{{ route('students.searchCourses', $user) }}" method="get" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for a course">
                <button type="submit" class="btn btn-warning">
                    <i class="fa fa-search"></i>
                    Search
                </button>
            </div>
        </form>

        <!-- Display Enrolled Courses -->
        <div class="row">

            <div class="col-md-9">

                <!-- Display All Courses -->
                <div class="row">
                    @forelse($enrolledCourses as $enrollement)
                        <div class="col-md-4 mb-4">
                            <div class="card">

                                <img src="{{ asset('public/storage/covers/' . $enrollement->course->cover_image) }}"
                                    width="150px" height="150px" class="card-img-top"
                                    alt="{{ $enrollement->course->name }}">
                                <div class="card-body">

                                    <h6 class="card-title text-dark">{{ $enrollement->course->title }}</h5>
                                        <p class="card-text text-dark">Tsh
                                            {{ number_format($enrollement->course->price, 2) }}</p>
                                        <!-- Add more course details as needed -->

                                        <!-- Enroll button -->
                                        <div class="row">
                                            <div class="col-12">
                                                @php
                                                    $enrollmenta = App\Models\Enrollment::where('user_id', Auth::user()->id)
                                                        ->where('course_id', $enrollement->course->id)
                                                        ->where('approval_status', 'approved')
                                                        ->latest()
                                                        ->first();
                                                @endphp
                                                @if ($enrollmenta)
                                                    <a href="{{ route('student-courses.show', $enrollement->course) }}"
                                                        class="btn form-control btn-sm  btn-success mb-2">
                                                        View
                                                    </a>
                                                @else
                                                    <a href="{{ route('student-unenrolled-courses.show', $enrollement->course) }}"
                                                        class="btn form-control btn-sm  btn-success mb-2">
                                                        View
                                                    </a>
                                                @endif

                                            </div>
                                        </div>
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

            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            <i class="fa fa-list text-warning"></i>
                            CATEGORIES
                        </h5>
                    </div>
                    <div class="card-body">
                        @php
                            $modules = App\Models\Module::get();
                        @endphp
                        <ul>
                            @foreach ($modules as $module)
                                <li class="nav-link bg-light mt-1"> <a
                                        href="{{ route('student-courses.module', $module->id) }}" class="text-dark"> <i
                                            class="fa fa-book text-warning"></i> <strong> {{ $module->name }}</strong> </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
