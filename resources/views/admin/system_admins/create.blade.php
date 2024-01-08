@extends('layouts.master')

@section('content')
    <div class="container mt-2 ">
        <!-- start of Register Admin -->
        <div class="card">

            <div class="card-header">
                <h6>Register System Admin</h6>
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

            <form action="{{ route('lms.save-system-admin') }}" method="POST">
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
                <button type="submit" class="btn btn-primary float-end">Create User</button>
            </form>
            </div>

        </div>
        <!-- end of Register Admin -->
    </div>
@endsection
