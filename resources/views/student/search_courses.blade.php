@extends('layouts.student')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('students.searchCourses', $user) }}" method="get" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for a course">
                <button type="submit" class="btn btn-primary">Search</button>
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
                            <p class="card-text">{{ $course->description }}</p>
                            <!-- Add more course details as needed -->

                            @if ($user->courses->contains('id', $course->id))
                            <!-- Unenroll button -->
                            <form action="{{ route('students.unenrollSelf', ['student' => $user, 'course' => $course]) }}" method="post">
                                @csrf
                                {{-- <div class="col-12"> --}}
                                    <button type="submit" class=" form-control btn btn-danger btn-block">Unenroll</button>
                                {{-- </div> --}}
                            </form>
                        @else
                            <!-- Enroll button -->
                            <form action="{{ route('students.enrollSelf', ['student' => $user, 'course' => $course]) }}" method="post">
                                @csrf
                                {{-- <div class="col-12"> --}}
                                <button type="submit" class=" form-control btn btn-success btn-block">Enroll</button>
                                {{-- </div> --}}
                            </form>
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
