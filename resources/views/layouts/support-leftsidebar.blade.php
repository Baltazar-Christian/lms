<!-- END Side Overlay -->
<nav id="sidebar"  aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header">
        <!-- Logo -->
        <a class="fw-semibold text-dual" href="index.html">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">
                <i class="nav-main-link-icon fa fa-graduation-cap text-warning"></i>
                UPPER</span>
        </a>
        <!-- END Logo -->

        <!-- Extra -->
        <div>
            <!-- Dark Mode -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            {{-- <button type="button" class="  "    data-toggle="layout"
                data-action="dark_mode_toggle">

            </button> --}}
            <form action="{{ route('support.change-mode') }}" method="post" style="display: inline-block;">
                @csrf
                <input type="hidden" value="@if (Auth::user()->mode=="light")
                dark
                @else
                light
                @endif" name="mode" />
                <button type="submit" class="btn btn-sm btn-alt-secondary">

                    <i class="far fa-moon"></i>
                </button>
            </form>


            <!-- END Dark Mode -->

            <!-- Options -->
            <div class="dropdown d-inline-block ms-1">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-themes-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-brush"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end fs-sm smini-hide border-0"
                    aria-labelledby="sidebar-themes-dropdown">
                    <!-- Color Themes -->
                    <!-- Layout API, functionality initialized in Template._uiHandleTheme() -->
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="default" href="#">
                        <span>Default</span>
                        <i class="fa fa-circle text-default"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="assets/css/themes/amethyst.min.css" href="#">
                        <span>Amethyst</span>
                        <i class="fa fa-circle text-amethyst"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="assets/css/themes/city.min.css" href="#">
                        <span>City</span>
                        <i class="fa fa-circle text-city"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="assets/css/themes/flat.min.css" href="#">
                        <span>Flat</span>
                        <i class="fa fa-circle text-flat"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="assets/css/themes/modern.min.css" href="#">
                        <span>Modern</span>
                        <i class="fa fa-circle text-modern"></i>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                        data-toggle="theme" data-theme="assets/css/themes/smooth.min.css" href="#">
                        <span>Smooth</span>
                        <i class="fa fa-circle text-smooth"></i>
                    </a>
                    <!-- END Color Themes -->

                    <div class="dropdown-divider"></div>

                    <!-- Sidebar Styles -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="dropdown-item fw-medium" data-toggle="layout" data-action="sidebar_style_light"
                        href="javascript:void(0)">
                        <span>Sidebar Light</span>
                    </a>
                    <a class="dropdown-item fw-medium" data-toggle="layout" data-action="sidebar_style_dark"
                        href="javascript:void(0)">
                        <span>Sidebar Dark</span>
                    </a>
                    <!-- END Sidebar Styles -->

                    <div class="dropdown-divider"></div>

                    <!-- Header Styles -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <a class="dropdown-item fw-medium" data-toggle="layout" data-action="header_style_light"
                        href="javascript:void(0)">
                        <span>Header Light</span>
                    </a>
                    <a class="dropdown-item fw-medium" data-toggle="layout" data-action="header_style_dark"
                        href="javascript:void(0)">
                        <span>Header Dark</span>
                    </a>
                    <!-- END Header Styles -->
                </div>
            </div>
            <!-- END Options -->

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close"
                href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{ route('lms.support-dashboard') }}">
                        <i class="nav-main-link-icon si si-speedometer"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-main-heading">USER MANAGEMENT</li>
                {{-- Start of User Managements --}}



                {{-- For Tutors --}}
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-user-tie"></i>
                        <span class="nav-main-link-name">Tutors</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('lms.support-add-tutor') }}">
                                <span class="nav-main-link-name">Register Tutor</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('lms.support-tutors') }}">
                                <span class="nav-main-link-name">Active Tutors</span>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- ./ --}}

                {{-- For Students --}}
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-users"></i>
                        <span class="nav-main-link-name">Students</span>
                    </a>
                    <ul class="nav-main-submenu">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('lms.support-add-student') }}">
                                <span class="nav-main-link-name">Register Student</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('lms.support-students') }}">
                                <span class="nav-main-link-name">Active Students</span>
                            </a>
                        </li>


                    </ul>
                </li>
                {{-- ./ --}}

                {{-- end of User Managements --}}


                <li class="nav-main-heading">ACADEMIC MANAGEMENT</li>

                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('lms.support-modules') }}">
                        <i class="nav-main-link-icon fa fa-swatchbook"></i>
                        <span class="nav-main-link-name">Modules</span>
                    </a>
                </li>

                {{-- start of Courses Management --}}
                <li class="nav-main-item">
                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                        aria-expanded="false" href="#">
                        <i class="nav-main-link-icon fa fa-book"></i>
                        <span class="nav-main-link-name">Courses Management</span>
                    </a>
                    <ul class="nav-main-submenu">

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('lms.support-add-course') }}">
                                <span class="nav-main-link-name"> Register Course</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('lms.support-draft-courses') }}">
                                <span class="nav-main-link-name">Draft Courses</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('lms.support-courses') }}">
                                <span class="nav-main-link-name">Published Courses</span>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- ./ --}}



                <li class="nav-main-heading">SETTINGS MANAGEMENT</li>

              <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('support-announcements.index') }}">
                        <i class="nav-main-link-icon fa fa-bell"></i>
                        <span class="nav-main-link-name">Announcements</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('support-company_details.index') }}">
                        <i class="nav-main-link-icon fa fa-building"></i>
                        <span class="nav-main-link-name">Company Details</span>
                    </a>
                </li>

                <li class="nav-main-item">
                    <a class="nav-main-link" href="{{ route('support.password.index') }}">
                        <i class="nav-main-link-icon fa fa-key"></i>
                        <span class="nav-main-link-name">Password Recovery</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
