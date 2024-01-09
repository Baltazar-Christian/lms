@extends('layouts.tutor')

@section('content')

<div class="container mt-2">
    <div class="card">
        <div class="card-header">
            <h5>
                <i class="fa fa-user text-warning"></i>
                Student Details

                <a href="{{ route('lms.tutor-students') }}" class="btn btn-dark btn-sm float-end"><i class="fa fa-list"></i> Back</a>


                    {{-- <a href="{{ route('lms.edit-system-admin', $user->id) }}" class="btn btn-dark btn-sm float-end"><i class="fa fa-edit"></i></a>

                    <form action="{{ route('lms.delete-system-admin', $user->id) }}" class="float-end mx-1" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm float-end" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                    </form> --}}
                </h5>
        </div>
        <div class="card-body">
            <p class="text-dark"><strong>Name:</strong> {{ $user->name }}</p>
            <p class="text-dark"><strong>Email:</strong> {{ $user->email }}</p>



        </div>
    </div>
</div>



@endsection
