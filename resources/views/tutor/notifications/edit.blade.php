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
                        <label for="course_id" class="text-dark">Select Course</label>
                        <select name="course_id" id="course_id" class="form-control" required>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="content">Message</label>
                        <textarea name="message" id="content" class="form-control" rows="4" required>{{ $notification->message }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-dark float-end mt-2">Update Notification</button>
                </form>

            </div>
        </div>
    </div>
@endsection
