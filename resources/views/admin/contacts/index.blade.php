@extends('layouts.admin')

@section('content')
<style>
:root {
    --brand-green: #83A121;
    --brand-blue: #1992C9;
}

.contact-card {
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,.07);
}

.badge-unread {
    background: var(--brand-blue);
}
</style>

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Contact Enquiries</h1>

    <div class="card contact-card">
        <div class="card-body p-0">

            <table class="table table-hover mb-0">
                <thead class="thead-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                @forelse($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>
                            @if(is_null($contact->opened_at) || $contact->opened_at == 0)
                                <span class="badge badge-unread text-white">Unread</span>
                            @else
                                <span class="badge badge-secondary">Read</span>
                            @endif
                        </td>
                        <td>{{ $contact->created_at->format('d M Y') }}</td>
                        <td class="text-right">
                            <a href="{{ route('admin.contacts.show', $contact->id) }}"
                               class="btn btn-sm btn-outline-primary">
                                View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            No contact enquiries found.
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>

        </div>
    </div>

    <div class="mt-4">
        {{ $contacts->links() }}
    </div>

</div>
@endsection
