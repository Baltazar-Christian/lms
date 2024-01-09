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


            {{-- <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 80px;">ID</th>
                    <th>Name</th>
                    <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                    <th style="width: 15%;">Registered</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center fs-sm">1</td>
                    <td class="fw-semibold fs-sm">Jose Wagner</td>
                    <td class="d-none d-sm-table-cell fs-sm">
                      client1<span class="text-muted">@example.com</span>
                    </td>
                    <td class="d-none d-sm-table-cell">
                      <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Disabled</span>
                    </td>
                    <td>
                      <span class="text-muted fs-sm">5 days ago</span>
                    </td>
                  </tr>
                </tbody>
            </table> --}}
        </div>


    </div>




@endsection
