<!-- resources/views/modules/create.blade.php -->

@extends('layouts.master')

@section('content')

    <h1>Create Module</h1>

    <form action="{{ route('lms.save-module') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Module Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="institutes">Select Institutes</label>
            <select name="institutes[]" id="institutes" class="form-control" multiple required>
                @foreach ($institutes as $institute)
                    <option value="{{ $institute->id }}">{{ $institute->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Module</button>
    </form>
@endsection
