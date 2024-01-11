@extends('layouts.tutor')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">
                            <i class="fa fa-book text-warning"></i>
                            {{ $module->name }} COURSES
                        <a href="{{ route('lms.add-tutor-course',$module->id) }}" class="btn btn-dark float-end">
                            <i class="fa fa-plus"></i>
                            Create Course
                        </a>
                    </h4>

                    </div>

                    <div class="card-body">

                        <h4>List Of Courses:</h4>
                        <hr>
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full mt-3">
                            <thead>
                                    <th>ID</th>
                                    <th>Course Title</th>
                                    <th>Price</th>
                                    <th>Published</th>
                                    <th>Actions</th>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach($courses as $course)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $course->title }}</td>
                                        <td> Tsh {{ number_format($course->price,2) }}</td>
                                        <td>
                                            <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill   {{  $course->is_published ? 'bg-success-light text-success' : 'bg-danger-light text-danger' }} ">

                                            {{ $course->is_published ? 'Yes' : 'No' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('lms.show-tutor-course', $course->id) }}" class="btn btn-sm btn-dark">
                                            <i class="fa fa-eye"></i>
                                            </a>

                                            <a href="{{ route('institutes.edit', $course->id) }}" class="btn btn-sm btn-dark">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('institutes.destroy', $course->id) }}" method="POST" class="d-inline">
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
                        {{-- Add more details as needed --}}


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                {{-- Add a sidebar or additional details if needed --}}
            </div>
        </div>

    </div>



@endsection
