<!-- resources/views/contents/show.blade.php -->

@extends('layouts.student')

@section('content')
    <div class=" mt-2 mb-2 col-12">
        <div class="row">

            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item">
                                    <a class="link-fx text-warning"
                                        href="{{ route('student-courses.show', $content->course->id) }}">
                                        {{ $content->course->title }}</a>
                                </li>
                                @if ($content->parent_id != 0)
                                    <li class="breadcrumb-item">
                                        <a class="link-fx text-warning"
                                            href="{{ route('contents.show', $content->parent_id) }}">
                                            {{ $content->parent->title }}</a>
                                    </li>
                                @endif
                                <li class="breadcrumb-item" aria-current="page">
                                    {{ $content->title }}
                                </li>
                            </ol>
                        </nav>

                    </div>
                    <div class="card-body ">

                        @if ($content->url != null)
                            <video width="100%" controls>
                                <source src="{{ $content->url }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <hr>
                        @endif
                        @if ($content->type === 'video')
                            <video width="100%" controls>
                                <source src="{{ asset('public/storage/course_contents/' . $content->file_path) }}"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif

                        {{-- Display content details --}}
                        <p>
                            {!! $content->description !!}
                        </p>

                        @if ($content->type != 'video')
                            {{-- Display other file types or embed PDF viewer --}}
                            {{-- Adjust this part based on your actual requirements --}}
                            <a href="{{ asset('public/storage/course_contents/' . $content->file_path) }}"
                                class="btn btn-dark btn-sm float-end " target="_blank">View Attachment</a>
                        @endif
                    </div>
                    @if (auth()->user()->completedContents->contains($content->id))
                        <div class="row p-2">
                            <div class="col-4">
                                <span class="badge bg-success text-white">Completed</span>

                            </div>
                        </div>
                    @else
                        <form class="p-2"
                            action="{{ route('content.mark-as-complete', ['user' => auth()->user(), 'content' => $content]) }}"
                            method="post">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Mark as Complete</button>
                        </form>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="col-xl-12">
                    <!-- Lessons -->
                    <div class="block block-rounded">
                        <div class="block-header block-header-default text-start">
                            <h5 class="block-title"> <i class="fa fa-book text-warning"></i> {{ $content->course->title }}
                                CONTENTS</h5>
                        </div>
                        <div class="block-content fs-sm">
                            <!-- Introduction -->
                            <table class="table table-borderless table-vcenter">
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp

                                    <!-- Calculate completion progress percentage -->
                                    @php
                                        $totalContents = $content->course->contents->count();
                                        $completedContents = auth()
                                            ->user()
                                            ->completedContents->count();
                                        $progressPercentage = $totalContents > 0 ? ($completedContents / $totalContents) * 100 : 0;
                                    @endphp

                                    <div class="progress mb-4">
                                        <div class="progress-bar  @if ($progressPercentage == 100) bg-success @else bg-warning @endif "
                                            role="progressbar" style="width: {{ $progressPercentage }}%;"
                                            aria-valuenow="{{ $progressPercentage }}" aria-valuemin="0"
                                            aria-valuemax="100">
                                            {{ number_format($progressPercentage, 2) }}% Complete
                                        </div>
                                    </div>
                                    @foreach ($contents as $content)
                                        <tr class="table-active mb-1">
                                            <th style="width: 50px;">{{ $i++ }}</th>
                                            <th>
                                                <a href="{{ route('contents.show', $content) }}" class="text-dark">
                                                    {{ $content->title }}
                                                    @if (auth()->user()->completedContents->contains($content->id))
                                                        <i class="fa fa-check text-success"></i>
                                                    @endif

                                                </a>
                                            </th>
                                            <th class="text-end">
                                                {{-- <span class="text-muted">{{ $content->duration }} MINUTES</span> --}}
                                                <a href="{{ route('contents.show', $content) }}"
                                                    class="btn btn-sm
                                                    @if (auth()->user()->completedContents->contains($content->id)) btn-success
                                                    @else
                                                    btn-warning @endif
                                                    ">
                                                    @if (auth()->user()->completedContents->contains($content->id))
                                                        Read Again
                                                    @else
                                                        Read
                                                    @endif
                                                </a>
                                            </th>
                                        </tr>
                                        @php
                                            $count = 1;
                                            $subContents = App\Models\CourseContent::where('parent_id', $content->id)->get();
                                        @endphp
                                        @if (count($subContents) > 0)
                                            @foreach ($subContents as $subContent)
                                                <tr>
                                                    <td class="table-success text-center">
                                                        {{-- <i class="fa fa-fw fa-info text-success"></i> --}}

                                                        {{ $count++ }}
                                                    </td>
                                                    <td>
                                                        <a class="fw-medium text-dark"
                                                            href="{{ route('contents.show', $subContent) }}">
                                                            {{ $subContent->title }}
                                                            @if (auth()->user()->completedContents->contains($subContent->id))
                                                                <i class="fa fa-check text-success"></i>
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td class="text-end text-muted">
                                                        <a href="{{ route('contents.show', $subContent) }}"
                                                            class="btn btn-sm
                                                            @if (auth()->user()->completedContents->contains($subContent->id)) btn-success
                                                            @else
                                                            btn-warning @endif
                                                            ">
                                                            @if (auth()->user()->completedContents->contains($subContent->id))
                                                                Read Again
                                                            @else
                                                                Read
                                                            @endif
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endforeach



                                </tbody>
                            </table>
                            <!-- END Introduction -->

                        </div>
                    </div>
                    <!-- END Lessons -->
                </div>

                <!-- About Instructor -->
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-header block-header-default text-center">
                        <h3 class="block-title">About The Instructor</h3>
                    </div>
                    <div class="block-content block-content-full text-center">
                        <div class="push">
                            <img class="img-avatar" src="{{ asset('assets/media/avatars/avatar16.jpg') }}" alt="">
                        </div>
                        <div class="fw-semibold mb-1">{{ $content->course->user->name }}</div>
                        {{-- <div class="fs-sm text-muted">Front-end Developer</div> --}}
                    </div>
                </a>
                <!-- END About Instructor -->
            </div>
        </div>

    </div>
@endsection
