<!-- resources/views/notifications/show.blade.php -->

@extends('layouts.tutor')

@section('content')

<div class="container">

    <div class="card mt-3">
        <div class="card-header">

            <h5>
                <i class="fa fa-bell text-warning"></i>
                Notification
                <a href="{{ route('notifications.index') }}" class="btn btn-dark float-end mt-3"> <i class="fa fa-list"></i> Back </a>

            </h5>

        </div>
        <div class="card-body">
            <h3 class="card-title">{{ $notification->course }}</h3>
            <p class="card-text">{!! $notification->message!!}</p>

            <small class="text-muted">Author: {{ $notification->user->name }}</small>
        </div>
    </div>

</div>

@endsection
