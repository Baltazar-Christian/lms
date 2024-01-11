@extends('layouts.support')

@section('content')
    <div class="container mt-2">


        <div class="card ">

            <div class="card-header">
                <h5>
                    <i class="fa fa-question text-warning"></i>
                    Create Answer</h5>
            </div>


            <div class="card-body">
                <form action="{{ route('lms.support-update-answer', [$course->id, $quiz->id, $question->id, $answer->id]) }}" method="post">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="text" class="text-dark">Answer Text</label>
                        <input type="text" name="answer" id="text" class="form-control" value="{{ $answer->answer ?? old('answer') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="is_correct" class="text-dark">Is Correct?</label>
                        <select name="is_correct" id="is_correct" class="form-control" required>
                            <option value="1" {{ $answer->is_correct == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $answer->is_correct == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-dark float-end">Update Answer</button>
                </form>

            </div>
        </div>
    </div>
@endsection
