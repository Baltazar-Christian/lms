@extends('layouts.support')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h5> <i class="fa fa-user text-warning"></i>
                     Student Details
                     <a href="{{ route('lms.support-students') }}" class="btn btn-dark float-end mt-3">Back </a>

                    </h5>
            </div>
            <div class="card-body">
                <p class="text-dark"><strong>Name:</strong> {{ $user->name }}</p>
                <p class="text-dark"><strong>Email:</strong> {{ $user->email }}</p>

                <hr>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">

                    <li class="nav-item">
                        <button class="nav-link active" id="btabs-static2-home-tab" data-bs-toggle="tab"
                            data-bs-target="#btabs-static2-home" role="tab" aria-controls="btabs-static2-home"
                            aria-selected="true">Enrolled Courses</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="btabs-static2-profile-tab" data-bs-toggle="tab"
                            data-bs-target="#btabs-static2-profile" role="tab" aria-controls="btabs-static2-profile"
                            aria-selected="false"> Quizes Result</button>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Enrolled Courses Tab -->
                    <div class="tab-pane active" id="btabs-static2-home" role="tabpanel"
                        aria-labelledby="btabs-static2-home-tab" tabindex="0">
                        <h5 class="mt-2"> <i class="fa fa-book text-warning"></i> Enrolled Courses</h5>
                        @forelse ($enrolledCourses as $course)
                            <p class="text-dark">  <i class="fa fa-book text-warning"></i>  {{ $course->title }}</p>
                            <hr>
                        @empty
                            <p>No enrolled courses.</p>
                        @endforelse
                    </div>

                    <!-- Quiz Results Tab -->
                    <div class="tab-pane" id="btabs-static2-profile" role="tabpanel"
                    aria-labelledby="btabs-static2-profile-tab" tabindex="0">
                        <h5 class="mt-3">  <i class="fa fa-question text-warning"></i> Quiz Results</h5>
                        @forelse ($quizResults as $result)
                            <p>Quiz: {{ $result->quiz->title }}, Score: {{ $result->score }}</p>
                        @empty
                            <p>No quiz results.</p>
                        @endforelse
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        {{-- <a href="{{ route('lms.support-edit-system-admin', $user->id) }}" class="btn btn-warning">Edit</a> --}}
                    </div>
                    <div class="col-6">
                        {{-- <form action="{{ route('lms.support-delete-system-admin', $user->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
