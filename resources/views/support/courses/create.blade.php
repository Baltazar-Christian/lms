
@extends('layouts.support')

@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    <div class="container mt-2 mb-2">


        <div class="card">
            <div class="card-header">
                <h5> <i class="fa fa-plus text-warning"></i> Create Course

                    <a href="{{ route('lms.support-draft-courses') }}" class="btn btn-dark float-end"> <i class="fa fa-list text-warning"></i> All Courses </a>

                </h5>
            </div>
            <div class="card-body">
                <form action="{{ route('lms.support-save-course') }}" method="post" enctype="multipart/form-data">
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
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="title" class="text-dark">Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control" required>
                        </div>



                        <div class="form-group col-6 mb-2">
                            <label for="price" class="text-dark">Price</label>
                            <input type="number" name="price" id="price" class="form-control" required>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="duration_in_minutes" class="text-dark">Duration (minutes)</label>
                            <input type="number" name="duration_in_minutes" id="duration_in_minutes" class="form-control" required>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="is_published" class="text-dark">Published</label>
                            <select name="is_published" id="is_published" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="form-group col-6 mb-2">
                            <label for="cover_image" class="text-dark">Course Cover Image</label>
                            <span class="text-muted fs-sm">
                                Please upload an image with the following conditions:
                                <ul>
                                    <li>File type: jpeg, png, jpg, gif</li>
                                    <li>Maximum file size: 20MB (20480 KB)</li>
                                </ul>
                            </span>

                            <input type="file" name="cover_image" id="cover_image" class="form-control-file">
                        </div>

                        <div class="form-group col-12 mb-2">
                            <label for="description" class="text-dark">Description</label>
                            <textarea class="form-control" id="description" placeholder="Enter the Description" rows="8" name="description"></textarea>
                        </div>

                    </div>


                    <button type="submit" class="btn btn-secondary float-end">Create Course</button>
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
