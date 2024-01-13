<!-- resources/views/notifications/edit.blade.php -->

@extends('layouts.tutor')

@section('content')
    <div class="container mt-2">

        <div class="card">
            <div class="card-header">
                <h5>Edit Notification</h5>

            </div>
            <div class="card-body">

                <form action="{{ route('notifications.update', $notification->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ $notification->title }}" required>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" class="form-control" rows="4" required>{{ $notification->content }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-dark float-end mt-2">Update Notification</button>
                </form>

            </div>
        </div>
    </div>
@endsection
