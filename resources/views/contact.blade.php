<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS - Learn, Grow, Succeed</title>
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

        .navbar {
            background-color: #303341;
        }

        .navbar-dark .navbar-brand {
            color: #ffffff;
        }

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


    <!-- Hero Content -->
    <div class="bg-primary-dark">
        <div class="content content-full text-center pt-7 pb-4">
            <h1 class="h2 text-light mb-2  ">
                <i class="fa fa-graduation-cap text-warning"></i>
                CONTACT
                {{$company_detail->name }}
            </h1>

            {{-- <a class="btn btn-primary px-4 py-2" href="javascript:void(0)">Subscribe from $9/month</a> --}}
        </div>
    </div>
    <!-- END Hero Content -->
    <!-- About Section -->

    <div class="container p-4">
        {{-- <h1>Contact Us</h1> --}}

        <h5>
            We would love to hear from you! If you have any questions, suggestions, or just want to say hello,
            feel free to reach out to us at <strong>{{ $company_detail->contact_email }}</strong>.
        </h5>

        <div class="my-4">
            <h2 class="text-warning">Visit Us</h2>
            <p>Address: {{ $company_detail->contact_address }}</p>
            <p>Phone: {{ $company_detail->contact_phone }}</p>
            <p>Email: {{ $company_detail->contact_email }}</p>
        </div>

        <div class="my-4">
            <h2 class="text-warning">Connect with Us</h2>
            <p>
                Follow us on social media for updates and news:
                <a href="#" class="btn btn-primary mx-1">Facebook</a>
                <a href="#" class="btn btn-info mx-1">Twitter</a>
                <a href="#" class="btn btn-danger mx-1">Instagram</a>
            </p>
        </div>
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
        <p>&copy; 2023 LMS. All rights reserved.</p>
    </footer>

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
