<!-- resources/views/company_details/index.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Company Details</h1>

        <a href="{{ route('company_details.create') }}" class="btn btn-primary float-end mb-3">Add Company Detail</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($companyDetails as $companyDetail)
                    <tr>
                        <td>{{ $companyDetail->id }}</td>
                        <td>{{ $companyDetail->name }}</td>
                        <td>{{ $companyDetail->description }}</td>
                        <td>
                            <a href="{{ route('company_details.edit', $companyDetail->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('company_details.destroy', $companyDetail->id) }}" method="post" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No company details available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
