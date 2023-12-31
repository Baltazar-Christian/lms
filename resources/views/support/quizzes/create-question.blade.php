@extends('layouts.support')

@section('content')
    <div class="container mt-4">

        <div class="card ">
            <div class="card-header">
                <h5>Create Question</h5>

            </div>
            <div class="card-body">
                <form action="{{ route('lms.support-store-question', [$course->id, $quiz->id]) }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="text">Question Text</label>
                        <input type="text" name="text" id="text" class="form-control" required>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-dark float-end">Add Question</button>
                </form>
            </div>
        </div>
    </div>
@endsection
