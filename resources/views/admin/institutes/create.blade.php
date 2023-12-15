<!-- resources/views/institutes/create.blade.php -->

@extends('layouts.master')

@section('content')

<div class="col-12 mt-2 mx-2">
    <div class="card">
        <div class="card-header">
            <h5>Create Institute</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('institutes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" class="form-control-file" accept="image/*" required>
                    @error('logo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" rows="4"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="contact_address">Contact Address</label>
                    <input type="text" name="contact_address" class="form-control">
                    @error('contact_address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="contact_phone">Contact Phone</label>
                    <input type="text" name="contact_phone" class="form-control">
                    @error('contact_phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="contact_email">Contact Email</label>
                    <input type="email" name="contact_email" class="form-control">
                    @error('contact_email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="website">Website</label>
                    <input type="text" name="website" class="form-control">
                    @error('website')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="code">Code</label>
                    <input type="text" name="code" class="form-control" required>
                    @error('code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="active">Active</option>
                        <option value="blocked">Blocked</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Add more fields as needed -->
                <br>
                <button type="submit" class="btn btn-primary float-end">Create</button>
            </form>
        </div>
    </div>
</div>


@endsection
