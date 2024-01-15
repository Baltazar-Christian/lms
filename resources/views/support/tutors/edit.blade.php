@extends('layouts.support')

@section('content')

<div class="container mt-2">
    <div class="card">
        <div class="card-header">
            <h5>Edit Tutor

                <a href="{{ route('lms.support-tutors') }}" class="btn btn-dark float-end mt-3">Back </a>

            </h5>
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

        <form action="{{ route('lms.support-update-tutor', $user->id) }}" method="POST">
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
                <label for="phone_number" class="form-label text-dark">Phone Number</label>
                <input type="tel" class="form-control" id="phone_number" value="{{ $user->phone_number }}"  name="phone_number" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label text-dark">Address</label>
                <input type="text" class="form-control" id="address" value="{{ $user->address }}" name="address" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-dark">Role</label>
                <select name="role" class="form-control" id="">
                    <option value="student" {{ $user->role==='student' ? 'selected' : '' }}>Student</option>
                    <option value="tutor" {{ $user->role==='tutor' ? 'selected' : '' }}>Tutor</option>
                    <option value="support" {{ $user->role==='support' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-dark float-end">Update </button>
        </form>
        </div>
    </div>
</div>




@endsection
