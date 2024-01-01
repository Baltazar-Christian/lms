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
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="type">Content Type</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="pdf">PDF</option>
                            <option value="image">Image</option>
                            <option value="video">Video</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" name="file" id="file" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label for="duration">Duration (minutes)</label>
                        <input type="number" name="duration" id="duration" class="form-control">
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary float-end">Create Content</button>
                </form>
            </div>
        </div>
    </div>
@endsection
