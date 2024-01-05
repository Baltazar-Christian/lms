<!-- resources/views/courses/show.blade.php -->

@extends('layouts.student')

@section('content')
 <!-- Hero Content -->
 <div class="bg-image" style="background-image: url('assets/media/various/promo-code.png');">
    <div class="bg-primary-dark-op">
      <div class="content content-full text-center py-7 pb-5">
        <h1 class="h2 text-white mb-2">
            {{ $course->title }}
        </h1>
        <h2 class="h4 fw-normal text-white-75">
          {{ count( $contents) }} Lessons &bull; {{ $course->duration/60 }} hours
        </h2>
      </div>
    </div>
  </div>
  <!-- END Hero Content -->

  <!-- Navigation -->
  <div class="bg-body-extra-light">
    <div class="content content-boxed py-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-alt">
          <li class="breadcrumb-item">
            <a class="link-fx" href="be_pages_elearning_courses.html">Courses</a>
          </li>
          <li class="breadcrumb-item" aria-current="page">
            {{ $course->title }}
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- END Navigation -->

   <!-- Page Content -->
   <div class="content content-boxed">
    <div class="row">
      <div class="col-xl-8">
        <!-- Lessons -->
        <div class="block block-rounded">
          <div class="block-content fs-sm">
            <!-- Introduction -->
            <table class="table table-borderless table-vcenter">
              <tbody>
                @php
                    $i=1;
                @endphp
                @foreach ( $contents as $content )

                    <tr class="table-active mb-1">
                        <th style="width: 50px;">{{ $i++ }}</th>
                        <th>
                        <a href="{{ route('contents.show', $content) }}" class="text-dark">
                            {{ $content->title }}
                        </a>
                        </th>
                        <th class="text-end">
                          {{-- <span class="text-muted">{{ $content->duration }} MINUTES</span> --}}
                          <a href="{{ route('contents.show', $content) }}" class="btn btn-sm btn-warning">
                           Read
                            </a>
                        </th>
                      </tr>


                @endforeach


                {{-- <tr>
                  <td class="table-success text-center">
                    <i class="fa fa-fw fa-eye text-success"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="be_pages_elearning_lesson.html">1.1 HTML5 Intro (free preview)</a>
                  </td>
                  <td class="text-end text-muted">
                    12 min
                  </td>
                </tr> --}}
              </tbody>
            </table>
            <!-- END Introduction -->

          </div>
        </div>
        <!-- END Lessons -->
      </div>
      <div class="col-xl-4">
        <!-- Subscribe -->
        <div class="block block-rounded">
          <div class="block-content p-2">
            @if ($student->courses->contains('id', $course->id))
            <!-- Unenroll button -->
            <form action="{{ route('students.unenrollSelf', ['student' => $student, 'course' => $course]) }}" method="post">
                @csrf
                {{-- <div class="col-12"> --}}
                    <button type="submit" class=" form-control btn btn-danger btn-block">Unenroll</button>
                {{-- </div> --}}
            </form>
        @else
            <!-- Enroll button -->
            <form action="{{ route('students.enrollSelf', ['student' => $student, 'course' => $course]) }}" method="post">
                @csrf
                {{-- <div class="col-12"> --}}
                <button type="submit" class=" form-control btn btn-success btn-block">Enroll</button>
                {{-- </div> --}}
            </form>
        @endif
          </div>
        </div>
        <!-- END Subscribe -->

        <!-- Course Info -->
        <div class="block block-rounded">
          <div class="block-header block-header-default text-center">
            <h3 class="block-title">About This Course</h3>
          </div>
          <div class="block-content">
            <table class="table table-striped table-borderless fs-sm">
              <tbody>
                <tr>
                  <td>
                    <i class="fa fa-fw fa-book me-1"></i> {{ count($contents) }} Lessons
                  </td>
                </tr>
                <tr>
                  <td>
                    <i class="fa fa-fw fa-clock me-1"></i> {{ $course->duration_in_minutes}} Minutes
                  </td>
                </tr>
                <tr>
                  <td>
                    <i class="fa fa-fw fa-heart me-1"></i> 0 Favorites
                  </td>
                </tr>
                {{-- <tr>
                  <td>
                    <i class="fa fa-fw fa-calendar me-1"></i> 3 weeks ago
                  </td>
                </tr> --}}
                <tr>
                  <td>
                    <i class="fa fa-fw fa-tags me-1"></i>
                    <a class="fw-semibold link-fx text-primary" href="javascript:void(0)">{{  $course->title }}</a>,
                    {{-- <a class="fw-semibold link-fx text-primary" href="javascript:void(0)">CSS</a>,
                    <a class="fw-semibold link-fx text-primary" href="javascript:void(0)">JavaScript</a> --}}
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- END Course Info -->

        <!-- About Instructor -->
        <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
          <div class="block-header block-header-default text-center">
            <h3 class="block-title">About The Instructor</h3>
          </div>
          <div class="block-content block-content-full text-center">
            <div class="push">
              <img class="img-avatar" src="{{ asset('assets/media/avatars/avatar16.jpg') }}" alt="">
            </div>
            <div class="fw-semibold mb-1">{{  $course->user->name }}</div>
            <div class="fs-sm text-muted">Front-end Developer</div>
          </div>
        </a>
        <!-- END About Instructor -->
      </div>
    </div>
  </div>
  <!-- END Page Content -->
@endsection
