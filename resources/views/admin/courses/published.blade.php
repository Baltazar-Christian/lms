<!-- resources/views/courses/index.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-4">Draft Courses
                    <a href="{{ route('lms.add-course') }}" class="btn btn-secondary float-end mb-3">Create Course</a>
                </h5>
            </div>
            <div class="card-body">

        <div class="table-responsive col-12">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Duration (minutes)</th>
                        <th>Published</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->description }}</td>
                            <td>${{ $course->price }}</td>
                            <td>{{ $course->duration_in_minutes }}</td>
                            <td>{{ $course->is_published ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="{{ route('lms.show-course', $course->id) }}" class="btn btn-sm btn-secondary">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('lms.edit-course', $course->id) }}" class="btn btn-sm btn-secondary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('lms.delete-course', $course->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"> <i class="fa fa-trash"></i></button>
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
