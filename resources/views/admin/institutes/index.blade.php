<!-- resources/views/institutes/index.blade.php -->

@extends('layouts.master')

@section('content')

<div class="col-12 mt-2 m-2">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h5>Institutes</h5>
                </div>
                <div class="col-6">
                    <a href="{{ route('institutes.create') }}" class="btn btn-primary float-end">Create Institute</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($institutes as $institute)
                        <tr>
                            <td>{{ $institute->id }}</td>
                            <td>{{ $institute->name }}</td>
                            <td>{{ $institute->code }}</td>
                            <td>{{ $institute->status }}</td>
                            <td>
                                <a href="{{ route('institutes.edit', $institute->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('institutes.destroy', $institute->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
