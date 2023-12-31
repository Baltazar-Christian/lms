@extends('layouts.support')

@section('content')

<div class="col-12 mt-2 mx-1">
    <div class="card">
        <div class="card-header">
            <h5> <i class="fa fa-user text-warning"></i> Tutor Details
                {{-- <div class="col-6"> --}}
                    <a href="{{ route('lms.support-edit-tutor', $user->id) }}" class="btn btn-sm btn-dark float-end"><i class="fa fa-edit"></i></a>
                {{-- </div>
                <div class="col-6"> --}}
                    <form action="{{ route('lms.support-delete-tutor', $user->id) }}" method="POST" class="float-end m-1" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm float-end" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                    </form>
                {{-- </div> --}}
            </h5>
        </div>
        <div class="card-body">
            <p class="text-dark"><strong>Name:</strong> {{ $user->name }}</p>
            <p class="text-dark" ><strong>Email:</strong> {{ $user->email }}</p>

            <div class="row">

            </div>

        </div>
    </div>
</div>



@endsection
