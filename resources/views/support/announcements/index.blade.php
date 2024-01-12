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

                @if ( count($announcements) == 0 )
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
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
                                <td>
                                    <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">
                                        {{ ucfirst($announcement->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('support-announcements.show', $announcement->id) }}"
                                        class="btn btn-dark btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('support-announcements.edit', $announcement->id) }}"
                                        class="btn btn-dark btn-sm">
                                        <i class="fa fa-edit"></i>

                                    </a>
                                    <form action="{{ route('support-announcements.destroy', $announcement->id) }}" method="post"
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

                        @endforelse
                    </tbody>
                </table>
                @else

                    <p class="text-dark">No announcements available.</p>

                @endif
            </div>
        </div>


    </div>
@endsection
