@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-4">Applications</h1>

    <form method="GET" class="mb-3">
        <select name="type" onchange="this.form.submit()" class="form-control w-auto d-inline">
            <option value="">All Applications</option>
            <option value="job" {{ $type === 'job' ? 'selected' : '' }}>Job Applications (Candidates)</option>
            <option value="staff" {{ $type === 'staff' ? 'selected' : '' }}>Staff Applications (Healthcare Professionals)</option>
        </select>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Details</th>
                    <th>Status</th>
                    <th>Opened</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            @forelse($applications as $app)
                <tr>
                    <td>{{ $app->name }}</td>
                    <td>{{ $app->email }}</td>

                    <td>
                        @if($app->staff_id)
                            <span class="badge badge-info" title="Staff Application - Healthcare Professional">Staff</span>
                        @elseif($app->candidate_id)
                            <span class="badge badge-primary" title="Job Application - Candidate">Job</span>
                        @elseif($app->offer_id)
                            <span class="badge badge-secondary" title="Direct Job Application">Job</span>
                        @else
                            <span class="badge badge-secondary">Unknown</span>
                        @endif
                    </td>

                    <td>
                        @if($app->staff_id && $app->staff)
                            <span title="Healthcare Professional - Click View to see full application">
                                <i class="bi bi-person-badge"></i> 
                                {{ ucfirst(str_replace('_', ' ', $app->staff->role)) }}
                                @if($app->staff->care_specialty)
                                    - {{ $app->staff->care_specialty }}
                                @endif
                            </span>
                        @elseif($app->offer_id && $app->offer)
                            <span title="Applied for job: {{ $app->offer->title }}">
                                <i class="bi bi-briefcase"></i>
                                {{ Str::limit($app->offer->title, 30) }}
                            </span>
                        @elseif($app->candidate_id && $app->candidate)
                            <span title="Candidate application">
                                <i class="bi bi-person"></i>
                                Candidate Application
                            </span>
                        @else
                            <span class="text-muted">No details available</span>
                        @endif
                    </td>

                    <td>
                        <form method="POST" action="{{ route('change.status.application', $app) }}" class="d-inline">
                            @csrf
                            <select name="status" onchange="this.form.submit()" class="form-control form-control-sm">
                                @foreach(['submitted','pending','reviewed','shortlisted','rejected'] as $status)
                                    <option value="{{ $status }}" {{ $app->status === $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </td>

                    <td>
                        @if($app->opened_at)
                            <span title="Opened {{ \Carbon\Carbon::parse($app->opened_at)->format('M d, Y H:i') }}">
                                {{ \Carbon\Carbon::parse($app->opened_at)->diffForHumans() }}
                            </span>
                        @else
                            <span class="badge badge-warning">Not opened</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('admin.applications.show', $app) }}" class="btn btn-sm btn-primary" title="View application details">
                            <i class="bi bi-eye"></i> View
                        </a>
                        
                        @if($app->staff_id && $app->staff)
                            <span class="d-inline-block ml-1 text-muted small" title="Staff profile available in Staff Management section">
                                <i class="bi bi-person-badge"></i>
                            </span>
                        @elseif($app->candidate_id && $app->candidate)
                            <span class="d-inline-block ml-1 text-muted small" title="Candidate profile available in Candidates section">
                                <i class="bi bi-person"></i>
                            </span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-4">
                        <div class="text-muted">
                            <i class="bi bi-inbox" style="font-size: 2rem;"></i>
                            <p class="mt-2">No applications found</p>
                        </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $applications->links() }}
    </div>

    <!-- Info Alert -->
    <div class="alert alert-info mt-3">
        <i class="bi bi-info-circle"></i>
        <strong>Note:</strong> 
        @if(request('type') === 'staff')
            Staff applications are from healthcare professionals. View details and manage them here. For full staff profiles, go to Staff Management.
        @elseif(request('type') === 'job')
            Job applications are from candidates applying to job offers. View details and manage them here. For full candidate profiles, go to Candidates section.
        @else
            <span>Applications with <span class="badge badge-info">Staff</span> badge are from healthcare professionals. Applications with <span class="badge badge-primary">Job</span> badge are from candidates.</span>
        @endif
    </div>

</div>
@endsection

@push('styles')
<style>
    .table th {
        border-top: none;
        background-color: #f8f9fc;
    }
    .badge-info {
        background-color: #36b9cc;
        color: white;
    }
    .badge-primary {
        background-color: #4e73df;
        color: white;
    }
    .badge-secondary {
        background-color: #858796;
        color: white;
    }
    .badge-warning {
        background-color: #f6c23e;
        color: white;
    }
    [title] {
        cursor: help;
    }
    .table td {
        vertical-align: middle;
    }
    .alert {
        border-left: 4px solid #36b9cc;
    }
</style>
@endpush

@push('scripts')
<script>
    // Simple tooltip fallback if Bootstrap JS is not available
    document.addEventListener('DOMContentLoaded', function() {
        // You can add a simple tooltip polyfill if needed
        // But the title attribute will still show native browser tooltips
    });
</script>
@endpush