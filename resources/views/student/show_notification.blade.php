<!-- resources/views/quizzes/result.blade.php -->
@extends('layouts.student')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1> <i class="fa fa-bell text-warning"></i> {{ $notification->course->title }}</h1>

            </div>
            <div class="card-body">
                {!! $notification->message !!}

                <hr>
                <small class="mt-2 text-muted">{{ $notification->user->name }}</small>
                @if ($notification->users->contains(Auth::id()))
                    <div class="alert alert-success mt-3">
                        You've already seen this notification.
                    </div>
                @else
                    <form action="{{ route('notifications.markAsSeen', $notification) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary mt-3">Mark as Seen</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
