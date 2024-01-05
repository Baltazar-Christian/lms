<!-- resources/views/contents/show.blade.php -->

@extends('layouts.student')

@section('content')
    <div class=" mt-2 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title "> <i class="fa fa-clipboard text-warning"></i> {{ $content->title }}</h1>

            </div>
            <div class="card-body">
                 {{-- Display content details --}}
            <p>
                {!! $content->description !!}
            </p>

            @if ($content->type === 'video')
                <video width="90%" controls>
                    <source src="{{ asset('public/storage/course_contents/' . $content->file_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                {{-- Display other file types or embed PDF viewer --}}
                {{-- Adjust this part based on your actual requirements --}}
                <a href="{{ asset('public/storage/course_contents/' . $content->file_path) }}" class="btn btn-dark float-end " target="_blank">View Attachment</a>
            @endif
            </div>
        </div>
    </div>
@endsection
