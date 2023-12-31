@php
    $selectedInstitutes = $module->institutes->pluck('id')->toArray();
@endphp
@extends('layouts.master')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

@section('content')
    <div class="container">
        <h5 class="mb-4">
            Edit Module
            <a href="{{ route('lms.modules') }}" class="btn btn-dark float-end"> <i class="fa fa-list text-warning"></i> All Modules </a>

        </h5>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('lms.update-module', $module->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Module Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $module->name }}" required>
                    </div>

                    <div class="form-group">
                        <label>Select Institutes</label>
                        <div>
                            @foreach ($institutes as $institute)
                                <div class="form-check">
                                    <input type="checkbox" name="institutes[]" id="institute{{ $institute->id }}" value="{{ $institute->id }}" {{ in_array($institute->id, $selectedInstitutes) ? 'checked' : '' }}>
                                    <label for="institute{{ $institute->id }}">{{ $institute->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary">Update Module</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#institutes').selectpicker();
        });
    </script>
@endsection
