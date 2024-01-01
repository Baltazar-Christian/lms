<!-- resources/views/courses/create.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container mt-4 mb-2">


        <div class="card">
            <div class="card-header">
                <h5>Create Course</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('lms.save-course') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- Include validation errors if any --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="row">
                        <div class="form-group col-6 mb-2">
                            <label for="module_id">Select Module</label>
                            <select name="module_id" id="module_id" class="form-control" required>
                                @foreach ($modules as $module)
                                    <option value="{{ $module->id }}">{{ $module->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="title">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" required>
                        </div>



                        <div class="form-group col-6 mb-2">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" required>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="duration_in_minutes">Duration (minutes)</label>
                            <input type="number" name="duration_in_minutes" id="duration_in_minutes" class="form-control" required>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="is_published">Published</label>
                            <select name="is_published" id="is_published" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="cover_image">Course Cover Image</label>
                            <input type="file" name="cover_image" id="cover_image" class="form-control-file">
                        </div>

                        <div class="form-group col-12 mb-2">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                        </div>

                    </div>


                    <button type="submit" class="btn btn-secondary float-end">Create Course</button>
                </form>
            </div>

        </div>

    </div>
@endsection
