<!-- resources/views/company_details/edit.blade.php -->

@extends('layouts.support')

@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

    <div class="container mt-2">

        <div class="card">
            <div class="card-header">
                <h4>Edit Company Detail</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('support-company_details.update', $companyDetail->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Include validation errors if any -->
                    @include('partials.errors')

                    <div class="mb-3">
                        <label for="name" class="form-label text-dark">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $companyDetail->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="logo" class="form-label text-dark">Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label text-dark">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>{{ $companyDetail->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="contact_address" class="form-label text-dark">Contact Address</label>
                        <input type="text" name="contact_address" id="contact_address" class="form-control" value="{{ $companyDetail->contact_address }}">
                    </div>

                    <div class="mb-3">
                        <label for="contact_phone" class="form-label text-dark">Contact Phone</label>
                        <input type="text" name="contact_phone" id="contact_phone" class="form-control" value="{{ $companyDetail->contact_phone }}">
                    </div>

                    <div class="mb-3">
                        <label for="contact_email" class="form-label text-dark">Contact Email</label>
                        <input type="email" name="contact_email" id="contact_email" class="form-control" value="{{ $companyDetail->contact_email }}">
                    </div>

                    <div class="mb-3">
                        <label for="website" class="form-label text-dark">Website</label>
                        <input type="text" name="website" id="website" class="form-control" value="{{ $companyDetail->website }}">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark float-end">Update Company Detail</button>
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
