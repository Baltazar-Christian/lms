@extends('layouts.support')

@section('content')
    <div class="container mt-2 mb-5 ">

        <div class="card">
            <div class="card-header">


                <div class="mt-4 d-flex justify-content-end">
                    @if ($course->is_published)
                        <a href="{{ route('lms.support-courses') }}" class="btn btn-dark float-end"> <i
                                class="fa fa-list text-warning"></i> All Courses </a>
                    @else
                        <a href="{{ route('lms.support-draft-courses') }}" class="btn btn-dark float-end"> <i
                                class="fa fa-list text-warning"></i> All Courses </a>
                    @endif

                    <a href="{{ route('lms.support-edit-course', $course->id) }}" class="btn btn-dark btn-sm mx-1"><i
                            class="fa fa-edit"></i></a>



                </div>
                {{-- </h5> --}}
            </div>

            <div class="card-body p-2">



                <div class="col-4 mx-auto mt-4">
                    @if ($course->cover_image)
                        <img src="{{ asset('public/storage/covers/' . $course->cover_image) }}"
                            alt="{{ $course->title }} Cover Image" 
                            {{-- height="150px" width="100%" --}}
                            class=" rounded mx-auto image-fluid shadow mb-4">
                    @endif
                </div>
                <div class="bg-light p-1">
                    <span><strong class="text-warning">Title:</strong> {{ $course->title }}</span> <br>
                    <span><strong class="text-warning">Price:</strong> Tsh {{ number_format($course->price, 2) }}</span><br>
                    <span><strong class="text-warning">Duration:</strong> {{ $course->duration_in_minutes }}
                        minutes</span><br>
                    <span><strong class="text-warning">Published:</strong> {{ $course->is_published ? 'Yes' : 'No' }}</span>
                </div>
                <p class=" text-muted">{!! $course->description !!}</p>
                <hr>
                <div class="col-lg-12">
                    <!-- Block Tabs Default Style (Right) -->
                    <div class="block block-rounded">
                        <ul class="nav nav-tabs nav-tabs-block justify-content-end" role="tablist">
                            <li class="nav-item me-auto">
                                <button class=" btn btn-dark btn-sm" id="btabs-static2-settings-tab" data-bs-toggle="tab"
                                    data-bs-target="#btabs-static2-settings" role="tab"
                                    aria-controls="btabs-static2-settings" aria-selected="false">
                                    <i class="fa fa-user text-warning"></i>
                                    <span class="">Students</span>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="btn btn-dark btn-sm mx-1  active" id="btabs-static2-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#btabs-static2-home" role="tab" aria-controls="btabs-static2-home"
                                    aria-selected="true"> <i class="fa fa-list text-warning"></i> Contents</button>
                            </li>
                            <li class="nav-item">
                                <button class=" btn btn-dark btn-sm" id="btabs-static2-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#btabs-static2-profile" role="tab"
                                    aria-controls="btabs-static2-profile" aria-selected="false"> <i class="fa fa-question text-warning"></i> Quizes</button>
                            </li>

                        </ul>
                        <div class="block-content tab-content">
                            {{-- For Contents --}}
                            <div class="tab-pane table-responsive active " id="btabs-static2-home"  role="tabpanel"
                                aria-labelledby="btabs-static2-home-tab" tabindex="0">
                                {{-- Display course contents --}}
                                <h6 class="mt-4 mb-3"> <i class="fa fa-list text-warning"></i> Course Contents
                                    <a href="{{ route('lms.support-courses.create-content', $course->id) }}"
                                        class="btn btn-dark float-end">Add
                                        Content</a>
                                </h6>

                                <table class="table mt-2 table-bordereless  table-vcenter js-dataTable-responsive">
                                    <thead hidden>
                                        <th></th>
                                        <th>Title</th>
                                        <th>Option</th>
                                    </thead>
                                    <tbody>


                                        @forelse ($contents as $content)
                                            <tr>
                                                <td class="table-success text-center" width="2%">
                                                    <i class="fa fa-fw fa-book text-success"></i>
                                                </td>
                                                <td>
                                                    <a class="fw-medium text-dark"
                                                        href="{{ route('lms.support-show-course-content', ['courseId' => $course->id, 'contentId' => $content->id]) }}">{{ $content->title }}</a>
                                                </td>

                                                <td class="text-end text-muted">
                                                    <div class="d-flex justify-content-end align-items-center">
                                                        <a href="{{ route('lms.support-show-course-content', ['courseId' => $course->id, 'contentId' => $content->id]) }}"
                                                            class="btn btn-sm btn-dark ms-2"><i class="fa fa-eye"></i> </a>
                                                        @if ($content->type != 'text')
                                                            <a href="{{ asset('public/storage/course_contents/' . $content->file_path) }}"
                                                                target="_blank" class="btn btn-sm btn-dark  ms-2"><i
                                                                    class="fa fa-download"></i></a>
                                                        @endif
                                                        <a href="{{ route('lms.support-courses.edit-content', ['courseId' => $course->id, 'contentId' => $content->id]) }}"
                                                            class="btn btn-sm btn-warning ms-2"><i
                                                                class="fa fa-edit"></i></a>
                                                        <!-- Add the delete button -->
                                                        <form
                                                            action="{{ route('lms.support-delete-course-content', ['courseId' => $course->id, 'contentId' => $content->id]) }}"
                                                            method="post" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger ms-2"><i
                                                                    class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <p class="text-muted">No contents available for this course.</p>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                            {{-- For Quizzes --}}
                            <div class="tab-pane table-responsive" id="btabs-static2-profile" role="tabpanel"
                                aria-labelledby="btabs-static2-profile-tab" tabindex="0">
                                {{-- For Quizzes --}}
                                <h6 class="mt-4 mb-3"> <i class="fa fa-list text-warning"></i> Quizzes
                                    <a href="{{ route('lms.support-create-quiz', $course->id) }}"
                                        class="btn btn-dark  float-end">Add Quiz</a>

                                </h6>
                                <br>
                                <table class="table mt-2 table-bordereless  table-vcenter js-dataTable-responsive">
                                    <thead hidden>
                                        <th></th>
                                        <th>Title</th>
                                        <th>Option</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse ($quizzes as $quiz)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $quiz->title }}</td>
                                                <td>


                                                    <!-- Add the delete button -->
                                                    <form action="{{ route('lms.support-delete-quiz', $quiz->id) }}"
                                                        method="post" class="float-end" style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm float-end btn-danger ms-2"> <i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                    <a href="{{ route('lms.support-edit-quiz', $quiz->id) }}"
                                                        class="btn btn-sm btn-dark float-end ms-2">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                <a href="{{ route('lms.support-show-quiz', ['courseId' => $course->id, 'quizId' => $quiz->id]) }}"
                                                    class="btn btn-sm btn-dark float-end "> <i class="fa fa-eye"></i> </a>
                                                </td>

                            </tr>



                        @empty
                            <p class="text-muted">No quizzes available for this course.</p>
                            @endforelse
                            </tbody>

                            </table>
                        </div>
                        <div class="tab-pane table-responsive" id="btabs-static2-settings" role="tabpanel"
                            aria-labelledby="btabs-static2-settings-tab" tabindex="0">
                            <h6 class="mt-4 mb-3"> <i class="fa fa-users text-warning"></i> Enrolled Students</h6>

                            <table
                                class="table mt-2 table-bordereless table-stripped table-vcenter js-dataTable-responsive">
                                <thead>
                                    <th>SN</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($enrolledStudents as $student)
                                        <tr>
                                            <td>{{ $i++ }}</td>

                                            <td>
                                                {{ $student->name }}
                                            </td>
                                            <td>
                                                {{ $student->email }}
                                            </td>
                                            <td>
                                                <span
                                                    class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill   {{ $course->is_published ? 'bg-success-light text-success' : 'bg-danger-light text-danger' }} ">
                                                    {{ $student->pivot->approval_status }}

                                                </span>
                                            </td>

                                            <td>
                                                @if ($student->pivot->approval_status == 'pending')
                                                    <form
                                                        action="{{ route('lms.support-approve-enrollment', ['courseId' => $course->id, 'studentId' => $student->id]) }}"
                                                        method="post" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm"> <i
                                                                class="fa fa-check"></i> Approve</button>
                                                    </form>

                                                    <form
                                                        action="{{ route('lms.support-reject-enrollment', ['courseId' => $course->id, 'studentId' => $student->id]) }}"
                                                        method="post" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm"> <i
                                                                class="fa fa-x"></i> Reject</button>
                                                    </form>
                                                @else
                                                    <span
                                                        class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill   {{ $course->is_published ? 'bg-success-light text-success' : 'bg-danger-light text-danger' }} ">
                                                        Done
                                                    </span>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END Block Tabs Default Style (Right) -->


            </div>




        </div>

    </div>
@endsection
