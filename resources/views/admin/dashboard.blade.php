@extends('layouts.master')

@section('content')
      <!-- Hero -->
      <div class="m-2">
        <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
          <div class="flex-grow-1 mb-1 mb-md-0">
            <h1 class="h3 fw-bold mb-1">
              Dashboard
            </h1>
            <h2 class="h6 fw-medium fw-medium text-muted mb-0">
              Welcome <a class="fw-semibold" href="be_pages_generic_profile.html">John</a>, everything looks great.
            </h2>
          </div>
          <div class="mt-3 mt-md-0 ms-md-3 space-x-1">
            <a class="btn btn-sm btn-alt-secondary space-x-1" href="be_pages_generic_profile_edit.html">
              <i class="fa fa-cogs opacity-50"></i>
              <span>Settings</span>
            </a>
            <div class="dropdown d-inline-block">
              <button type="button" class="btn btn-sm btn-alt-secondary space-x-1" id="dropdown-analytics-overview" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <a class="dropdown-item fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
                  <span>All time</span>
                  <i class="fa fa-check"></i>
                </a>
              </div>
            </div>
          </div>
        </div>


                <!-- Quick Overview -->
                <div class="row">
                    <div class="col-6 col-lg-3">
                      <a class="block block-rounded block-link-shadow text-center" href="be_pages_ecom_product_edit.html">
                        <div class="block-content block-content-full">
                          <div class="fs-2 fw-semibold text-success">
                            <i class="fa fa-plus"></i>
                          </div>
                        </div>
                        <div class="block-content py-2 bg-body-light">
                          <p class="fw-medium fs-sm text-success mb-0">
                            Add New
                          </p>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-lg-3">
                      <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                          <div class="fs-2 fw-semibold text-danger">24</div>
                        </div>
                        <div class="block-content py-2 bg-body-light">
                          <p class="fw-medium fs-sm text-danger mb-0">
                            Out of stock
                          </p>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-lg-3">
                      <a class="block block-rounded block-link-shadow text-center" href="be_pages_ecom_dashboard.html">
                        <div class="block-content block-content-full">
                          <div class="fs-2 fw-semibold text-dark">260</div>
                        </div>
                        <div class="block-content py-2 bg-body-light">
                          <p class="fw-medium fs-sm text-muted mb-0">
                            New
                          </p>
                        </div>
                      </a>
                    </div>
                    <div class="col-6 col-lg-3">
                      <a class="block block-rounded block-link-shadow text-center" href="be_pages_ecom_dashboard.html">
                        <div class="block-content block-content-full">
                          <div class="fs-2 fw-semibold text-dark">14503</div>
                        </div>
                        <div class="block-content py-2 bg-body-light">
                          <p class="fw-medium fs-sm text-muted mb-0">
                            All Products
                          </p>
                        </div>
                      </a>
                    </div>
                  </div>
                  <!-- END Quick Overview -->
      </div>
      <!-- END Hero -->

@endsection
