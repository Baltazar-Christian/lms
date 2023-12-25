@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Create Company Detail</h1>

        <form action="{{ route('company_details.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- Include validation errors if any -->
            @include('partials.errors')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" name="logo" id="logo" class="form-control">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label for="contact_address" class="form-label">Contact Address</label>
                <input type="text" name="contact_address" id="contact_address" class="form-control">
            </div>

            <div class="mb-3">
                <label for="contact_phone" class="form-label">Contact Phone</label>
                <input type="text" name="contact_phone" id="contact_phone" class="form-control">
            </div>

            <div class="mb-3">
                <label for="contact_email" class="form-label">Contact Email</label>
                <input type="email" name="contact_email" id="contact_email" class="form-control">
            </div>

            <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="text" name="website" id="website" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create Company Detail</button>
        </form>
    </div>
@endsection
