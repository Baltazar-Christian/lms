<!-- resources/views/contents/show.blade.php -->

@extends('layouts.student')

@section('content')
    <div class=" mt-2 col-12">
        <div class="card">
            <div class="card-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                      <li class="breadcrumb-item">
                        <a class="link-fx" href="be_pages_elearning_courses.html"> {{ $content->course->title }}</a>
                      </li>
                      <li class="breadcrumb-item" aria-current="page">
                        {{ $content->title }}
                      </li>
                    </ol>
                  </nav>

            </div>
            <div class="card-body">


            @if ($content->type === 'video')
                <video width="100%" controls>
                    <source src="{{ asset('public/storage/course_contents/' . $content->file_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                {{-- Display other file types or embed PDF viewer --}}
                {{-- Adjust this part based on your actual requirements --}}
                <a href="{{ asset('public/storage/course_contents/' . $content->file_path) }}" class="btn btn-dark float-end " target="_blank">View Attachment</a>
            @endif

                  {{-- Display content details --}}
                  <p>
                    {!! $content->description !!}
                </p>
            </div>

        </div>
    </div>
@endsection
