<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="pEQJj7kGNOPxe_pYt8FJ0oPcBdr13DL7Itb_ZkeY7CI" />
    <title>UPPER FINANCIAL CONSULTANCY - Learn, Grow, Succeed</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/slick-carousel/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/slick-carousel/slick-theme.css') }}">

    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/oneui.min.css') }}">

    <!-- Add your custom styles here -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        /* .navbar {
            background-color: #303341;
        } */

        /* .navbar-dark .navbar-brand {
            color: #ffffff;
        } */

        /* .navbar-dark .navbar-toggler-icon {
            background-color: #ffffff;
        } */

        .jumbotron {
            background-color: #303341;
            color: #ffffff;
            padding: 80px 0;
            margin-bottom: 0;
        }

        .feature-box {
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            background-color: #ffffff;
        }

        .cta-section {
            background-color: #a7bbef;
            color: #ffffff;
            padding: 80px 0;
        }

        .cta-section h2 {
            margin-bottom: 40px;
        }

        .carousel-item {
            text-align: center;
        }

        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 8px;
        }

        .card {
            width: 18rem;
            margin: 10px;
        }

        .footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>

<body>

    <!-- Header / Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fa fa-graduation-cap text-warning"></i>
                UPPER</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse navbarNav">
                    <div class="navbar-item p-1">
                        <a class="nav-link text-light" href="{{ url('/') }}">Home</a>
                    </div>
                <div class="navbar-item p-1">
                    <a class="nav-link text-light" href="{{ route('about-us') }}">About Us</a>
                </div>
                <div class="navbar-item p-1 ">
                    <a class="nav-link text-light" href="{{ route('contact-us') }}">Contact Us</a>
                </div>
                </div>


            <div class="collapse navbar-collapse justify-content-end navbarNav" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item m-1">
                        <a class=" btn btn-info" href="{{ route('login') }}">Log In</a>
                    </li>
                    <li class="nav-item m-1">
                        <a class="btn btn-warning  " href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    {{-- <div class="jumbotron text-center">
    <h1 class="display-4">Welcome to LMS</h1>
    <p class="lead">Learn, Grow, Succeed</p>
</div> --}}
    <!-- Hero Content -->
    <div class="bg-primary-dark">
        <div class="content content-full text-center pt-7 pb-5">
            <h1 class="h2 text-light mb-2  text-warning">
                Learn new creative skills today.
            </h1>
            <h2 class="h4 fw-normal text-light  ">
                Join our community and get access to over 10,000 online courses.
            </h2>
            {{-- <a class="btn btn-primary px-4 py-2" href="javascript:void(0)">Subscribe from $9/month</a> --}}
        </div>
    </div>
    <!-- END Hero Content -->
    <!-- Features Section -->
    <div class="container mt-2" id="features">
        <div class="row">
            <div class="col-md-4">
                <div class="feature-box">
                    <h3 class="text-warning">Interactive Courses</h3>
                    <p>Engaging courses with interactive content to enhance learning.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <h3 class="text-warning">User-Friendly Interface</h3>
                    <p>An intuitive and easy-to-use platform for both students and instructors.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <h3 class="text-warning">Progress Tracking</h3>
                    <p>Track your progress and stay on top of your learning goals.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses Section (Carousel) -->

 <!-- Courses Section (Carousel) -->
    <div id="courses-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @php
                $courses = App\Models\Course::where('is_published',1)->latest()->get();
                $totalCourses = count($courses);
                $itemsPerSlide = 4;
                $totalSlides = ceil($totalCourses / $itemsPerSlide);
            @endphp

            @for ($i = 0; $i < $totalSlides; $i++)
                <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                    <div class="mx-auto">
                        <div class="row">
                        @foreach ($courses->skip($i * $itemsPerSlide)->take($itemsPerSlide) as $course)
                        <div class="col-12 col-sm-3 mx-auto col-md-3">
                            <div class="card">
                                <a href="{{ route('login') }}">
                                    <img src="{{ asset('public/storage/covers/' . $course->cover_image) }}" width="150px"
                                        height="150px" class="card-img-top" alt="Course 1">
                                    <div class="card-body">
                                        <h6 class="card-title text-start text-dark"> {{ $course->title }} </h6>
                                        <p class="card-text text-start text-dark"> Tsh {{ number_format($course->price, 2) }}
                                        </p>
                                    </div>

                                    <div class="card-foot">

                                        <div class="row p-2">

                                            <div class="col-12">
                                                @if ($course->price<=0)
                                                <a href="{{ route('login') }}" type="button"
                                                class="btn btn-success form-control ">
                                                <i class="fa fa-book"></i>
                                                Enroll
                                            </a>
                                                @else
                                                <a href="{{ route('login') }}" type="button"
                                                class="btn btn-warning form-control ">
                                                <i class="fa fa-shopping-cart"></i>
                                                Purchase
                                            </a>
                                                @endif

                                            </div>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>


                        @endforeach
                    </div>
                </div>
                </div>
            @endfor
        </div>

        <!-- Add more slides as needed -->

        <a class="carousel-control-prev text-dark" href="#courses-carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon  text-dark" aria-hidden="true"></span>
            <span class="sr-only text-dark">Previous</span>
        </a>
        <a class="carousel-control-next  text-dark" href="#courses-carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon  text-dark" aria-hidden="true"></span>
            <span class="sr-only ">Next</span>
        </a>
    </div>


    <!-- Call-to-Action Section -->
    <div class="cta-section text-center bg-secondary">
        <div class="container">
            <h2 class="text-warning">Ready to Get Started?</h2>
            <p class="lead">Join our community of learners today and unlock a world of knowledge.</p>
            <a class="btn btn btn-alt-info btn-lg" href="{{ route('register') }}" role="button">Register Now</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p> <strong class="text-warning"> UPPER</strong>&copy; 2024 . All rights reserved.</p>
    </footer>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-5SDSNT62EL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-5SDSNT62EL');
</script>
    <!-- Bootstrap JS and any additional scripts -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Initialize Slick Carousel -->
    <script>
        $(document).ready(function () {
            $('#courses-carousel').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                infinite: false,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 4,
                        }
                    }
                ]
            });
        });
    </script>


</body>

</html>
