<!-- resources/views/institutes/edit.blade.php -->

@extends('layouts.master')

@section('content')

<div class="col-12 mt-2 mx-2">

<div class="card">

    <div class="card-header">
        <h5>Edit Institute</h5>
    </div>

    <div class="card-body">

        <form action="{{ route('institutes.update', $institute->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $institute->name }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="logo">Logo</label>
                    <input type="file" name="logo" class="form-control-file" accept="image/*">
                    @error('logo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    @if($institute->logo)
                        <img src="{{ asset('storage/' . $institute->logo) }}" alt="Logo" class="mt-2" style="max-width: 150px;">
                    @endif
                </div>

                <div class="form-group col-6">
                    <label for="contact_address">Contact Address</label>
                    <input type="text" name="contact_address" class="form-control" value="{{ $institute->contact_address }}">
                    @error('contact_address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="contact_phone">Contact Phone</label>
                    <input type="text" name="contact_phone" class="form-control" value="{{ $institute->contact_phone }}">
                    @error('contact_phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="contact_email">Contact Email</label>
                    <input type="email" name="contact_email" class="form-control" value="{{ $institute->contact_email }}">
                    @error('contact_email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="website">Website</label>
                    <input type="text" name="website" class="form-control" value="{{ $institute->website }}">
                    @error('website')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="code">Code</label>
                    <input type="text" name="code" class="form-control" value="{{ $institute->code }}" required>
                    @error('code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="active" {{ $institute->status === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="blocked" {{ $institute->status === 'blocked' ? 'selected' : '' }}>Blocked</option>
                    </select>
                    @error('status')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-12">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ $institute->description }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!-- Add more fields as needed -->
                <br>
            </div>

            <button type="submit" class="btn btn-secondary float-end mt-2">Update</button>
        </form>
    </div>
</div>

</div>


@endsection
