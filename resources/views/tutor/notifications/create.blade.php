@extends('layouts.tutor')

@section('content')
    <div class="container mt-2">

        <div class="card">
            <div class="card-header">
                <h5>Create Notification</h5>

            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('notifications.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="course_id" class="text-dark">Select Course</label>
                        <select name="course_id" id="course_id" class="form-control" required>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message" class="text-dark">Notification Message</label>
                        <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark btn-sm mt-2 float-end">Save Notification</button>
                </form>
            </div>
        </div>
    </div>
@endsection
