@extends('layouts.student')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('students.searchCourses', $user) }}" method="get" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for a course">
                <button type="submit" class="btn btn-warning">Search</button>
            </div>
        </form>
        <h6 class="mb-4">Search Results for "{{ $search }}"</h6>

        <!-- Display Search Results -->
        <div class="row">
            @forelse($courses as $course)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ 'public/storage/covers/' .$course->image_url }}" class="card-img-top" width="150px"
                        height="150px" alt="{{ $course->name }}">
                        <div class="card-body">
                            <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                                <!-- ... Existing course icon or image ... -->
                                <i class="fab fa-html5 fa-2x text-white-75"></i>
                            </div>
                            <h5 class="card-title">{{ $course->title }}</h5>
                            {{-- <p class="card-text">{{ $course->description }}</p> --}}
                            <!-- Add more course details as needed -->

                            <!-- Enroll button -->
                            @if (Auth::user()->courses->contains('id', $course->id))
                            <div class="row">
                                <div class="col-6">
                                    @php
                                        $enrollment=App\Models\Enrollment::where('user_id',Auth::user()->id)->where('course_id',$course->id)->where('approval_status','approved')->latest()->first();
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
                                            <button type="submit"
                                                class="btn btn-success btn-sm form-control ">
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
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>No matching courses found.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
