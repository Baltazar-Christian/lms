<!-- resources/views/announcements/edit.blade.php -->

@extends('layouts.master')

@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<div class="mt-2 m-2">
    <div class="card">
        <div class="card-header">
            <h5>Edit Announcement</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('announcements.update', $announcement->id) }}" method="post">
                @csrf
                @method('PUT')

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
                <div class="form-group mb-3 col-6">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $announcement->title }}" required>
                </div>
                <div class="form-group mb-3 col-6">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="published" {{ $announcement->status === 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ $announcement->status === 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>


                <div class="form-group mb-3 col-12">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control" rows="4" required>{{ $announcement->content }}</textarea>
                </div>

            </div>





                <button type="submit" class="btn btn-dark float-end">Update Announcement</button>
            </form>
        </div>
    </div>

</div>

<script>
    ClassicEditor.create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@endsection

