@extends('layouts.tutor')

@section('content')
    <div class="container mt-4 mb-2">


        <div class="card">
            <div class="card-header">
                <h5>Create Course

                    <a href="{{ route('lms.tutor-view-module',$module->id) }}" class="btn btn-primary float-end">
                        <i class="fa fa-plus"></i>
                        Back
                    </a>
                </h5>
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

                 <input type="hidden" name="module_id"  value="{{  $module->id }}"  placeholder="{{ $module->name }}" id="">

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="title">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="duration_in_minutes">Duration (minutes)</label>
                        <input type="number" name="duration_in_minutes" id="duration_in_minutes" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="is_published">Published</label>
                        <select name="is_published" id="is_published" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="cover_image">Course Cover Image</label>
                        <input type="file" name="cover_image" id="cover_image" class="form-control-file">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary float-end">Save Course</button>
                </form>
            </div>

        </div>

    </div>
@endsection
