@extends('layouts.master')

@section('content')
    <h1>Quiz Details</h1>

    <p><strong>Course:</strong> {{ $course->name }}</p>
    <p><strong>Title:</strong> {{ $quiz->title }}</p>
    <!-- Add other quiz details as needed -->

    <h2>Questions</h2>
    @foreach($quiz->questions as $question)
        <p>{{ $question->text }}</p>

        <h3>Answers</h3>
        @foreach($question->answers as $answer)
            <p>{{ $answer->text }}</p>
        @endforeach
    @endforeach

    <a href="{{ route('lms.edit-quiz', [$course->id, $quiz->id]) }}" class="btn btn-warning">Edit Quiz</a>
    <form action="{{ route('lms.delete-quiz', [$course->id, $quiz->id]) }}" method="post" style="display: inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Quiz</button>
    </form>
@endsection
