@extends('layouts.support')

@section('content')
    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                <h5>Quiz Details

                    <a href="{{ route('lms.support-edit-quiz', $quiz->id) }}" class="btn btn-dark btn-sm float-end"><i class="fa fa-edit"></i></a>

                    <a href="{{ route('lms.support-show-course', $quiz->course->id) }}" class="btn mx-1 btn-sm btn-dark float-end">
                        <i class="fa fa-list"></i> Back
                    </a>

                </h5>

            </div>

            <div class="card-body">
                <div class="card mt-3">
                    <div class="card-body">
                        <p class="card-text text-dark "><strong>Title:</strong> {{ $quiz->title }}</p>
                        <p class="card-text text-dark"><strong>Course:</strong> {{ $quiz->course->title }}</p>
                        <!-- Add other quiz details as needed -->

                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5>
                            <i class="fa fa-list text-warning"></i>
                            Quiz Questions
                        <a href="{{ route('lms.support-create-question', [$course->id, $quiz->id]) }}" class="btn btn-sm btn-dark float-end">Create Question</a>

                        </h5>
                        <div class="table-responsive">

                        <table class="table mt-2 table-bordereless  table-vcenter js-dataTable-responsive">
                            <thead >
                                <th></th>
                                <th>Title</th>
                                <th>Option</th>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach ($quiz->questions as $question)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $question->question }}</td>
                                        <td>
                                            <a href="{{ route('lms.support-show-question', [$course->id, $quiz->id, $question->id]) }}" class="btn btn-sm btn-dark">
                                                <i class="fa fa-eye"></i>
                                                {{-- View Answers --}}
                                            </a>

                                            <a href="{{ route('lms.support-edit-question', [$course->id, $quiz->id, $question->id]) }}" class="btn btn-sm btn-dark">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="{{ route('lms.support-delete-question',  $question->id ) }}" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="mt-4">

        </div>
    </div>
@endsection
