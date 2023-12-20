@extends('layouts.master')

@section('content')
    <h1>Create Quiz</h1>

<!-- resources/views/quizzes/create.blade.php -->

@extends('layouts.master')

@section('content')
    <h1>Create Quiz</h1>

    <form action="{{ route('lms.store-quiz', $course->id) }}" method="post">
        @csrf

        {{-- Include validation errors if any --}}
        {{-- @include('partials.errors') --}}
        <input type="text" name="course_id" value="{{ $course->id }}">
        <div class="form-group">
            <label for="title">Quiz Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Quiz</button>
    </form>
@endsection

@endsection
