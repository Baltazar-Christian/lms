@extends('layouts.master')

@section('content')
    <h1>Question Details</h1>

    <p><strong>ID:</strong> {{ $question->id }}</p>
    <p><strong>Text:</strong> {{ $question->text }}</p>

    <h2>Answers</h2>

    <a href="{{ route('lms.create-answer', [$course->id, $quiz->id, $question->id]) }}" class="btn btn-primary">Create Answer</a>

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
                    <td>{{ $answer->text }}</td>
                    <td>{{ $answer->is_correct ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('lms.show-answer', [$course->id, $quiz->id, $question->id, $answer->id]) }}" class="btn btn-sm btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
