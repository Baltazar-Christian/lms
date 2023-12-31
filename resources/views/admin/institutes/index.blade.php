<!-- resources/views/institutes/index.blade.php -->

@extends('layouts.master')

@section('content')

<div class="col-12 mt-2 m-2">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h5>    <i class="fa fa-building text-warning"></i> Institutes</h5>
                </div>
                <div class="col-6">
                    <a href="{{ route('institutes.create') }}" class="btn btn-dark  float-end">

                        Create Institute</a>
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
                                <a href="{{ route('institutes.show', $institute->id) }}" class="btn btn-sm btn-dark">
                                    <i class="fa fa-eye"></i>
                                </a>

                                <a href="{{ route('institutes.edit', $institute->id) }}" class="btn btn-sm btn-dark">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('institutes.destroy', $institute->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
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
