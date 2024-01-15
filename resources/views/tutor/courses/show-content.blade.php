@extends('layouts.tutor')

@section('content')
    <div class="container mt-2 mb-2">
        <div class="card rounded shadow ">
            <div class="card-header">
                <h5 class="text-start text-dark">
                    <div class="fa fa-book text-warning"></div> {{ $course->title }} - Course Content

                    <a href="{{ route('lms.show-tutor-course', $course->id) }}" class="btn btn-sm btn-dark float-end">
                        <i class="fa fa-list"></i> Back
                    </a>
                </h5>

            </div>

            <div class="card-body">

                @if ($content->type === 'video')
                    <video width="100%" controls>
                        <source src="{{ asset('public/storage/course_contents/' . $content->file_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @endif
                <hr>
                {{-- Display content details --}}
                <p>
                    {!! $content->description !!}
                </p>


                @if ($content->type != 'video' || $content->type!='text')
                <div class="col-12">
                <hr>
                    {{-- Display other file types or embed PDF viewer --}}
                    <a href="{{ asset('public/storage/course_contents/' . $content->file_path) }}" target="_blank"
                        type="button" class="btn btn-sm btn-dark float-end mt-2 mb-3">
                    <i class="fa fa-download"></i>
                    Download Attachment
                    </a>
                    <br>
                </div>
                @endif


                <div class="col-12 mt-4 table-responsive">
                    <hr>
                    <h6>
                        <i class="fa fa-list text-warning"></i>
                        Sub-Sections

                        {{-- Add button to create a new sub-section --}}
                        <a href="{{ route('lms.tutor-create-subsection', ['courseId' => $course->id, 'parentId' => $content->id]) }}"
                            class="btn btn-dark float-end "><i class="fa fa-plus"></i> Sub-Section</a>
                    </h6>

                    <table class="table mt-2 table-bordereless  table-vcenter js-dataTable-responsive">
                        <thead hidden>
                            <th></th>
                            <th>Title</th>
                            <th>Option</th>
                        </thead>
                        <tbody>
                            {{-- Loop through sub-sections --}}
                            @php
                                $i = 1;
                            @endphp
                            @forelse ($subContents as $subContent)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td width="60%">{{ $subContent->title }}</td>
                                    <td>
                                        {{-- Add buttons to view/edit/delete sub-section --}}

                                        <a href="{{ route('lms.tutor-show-subsection', ['courseId' => $course->id, 'contentId' => $subContent->id]) }}"
                                            class="btn btn-dark btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('lms.tutor-courses.edit-content', ['courseId' => $course->id, 'contentId' => $subContent->id]) }}"
                                            class="btn btn-dark btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('lms.tutor-delete-course-content', ['courseId' => $course->id, 'contentId' => $subContent->id]) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>

                                    </td>
                                </tr>
                            @empty
                                <li class="list-group-item">No sub-sections available for this content.</li>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
