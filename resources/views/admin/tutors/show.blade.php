@extends('layouts.master')

@section('content')

<div class="col-12 mt-2 mx-1">
    <div class="card">
        <div class="card-header">
            <h5>Tutor Details</h5>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>

            <div class="row">
                <div class="col-6">
                    <a href="{{ route('lms.edit-tutor', $user->id) }}" class="btn btn-warning">Edit</a>
                </div>
                <div class="col-6">
                    <form action="{{ route('lms.delete-tutor', $user->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>



@endsection
