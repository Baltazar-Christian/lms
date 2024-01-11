@extends('layouts.tutor')

@section('content')

<div class="container mt-2">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h5>
                        <i class="fa fa-users text-warning"></i>
                       Blocked Students List</h5>
                </div>
                <div class="col-6">
                    {{-- <a href="{{ route('lms.add-student') }}" class="btn btn-success float-end">Register Student</a> --}}
                </div>
            </div>
        </div>

        <div class="card-body">

    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">

    <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('lms.tutor-show-student', $user->id) }}" class="btn btn-sm btn-dark">
                    <i class="fa fa-eye"></i>
                    </a>
                    <a href="{{ route('lms.tutor-activate-student', $user->id) }}" class="btn  btn-sm btn-success">
                    <i class="fa fa-check"></i>
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
