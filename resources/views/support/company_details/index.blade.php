<!-- resources/views/company_details/index.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container mt-2">

        <div class="card">
            <div class="card-header">
                <h5>
                    <i class="fa fa-house text-warning"></i>
                    Company Details
                    <a href="{{ route('company_details.create') }}" class="btn btn-dark float-end mb-3">Add Company Detail</a>

                </h5>
            </div>

            <div class="card-body">

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
                            <td>{!! $companyDetail->description !!}</td>
                            <td>
                                <a href="{{ route('company_details.edit', $companyDetail->id) }}" class="btn btn-sm btn-dark "> <i class="fa fa-edit"></i> </a>
                                <form action="{{ route('company_details.destroy', $companyDetail->id) }}" method="post" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn  btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
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
        </div>


    </div>
@endsection
