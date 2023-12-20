@extends('layouts.master')

@section('content')
    <h1>Create Question</h1>

    <form action="{{ route('lms.store-question', [$course->id, $quiz->id]) }}" method="post">
        @csrf

        <div class="form-group">
            <label for="text">Question Text</label>
            <input type="text" name="text" id="text" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Question</button>
    </form>
@endsection
