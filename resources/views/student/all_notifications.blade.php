

<!-- resources/views/quizzes/result.blade.php -->
@extends('layouts.student')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5> <i class="fa fa-bell text-warning"></i> All Notifications</h5>

            </div>
            <div class="card-body">
                <table>
                    <thead>
                        <th>SN</th>
                        <th>Date</th>
                        <th>Course</th>
                        <th>Status</th>
                        <th>Option</th>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($notifications as $notification )
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{  $notification->created_at->format('d/m/Y') }}</td>
                            <td>{{  $notification->course->title }}</td>
                            <td>

                                @php
                                    $read=App\Models\UserNotification::where('user_id',Auth::user()->id)->where('notification_id',$notification->id)->first();

                                @endphp

                                @if ($read)
                                    <span class="text-success">Read</span>
                                @else
                                <span class="text-warning">New</span>

                                @endif
                            </td>
                            <td>Option</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
