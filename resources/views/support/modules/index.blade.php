@extends('layouts.support')

@section('content')
    <div class="container">



        <div class="card col-12 mt-2">
            <div class="card-header">
                <h5 class="mb-4">
                    <i class="fa fa-list text-warning"></i>
                    Modules
                    <a href="{{ route('lms.support-add-module') }}" class="btn btn-secondary float-end mb-3">Create Module</a>

                </h5>

            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
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
                                    <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill   {{ $module->status === 'active' ? 'bg-success-light text-success' : 'bg-danger-light text-danger' }} ">

                                        {{ $module->status }}
                                    </span>
                                </td>
                                <td>{{ $module->user->name }}</td>
                                <td>
                                    <a href="{{ route('lms.support-show-module', $module->id) }}" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a href="{{ route('lms.support-edit-module', $module->id) }}" class="btn btn-sm btn-secondary">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('lms.support-delete-module', $module->id) }}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i>
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
