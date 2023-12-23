@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Create Question</h1>

        <div class="card mt-3">
            <div class="card-body">
                <form action="{{ route('lms.store-question', [$course->id, $quiz->id]) }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="text">Question Text</label>
                        <input type="text" name="text" id="text" class="form-control" required>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary">Add Question</button>
                </form>
            </div>
        </div>
    </div>
@endsection
