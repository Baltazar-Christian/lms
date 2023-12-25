@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Create Course Content</h1>

        <div class="card mt-3">
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

                    <div class="form-group">
                        <label for="title">Content Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="description">Content Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label for="file_path">Upload File</label>
                        <input type="file" name="file_path" id="file_path" class="form-control-file" required>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary float-end">Create Content</button>
                </form>
            </div>
        </div>
    </div>
@endsection
