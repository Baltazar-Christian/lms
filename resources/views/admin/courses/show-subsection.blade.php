<!-- resources/views/courses/show-subsection.blade.php -->

@extends('layouts.master')

@section('content')
    <h1>Sub-Section Details</h1>

    <h2>{{ $subsection->title }}</h2>
    <p>Description: {{ $subsection->description }}</p>
    <p>Type: {{ $subsection->type }}</p>
    <p>Duration: {{ $subsection->duration }} minutes</p>

    @if ($subsection->type === 'video')
        <video width="400" controls>
            <source src="{{ Storage::url($subsection->file_path) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @else
        {{-- Display other file types or embed PDF viewer --}}
        {{-- Adjust this part based on your actual requirements --}}
        <a href="{{ Storage::url($subsection->file_path) }}" target="_blank">View File</a>
    @endif

    {{-- Add more details or customize the display based on your requirements --}}
@endsection
