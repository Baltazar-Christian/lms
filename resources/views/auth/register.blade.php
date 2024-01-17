<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>LMS - Learn, Grow, Succeed</title>

    <meta name="description"
        content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="OneUI">
    <meta property="og:description"
        content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
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
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/oneui.min.css') }}">


</head>

<body class="bg-secondary">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fa fa-graduation-cap text-warning"></i>
                UPPER</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item m-1">
                        <a class=" btn btn-info" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="btn btn-warning  " href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Container -->

    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="hero-static d-flex align-items-center">
                <div class="content">
                    <div class="row justify-content-center push">
                        <div class="col-md-8 col-lg-8 col-xl-8">
                            <!-- Sign Up Block -->
                            <div class="block block-rounded mb-0">
                                <div class="block-header block-header-default">
                                    {{-- <h3 class="block-title">Create Account</h3> --}}
                                    <div class="block-options">
                                        {{-- <a class="btn-block-option fs-sm" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#one-signup-terms">View Terms</a>
                      <a class="btn-block-option" href="op_auth_signin.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Sign In">
                        <i class="fa fa-sign-in-alt"></i>
                      </a> --}}
                                    </div>
                                </div>
                                <div class="block-content">
                                    <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                                        <h1 class="h2 mb-1 text-center">
                                            <i class="nav-main-link-icon fa fa-graduation-cap text-warning"></i>
                                            UPPER
                                        </h1>
                                        <p class="fw-medium text-muted text-center ">
                                            Welcome, please regiter.
                                        </p>

                                        <form class="js-validation-signup" action="{{ route('register') }}"
                                            method="POST">
                                            @csrf
                                            @if (session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <div class="row py-3">
                                                <div class="mb-4 col-6">
                                                    <input type="text"
                                                        class="form-control form-control-lg form-control-alt"
                                                        id="signup-username" name="name" placeholder="Username">
                                                </div>
                                                <div class="mb-4 col-6">
                                                    <input type="email"
                                                        class="form-control form-control-lg form-control-alt"
                                                        id="signup-email" name="email" placeholder="Email">
                                                </div>
                                                <div class="mb-4 col-6">
                                                    <input type="text"
                                                        class="form-control form-control-lg form-control-alt"
                                                        id="signup-phone" name="phone_number"
                                                        placeholder="Phone Number">
                                                </div>
                                                <div class="mb-4 col-6">
                                                    <input type="text"
                                                        class="form-control form-control-lg form-control-alt"
                                                        id="signup-address" name="address" placeholder="Address">
                                                </div>
                                                <div class="mb-4 col-6">
                                                    <div class="input-group">
                                                        <input type="password" class="form-control form-control-lg form-control-alt" id="signup-password" name="password" placeholder="Password">
                                                        <button class="btn btn btn-alt-info" type="button" id="toggle-signup-password">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="mb-4 col-6">
                                                    <div class="input-group">
                                                        <input type="password" class="form-control form-control-lg form-control-alt" id="signup-password-confirm" name="password_confirmation" placeholder="Confirm Password">
                                                        <button class="btn btn btn-alt-info" type="button" id="toggle-signup-password-confirm">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="mb-4 ">
                                                    <span class="text-muted fs-sm">
                                                        Password requirements:
                                                        <ul>
                                                            <li>Minimum length of 8 characters</li>
                                                            <li>At least one uppercase letter</li>
                                                            <li>At least one lowercase letter</li>
                                                            {{-- <li>At least one digit</li>
                                                            <li>At least one special character</li> --}}
                                                            <li>Must match the confirmation</li>
                                                        </ul>
                                                    </span>

                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-md-6 col-6 col-xl-6">
                                                    <button type="submit"
                                                        class="btn w-100 btn-alt-warning form-control">
                                                        {{-- <i class="fa fa-fw fa-plus me-1 opacity-50"></i> --}}
                                                        Register
                                                    </button>
                                                </div>
                                                <div class="col-md-6 col-6 col-xl-6">
                                                    <a href="{{ route('login') }}" class="btn w-100 btn-alt-info">
                                                        Log In
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- END Sign Up Form -->
                                    </div>
                                </div>
                            </div>
                            <!-- END Sign Up Block -->
                        </div>
                    </div>
                    <div class="fs-sm text-muted text-center">
                        <strong class="text-warning">UPPER</strong> &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>


            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <script src="{{ asset('assets/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function togglePasswordVisibility(passwordInput, toggleButton) {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                toggleButton.querySelector('i').classList.toggle('fa-eye-slash');
            }

            const signupPasswordInput = document.getElementById('signup-password');
            const toggleSignupPasswordButton = document.getElementById('toggle-signup-password');

            toggleSignupPasswordButton.addEventListener('click', function () {
                togglePasswordVisibility(signupPasswordInput, this);
            });

            const signupPasswordConfirmInput = document.getElementById('signup-password-confirm');
            const toggleSignupPasswordConfirmButton = document.getElementById('toggle-signup-password-confirm');

            toggleSignupPasswordConfirmButton.addEventListener('click', function () {
                togglePasswordVisibility(signupPasswordConfirmInput, this);
            });
        });
    </script>

    <!--
        OneUI JS

        Core libraries and functionality
        webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="{{ asset('assets/js/oneui.app.min.js') }}"></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/op_auth_signup.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
