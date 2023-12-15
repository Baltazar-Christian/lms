<!-- resources/views/modules/show.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="mb-0">{{ $module->name }}</h1>
                    </div>

                    <div class="card-body">
                        <p>Status: <span class="{{ $module->status === 'active' ? 'text-success' : 'text-danger' }}">{{ $module->status }}</span></p>

                        <h2>Associated Institutes:</h2>
                        <ul>
                            @forelse ($module->institutes as $institute)
                                <li>{{ $institute->name }}</li>
                            @empty
                                <li>No associated institutes.</li>
                            @endforelse
                        </ul>

                        {{-- Add more details as needed --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                {{-- Add a sidebar or additional details if needed --}}
            </div>
        </div>

        <a href="{{ route('lms.modules') }}" class="btn btn-primary mt-3">Back to Module Index</a>
    </div>
@endsection
