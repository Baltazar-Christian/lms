<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>LMS - Learn, Grow, Succeed</title>

    <meta name="description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="OneUI">
    <meta property="og:description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- OneUI framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/oneui.min.css')}}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
  </head>

  <body>
    <!-- Page Container -->

    <div id="page-container" class="page-header-dark main-content-boxed">

      <!-- Header -->
      <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
          <!-- Left Section -->
          <div class="d-flex align-items-center">
            <!-- Logo -->
            <a class="fw-semibold fs-5 tracking-wider text-dual me-3" href="index.html">
            <i class="fa fa-graduation-cap text-warning"></i>
            LMS
            </a>
            <!-- END Logo -->

            <!-- Notifications Dropdown -->
            <div class="dropdown d-inline-block me-2">
              <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-fw fa-bell"></i>
                <span class="text-primary">•</span>
              </button>
              <div class="dropdown-menu dropdown-menu-lg p-0 border-0 fs-sm" aria-labelledby="page-header-notifications-dropdown">
                <div class="p-2 bg-body-light border-bottom text-center rounded-top">
                  <h5 class="dropdown-header text-uppercase">Notifications</h5>
                </div>
                <ul class="nav-items mb-0">
                  <li>
                    <a class="text-dark d-flex py-2" href="javascript:void(0)">
                      <div class="flex-shrink-0 me-2 ms-3">
                        <i class="fa fa-fw fa-check-circle text-success"></i>
                      </div>
                      <div class="flex-grow-1 pe-2">
                        <div class="fw-semibold">You have a new follower</div>
                        <span class="fw-medium text-muted">15 min ago</span>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="text-dark d-flex py-2" href="javascript:void(0)">
                      <div class="flex-shrink-0 me-2 ms-3">
                        <i class="fa fa-fw fa-plus-circle text-primary"></i>
                      </div>
                      <div class="flex-grow-1 pe-2">
                        <div class="fw-semibold">1 new sale, keep it up</div>
                        <span class="fw-medium text-muted">22 min ago</span>
                      </div>
                    </a>
                  </li>


                </ul>

              </div>
            </div>
            <!-- END Notifications Dropdown -->
          </div>
          <!-- END Left Section -->

          <!-- Right Section -->
          <div class="d-flex align-items-center">
            <!-- Open Search Section (visible on smaller screens) -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary d-md-none" data-toggle="layout" data-action="header_search_on">
              <i class="fa fa-fw fa-search"></i>
            </button>
            <!-- END Open Search Section -->

            <!-- Search Form (visible on larger screens) -->
            <form class="d-none d-md-inline-block" action="bd_search.html" method="POST">
              <div class="input-group input-group-sm">
                <input type="text" class="form-control form-control-alt" placeholder="Search.." id="page-header-search-input2" name="page-header-search-input2" />
                <span class="input-group-text bg-body border-0">
                  <i class="fa fa-fw fa-search"></i>
                </span>
              </div>
            </form>
            <!-- END Search Form -->

            <!-- User Dropdown -->
            <div class="dropdown d-inline-block ms-2">
              <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle" src="{{ asset('assets/media/avatars/avatar10.jpg') }}" alt="Header Avatar" style="width: 21px;" />
                <span class="d-none d-sm-inline-block ms-2">{{ Auth::user()->name }}</span>
                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block opacity-50 ms-1"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
                <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                  <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/media/avatars/avatar10.jpg" alt="">
                  <p class="mt-2 mb-0 fw-medium">{{ Auth::user()->name }}</p>
                  <p class="mb-0 text-muted fs-sm fw-medium"> Student </p>
                </div>
                <div class="p-2">
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">
                    <span class="fs-sm fw-medium">Inbox</span>
                    <span class="badge rounded-pill bg-primary ms-2">3</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_profile.html">
                    <span class="fs-sm fw-medium">Profile</span>
                    <span class="badge rounded-pill bg-primary ms-2">1</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                    <span class="fs-sm fw-medium">Settings</span>
                  </a>
                </div>
                <div role="separator" class="dropdown-divider m-0"></div>
                <div class="p-2">
                     {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"> --}}
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                          <span class="fs-sm fw-medium">Log Out</span>
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                 {{-- </div> --}}
                </div>
              </div>
            </div>
            <!-- END User Dropdown -->
          </div>
          <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-body-extra-light">
          <div class="content-header">
            <form class="w-100" action="bd_search.html" method="POST">
              <div class="input-group">
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                  <i class="fa fa-fw fa-times-circle"></i>
                </button>
                <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input" />
              </div>
            </form>
          </div>
        </div>
        <!-- END Header Search -->


      </header>
      <!-- END Header -->

      <!-- Main Container -->
      <main id="main-container">
        <!-- Navigation -->
        <div class="bg-primary-darker">
          <div class="bg-black-10">
            <div class="content py-3">
              <!-- Toggle Main Navigation -->
              <div class="d-lg-none">
                <!-- Class Toggle, functionality initialized in Helpers.oneToggleClass() -->
                <button type="button" class="btn w-100 btn-alt-secondary d-flex justify-content-between align-items-center" data-toggle="class-toggle" data-target="#main-navigation" data-class="d-none">
                  Menu
                  <i class="fa fa-bars"></i>
                </button>
              </div>
              <!-- END Toggle Main Navigation -->

              <!-- Main Navigation -->
              <div id="main-navigation" class="d-none d-lg-block mt-2 mt-lg-0">
                <ul class="nav-main nav-main-dark nav-main-horizontal nav-main-hover">
                  <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{ route('lms.student-dashboard') }}">
                      <i class="nav-main-link-icon si si-compass"></i>
                      <span class="nav-main-link-name">Dashboard</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                      <i class="nav-main-link-icon fa fa-book"></i>
                      <span class="nav-main-link-name">Courses</span>
                    </a>
                    <ul class="nav-main-submenu">
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="bd_simple_1.html">
                          <span class="nav-main-link-name">Simple 1</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="bd_simple_2.html">
                          <span class="nav-main-link-name">Simple 2</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="bd_image_1.html">
                          <span class="nav-main-link-name">Image 1</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="bd_image_2.html">
                          <span class="nav-main-link-name">Image 2</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="bd_video_1.html">
                          <span class="nav-main-link-name">Video 1</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link" href="bd_video_2.html">
                          <span class="nav-main-link-name">Video 2</span>
                        </a>
                      </li>
                      <li class="nav-main-item">
                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                          <span class="nav-main-link-name">More Options</span>
                        </a>
                        <ul class="nav-main-submenu">
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="javascript:void(0)">
                              <span class="nav-main-link-name">Another Link</span>
                            </a>
                          </li>
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="javascript:void(0)">
                              <span class="nav-main-link-name">Another Link</span>
                            </a>
                          </li>
                          <li class="nav-main-item">
                            <a class="nav-main-link" href="javascript:void(0)">
                              <span class="nav-main-link-name">Another Link</span>
                            </a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="bd_search.html">
                        <i class="fa-solid fa-address-book"></i>

                      <span class="nav-main-link-name"> &nbsp; Enrolled Courses</span>
                    </a>
                  </li>
                  <li class="nav-main-item">
                    <a class="nav-main-link" href="be_pages_dashboard.html">
                      <i class="nav-main-link-icon fa fa-bookmark"></i>
                      <span class="nav-main-link-name">Completed Courses</span>
                    </a>
                  </li>

                </ul>
              </div>
              <!-- END Main Navigation -->
            </div>
          </div>
        </div>
        <!-- END Navigation -->
        <!-- Page Content -->
        <div class="content">

          <!-- Stats -->
          <div class="row">
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
              <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                <div class="block-content block-content-full">
                  <div class="fs-sm fw-semibold text-uppercase text-muted">Available Courses</div>
                  <div class="fs-2 fw-normal text-dark">--</div>
                </div>
              </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
              <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                <div class="block-content block-content-full">
                  <div class="fs-sm fw-semibold text-uppercase text-muted">Enrolled Courses</div>
                  <div class="fs-2 fw-normal text-dark">--</div>
                </div>
              </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
              <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                <div class="block-content block-content-full">
                  <div class="fs-sm fw-semibold text-uppercase text-muted">INCOMPLETE COURSES</div>
                  <div class="fs-2 fw-normal text-dark">--</div>
                </div>
              </a>
            </div>
            <div class="col-6 col-md-3 col-lg-6 col-xl-3">
              <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                <div class="block-content block-content-full">
                  <div class="fs-sm fw-semibold text-uppercase text-muted">COMPLETE COURSES</div>
                  <div class="fs-2 fw-normal text-dark">--</div>
                </div>
              </a>
            </div>
          </div>
          <!-- END Stats -->


             <!-- Page Content -->
        <div class="content content-boxed">
            <div class="row items-push py-4">
                <!-- Course -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                  <a class="block block-rounded block-link-pop h-100 mb-0" href="be_pages_elearning_course.html">
                    <div class="block-content block-content-full text-center bg-city">
                      <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                        <i class="fab fa-html5 fa-2x text-white-75"></i>
                      </div>
                      <div class="fs-sm text-white-75">
                        10 lessons &bull; 3 hours
                      </div>
                    </div>
                    <div class="block-content block-content-full">
                      <h4 class="h5 mb-1">
                        Learn HTML5 in 10 simple and easy to follow steps
                      </h4>
                      <div class="fs-sm text-muted">November 5, 2021</div>
                    </div>
                  </a>
                </div>
                <!-- END Course -->

                <!-- Course -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                  <a class="block block-rounded block-link-pop h-100 mb-0" href="be_pages_elearning_course.html">
                    <div class="block-content block-content-full text-center bg-flat">
                      <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                        <i class="fab fa-css3 fa-2x text-white-75"></i>
                      </div>
                      <div class="fs-sm text-white-75">
                        12 lessons &bull; 5 hours
                      </div>
                    </div>
                    <div class="block-content block-content-full">
                      <h4 class="h5 mb-1">
                        Be a pro with CSS3 in only two weeks
                      </h4>
                      <div class="fs-sm text-muted">November 1, 2021</div>
                    </div>
                  </a>
                </div>
                <!-- END Course -->

                <!-- Course -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                  <a class="block block-rounded block-link-pop h-100 mb-0" href="be_pages_elearning_course.html">
                    <div class="block-content block-content-full text-center bg-amethyst">
                      <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                        <i class="si si-vector fa-2x text-white-75"></i>
                      </div>
                      <div class="fs-sm text-white-75">
                        4 lessons &bull; 2 hours
                      </div>
                    </div>
                    <div class="block-content block-content-full">
                      <h4 class="h5 mb-1">
                        Using SVG is easier than ever
                      </h4>
                      <div class="fs-sm text-muted">October 27, 2021</div>
                    </div>
                  </a>
                </div>
                <!-- END Course -->

                <!-- Course -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                  <a class="block block-rounded block-link-pop h-100 mb-0" href="be_pages_elearning_course.html">
                    <div class="block-content block-content-full text-center bg-smooth">
                      <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                        <i class="si si-rocket fa-2x text-white-75"></i>
                      </div>
                      <div class="fs-sm text-white-75">
                        18 lessons &bull; 25 hours
                      </div>
                    </div>
                    <div class="block-content block-content-full">
                      <h4 class="h5 mb-1">
                        Build a modern web application from scratch
                      </h4>
                      <div class="fs-sm text-muted">October 25, 2021</div>
                    </div>
                  </a>
                </div>
                <!-- END Course -->

                <!-- Course -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                  <a class="block block-rounded block-link-pop h-100 mb-0" href="be_pages_elearning_course.html">
                    <div class="block-content block-content-full text-center bg-default">
                      <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                        <span class="fs-lg fw-bold text-white-75">PS</span>
                      </div>
                      <div class="fs-sm text-white-75">
                        5 lessons &bull; 19 hours
                      </div>
                    </div>
                    <div class="block-content block-content-full">
                      <h4 class="h5 mb-1">
                        UI Design in Photoshop: Tips  &amp; Tricks
                      </h4>
                      <div class="fs-sm text-muted">October 10, 2021</div>
                    </div>
                  </a>
                </div>
                <!-- END Course -->

                <!-- Course -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                  <a class="block block-rounded block-link-pop h-100 mb-0" href="be_pages_elearning_course.html">
                    <div class="block-content block-content-full text-center bg-modern">
                      <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                        <i class="si si-user-following fa-2x text-white-75"></i>
                      </div>
                      <div class="fs-sm text-white-75">
                        9 lessons &bull; 10 hours
                      </div>
                    </div>
                    <div class="block-content block-content-full">
                      <h4 class="h5 mb-1">
                        Marketing 101: All the basics
                      </h4>
                      <div class="fs-sm text-muted">October 1, 2021</div>
                    </div>
                  </a>
                </div>
                <!-- END Course -->

                <!-- Course -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                  <a class="block block-rounded block-link-pop h-100 mb-0" href="be_pages_elearning_course.html">
                    <div class="block-content block-content-full text-center bg-warning">
                      <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                        <i class="si si-target fa-2x text-white-75"></i>
                      </div>
                      <div class="fs-sm text-white-75">
                        5 lessons &bull; 8 hours
                      </div>
                    </div>
                    <div class="block-content block-content-full">
                      <h4 class="h5 mb-1">
                        How to make your page convert in 5 steps
                      </h4>
                      <div class="fs-sm text-muted">September 19, 2021</div>
                    </div>
                  </a>
                </div>
                <!-- END Course -->

                <!-- Course -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                  <a class="block block-rounded block-link-pop h-100 mb-0" href="be_pages_elearning_course.html">
                    <div class="block-content block-content-full text-center bg-success">
                      <div class="item item-2x item-circle bg-white-10 py-3 my-3 mx-auto">
                        <i class="si si-support fa-2x text-white-75"></i>
                      </div>
                      <div class="fs-sm text-white-75">
                        21 lessons &bull; 29 hours
                      </div>
                    </div>
                    <div class="block-content block-content-full">
                      <h4 class="h5 mb-1">
                        How to provide rock star support
                      </h4>
                      <div class="fs-sm text-muted">September 15, 2021</div>
                    </div>
                  </a>
                </div>
                <!-- END Course -->





              </div>
        </div>



        </div>
        <!-- END Page Content -->
      </main>
      <!-- END Main Container -->

      <!-- Footer -->
      <footer id="page-footer" class="bg-body-extra-light">
        <div class="content py-3">
          <div class="row fs-sm">
            <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
              Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
            </div>
            <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
              <a class="fw-semibold" href="https://1.envato.market/AVD6j" target="_blank">OneUI 5.7</a> &copy; <span data-toggle="year-copy"></span>
            </div>
          </div>
        </div>
      </footer>
      <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!--
        OneUI JS

        Core libraries and functionality
        webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="{{ asset('assets/js/oneui.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{  asset('assets/js/plugins/chart.js/chart.umd.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_pages_dashboard_v1.min.js') }}"></script>
  </body>
</html>
