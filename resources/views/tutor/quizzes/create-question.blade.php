@extends('layouts.tutor')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

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
                <form action="{{ route('lms.tutor-store-question',  [$course->id,$quiz->id]) }}" method="post">
                    @csrf

                         {{-- Include validation errors if any --}}
                         @include('partials.errors')

                    <div class="form-group">
                        <label for="text" class="text-dark">Question Text</label>

                        <textarea name="text" id="description1" class="form-control" rows="4"></textarea>

                    </div>

                    <br>
                    <button type="submit" class="btn btn-dark float-end">Add Question</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor.create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection

