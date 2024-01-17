@extends('layouts.tutor')

@section('content')
    <div class="container mt-2">

        <div class="card">
            <div class="card-body">
                <h5 > <i class="fa fa-file text-warning"></i> Question Details

                    <a href="{{ route('lms.tutor-show-quiz', ['courseId' => $question->quiz->course->id, 'quizId' => $question->quiz->id]) }}" class="btn btn-sm btn-dark float-end">
                        <i class="fa fa-list"></i> Back
                    </a>
                </h5>

                <div class="card mt-3">
                    <div class="card-body">
                        {{-- <p class="card-text"><strong>ID:</strong> {{ $question->id }}</p> --}}
                        <p class="card-text"><strong> {!! $question->question !!}</strong></p>
                    </div>
                </div>

                <div class="mt-4 table-responsive">
                    <h5 class="text-warning">Answers</h5>
                    <hr>
                    <a href="{{ route('lms.tutor-create-answer', [$course->id, $quiz->id, $question->id]) }}"
                        class="btn btn-dark btn-sm float-end">Create Answer</a>
                    <br>


                        <table class="table mt-2 table-bordereless  table-vcenter js-dataTable-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Text</th>
                                <th>Is Correct</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @foreach ($question->answers as $answer)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td width="60%">{{ $answer->answer }}</td>
                                    <td>
                                        <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill   {{  $answer->is_correct ? 'bg-success-light text-success' : 'bg-danger-light text-danger' }} ">

                                        {{ $answer->is_correct ? 'Yes' : 'No' }}
                                        </span>
                                    </td>
                                    <td>

                                        <a href="{{ route('lms.tutor-edit-answer',  $answer->id) }}" class="btn btn-sm btn-dark">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{ route('lms.tutor-delete-answer',  $answer->id ) }}" class="btn btn-sm btn-danger">
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
@endsection
