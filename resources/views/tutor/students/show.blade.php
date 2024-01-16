@extends('layouts.tutor')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h5> <i class="fa fa-user text-warning"></i>
                    Student Details
                    @if ($user->status == 0)
                        <a href="{{ route('lms.tutor-students') }}" class="btn btn-dark float-end mt-3">Back </a>
                    @else
                        <a href="{{ route('lms.tutor-blocked-students') }}" class="btn btn-dark float-end mt-3">Back </a>
                    @endif
                </h5>
            </div>
            <div class="card-body">
                <p class="text-dark"><strong>Name:</strong> {{ $user->name }}</p>
                <p class="text-dark"><strong>Email:</strong> {{ $user->email }}</p>
                <p classs="text-dark"><strong>Phone:</strong> {{ $user->phone_number }} </p>
                <p classs="text-dark"><strong>Address:</strong> {{ $user->address }} </p>

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
                    <div class="tab-pane active table-responsive" id="btabs-static2-home" role="tabpanel"
                        aria-labelledby="btabs-static2-home-tab" tabindex="0">
                        <h5 class="mt-2"> <i class="fa fa-book text-warning"></i> Enrolled Courses</h5>
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">

                            <thead hidden>
                                <th></th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($enrolledCourses as $course)
                                    @if ($course->user_id == Auth::user()->id)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $course->title }}</td>
                                            <td>
                                                <span
                                                    class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill   {{ $course->is_complete ? 'bg-success-light text-success' : 'bg-danger-light text-danger' }} ">
                                                    {{ $course->is_complete ? 'Completed' : 'Incomplete' }}</span>
                                            </td>

                                        </tr>
                                    @endif
                                @empty
                                    <p class="text-dark">No enrolled courses.</p>
                                @endforelse
                            </tbody>

                        </table>
                        <hr>

                    </div>

                    <!-- Quiz Results Tab -->
                    <div class="tab-pane table-responsive" id="btabs-static2-profile" role="tabpanel"
                        aria-labelledby="btabs-static2-profile-tab" tabindex="0">
                        <h5 class="mt-3"> <i class="fa fa-question text-warning"></i> Quiz Results</h5>
                        @forelse ($quizResults as $result)
                            <p class="text-dark">Quiz: {{ $result->quiz->title }}, Score: {{ $result->score }}</p>
                        @empty
                            <p class="text-dark">No quiz results.</p>
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
