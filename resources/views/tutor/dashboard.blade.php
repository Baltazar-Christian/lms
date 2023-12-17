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
                    Welcome <a class="fw-semibold" href="be_pages_generic_profile.html">{{ Auth::user()->name }}</a>, everything looks great.
                </h2>
            </div>
            <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
                <a class="btn btn-sm btn-alt-secondary space-x-1" href="be_pages_generic_profile_edit.html">
                    <i class="fa fa-cogs opacity-50"></i>
                    <span>Settings</span>
                </a>
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-sm btn-alt-secondary space-x-1" id="dropdown-analytics-overview"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-calendar-alt opacity-50"></i>
                        <span>All time</span>
                        <i class="fa fa-fw fa-angle-down"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end fs-sm" aria-labelledby="dropdown-analytics-overview">
                        <a class="dropdown-item fw-medium" href="javascript:void(0)">Last 30 days</a>
                        <a class="dropdown-item fw-medium" href="javascript:void(0)">Last month</a>
                        <a class="dropdown-item fw-medium" href="javascript:void(0)">Last 3 months</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item fw-medium" href="javascript:void(0)">This year</a>
                        <a class="dropdown-item fw-medium" href="javascript:void(0)">Last Year</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item fw-medium d-flex align-items-center justify-content-between"
                            href="javascript:void(0)">
                            <span>All time</span>
                            <i class="fa fa-check"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

             {{-- Dasboard Statistics --}}
             <div class="row">
                <div class="col-md-6 col-xl-3">
                  <a class="block block-rounded block-link-shadow bg-primary" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                      <div>
                        <i class="fa fa-2x fa-users text-white-50"></i>
                      </div>
                      <dl class="ms-3 text-end mb-0">
                        <dt class="text-white h3 fw-extrabold mb-0">
                            --
                        </dt>
                        <dd class="text-white fs-sm fw-medium text-muted mb-0">
                          Students
                        </dd>
                      </dl>
                    </div>
                  </a>
                </div>

                <div class="col-md-6 col-xl-3">
                  <a class="block block-rounded block-link-shadow bg-danger" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                      <dl class="me-3 mb-0">
                        <dt class="text-white h3 fw-extrabold mb-0">
                        --
                        </dt>
                        <dd class="text-white fs-sm fw-medium text-muted mb-0">
                          Modules
                        </dd>
                      </dl>
                      <div>
                        <i class="fa fa-2x fa-clipboard text-white-50"></i>
                      </div>
                    </div>
                  </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-rounded block-link-shadow bg-success" href="javascript:void(0)">
                      <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                          <i class="fa fa-2x fa-book text-white-50"></i>
                        </div>
                        <dl class="ms-3 text-end mb-0">
                          <dt class="text-white h3 fw-extrabold mb-0">
                            --
                          </dt>
                          <dd class="text-white fs-sm fw-medium text-muted mb-0">
                            Courses
                          </dd>
                        </dl>
                      </div>
                    </a>
                  </div>
                <div class="col-md-6 col-xl-3">
                  <a class="block block-rounded block-link-shadow bg-warning" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                      <dl class="me-3 mb-0">
                        <dt class="text-white h3 fw-extrabold mb-0">
                        --
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
