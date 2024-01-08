@extends('layouts.master')

@section('content')

<div class="col-12 mx-1 mt-2">
    <div class="card">
        <div class="card-header">
            <h5>Edit Student</h5>
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

        <form action="{{ route('lms.update-student', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Role</label>
                <select name="role" class="form-control" id="">
                    <option value="student">Student</option>
                    <option value="admin">Admin</option>
                    <option value="support">Support</option>
                    <option value="tutor">Tutor</option>
                </select>
            </div>
            <button type="submit" class="btn btn-dark float-end">Update  </button>
        </form>
        </div>
    </div>
</div>




@endsection
