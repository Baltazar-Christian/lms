@extends('layouts.support')

@section('content')
    <div class="col-12 mt-2 mb-2">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h5><i class="fa fa-users text-warning"></i> Users List</h5>
                    </div>
                    <div class="col-6">
                        {{-- <a href="{{ route('lms.add-tutor') }}" class="btn btn-success float-end">Register Tutor</a> --}}
                    </div>
                </div>
            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('support.password.reset', $user->id) }}"
                                            class="btn btn-dark btn-sm">
                                            <i class="fa fa-key"></i>
                                            Reset Password
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
@endsection
