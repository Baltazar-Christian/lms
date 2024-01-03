@extends('layouts.master')

@section('content')

    <div class="col-12 mt-2" style=" margin: 0 auto;">

        <div class="card">

            <div class="card-header">
                <h5 style="color: #333; font-family: 'Arial', sans-serif; margin-bottom: 30px;">Edit Course</h1>

            </div>
            <div class="card-body">
                <form action="{{ route('lms.update-course', $course->id) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    {{-- @method('PUT') --}}

                    {{-- Include validation errors if any --}}
                    @if ($errors->any())
                        <div class="alert alert-danger" style="margin-bottom: 20px;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="title" style="font-weight: bold;">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $course->title }}" required>
                    </div>

                    <div class="form-group">
                        <label for="slug" style="font-weight: bold;">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control" value="{{ $course->slug }}" required>
                    </div>

                    <div class="form-group">
                        <label for="description" style="font-weight: bold;">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>{{ $course->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price" style="font-weight: bold;">Price</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ $course->price }}" required>
                    </div>

                    <div class="form-group">
                        <label for="duration_in_minutes" style="font-weight: bold;">Duration (minutes)</label>
                        <input type="number" name="duration_in_minutes" id="duration_in_minutes" class="form-control" value="{{ $course->duration_in_minutes }}" required>
                    </div>

                    <div class="form-group">
                        <label for="is_published" style="font-weight: bold;">Published</label>
                        <select name="is_published" id="is_published" class="form-control">
                            <option value="1" {{ $course->is_published ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ !$course->is_published ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cover_image" style="font-weight: bold;">Course Cover Image</label>
                        <br>
                        <input type="file" name="cover_image" id="cover_image" class="form-control-file">
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary float-end" style="margin-top: 20px;">Update Course</button>
                </form>
            </div>
        </div>



    </div>
@endsection
