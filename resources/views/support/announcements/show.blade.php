@extends('layouts.support')

@section('content')
    <div class="container mt-2">


        <div class="card">
            <div class="card-header">
                 <a href="{{ route('support-announcements.index') }}" class="btn btn-dark float-end mt-3">Back </a>
        <a href="{{ route('support-announcements.edit', $announcement->id) }}" class="btn btn-dark mt-3"><i class="fa fa-edit"></i></a>

        <form action="{{ route('support-announcements.destroy', $announcement->id) }}" method="post" style="display: inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
        </form>
            </div>
            <div class="card-body">
                <h5 class="text-dark">{{ $announcement->title }}</h5>
                <p class="text-dark">Status: {{ ucfirst($announcement->status) }}</p>
                <p class="text-dark"> {!! $announcement->content !!}</p>

                @if ($announcement->attachment)
                    <p class="text-dark">Attachment: <a href="{{ asset('public/storage/' . $announcement->attachment) }}" class="btn btn-sm btn-dark" target="_blank">Download</a></p>
                @endif
            </div>
        </div>



    </div>
@endsection
