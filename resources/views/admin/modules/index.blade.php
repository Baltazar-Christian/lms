@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="mb-4">Modules</h1>

        <a href="{{ route('lms.add-module') }}" class="btn btn-primary mb-3">Create Module</a>

        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($modules as $module)
                            <tr>
                                <td>{{ $module->id }}</td>
                                <td>{{ $module->name }}</td>
                                <td>
                                    <span class="badge {{ $module->status === 'active' ? 'badge-success' : 'badge-danger' }}">
                                        {{ $module->status }}
                                    </span>
                                </td>
                                <td>{{ $module->created_by }}</td>
                                <td>
                                    <a href="{{ route('lms.show-module', $module->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> View
                                    </a>

                                    <a href="{{ route('lms.edit-module', $module->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <form action="{{ route('lms.delete-module', $module->id) }}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i> Delete
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
