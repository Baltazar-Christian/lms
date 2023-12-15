<!-- resources/views/institutes/show.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="mb-0">{{ $institute->name }} Details</h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="lead"><strong>Description:</strong> {{ $institute->description ?: 'N/A' }}</p>
                        <p><strong>Contact Address:</strong> {{ $institute->contact_address ?: 'N/A' }}</p>
                        <p><strong>Contact Phone:</strong> {{ $institute->contact_phone ?: 'N/A' }}</p>
                        <p><strong>Contact Email:</strong> {{ $institute->contact_email ?: 'N/A' }}</p>
                        <p><strong>Website:</strong> {{ $institute->website ?: 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Code:</strong> {{ $institute->code }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($institute->status) }}</p>
                        @if ($institute->logo)
                            <p class="mb-2"><strong>Logo:</strong></p>
                            <img src="{{ asset('storage/' . $institute->logo) }}" alt="Logo" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('institutes.index') }}" class="btn btn-primary">Back to Institutes</a>
            </div>
        </div>
    </div>
@endsection