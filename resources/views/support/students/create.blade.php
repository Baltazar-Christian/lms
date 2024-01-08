@extends('layouts.master')

@section('content')
    <div class="col-12 mt-2 mx-1">
        <!-- start of Register Student -->
        <div class="card">

            <div class="card-header">
                <h6>Register Student</h6>
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

            <form action="{{ route('lms.save-student') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary float-end">Register Student</button>
            </form>
            </div>

        </div>
        <!-- end of Register Admin -->
    </div>
@endsection
