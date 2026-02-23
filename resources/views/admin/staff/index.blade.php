@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Staff Members</h1>

        <a href="{{ route('admin.staff.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add New Staff
        </a>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Filter Tabs --}}
    <ul class="nav nav-tabs mb-4" id="staffTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">
                All Staff <span class="badge bg-secondary ms-1">{{ $staff->total() }}</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="nurses-tab" data-bs-toggle="tab" data-bs-target="#nurses" type="button" role="tab">
                <i class="bi bi-heart-pulse"></i> Nurses
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="hca-tab" data-bs-toggle="tab" data-bs-target="#hca" type="button" role="tab">
                <i class="bi bi-person-plus"></i> Healthcare Assistants
            </button>
        </li>
    </ul>

    <div class="tab-content" id="staffTabsContent">
        {{-- All Staff Tab --}}
        <div class="tab-pane fade show active" id="all" role="tabpanel">
            @include('admin.staff.partials.staff-table', [
                'staff' => $staff, 
                'showAll' => true,
                'showPagination' => true
            ])
        </div>
        
        {{-- Nurses Tab --}}
        <div class="tab-pane fade" id="nurses" role="tabpanel">
            @include('admin.staff.partials.staff-table', [
                'staff' => $staff->where('role', 'Nurse'), 
                'showAll' => false,
                'type' => 'nurse',
                'showPagination' => false
            ])
        </div>
        
        {{-- HCA Tab --}}
        <div class="tab-pane fade" id="hca" role="tabpanel">
            @include('admin.staff.partials.staff-table', [
                'staff' => $staff->where('role', 'Healthcare Assistant'), 
                'showAll' => false,
                'type' => 'hca',
                'showPagination' => false
            ])
        </div>
    </div>

</div>
@stop

@push('styles')
<style>
    .nav-tabs .nav-link {
        color: #4e73df;
        font-weight: 500;
        border: none;
        padding: 0.75rem 1.5rem;
    }
    .nav-tabs .nav-link.active {
        color: #224abe;
        border-bottom: 3px solid #4e73df;
        background: transparent;
    }
    .nav-tabs .nav-link i {
        margin-right: 0.5rem;
    }
    .badge.bg-secondary {
        background-color: #858796 !important;
    }
    .hover-tooltip {
        cursor: help;
    }
</style>
@endpush