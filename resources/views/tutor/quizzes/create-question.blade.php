@extends('layouts.support')

@section('content')
    <div class="container mt-2">

        <div class="card ">
            <div class="card-header">
                <h5>
                    <i class="fa fa-plus text-warning"></i>
                    Create Question


                    <a href="{{ route('lms.show-tutor-course', $course->id) }}" class="btn btn-sm btn-dark float-end">
                        <i class="fa fa-list"></i> Back
                    </a>
                </h5>

            </div>
            <div class="card-body">
                <form action="{{ route('lms.support-store-question',  [$course->id,$quiz->id]) }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="text" class="text-dark">Question Text</label>
                        <textarea name="text" placeholder="Enter Question Here.." class="form-control"  required rows="5"></textarea>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-dark float-end">Add Question</button>
                </form>
            </div>
        </div>
    </div>
@endsection
