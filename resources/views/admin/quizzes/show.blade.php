@extends('layouts.master')

@section('content')
    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                <h5>Quiz Details</h5>
                    <a href="{{ route('lms.edit-quiz', [$course->id, $quiz->id]) }}" class="btn btn-dark "><i class="fa fa-edit"></i></a>

                    <form action="{{ route('lms.delete-quiz', [$course->id, $quiz->id]) }}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger " onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                    </form>
            </div>

            <div class="card-body">
                <div class="card mt-3">
                    <div class="card-body">
                        <p class="card-text"><strong>Course:</strong> {{ $quiz->course->title }}</p>
                        <p class="card-text"><strong>Title:</strong> {{ $quiz->title }}</p>
                        <!-- Add other quiz details as needed -->

                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <h5>
                            <i class="fa fa-list text-warning"></i>
                            Quiz Questions
                        <a href="{{ route('lms.create-question', [$course->id, $quiz->id]) }}" class="btn btn-sm btn-dark float-end">Create Question</a>

                        </h5>

                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Text</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quiz->questions as $question)
                                    <tr>
                                        <td>{{ $question->id }}</td>
                                        <td>{{ $question->question }}</td>
                                        <td>
                                            <a href="{{ route('lms.show-question', [$course->id, $quiz->id, $question->id]) }}" class="btn btn-sm btn-dark">
                                                <i class="fa fa-eye"></i>
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





        <div class="mt-4">

        </div>
    </div>
@endsection
