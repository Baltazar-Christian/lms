@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Quiz Details</h1>

        <div class="card mt-3">
            <div class="card-body">
                <p class="card-text"><strong>Course:</strong> {{ $quiz->course->title }}</p>
                <p class="card-text"><strong>Title:</strong> {{ $quiz->title }}</p>
                <!-- Add other quiz details as needed -->

                <a href="{{ route('lms.create-question', [$course->id, $quiz->id]) }}" class="btn btn-primary">Create Question</a>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h2>Quiz Questions</h2>

                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Text</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quiz->questions as $question)
                            <tr>
                                <td>{{ $question->id }}</td>
                                <td>{{ $question->question }}</td>
                                <td>
                                    <a href="{{ route('lms.show-question', [$course->id, $quiz->id, $question->id]) }}" class="btn btn-sm btn-info">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('lms.edit-quiz', [$course->id, $quiz->id]) }}" class="btn btn-warning">Edit Quiz</a>

            <form action="{{ route('lms.delete-quiz', [$course->id, $quiz->id]) }}" method="post" style="display: inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Quiz</button>
            </form>
        </div>
    </div>
@endsection
