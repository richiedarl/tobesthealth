@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4">Applications</h1>

    <form method="GET" class="mb-3">
        <select name="type" onchange="this.form.submit()" class="form-control w-auto d-inline">
            <option value="">All</option>
            <option value="job" {{ $type === 'job' ? 'selected' : '' }}>Job Applications</option>
            <option value="staff" {{ $type === 'staff' ? 'selected' : '' }}>Staff Requests</option>
        </select>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Offer</th>
                <th>Status</th>
                <th>Opened</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        @foreach($applications as $app)
            <tr>
                <td>{{ $app->name }}</td>

                <td>
                    @if($app->staff_id)
                        <span class="badge badge-info">Staff</span>
                    @else
                        <span class="badge badge-secondary">Job</span>
                    @endif
                </td>

                <td>{{ $app->offer->title }}</td>

                <td>
                <form method="POST" action="{{ route('change.status.application', $app) }}">
                @csrf

                <select name="status" onchange="this.form.submit()">
                    @foreach(['submitted','pending','reviewed','shortlisted','rejected'] as $status)
                        <option value="{{ $status }}" {{ $app->status === $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
                </form>

                </td>

                <td>
                    {{ $app->opened_at ? \Carbon\Carbon::parse($app->opened_at)->diffForHumans() : 'Not opened' }}
                </td>

                <td>
                    <a href="{{ route('admin.applications.show', $app) }}" class="btn btn-sm btn-primary">
                        View
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $applications->links() }}

</div>
@endsection
