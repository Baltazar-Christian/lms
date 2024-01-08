@extends('layouts.master')

@section('content')

<div class="col-12 mx-1 mt-2">
    <div class="card">
        <div class="card-header">
            <h5>
                <i class="fa fa-user text-warning"></i>
                Edit User</h5>
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

        <form action="{{ route('lms.update-system-admin', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label text-dark">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label text-dark">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-dark">Role</label>
                <select name="role" class="form-control" id="">
                    <option value="student">Student</option>
                    <option value="support">Admin</option>
                    <option value="tutor">Tutor</option>
                </select>
            </div>
            <button type="submit" class="btn btn-dark float-end">Update User</button>
        </form>
        </div>
    </div>
</div>




@endsection
