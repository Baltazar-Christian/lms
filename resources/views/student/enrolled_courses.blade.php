@extends('layouts.student')

@section('content')
    <div class="container mt-5">
        <h5 class="mb-4"> <i class="fa fa-book text-warning"></i> Enrolled Courses </h5>

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

        <div class="row">
            <div class="col-md-9">
                <!-- Display Enrolled Courses -->
                <div class="row">
                    @forelse($enrolledCourses as $course)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <!-- Updated link -->

                                <img src="{{ asset('public/storage/covers/' . $course->cover_image) }}" width="150px"
                                    height="150px" class="card-img-top" alt="{{ $course->name }}">
                                <div class="card-body">

                                    <div class="fs-sm text-white-75">
                                        {{ $course->lessons_count }} lessons &bull; {{ $course->duration }}
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <h6 class="mb-1 text-dark">{{ $course->title }}</h6>
                                    <p class="text-muted">
                                        <!-- ... Existing course content ... -->
                                        Price: {{ number_format($course->price, 2) }}
                                    </p>
                                    <!-- resources/views/courses/show.blade.php -->
                                    @if ($course->approval_status === 'approved')
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ route('student-courses.show', $course) }}"
                                                    class="btn btn-sm btn-success">
                                                    View Course
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <form
                                                    action="{{ route('students.unenrollSelf', ['student' => $user, 'course' => $course]) }}"
                                                    method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-danger form-control">Unenroll</button>
                                                </form>
                                            </div>
                                        </div>
                                        {{-- <span class="badge bg-success">Enrolled</span> --}}
                                        <!-- Unenroll button -->
                                    @elseif ($course->approval_status === 'rejected')
                                        <div class="row">
                                            <div class="col-md-12">

                                                <span class="badge bg-danger">Enrollment Rejected</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="{{ route('student-unenrolled-courses.show', $course) }}"
                                                    class="btn btn-block btn-sm btn-success">
                                                    View
                                                </a>
                                            </div>
                                            <div class="col-md-6">
                                                <span class="badge bg-warning"> Pending </span>

                                            </div>
                                        </div>
                                    @endif

                                    {{-- <div class="fs-sm text-muted">{{ $course->created_at->format('F d, Y') }}</div> --}}

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
                                <li class="nav-link bg-light mt-1"> <a href="" class="text-dark"> <i
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
