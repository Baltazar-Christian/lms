@extends('layouts.student')

@section('content')

    <div class=" mt-2">


        <div class="card">
            <div class="card-header">
                <h5 class="text-warning">
                    @if ($result != null)
                    {{ $quiz->title }}  Result
                    @else
                    {{ $quiz->title }}  Section

                    @endif

                    <a class="btn btn-dark btn-sm float-end"
                    href="{{ route('student-courses.show', $quiz->course_id) }}">
                        <i class="fa fa-list"></i>
                        Back
                    </a>
                </h5>

            </div>
            <div class="card-body">
                @if ($result != null)


                    <p> <strong> Your score:</strong> {{ $result->score }} / {{ count($quiz->questions) }}</p>

                    <h5 class="text-warning">Questions and Answers:</h5>
                    <hr>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($questions as $question)
                    <div class="mb-2">
                        <p class="mt-1"> {{$i++ }} : {{ $question->question }}</p>
                        @foreach ($question->answers as $option)
                            <label>
                                <input type="radio" disabled name="answers[{{ $question->id }}]"
                                    value="{{ $option->id }}"{{ $option->is_correct ? 'checked' : '' }}   readonly>
                                {{ $option->answer }}
                                @if ($option->is_correct)
                                <i class="fa fa-check text-success"></i>
                                @endif

                            </label><br>
                        @endforeach
                    </div>
                @endforeach
                @else
                    @if ($questions->count() > 0)
                        <form action="{{ route('quiz.results.store', $quiz->id) }}" method="post">
                            @csrf
                            @php
                                $i=1;
                            @endphp
                            @foreach ($questions as $question)
                                <div class="m-1">
                                    <p class="mt-2">{{ $i++ }} : {{ $question->question }}</p>
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
