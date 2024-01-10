@extends('layouts.support')

@section('content')
    <div class="container mt-2">

        <div class="card ">
            <div class="card-header">
                <h5>
                    <i class="fa fa-edit text-warning"></i>
                    Edit Question
                </h5>

            </div>
            <div class="card-body">
                <form action="{{ route('lms.support-update-question',  $question->id) }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="text" class="text-dark">Question Text</label>
                        <input type="text" name="text" id="text" class="form-control" value="{{ $question->question ?? old('text') }}" required>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-dark float-end">Update Question</button>
                </form>

            </div>
        </div>
    </div>
@endsection
