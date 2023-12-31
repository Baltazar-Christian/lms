@extends('layouts.master')

@section('content')
    <div class="container">

        <div class="card">
            <div class="card-head">
                <h5 class="mb-4">Create Module</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('lms.save-module') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="name">Module Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
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

                    <button type="submit" class="btn btn-primary">Create Module</button>
                </form>
            </div>
        </div>
    </div>
@endsection
