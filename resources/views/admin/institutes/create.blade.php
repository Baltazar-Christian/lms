<!-- resources/views/institutes/create.blade.php -->

@extends('layouts.master')

@section('content')

<div class="col-12 mt-2 mx-2">
    <div class="card">
        <div class="card-header">
            <h5>Create Institute
                <a href="{{ route('institutes.index') }}" class="btn btn-dark float-end"> <i class="fa fa-list text-warning"></i> All Institutes </a>

            </h5>
        </div>
        <div class="card-body">
            <form action="{{ route('institutes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-6 mb-2">
                        <label for="name" class="text-dark">Name</label>
                        <input type="text" name="name" class="form-control" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group col-6 mb-2">
                        <label for="contact_address" class="text-dark">Contact Address</label>
                        <input type="text" name="contact_address" class="form-control">
                        @error('contact_address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-6 mb-2">
                        <label for="contact_phone" class="text-dark">Contact Phone</label>
                        <input type="text" name="contact_phone" class="form-control">
                        @error('contact_phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-6 mb-2">
                        <label for="contact_email" class="text-dark">Contact Email</label>
                        <input type="email" name="contact_email" class="form-control">
                        @error('contact_email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-6 mb-2">
                        <label for="website" class="text-dark">Website</label>
                        <input type="text" name="website" class="form-control">
                        @error('website')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-6 mb-2">
                        <label for="code" class="text-dark">Code</label>
                        <input type="text" name="code" class="form-control" required>
                        @error('code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-6 mb-2">
                        <label for="logo" class="text-dark">Logo</label>
                        <input type="file" name="logo" class="form-control-file" accept="image/*" required>
                        @error('logo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-6 mb-2">
                        <label for="status" class="text-dark">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="inactive">Blocked</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-2">
                        <label for="description" class="text-dark">Description</label>
                        <textarea name="description" class="form-control" rows="4"></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Add more fields as needed -->
                <br>
                <button type="submit" class="btn btn-dark text-warning float-end">Create</button>
            </form>
        </div>
    </div>
</div>


@endsection
