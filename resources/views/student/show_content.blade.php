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
                <video width="400" controls>
                    <source src="{{ Storage::url($content->file_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                {{-- Display other file types or embed PDF viewer --}}
                {{-- Adjust this part based on your actual requirements --}}
                <a href="{{ Storage::url($content->file_path) }}" class="btn btn-dark " target="_blank">View File</a>
            @endif
            </div>
        </div>
    </div>
@endsection
