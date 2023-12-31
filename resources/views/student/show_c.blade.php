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
          10 Lessons &bull; 3 hours
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
                <tr class="table-active">
                  <th style="width: 50px;"></th>
                  <th>1. Intro</th>
                  <th class="text-end">
                    <span class="text-muted">0.2 hours</span>
                  </th>
                </tr>
                <tr>
                  <td class="table-success text-center">
                    <i class="fa fa-fw fa-unlock text-success"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="be_pages_elearning_lesson.html">1.1 HTML5 Intro (free preview)</a>
                  </td>
                  <td class="text-end text-muted">
                    12 min
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- END Introduction -->

            <!-- Basics -->
            <table class="table table-borderless table-vcenter">
              <tbody>
                <tr class="table-active">
                  <th style="width: 50px;"></th>
                  <th>2. Basics</th>
                  <th class="text-end">
                    <span class="text-muted">1.3 hours</span>
                  </th>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">2.1 HTML5 Structure</a>
                  </td>
                  <td class="text-end text-muted">
                    15 min
                  </td>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">2.2 Basic HTML5 Elements</a>
                  </td>
                  <td class="text-end text-muted">
                    25 min
                  </td>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">2.3 New Elements in HTML5</a>
                  </td>
                  <td class="text-end text-muted">
                    20 min
                  </td>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">2.4 HTML5 Semantics</a>
                  </td>
                  <td class="text-end text-muted">
                    18 min
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- END Basics -->

            <!-- Advanced -->
            <table class="table table-borderless table-vcenter">
              <tbody>
                <tr class="table-active">
                  <th style="width: 50px;"></th>
                  <th>3. Advanced</th>
                  <th class="text-end">
                    <span class="text-muted">1.5 hours</span>
                  </th>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">3.1 HTML5 Forms</a>
                  </td>
                  <td class="text-end text-muted">
                    30 min
                  </td>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">3.2 HTML5 Media</a>
                  </td>
                  <td class="text-end text-muted">
                    20 min
                  </td>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">3.3 HTML5 APIS</a>
                  </td>
                  <td class="text-end text-muted">
                    10 min
                  </td>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">3.4 HTML5 Graphics</a>
                  </td>
                  <td class="text-end text-muted">
                    14 min
                  </td>
                </tr>
                <tr>
                  <td class="table-danger text-center">
                    <i class="fa fa-fw fa-lock text-danger"></i>
                  </td>
                  <td>
                    <a class="fw-medium" href="javascript:void(0)">3.5 HTML5 Examples</a>
                  </td>
                  <td class="text-end text-muted">
                    16 min
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- END Advanced -->
          </div>
        </div>
        <!-- END Lessons -->
      </div>
      <div class="col-xl-4">
        <!-- Subscribe -->
        <div class="block block-rounded">
          <div class="block-content">
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
                    <i class="fa fa-fw fa-book me-1"></i> 10 Lessons
                  </td>
                </tr>
                <tr>
                  <td>
                    <i class="fa fa-fw fa-clock me-1"></i> 3 hours
                  </td>
                </tr>
                <tr>
                  <td>
                    <i class="fa fa-fw fa-heart me-1"></i> 16850 Favorites
                  </td>
                </tr>
                <tr>
                  <td>
                    <i class="fa fa-fw fa-calendar me-1"></i> 3 weeks ago
                  </td>
                </tr>
                <tr>
                  <td>
                    <i class="fa fa-fw fa-tags me-1"></i>
                    <a class="fw-semibold link-fx text-primary" href="javascript:void(0)">HTML</a>,
                    <a class="fw-semibold link-fx text-primary" href="javascript:void(0)">CSS</a>,
                    <a class="fw-semibold link-fx text-primary" href="javascript:void(0)">JavaScript</a>
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
              <img class="img-avatar" src="assets/media/avatars/avatar16.jpg" alt="">
            </div>
            <div class="fw-semibold mb-1">Wayne Garcia</div>
            <div class="fs-sm text-muted">Front-end Developer</div>
          </div>
        </a>
        <!-- END About Instructor -->
      </div>
    </div>
  </div>
  <!-- END Page Content -->
@endsection
