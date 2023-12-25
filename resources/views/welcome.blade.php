<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS - Learn, Grow, Succeed</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/oneui.min.css')}}">

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

        .navbar-dark .navbar-toggler-icon {
            background-color: #ffffff;
        }

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
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <i class="fa fa-graduation-cap text-warning"></i>
            LMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item m-1">
                    <a class=" btn btn-info"  href="{{ route('login') }}">Login</a>
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
          <h1 class="h2 text-white mb-2">
            Learn new creative skills today.
          </h1>
          <h2 class="h4 fw-normal text-white-75">
            Join our community and get access to over 10,000 online courses.
          </h2>
          <a class="btn btn-primary px-4 py-2" href="javascript:void(0)">Subscribe from $9/month</a>
        </div>
      </div>
      <!-- END Hero Content -->
<!-- Features Section -->
<div class="container" id="features">
    <div class="row">
        <div class="col-md-4">
            <div class="feature-box">
                <h3>Interactive Courses</h3>
                <p>Engaging courses with interactive content to enhance learning.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <h3>User-Friendly Interface</h3>
                <p>An intuitive and easy-to-use platform for both students and instructors.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature-box">
                <h3>Progress Tracking</h3>
                <p>Track your progress and stay on top of your learning goals.</p>
            </div>
        </div>
    </div>
</div>

<!-- Courses Section (Carousel) -->
<div id="courses" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="d-flex justify-content-center">
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Course 1">
                    <div class="card-body">
                        <h5 class="card-title">Course 1</h5>
                        <p class="card-text">Description for Course 1 goes here.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Course 2">
                    <div class="card-body">
                        <h5 class="card-title">Course 2</h5>
                        <p class="card-text">Description for Course 2 goes here.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Course 3">
                    <div class="card-body">
                        <h5 class="card-title">Course 3</h5>
                        <p class="card-text">Description for Course 3 goes here.</p>
                    </div>
                </div>
                <div class="card">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Course 4">
                    <div class="card-body">
                        <h5 class="card-title">Course 4</h5>
                        <p class="card-text">Description for Course 4 goes here.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add more slides as needed -->
    </div>
    <a class="carousel-control-prev" href="#courses" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#courses" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Call-to-Action Section -->
<div class="cta-section text-center">
    <div class="container">
        <h2>Ready to Get Started?</h2>
        <p class="lead">Join our community of learners today and unlock a world of knowledge.</p>
        <a class="btn btn-light btn-lg" href="{{ route('register') }}" role="button">Sign Up Now</a>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <p>&copy; 2023  LMS. All rights reserved.</p>
</footer>

<!-- Bootstrap JS and any additional scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Add your custom scripts here -->

</body>
</html>
