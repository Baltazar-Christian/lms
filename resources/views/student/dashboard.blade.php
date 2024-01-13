@extends('layouts.student')

@section('content')
    <!-- Stats -->
    <div class="row">
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop" href="{{ route('courses.allCourses') }}">
                <div class="block-content block-content-full">
                    <div class="fs-sm fw-semibold text-warning text-uppercase ">Available Courses </div>
                    <div class="fs-2 fw-normal text-dark">{{ $available }}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop" href="{{ route('student.enrolledCourses', Auth::user()->id) }}">
                <div class="block-content block-content-full">
                    <div class="fs-sm fw-semibold text-warning text-uppercase ">Enrolled Courses</div>
                    <div class="fs-2 fw-normal text-dark">{{ $enrolled }}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop" href="{{ route('student.enrolledCourses', Auth::user()->id) }}">
                <div class="block-content block-content-full">
                    <div class="fs-sm fw-semibold text-warning text-uppercase ">INCOMPLETE COURSES</div>
                    <div class="fs-2 fw-normal text-dark">{{ $complete }}</div>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-lg-6 col-xl-3">
            <a class="block block-rounded block-link-pop" href="{{ route('student.completedCourses', Auth::user()->id) }}">
                <div class="block-content block-content-full">
                    <div class="fs-sm fw-semibold text-warning text-uppercase ">COMPLETE COURSES</div>
                    <div class="fs-2 fw-normal text-dark">{{ $incomplete }}</div>
                </div>
            </a>
        </div>
    </div>
    <!-- END Stats -->


    <!-- Page Content -->
    <div class="content card mb-2 content-boxed">
        <h5>
            <i class="fa fa-book text-warning"></i>
            Latest Courses
        </h5>
        <hr>
        <div class="row items-push py-4">
            @foreach ($courses as $course)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <a href="{{ route('student-courses.show', $course) }}"> <!-- Updated link -->

                            <img src="{{ asset('public/storage/covers/' . $course->cover_image) }}" width="150px"
                                height="150px" class="card-img-top" alt="{{ $course->name }}">
                            <div class="card-body">
                                {{-- <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                        <!-- ... Existing course icon or image ... -->
                        <i class="fab fa-html5 fa-2x text-white-75"></i>
                    </div> --}}
                                {{-- <div class="fs-sm text-white-75">
                        {{ $course->lessons_count }} lessons &bull; {{ $course->duration }}
                    </div> --}}
                            </div>
                            <div class="block-content block-content-full">
                                <h6 class="text-dark">{{ $course->title }}</h6>
                                <p class="text-muted">
                                    <!-- ... Existing course content ... -->
                                    Price: {{ number_format($course->price, 2) }}
                                </p>
                                {{-- <div class="fs-sm text-muted">{{ $course->created_at->format('F d, Y') }}</div> --}}
                                <!-- Enroll button -->
                                @if (Auth::user()->courses->contains('id', $course->id))
                                    <div class="row">
                                        <div class="col-6">
                                            @php
                                                $enrollment = App\Models\Enrollment::where('user_id', Auth::user()->id)
                                                    ->where('course_id', $course->id)
                                                    ->where('approval_status', 'approved')
                                                    ->latest()
                                                    ->first();
                                            @endphp
                                            @if ($enrollment)
                                                <a href="{{ route('student-courses.show', $course) }}"
                                                    class="btn form-control btn-sm  btn-success mb-2">
                                                    View
                                                </a>
                                            @else
                                                <a href="{{ route('student-unenrolled-courses.show', $course) }}"
                                                    class="btn form-control btn-sm  btn-success mb-2">
                                                    View
                                                </a>
                                            @endif

                                        </div>
                                        <div class="col-6">
                                            <!-- Unenroll button -->
                                            <form
                                                action="{{ route('students.unenrollSelf', ['student' => Auth::user(), 'course' => $course]) }}"
                                                method="post">
                                                @csrf
                                                {{-- <div class="col-12"> --}}
                                                <button type="submit"
                                                    class=" form-control btn btn-danger btn-sm btn-block">Unenroll</button>
                                                {{-- </div> --}}
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="{{ route('student-unenrolled-courses.show', $course) }}"
                                                class="btn form-control btn-sm  btn-success mb-2">
                                                View
                                            </a>
                                        </div>
                                        <div class="col-md-8">
                                            @if ($course->price <= 0)
                                                <!-- Enroll button -->
                                                <form
                                                    action="{{ route('students.enrollSelf', ['student' => Auth::user(), 'course' => $course]) }}"
                                                    method="post">
                                                    @csrf
                                                    {{-- <div class="col-12"> --}}
                                                    <button type="submit" class="btn btn-success btn-sm form-control ">
                                                        <i class="fa fa-book"></i>
                                                        Enroll
                                                    </button>
                                                    {{-- </div> --}}
                                                </form>
                                            @else
                                                <!-- Enroll button -->
                                                <form
                                                    action="{{ route('students.enrollSelf', ['student' => Auth::user(), 'course' => $course]) }}"
                                                    method="post">
                                                    @csrf
                                                    {{-- <div class="col-12"> --}}
                                                    <button type="submit"
                                                        class=" form-control btn btn-warning  btn-sm btn-block">

                                                        <i class="fa fa-shopping-cart"></i>
                                                        Purchase
                                                    </button>
                                                    {{-- </div> --}}
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
