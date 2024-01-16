@extends('layouts.support')

@section('content')

<div class="col-12 mt-2 mx-1">
    <div class="card">
        <div class="card-header">
            <h5> <i class="fa fa-user text-warning"></i> Tutor Details
                {{-- <div class="col-6"> --}}
                    <a href="{{ route('lms.support-edit-tutor', $user->id) }}" class="btn btn-sm btn-dark float-end"><i class="fa fa-edit"></i></a>
                {{-- </div>
                <div class="col-6"> --}}
                    <form action="{{ route('lms.support-delete-tutor', $user->id) }}" method="POST" class="float-end m-1" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm float-end" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                    </form>
                {{-- </div> --}}
            </h5>
        </div>
        <div class="card-body">
            <p class="text-dark"><strong>Name:</strong> {{ $user->name }}</p>
            <p class="text-dark" ><strong>Email:</strong> {{ $user->email }}</p>
            <p class="text-dark" ><strong>Phone Number:</strong> {{ $user->phone_number }}</p>
            <p class="text-dark" ><strong>Address:</strong> {{ $user->phone_number }}</p>
            <p class="text-dark" ><strong>Joined:</strong> {{ $user->created_at }}</p>

            <div class="row">
                <h5><i class="fa fa-book text-warning"></i> Created Courses</h5>
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">

                    <thead hidden>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @forelse ($Courses as $course)

                        <tr>
                            <td>{{ $i++}}</td>
                            <td>{{ $course->title }}</td>
                            <td>
                                <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill   {{  $course->is_published ? 'bg-success-light text-success' : 'bg-danger-light text-danger' }} ">
                                    {{  $course->is_published?'Published':'Not Published' }}</span>
                            </td>
                            <td>
                                <a href="{{ route('lms.support-show-course', $course->id) }}" class="btn btn-sm btn-dark">
                                    <i class="fa fa-eye"></i>
                                    </a>
                            </td>

                        </tr>
                        @endif
                        @empty
                        <p class="text-dark">No Created courses.</p>
                    @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>



@endsection
