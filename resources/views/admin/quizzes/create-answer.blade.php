@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Create Answer</h1>

        <div class="card mt-3">
            <div class="card-body">
                <form action="{{ route('lms.store-answer', [$course->id, $quiz->id, $question->id]) }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="text">Answer Text</label>
                        <input type="text" name="answer" id="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="is_correct">Is Correct?</label>
                        <select name="is_correct" id="is_correct" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Answer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
