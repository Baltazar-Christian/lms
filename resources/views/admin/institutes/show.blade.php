<!-- resources/views/institutes/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ $institute->name }} Details</h1>

    <div>
        <p><strong>Description:</strong> {{ $institute->description ?: 'N/A' }}</p>
        <p><strong>Contact Address:</strong> {{ $institute->contact_address ?: 'N/A' }}</p>
        <p><strong>Contact Phone:</strong> {{ $institute->contact_phone ?: 'N/A' }}</p>
        <p><strong>Contact Email:</strong> {{ $institute->contact_email ?: 'N/A' }}</p>
        <p><strong>Website:</strong> {{ $institute->website ?: 'N/A' }}</p>
        <p><strong>Code:</strong> {{ $institute->code }}</p>
        <p><strong>Status:</strong> {{ ucfirst($institute->status) }}</p>

        @if ($institute->logo)
            <p><strong>Logo:</strong></p>
            <img src="{{ asset('storage/' . $institute->logo) }}" alt="Logo" style="max-width: 200px;">
        @endif
    </div>

    <a href="{{ route('institutes.index') }}" class="btn btn-primary mt-3">Back to Institutes</a>
@endsection
