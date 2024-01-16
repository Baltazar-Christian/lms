@extends('layouts.support')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">

                <h5 class="mb-2"> <i class="fa fa-book text-warning"></i> Published Courses
                    <a href="{{ route('lms.support-add-course') }}" class="btn btn-secondary float-end mb-3">Create Course</a>

                </h5>

            </div>

            <div class="card-body">
                <div class="table-responsive col-12">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Module</th>
                                <th>Price</th>
                                {{-- <th>Published</th> --}}
                                <th>Author</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        {{ $course->title }}

                                    </td>
                                    <td>
                                        {{ $course->module->name }}

                                    </td>
                                    <td>Tsh {{ number_format($course->price, 2) }}</td>
                                    {{-- <td>
                                        <span
                                            class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill   {{ $course->is_published ? 'bg-success-light text-success' : 'bg-danger-light text-danger' }} ">

                                            {{ $course->is_published ? 'Yes' : 'No' }}
                                        </span>
                                    </td> --}}
                                    <td>{{ $course->user->name }}</td>

                                    <td>
                                        <a href="{{ route('lms.support-show-course', $course->id) }}"
                                            class="btn btn-sm btn-dark">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ route('lms.support-edit-course', $course->id) }}"
                                            class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>

                                        </a>
                                        <form action="{{ route('lms.support-delete-course', $course->id) }}" method="post"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">
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

    </div>
@endsection
