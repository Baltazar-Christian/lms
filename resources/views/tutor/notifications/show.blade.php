<!-- resources/views/notifications/show.blade.php -->

@extends('layouts.tutor')

@section('content')
    <h1>Notification</h1>

    <div class="card mt-3">
        <div class="card-body">
            <h3 class="card-title">{{ $notification->title }}</h3>
            <p class="card-text">{{ $notification->content }}</p>
        </div>
    </div>

    <a href="{{ route('notifications.index') }}" class="btn btn-primary mt-3">Back to Notifications</a>
@endsection
