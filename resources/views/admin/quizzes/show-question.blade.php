@extends('layouts.master')

@section('content')
    <div class="container mt-2">

        <div class="card">
            <div class="card-body">
                <h5 class="text-warning">Question Details</h5>

                <div class="card mt-3">
                    <div class="card-body">
                        {{-- <p class="card-text"><strong>ID:</strong> {{ $question->id }}</p> --}}
                        <p class="card-text"><strong> {{ $question->question }}</strong></p>
                    </div>
                </div>

                <div class="mt-4">
                    <h5 class="text-warning">Answers</h5>
                    <hr>
                    <a href="{{ route('lms.create-answer', [$course->id, $quiz->id, $question->id]) }}"
                        class="btn btn-dark btn-sm float-end">Create Answer</a>
                    <br>

                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Text</th>
                                <th>Is Correct</th>
                                {{-- <th>Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($question->answers as $answer)
                                <tr>
                                    <td>{{ $answer->id }}</td>
                                    <td>{{ $answer->answer }}</td>
                                    <td>{{ $answer->is_correct ? 'Yes' : 'No' }}</td>
                                    {{-- <td>
                                        <a href="{{ route('lms.show-answer', [$course->id, $quiz->id, $question->id, $answer->id]) }}"
                                            class="btn btn-sm btn-info">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
