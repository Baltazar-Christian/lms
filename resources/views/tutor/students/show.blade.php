@extends('layouts.tutor')

@section('content')

<div class="container mt-2">
    <div class="card">
        <div class="card-header">
            <h5>
                <i class="fa fa-user text-warning"></i>
                Student Details

                <a href="{{ route('lms.tutor-students') }}" class="btn btn-dark btn-sm float-end"><i class="fa fa-list"></i> Back</a>


                    {{-- <a href="{{ route('lms.edit-system-admin', $user->id) }}" class="btn btn-dark btn-sm float-end"><i class="fa fa-edit"></i></a>

                    <form action="{{ route('lms.delete-system-admin', $user->id) }}" class="float-end mx-1" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm float-end" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                    </form> --}}
                </h5>
        </div>
        <div class="card-body">
            <p class="text-dark"><strong>Name:</strong> {{ $user->name }}</p>
            <p class="text-dark"><strong>Email:</strong> {{ $user->email }}</p>

            <hr>
             <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="courses-tab" data-toggle="tab" href="#courses" role="tab">Enrolled Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="results-tab" data-toggle="tab" href="#results" role="tab">Quiz Results</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Enrolled Courses Tab -->
            <div class="tab-pane active" id="courses" role="tabpanel">
                <h3 class="mt-3">Enrolled Courses</h3>
                @forelse ($enrolledCourses as $course)
                    <p>{{ $course->title }}</p>
                @empty
                    <p>No enrolled courses.</p>
                @endforelse
            </div>

            <!-- Quiz Results Tab -->
            <div class="tab-pane" id="results" role="tabpanel">
                <h3 class="mt-3">Quiz Results</h3>
                @forelse ($quizResults as $result)
                    <p>Quiz: {{ $result->quiz->title }}, Score: {{ $result->score }}</p>
                @empty
                    <p>No quiz results.</p>
                @endforelse
            </div>
        </div>
    </div>

        </div>
    </div>
</div>



@endsection
