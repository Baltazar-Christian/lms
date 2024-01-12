@extends('layouts.master')

@section('content')
    <h1>Create Notification</h1>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('notifications.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="course_id">Select Course</label>
            @extends('layouts.master')

            @section('content')
                <h1>Create Notification</h1>

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('notifications.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="course_id">Select Course</label>
