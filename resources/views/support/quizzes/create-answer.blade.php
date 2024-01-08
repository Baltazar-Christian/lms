@extends('layouts.support')

@section('content')
    <div class="container mt-2">


        <div class="card ">

            <div class="card-header">
                <h5>Create Answer</h5>
            </div>


            <div class="card-body">
                <form action="{{ route('lms.support-store-answer', [$course->id, $quiz->id, $question->id]) }}" method="post">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="text">Answer Text</label>
                        <input type="text" name="answer" id="text" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="is_correct">Is Correct?</label>
                        <select name="is_correct" id="is_correct" class="form-control" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-dark float-end">Add Answer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
