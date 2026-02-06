@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Job Offers</h1>

        <a href="{{ route('admin.offer.create') }}" class="btn btn-primary">
            + Create New Offer
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">

            @if ($offers->count() === 0)
                <p class="text-muted mb-0">No job offers have been created yet.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">

                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Role</th>
                                <th>Service Type</th>
                                <th>Care Setting</th>
                                <th>Salary</th>
                                <th>Qualifications</th>
                                <th>Status</th>
                                <th width="160">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($offers as $offer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $offer->title }}</td>
                                    <td>{{ $offer->location }}</td>
                                    <td>{{ $offer->role?->name ?? '-' }}</td>
                                    <td>{{ $offer->serviceType?->name ?? '-' }}</td>
                                    <td>{{ $offer->careSetting?->name ?? '-' }}</td>
                                    <td>{{ $offer->salary_range ?? '—' }}</td>

                                    <td>
                                        @if (!empty($offer->qualifications))
                                            <ul class="mb-0 pl-3">
                                                @foreach ($offer->qualifications as $qualification)
                                                    <li>{{ $qualification }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($offer->is_active)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-secondary">Inactive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a
                                            href="{{ route('admin.offer.edit', $offer->id) }}"
                                            class="btn btn-sm btn-warning"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('admin.offer.destroy', $offer->id) }}"
                                            method="POST"
                                            class="d-inline delete-form"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            @endif

        </div>
    </div>

</div>

@stop
