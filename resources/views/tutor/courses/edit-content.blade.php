
@extends('layouts.support')

@section('content')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    <div class="container mt-2">

        <div class="card mt-3">
            <div class="card-header">
                <h5>
                    <i class="fa fa-plus text-warning"></i>
                    Edit Course Content


                    <a href="{{ route('lms.show-tutor-course', $course->id) }}" class="btn btn-sm btn-dark float-end">
                        <i class="fa fa-list"></i> Back
                    </a>
                </h5>

            </div>
            <div class="card-body">
        <form action="{{ url('tutor-courses/update-content/' . $course->id . '/content' . '/' . $content->id . '/update') }}" method="post"
            enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Assuming you are updating content --}}

                {{-- Include validation errors if any --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="form-group col-6 mb-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ $content->title }}" required>
                    </div>

                    <div class="form-group col-6 mb-2">
                        <label for="type">Content Type</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="text" {{ $content->type === 'text' ? 'selected' : '' }}>Text</option>
                            <option value="pdf" {{ $content->type === 'pdf' ? 'selected' : '' }}>PDF</option>
                            <option value="image" {{ $content->type === 'image' ? 'selected' : '' }}>Image</option>
                            <option value="video" {{ $content->type === 'video' ? 'selected' : '' }}>Video</option>
                        </select>
                    </div>

                    <div class="form-group col-6 mb-2">
                        <label for="file">File</label>
                        <input type="file" name="file" id="file" class="form-control-file">
                    </div>

                    <div class="form-group col-6 mb-2">
                        <label for="duration">Duration (minutes)</label>
                        <input type="number" name="duration" id="duration" class="form-control"
                            value="{{ $content->duration }}">
                    </div>

                    <div class="form-group col-12 mb-2">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="content" placeholder="Enter the Description" rows="8" name="description">{{ $content->description }}</textarea>
                    </div>
                </div>
                <br>

                <button type="submit" class="btn btn-dark float-end">Update Content</button>
            </form>
    </div>

</div>
    <script>
        ClassicEditor.create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
@endsection
