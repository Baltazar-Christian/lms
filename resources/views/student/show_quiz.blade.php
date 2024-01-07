@extends('layouts.student')

@section('content')

    <div class=" mt-2">


        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">
                @if ($result != null)

                    <h1>Quiz Result</h1>

                    <p>Your score: {{ $result->score }} / {{ count($quiz->questions) }}</p>

                    <h2>Questions and Answers:</h2>
                    @foreach ($questions as $question)
                    <div class="m-1">
                        <p class="mt-1">{{ $question->question }}</p>
                        @foreach ($question->answers as $option)
                            <label>
                                <input type="radio" name="answers[{{ $question->id }}]"
                                    value="{{ $option->id }}"{{ $option->is_correct ? 'checked' : '' }}   required>
                                {{ $option->answer }}
                            </label><br>
                        @endforeach
                    </div>
                @endforeach
                @else
                    @if ($questions->count() > 0)
                        <form action="{{ route('quiz.results.store', $quiz->id) }}" method="post">
                            @csrf
                            @foreach ($questions as $question)
                                <div class="m-1">
                                    <p>{{ $question->question }}</p>
                                    @foreach ($question->answers as $option)
                                        <label>
                                            <input type="radio" name="answers[{{ $question->id }}]"
                                                value="{{ $option->id }}" required>
                                            {{ $option->answer }}
                                        </label><br>
                                    @endforeach
                                </div>
                            @endforeach
                            <button type="submit" class="btn btn-sm btn-warning float-end">Submit</button>
                        </form>
                    @else
                        <p>No questions available for this quiz.</p>
                    @endif

                @endif
            </div>
        </div>
    </div>


@endsection
