@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Question Details</h1>

        <div class="card mt-3">
            <div class="card-body">
                <p class="card-text"><strong>ID:</strong> {{ $question->id }}</p>
                <p class="card-text"><strong>Text:</strong> {{ $question->text }}</p>
            </div>
        </div>

        <div class="mt-4">
            <h2>Answers</h2>

            <a href="{{ route('lms.create-answer', [$course->id, $quiz->id, $question->id]) }}" class="btn btn-dark btn-sm float-end">Create Answer</a>
            <br>

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Text</th>
                        <th>Is Correct</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($question->answers as $answer)
                        <tr>
                            <td>{{ $answer->id }}</td>
                            <td>{{ $answer->answer }}</td>
                            <td>{{ $answer->is_correct ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="{{ route('lms.show-answer', [$course->id, $quiz->id, $question->id, $answer->id]) }}" class="btn btn-sm btn-info">
                                <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
