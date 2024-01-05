@extends('layouts.student')

@section('content')
                <!-- Stats -->
                <div class="row">
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                        <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                            <div class="block-content block-content-full">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Available Courses</div>
                                <div class="fs-2 fw-normal text-dark">--</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                        <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                            <div class="block-content block-content-full">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Enrolled Courses</div>
                                <div class="fs-2 fw-normal text-dark">--</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                        <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                            <div class="block-content block-content-full">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">INCOMPLETE COURSES</div>
                                <div class="fs-2 fw-normal text-dark">--</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-md-3 col-lg-6 col-xl-3">
                        <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                            <div class="block-content block-content-full">
                                <div class="fs-sm fw-semibold text-uppercase text-muted">COMPLETE COURSES</div>
                                <div class="fs-2 fw-normal text-dark">--</div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- END Stats -->


                <!-- Page Content -->
<div class="content content-boxed">
    <div class="row items-push py-4">
        @foreach($courses as $course)
        <div class="col-md-3 mb-4">
            <div class="card">
                <a href="{{ route('student-courses.show', $course) }}"> <!-- Updated link -->

                <img src="{{ asset('public/storage/covers/' . $course->cover_image) }}" width="150px" height="150px" class="card-img-top" alt="{{ $course->name }}">
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
                        Price: {{ number_format($course->price,2)  }}
                    </p>
                    {{-- <div class="fs-sm text-muted">{{ $course->created_at->format('F d, Y') }}</div> --}}

                    @if ($student->courses->contains('id', $course->id))
                    <!-- Unenroll button -->
                    <form action="{{ route('students.unenrollSelf', ['student' => $student, 'course' => $course]) }}" method="post">
                        @csrf
                        {{-- <div class="col-12"> --}}
                            <button type="submit" class=" form-control btn btn-danger btn-block">Unenroll</button>
                        {{-- </div> --}}
                    </form>
                @else
                    <!-- Enroll button -->
                    <form action="{{ route('students.enrollSelf', ['student' => $student, 'course' => $course]) }}" method="post">
                        @csrf
                        {{-- <div class="col-12"> --}}
                        <button type="submit" class=" form-control btn btn-success btn-block">Enroll</button>
                        {{-- </div> --}}
                    </form>
                @endif
                </div>
                </a>
            </div>
        </div>

        @endforeach
    </div>
</div>


@endsection
