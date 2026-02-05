@extends('layouts.app')

@section('content')
<style>
:root {
    --brand-green: #83A121;
    --brand-blue: #1992C9;
}

.contact-hero {
    background: linear-gradient(135deg, var(--brand-blue), var(--brand-green));
}

.contact-card {
    border-radius: 16px;
    box-shadow: 0 14px 35px rgba(0,0,0,.08);
    border: none;
}

.btn-brand {
    background: linear-gradient(135deg, var(--brand-green), var(--brand-blue));
    border: none;
    color: #fff;
}

.btn-brand:hover {
    opacity: .9;
}
</style>

<div class="contact-hero py-5 mb-5">
    <div class="container text-center text-white">
        <h1 class="display-5 font-weight-bold">Contact Us</h1>
        <p class="lead mt-3">
            Have a question or enquiry? We would love to hear from you.
        </p>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card contact-card p-4 p-md-5">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('store_contact') }}">
                    @csrf

                    <div class="form-group">
                        <label>Your Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               required
                               value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               required
                               value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text"
                               name="subject"
                               class="form-control"
                               required
                               value="{{ old('subject') }}">
                    </div>

                    <div class="form-group">
                        <label>Message</label>
                        <textarea name="message"
                                  rows="5"
                                  class="form-control"
                                  required>{{ old('message') }}</textarea>
                    </div>

                    <button type="submit"
                            class="btn btn-brand btn-lg btn-block mt-4">
                        Send Message
                    </button>

                </form>

            </div>

        </div>
    </div>
</div>
@endsection
