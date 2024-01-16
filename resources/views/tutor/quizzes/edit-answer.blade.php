@extends('layouts.support')

@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    <div class="container mt-2">

        <div class="card ">
            <div class="card-header">
                <h5>
                    <i class="fa fa-edit text-warning"></i>
                    Edit Answer
                </h5>

            </div>
            <div class="card-body">
                <form action="{{ route('lms.tutor-updated-quiz-answer') }}" method="post">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="text" class="text-dark">Answer Text</label>
                        <textarea name="answer" id="description1" class="form-control" value="{{ $answer->answer ?? old('answer') }}"  rows="4">{{ $answer->answer }}</textarea>


                        <input type="hidden" name="answer_id" value="{{ $answer->id }}">
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

