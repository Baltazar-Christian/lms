<!-- resources/views/courses/index.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h4 class="mb-4"> <i class="fa fa-book"></i> Published Courses</h4>

        <a href="{{ route('lms.add-course') }}" class="btn btn-primary float-end mb-3">Create Course</a>
<hr>
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
                                <a href="{{ route('lms.show-course', $course->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('lms.edit-course', $course->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('lms.delete-course', $course->id) }}" method="post" style="display: inline-block">
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
@endsection
