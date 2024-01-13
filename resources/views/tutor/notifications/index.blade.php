
@extends('layouts.tutor')

@section('content')
<div class="container mt-2">

    <div class="card">
        <div class="card-header">
            <h5>
                <i class="fa fa-bell text-warning"></i>
                Notifications
                <a href="{{ route('notifications.create') }}" class="btn btn-dark float-end">
                    <i class="fa fa-plus"></i>
                    Create New
                </a>
            </h5>
        </div>

        <div class="card-body">

    <table class="table table-bordered table-striped table-vcenter js-dataTable-full mt-3">
        <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($notifications as $notification)
                <tr>
                    <td>{{ $notification->id }}</td>
                    <td>{{ $notification->title }}</td>
                    <td>{{ $notification->content }}</td>
                    <td>
                        <a href="{{ route('notifications.show', $notification->id) }}" class="btn btn-sm btn-dark"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('notifications.edit', $notification->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                        <form action="{{ route('notifications.destroy', $notification->id) }}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>


</div>

@endsection
