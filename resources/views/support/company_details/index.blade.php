<!-- resources/views/company_details/index.blade.php -->

@extends('layouts.support')

@section('content')

    <div class="container mt-2">

        <div class="card">
            <div class="card-header">
                <h5>
                    <i class="fa fa-house text-warning"></i>
                    Company Details
                    {{-- <a href="{{ route('support-company_details.create') }}" class="btn btn-dark float-end mb-3">Add Company Detail</a> --}}

                </h5>
            </div>

            <div class="card-body">

                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Details</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($companyDetails as $companyDetail)
                        <tr>
                            <td>{{ $companyDetail->id }}</td>
                            <td>{{ $companyDetail->name }}</td>
                            <td>
                                <p><strong>About</strong></p>
                                <hr>
                                {!! $companyDetail->description !!}
                                
                                <hr>
                                <p class="text-dark">Location: {{ $companyDetail->contact_address }}</p>
                                <p class="text-dark">Phone 1: {{ $companyDetail->contact_phone }}</p>
    
                                <p class="text-dark">Phone 2: {{ $companyDetail->contact_phone2 }}</p>
                                <p class="text-dark">Email 1: {{ $companyDetail->contact_email }} </p>
                                <p class="text-dark">Email 2:{{ $companyDetail->contact_email2 }}</p>
                                
                            </td>
                            <td>
                                <a href="{{ route('support-company_details.edit', $companyDetail->id) }}" class="btn btn-sm btn-dark "> <i class="fa fa-edit"></i> </a>

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
