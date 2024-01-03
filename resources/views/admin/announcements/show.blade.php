@extends('layouts.master')

@section('content')
    <div class="container mt-2">


        <div class="card">
            <div class="card-header">
                 <a href="{{ route('announcements.index') }}" class="btn btn-dark float-end mt-3">Back </a>
        <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-dark mt-3"><i class="fa fa-edit"></i></a>

        <form action="{{ route('announcements.destroy', $announcement->id) }}" method="post" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
        </form>
            </div>
            <div class="card-body">
                <h5>{{ $announcement->title }}</h5>
                <p>Status: {{ ucfirst($announcement->status) }}</p>
                <p> {!! $announcement->content !!}</p>

                @if ($announcement->attachment)
                    <p>Attachment: <a href="{{ asset('storage/' . $announcement->attachment) }}" target="_blank">Download</a></p>
                @endif
            </div>
        </div>



    </div>
@endsection
