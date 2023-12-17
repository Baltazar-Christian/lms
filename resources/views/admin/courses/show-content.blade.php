<!-- Example content view with video support -->
@extends('layouts.master')

@section('content')
    <h1>{{ $course->title }} - {{ $content->title }}</h1>

    <p>{{ $content->description }}</p>

    @if ($content->type === 'video')
        <video controls>
            <source src="{{ asset('storage/' . $content->file_path) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @elseif ($content->type === 'pdf')
        {{-- Include PDF viewer or link to download --}}
    @elseif ($content->type === 'image')
        <img src="{{ asset('storage/' . $content->file_path) }}" alt="{{ $content->title }}">
    @endif

    <!-- Add links or buttons for sub-sections -->

    <button id="viewContent" class="btn btn-primary">View Content</button>

    <!-- Add the delete button for the content itself -->

    <!-- Rest of the modal and viewer script remains the same -->
@endsection
