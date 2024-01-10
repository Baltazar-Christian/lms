@extends('layouts.support')

@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    <div class="col-12 mt-2 m-1 " style=" margin: 0 auto;">

        <div class="card">

            <div class="card-header">
                <h5 >
                    <i class="fa fa-edit text-warning"></i>
                    Edit Course</h1>

            </div>
            <div class="card-body">
                <form action="{{ route('lms.support-update-course', $course->id) }}" method="post" enctype="multipart/form-data">
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
                            <label for="module_id" class="text-dark">Select Module</label>
                            <select name="module_id" id="module_id" class="form-control" required>
                                @foreach ($modules as $module)
                                    <option value="{{ $module->id }}">{{ $module->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="title" class="text-dark">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $course->title ?? '') }}" required>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="slug" class="text-dark">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug', $course->slug ?? '') }}" required>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="price" class="text-dark">Price</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $course->price ?? '') }}" required>
                            </div>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="duration_in_minutes" class="text-dark">Duration (minutes)</label>
                            <input type="number" name="duration_in_minutes" id="duration_in_minutes" class="form-control" value="{{ old('duration_in_minutes', $course->duration_in_minutes ?? '') }}" required>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="is_published" class="text-dark">Published</label>
                            <select name="is_published" id="is_published" class="form-control">
                                <option value="1" {{ old('is_published', $course->is_published ?? '') == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('is_published', $course->is_published ?? '') == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="cover_image" class="text-dark">Course Cover Image</label>
                            <input type="file" name="cover_image" id="cover_image" class="form-control-file">
                        </div>

                        <div class="form-group col-12 mb-2">
                            <label for="description" class="text-dark">Description</label>
                            <textarea class="form-control" id="description" placeholder="Enter the Description" rows="8" name="description">{{ old('description', $course->description ?? '') }}</textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-secondary float-end">Update Course</button>
                </form>

            </div>
        </div>



    </div>
    <script>
        ClassicEditor.create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection
