<!-- resources/views/courses/search_courses.blade.php -->

@extends('layouts.student')

@section('content')
    <div class="container mt-5">

             <!-- Search Form -->
             <form action="{{ route('student-courses.search') }}" method="get" class="mb-4">
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
                        <img src="{{ asset('public/storage/covers/' .$course->cover_image) }}" class="card-img-top" width="150px"
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
                            <form action="{{ route('students.enrollSelf', ['student' => auth()->user(), 'course' => $course]) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success form-control">Enroll</button>
                            </form>
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
