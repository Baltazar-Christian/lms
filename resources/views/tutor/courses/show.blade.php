@extends('layouts.tutor')

@section('content')
    <div class="container mt-2 mb-5 " {{-- style="border: 1px solid #ddd; border-radius: 8px; background-color: #fff; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);" --}}>

        <div class="card">
            <div class="card-header">


                <div class="mt-4 d-flex justify-content-end">
                    <a href="{{ route('lms.edit-tutor-course', $course->id) }}" class="btn btn-dark mx-1"><i
                            class="fa fa-edit"></i></a>
                    <form action="{{ route('lms.delete-tutor-course', $course->id) }}" method="post" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mx-1" onclick="return confirm('Are you sure?')"><i
                                class="fa fa-trash"></i></button>
                    </form>


                </div>
                {{-- </h5> --}}
            </div>

            <div class="card-body p-2">



                <div class="col-5 mx-auto mt-4">
                    @if ($course->cover_image)
                        <img src="{{ asset('storage/covers/' . $course->cover_image) }}"
                            alt="{{ $course->title }} Cover Image" width="100%"
                            class="img-fluid rounded mx-auto shadow mb-4">
                    @endif
                </div>
                <span><strong>Title:</strong> ${{ $course->title }}</span>
                <span><strong>Price:</strong> ${{ $course->price }}</span>
                <span><strong>Duration:</strong> {{ $course->duration_in_minutes }} minutes</span>
                <span><strong>Published:</strong> {{ $course->is_published ? 'Yes' : 'No' }}</span>
                <hr>
                <p class="lead text-muted">{{ $course->description }}</p>
                <hr>
                <div class="col-lg-12">
                    <!-- Block Tabs Default Style (Right) -->
                    <div class="block block-rounded">
                        <ul class="nav nav-tabs nav-tabs-block justify-content-end" role="tablist">
                            <li class="nav-item me-auto">
                                <button class="nav-link" id="btabs-static2-settings-tab" data-bs-toggle="tab"
                                    data-bs-target="#btabs-static2-settings" role="tab"
                                    aria-controls="btabs-static2-settings" aria-selected="false">
                                    <i class="si si-settings"></i>
                                    <span class="visually-hidden">Settings</span>
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link active" id="btabs-static2-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#btabs-static2-home" role="tab" aria-controls="btabs-static2-home"
                                    aria-selected="true">Contents</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" id="btabs-static2-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#btabs-static2-profile" role="tab"
                                    aria-controls="btabs-static2-profile" aria-selected="false">Quizes</button>
                            </li>

                        </ul>
                        <div class="block-content tab-content">
                            <div class="tab-pane active" id="btabs-static2-home" role="tabpanel"
                                aria-labelledby="btabs-static2-home-tab" tabindex="0">
                                {{-- Display course contents --}}
                                <h6 class="mt-4 mb-3"> <i class="fa fa-list text-warning"></i> Course Contents
                                    <a href="{{ route('lms.courses.create-content', $course->id) }}" class="btn btn-dark btn-sm float-end">Add
                                        Content</a>
                                </h6>

                                <table class="table table-borderless table-vcenter mt-2">
                                    <tbody>

                                      @forelse ($contents as $content)
                                      <tr>
                                        <td class="table-success text-center" width="2%">
                                          <i class="fa fa-fw fa-book text-success"></i>
                                        </td>
                                        <td>
                                          <a class="fw-medium" href="{{ route('lms.show-course-content', ['courseId' => $course->id, 'contentId' => $content->id]) }}">{{ $content->title }}</a>
                                        </td>
                                        <td class="text-end text-muted">
                                          12 min
                                        </td>
                                      </tr>
                                      @empty
                                      <p class="text-muted">No contents available for this course.</p>
                                  @endforelse
                                    </tbody>
                                  </table>

                                {{-- @forelse ($contents as $content)
                                    <div class=" mb-3">
                                        <div class="">
                                            <h3 class="card-title">{{ $content->title }}</h3>
                                            <div class="d-flex justify-content-end align-items-center">
                                                <a href="{{ route('lms.show-course-content', ['courseId' => $course->id, 'contentId' => $content->id]) }}"
                                                    class="btn btn-sm btn-dark ms-2"><i class="fa fa-eye"></i> </a>
                                                <a href="{{ asset('storage/' . $content->file_path) }}" target="_blank"
                                                    class="btn btn-sm btn-dark  ms-2"><i class="fa fa-download"></i></a>

                                                <a href="{{ route('lms.courses.edit-content', ['courseId' => $course->id, 'contentId' => $content->id]) }}"
                                                    class="btn btn-sm btn-warning ms-2"><i class="fa fa-edit"></i></a>
                                                <!-- Add the delete button -->
                                                <form
                                                    action="{{ route('lms.delete-course-content', ['courseId' => $course->id, 'contentId' => $content->id]) }}"
                                                    method="post" style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger ms-2"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                @empty
                                    <p class="text-muted">No contents available for this course.</p>
                                @endforelse --}}
                            </div>
                            <div class="tab-pane" id="btabs-static2-profile" role="tabpanel"
                                aria-labelledby="btabs-static2-profile-tab" tabindex="0">
                                {{-- For Quizzes --}}
                                <h6 class="mt-4 mb-3"> <i class="fa fa-list text-warning"></i> Quizzes
                                    <a href="{{ route('lms.create-quiz', $course->id) }}" class="btn btn-dark btn-sm  float-end">Add Quiz</a>

                                </h6>
                                <br>
                                @forelse ($quizzes as $quiz)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h3 class="card-title">{{ $quiz->title }}</h3>
                                            <div class="d-flex justify-content-end align-items-center">
                                                <a href="{{ route('lms.show-quiz', ['courseId' => $course->id, 'quizId' => $quiz->id]) }}"
                                                    class="btn btn-sm btn-primary ms-2">View </a>
                                                {{-- <a href="{{ route('lms.edit-quiz', ['courseId' => $course->id, 'quizId' => $quiz->id]) }}"
                            class="btn btn-sm btn-warning ms-2">Edit</a> --}}
                                                <!-- Add the delete button -->
                                                {{-- <form
                            action="{{ route('lms.delete-quiz', ['quizId' => $quiz->id]) }}"
                            method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger ms-2">Delete</button>
                        </form> --}}
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted">No quizzes available for this course.</p>
                                @endforelse
                            </div>
                            <div class="tab-pane" id="btabs-static2-settings" role="tabpanel"
                                aria-labelledby="btabs-static2-settings-tab" tabindex="0">
                                <h4 class="fw-normal">Settings Content</h4>
                                <p>...</p>
                            </div>
                        </div>
                    </div>
                    <!-- END Block Tabs Default Style (Right) -->


                </div>




            </div>

        </div>
    @endsection
