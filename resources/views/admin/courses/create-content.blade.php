@extends('layouts.master')

@section('content')

    <div class="container mt-2">

        <div class="card mt-3">
            <div class="card-header">
                <h5>Create Course Content</h5>

            </div>
            <div class="card-body">
                <form action="{{ route('lms.courses.save-content', $course->id) }}" method="post" enctype="multipart/form-data">
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
                        <div class="form-group col-6 mb-2">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="type">Content Type</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="pdf">PDF</option>
                                <option value="image">Image</option>
                                <option value="video">Video</option>
                            </select>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="file">File</label>
                            <input type="file" name="file" id="file" class="form-control-file">
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="duration">Duration (minutes)</label>
                            <input type="number" name="duration" id="duration" class="form-control">
                        </div>

                        <div class="form-group col-12 mb-2">
                            <label for="description">Description</label>
                            <textarea name="description" id="editor" class="form-control" rows="4" required></textarea>
                            {{-- <div id="">Hello classic CKEditor 5!</div> --}}

                        </div>

                    </div>
                     <br>

                    <button type="submit" class="btn btn-dark float-end">Create Content</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="{{ asset('assets/js/oneui.app.min.js') }}"></script>
        <!-- Page JS Plugins -->
        {{-- <script src="{{ asset('assets/js/plugins/ckeditor5-classic/build/ckeditor.js') }}"></script> --}}

        <!-- Page JS Helpers (CKEditor 5 plugins) -->
        {{-- <script>One.helpersOnLoad(['js-ckeditor5']);</script> --}}
@endsection
