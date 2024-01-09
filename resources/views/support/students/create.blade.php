@extends('layouts.support')

@section('content')
    <div class="col-12 mt-2 mx-1">
        <!-- start of Register Student -->
        <div class="card">

            <div class="card-header">
                <h5>
                    <i class="fa fa-plus text-warning"></i>
                    Register Student
                    <a href="{{ route('lms.support-students') }}" class="btn btn-dark float-end mt-3">Back </a>

                </h6>
            </div>
            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('lms.support-save-student') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label text-dark">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-dark">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-dark">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <hr>
                <button type="submit" class="btn btn-dark float-end">Register Student</button>
            </form>
            </div>

        </div>
        <!-- end of Register Admin -->
    </div>
@endsection
