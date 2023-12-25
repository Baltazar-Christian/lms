@extends('layouts.master')

@section('content')

<div class="col-12 mt-2 mx-1">

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h5>Students List</h5>
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
                    <a href="{{ route('lms.tutor-show-student', $user->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('lms.tutor-block-student', $user->id) }}" class="btn btn-danger">Block</a>
                    {{-- <form action="{{ route('lms.tutor-delete-student', $user->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form> --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
        </div>

    </div>
</div>


@endsection
