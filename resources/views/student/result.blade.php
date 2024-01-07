<!-- resources/views/quizzes/result.blade.php -->
@extends('layouts.student')

@section('content')
    <h1>Quiz Result</h1>

    <p>Your score: {{ $result->score }} / {{ count($quiz->questions) }}</p>

    <h2>Questions and Answers:</h2>
    @foreach ($quiz->questions as $question)
        <p>{{ $question->question }}</p>
        <p>Your answer: {{ $result->getAnswerText($question->id) }}</p>
        <p>Correct answer: {{ $question->getCorrectAnswerText() }}</p>
        <hr>
    @endforeach
@endsection
