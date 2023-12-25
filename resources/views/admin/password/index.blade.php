@extends('layouts.master')

@section('content')

<div class="col-12 mt-2 mx-1">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h5>Tutors List</h5>
                </div>
                <div class="col-6">
                    {{-- <a href="{{ route('lms.add-tutor') }}" class="btn btn-success float-end">Register Tutor</a> --}}
                </div>
            </div>
        </div>

        <div class="card-body">

    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

<table class="table mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('admin.password.reset', $user->id) }}" class="btn btn-warning">
                        <i class="fa fa-key"></i>
                        Reset Password
                    </a>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
        </div>

    </div>
</div>


@endsection
