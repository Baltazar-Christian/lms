@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Announcements</h1>

        <a href="{{ route('announcements.create') }}" class="btn btn-primary mt-3 mb-3 float-end">Create Announcement</a>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($announcements as $announcement)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $announcement->title }}</td>
                        <td>{{ ucfirst($announcement->status) }}</td>
                        <td>
                            <a href="{{ route('announcements.show', $announcement->id) }}"
                                class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('announcements.edit', $announcement->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('announcements.destroy', $announcement->id) }}" method="post"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No announcements available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
