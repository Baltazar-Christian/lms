
@extends('layouts.student')

@section('content')


@if ($questions->count() > 0)
    <form action="{{ route('quiz.results.store', $quiz->id) }}" method="post">
        @csrf
        @foreach ($questions as $question)
            <div>
                <p>{{ $question->question }}</p>
                @foreach ($question->answers as $option)
                    <label>
                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}" required>
                        {{ $option->answer }}
                    </label><br>
                @endforeach
            </div>
        @endforeach
        <button type="submit">Submit</button>
    </form>
@else
    <p>No questions available for this quiz.</p>
@endif
@endsection
