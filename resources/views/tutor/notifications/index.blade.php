
@extends('layouts.tutor')

@section('content')
    <h1>Notifications</h1>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notifications as $notification)
                <tr>
                    <td>{{ $notification->id }}</td>
                    <td>{{ $notification->title }}</td>
                    <td>{{ $notification->content }}</td>
                    <td>
                        <a href="{{ route('notifications.show', $notification->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('notifications.edit', $notification->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('notifications.destroy', $notification->id) }}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
