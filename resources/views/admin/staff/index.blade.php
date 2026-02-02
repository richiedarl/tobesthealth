@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Staff Members</h1>

        <a href="{{ route('admin.staff.create') }}" class="btn btn-primary">
            + Add New Staff
        </a>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">

            @if ($staff->count() === 0)
                <p class="text-muted mb-0">No staff members found.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Available</th>
                                <th>Active</th>
                                <th>Skills</th>
                                <th width="160">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staff as $member)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $member->full_name }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->role }}</td>
                                    <td>
                                        @if ($member->is_available)
                                            <span class="badge badge-success">Yes</span>
                                        @else
                                            <span class="badge badge-secondary">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($member->is_active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($member->skills)
                                            <ul class="mb-0">
                                                @foreach ($member->skills as $skill)
                                                    <li>{{ $skill }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.staff.edit', $member->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                        <form action="{{ route('admin.staff.destroy', $member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this staff member?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $staff->links() }}
                </div>
            @endif

        </div>
    </div>

</div>

@stop
