@extends('layouts.support')

@section('content')
    <div class=" mt-2 m-2">
        <div class="card">
            <div class="card-header">
                <h5>
                    <i class="fa fa-bell text-warning"></i>
                    Announcements

                    <a href="{{ route('support-announcements.create') }}" class="btn btn-secondary mt-3 mb-3 float-end">Create Announcement</a>

                </h5>


            </div>
            <div class="card-body">
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
                                        class="btn btn-dark btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('announcements.edit', $announcement->id) }}"
                                        class="btn btn-dark btn-sm">
                                        <i class="fa fa-edit"></i>

                                    </a>
                                    <form action="{{ route('announcements.destroy', $announcement->id) }}" method="post"
                                        style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i>

                                        </button>
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
        </div>


    </div>
@endsection
