<!-- resources/views/contents/show.blade.php -->

@extends('layouts.student')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">{{ $content->title }}</h1>
                <p class="card-text">{{ $content->description }}</p>
                <!-- Add more content details as needed -->
            </div>
        </div>
    </div>
@endsection
