<!-- resources/views/modules/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Module</h1>

    <form action="{{ route('lms.update-module', $module->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Module Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $module->name }}" required>
        </div>

        <div class="form-group">
            <label for="institutes">Select Institutes</label>
            <select name="institutes[]" id="institutes" class="form-control" multiple required>
                @foreach ($institutes as $institute)
                    <option value="{{ $institute->id }}" {{ $module->institutes->contains($institute->id) ? 'selected' : '' }}>
                        {{ $institute->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Module</button>
    </form>
@endsection
