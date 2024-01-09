@extends('layouts.support')

@section('content')

<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                <h5>Create Announcement

                    <a href="{{ route('support-announcements.index') }}" class="btn btn-dark float-end mt-3">Back </a>

                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('support-announcements.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

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

                    <div class="mb-3 col-12">
                        <label for="title" class="form-label text-dark">Title</label>
                        <input type="text" name="title" id="title" placeholder="Enter Title Here" class="form-control" required>
                    </div>

                    <div class="mb-3 col-6">
                        <label for="status" class="form-label text-dark">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="attachment" class="form-label text-dark">Attachment</label>

                        <input type="file" name="attachment" id="attachment" class="form-control-file">
                    </div>


                    <div class="mb-3 col-12">
                        <label for="content" class="form-label text-dark">Content</label>
                        {{-- <textarea name="content" id="content" class="form-control" rows="4" required></textarea> --}}
                        <textarea class="form-control" id="content" placeholder="Enter the Content" rows="8" name="content"></textarea>

                    </div>
                </div>


                    <hr>
                    <button type="submit" class="btn btn-dark float-end mt-2">Create Announcement</button>
                </form>
            </div>
        </div>



    </div>
    <script>
        ClassicEditor.create( document.querySelector( '#content' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection

