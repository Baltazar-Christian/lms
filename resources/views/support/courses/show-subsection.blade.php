
@extends('layouts.support')

@section('content')

<div class="container mt-2">
<div class="card">
    <div class="card-header">
        <h5>
            <i class="fa fa-file text-warning"> </i>
            Sub-Section Details</h5>

    </div>
    <div class="card-body">

        @if ($subsection->type === 'video')
        <video width="100%" controls>
            <source src="{{ asset('public/storage/course_contents/' . $subsection->file_path) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

         @endif
        <h5 class="text-dark">{{ $subsection->title }}</h5>
        <p>Type: {{ $subsection->type }}</p>
        <p>Duration: {{ $subsection->duration }} minutes</p>
        <p> {!! $subsection->description !!}</p>




        @if ($subsection->type != 'video')
        <hr>
            {{-- Display other file types or embed PDF viewer --}}
            <a href="{{ asset('public/storage/course_contents/' . $subsection->file_path) }}" target="_blank"
                type="button" class="btn btn-sm btn-dark float-end mt-2 mb-3">
            <i class="fa fa-download"></i>
            Download Attachment
            </a>
            <br>

        @endif
    </div>
</div>
</div>

@endsection
