
@extends('layouts.support')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fa fa-file text-warning"></i>
                            {{ $module->name }}
                            <a href="{{ route('lms.support-modules') }}" class="btn btn-dark float-end"> <i class="fa fa-list text-warning"></i> All Modules </a>

                        </h5>
                    </div>

                    <div class="card-body">

                        <h6>Description:</h6>
                        <p>{{ $module->description }}</p>
                        {{-- <p>Status: <span class="{{ $module->status === 'active' ? 'text-success' : 'text-danger' }}">{{ $module->status }}</span></p> --}}

                        <h5>Associated Institutes:</h5>
                        <ul class="text-dark">
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

    </div>
@endsection
