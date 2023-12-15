<!-- resources/views/institutes/create.blade.php -->

@extends('layouts.master')

@section('content')

<div class="col-12 mt-2 mx-2">
    <div class="card">
        <div class="card-header">
            <h5>Create Institute</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('institutes.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="code">Code</label>
                    <input type="text" name="code" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value="active">Active</option>
                        <option value="inactive">InActive</option>
                        <option value="blocked">Blocked</option>
                    </select>
                </div>
                <!-- Add more fields as needed -->
                <br>
                <button type="submit" class="btn btn-primary float-end">Create</button>
            </form>
        </div>
    </div>
</div>


@endsection
