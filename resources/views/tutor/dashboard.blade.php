@extends('layouts.tutor')

@section('content')
    <!-- Hero -->
    <div class="m-2">
        <div
            class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
            <div class="flex-grow-1 mb-1 mb-md-0">
                {{-- <h1 class="h3 fw-bold mb-1">
                    Dashboard
                </h1> --}}
                <h2 class="h6 fw-medium fw-medium text-muted mb-0">
                    Welcome <a class="fw-semibold text-warning" href="{{ route('lms.tutor-profile') }}">{{ Auth::user()->name }}</a>, everything looks great.
                </h2>
            </div>

        </div>

             {{-- Dasboard Statistics --}}
             <div class="row">
                <div class="col-md-6 col-xl-4">
                  <a class="block block-rounded block-link-shadow bg-primary" href="{{ route('lms.tutor-students') }}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">

                      <dl class="ms-3 text-start mb-0">
                        <dt class="text-white h3 fw-extrabold mb-0">
                            {{ $active_students }}
                        </dt>
                        <dd class="text-white fs-sm fw-medium text-muted mb-0">
                         Active Students
                        </dd>
                      </dl>
                      <div>
                        <i class="fa fa-2x fa-users text-white-50"></i>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-md-6 col-xl-4">
                  <a class="block block-rounded block-link-shadow bg-danger" href="{{ route('lms.tutor-blocked-students') }}">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                      <dl class="me-3 mb-0">
                        <dt class="text-white h3 fw-extrabold mb-0">
                            {{ $blocked_students }}
                        </dt>
                        <dd class="text-white fs-sm fw-medium text-muted mb-0">
                          Blocked Students
                        </dd>
                      </dl>
                      <div>
                        <i class="fa fa-2x fa-users text-white-50"></i>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-md-6 col-xl-4">
                    <a class="block block-rounded block-link-shadow bg-success" href="{{ route('notifications.index') }}">
                      <div class="block-content block-content-full d-flex align-items-center justify-content-between">

                        <dl class="me-3 mb-0">
                            <dt class="text-white h3 fw-extrabold mb-0">
                                {{ $notifications }}

                            </dt>
                            <dd class="text-white fs-sm fw-medium text-muted mb-0">
                              Notifications
                            </dd>
                          </dl>
                          <div>
                            <i class="fa fa-2x fa-bell text-white-50"></i>
                          </div>
                      </div>
                    </a>
                  </div>
                <div class="col-md-6 col-xl-3" hidden>
                  <a class="block block-rounded block-link-shadow bg-warning" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                      <dl class="me-3 mb-0">
                        <dt class="text-white h3 fw-extrabold mb-0">
                            {{ $quizzes }}

                        </dt>
                        <dd class="text-white fs-sm fw-medium text-muted mb-0">
                          Assignments
                        </dd>
                      </dl>
                      <div>
                        <i class="fa fa-2x fa-question text-white-50"></i>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              {{-- ./ --}}




    </div>
    <!-- END Hero -->
@endsection
