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
                        <div class="col-md-4 col-6 mb-4">
                            <div class="card">

                                <img src="{{ asset('public/storage/covers/' . $course->cover_image) }}" width="150px"
                                    height="150px" class="card-img-top" alt="{{ $course->name }}">
                                <div class="card-body">

                                    <h6 class="card-title text-dark">{{ $course->title }}</h5>
                                        <p class="card-text text-dark">Tsh {{ number_format($course->price, 2) }}</p>
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
                                                <div class="col-md-4 col-12">
                                                    <a href="{{ route('student-unenrolled-courses.show', $course) }}"
                                                        class="btn form-control btn-sm  btn-success mb-2">
                                                        View
                                                    </a>
                                                </div>
                                                <div class="col-md-8 col-12">
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
                                <li class="nav-link bg-light mt-1"> <a href="{{ route('student-courses.module',$module->id) }}" class="text-dark"> <i
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
