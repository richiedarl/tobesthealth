@extends('layouts.admin')

@section('content')
<style>
.contact-detail {
    border-radius: 14px;
    box-shadow: 0 12px 30px rgba(0,0,0,.08);
}
</style>

<div class="container-fluid">

    <a href="{{ route('admin.contacts.index') }}"
       class="btn btn-sm btn-light mb-4">
        ← Back to Contacts
    </a>

    <div class="card contact-detail p-4 p-md-5">

        <h3 class="mb-4 text-primary">
            {{ $contact->subject }}
        </h3>

        <p><strong>Name:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p>
            <strong>Received:</strong>
            {{ $contact->created_at->format('d M Y, h:i A') }}
        </p>

        <hr class="my-4">

        <p style="white-space: pre-line;">
            {{ $contact->message }}
        </p>

        <hr class="my-4">

        <a href="mailto:{{ $contact->email }}"
           class="btn btn-primary">
            Reply via Email
        </a>

    </div>

</div>
@endsection
