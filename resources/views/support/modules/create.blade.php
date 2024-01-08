@extends('layouts.support')

@section('content')
    <div class="container">

        <div class="card mt-2">
            <div class="card-header">
                <h5 class="mb-4">
                    Create Module
                    <a href="{{ route('lms.support-modules') }}" class="btn btn-dark float-end"> <i class="fa fa-list text-warning"></i> All Modules </a>

                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('lms.support-save-module') }}" method="post">
                    @csrf

                    <div class="form-group mb-2">
                        <label for="name">Module Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Module Name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Select Institutes</label>
                        <div>
                            @foreach ($institutes as $institute)
                                <div class="form-check">
                                    <input type="checkbox" name="institutes[]" id="institute{{ $institute->id }}" value="{{ $institute->id }}">
                                    <label for="institute{{ $institute->id }}">{{ $institute->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="btn btn-secondary mt-2 float-end">Create Module</button>
                </form>
            </div>
        </div>
    </div>
@endsection
