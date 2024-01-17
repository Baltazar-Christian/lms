@extends('layouts.support')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h5>
                    <i class="fa fa-file text-warning"> </i>
                    Sub-Section Details
                </h5>

            </div>
            <div class="card-body">


                @if ($subsection->type === 'video')
                    <video width="100%" controls>
                        <source src="{{ asset('public/storage/course_contents/' . $subsection->file_path) }}"
                            type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @endif

                @if ($subsection->url != null)
                    <video width="100%" controls>
                        <source src="{{ $subsection->url }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @endif
                @if ($subsection->type === 'image')
                    <img src="{{ asset('public/storage/course_contents/' . $subsection->file_path) }}"
                        alt="{{ $subsection->title }}" width="200px" height="200px">
                @endif
                <hr>
                {{-- Display content details --}}
                <p>
                    {!! $subsection->description !!}
                </p>


                @if ($subsection->type != 'video' && $subsection->type != 'text' && $subsection->type != 'image')
                    <div class="col-12">
                        <hr>
                        {{-- Display other file types or embed PDF viewer --}}
                        <a href="{{ asset('public/storage/course_contents/' . $subsection->file_path) }}" target="_blank"
                            type="button" class="btn btn-sm btn-dark float-end mt-2 mb-3">
                            <i class="fa fa-download"></i>
                            View Attachment
                        </a>
                        <br>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
