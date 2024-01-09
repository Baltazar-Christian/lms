@extends('layouts.support')

@section('content')

<div class="col-12 mt-2 mx-1">
    <div class="card">
        <div class="card-header">
            <h5>Student Details</h5>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>

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
