@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Create Announcement</h1>

        <form action="{{ route('announcements.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- Include validation errors if any --}}
            {{-- @include('partials.errors') --}}

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="attachment" class="form-label">Attachment</label>
                <input type="file" name="attachment" id="attachment" class="form-control-file">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create Announcement</button>
        </form>
    </div>
@endsection
