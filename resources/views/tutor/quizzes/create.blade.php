@extends('layouts.tutor')



@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    <div class="col-12 p-2">
        <div class="card">
            <div class="card-header">
                <h5>
                    <i class="fa fa-plus text-warning"></i>
                    Create Quiz

                    <a href="{{ route('lms.show-tutor-course', $course->id) }}" class="btn btn-sm btn-dark float-end">
                        <i class="fa fa-list"></i> Back
                    </a>
                </h5>

            </div>
            <div class="card-body">
                <form action="{{ route('lms.tutor-store-quiz', $course->id) }}" method="post">
                    @csrf

                    {{-- Include validation errors if any --}}
                    @include('partials.errors')

                    <input type="hidden" name="course_id" value="{{ $course->id }}">

                    <div class="mb-3">
                        <label for="title " class="form-label text-dark" >Quiz Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label text-dark">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark float-end">Create Quiz</button>
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
