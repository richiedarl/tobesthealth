<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'Admin Login') }}</title>

    <!-- Custom fonts -->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Custom styles -->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

<div class="container">

    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>

                        <div class="col-lg-6">
                            <div class="p-5">

                                <div class="text-center mb-4">
                                    <h1 class="h4 text-gray-900">Welcome Back!</h1>
                                </div>

                                <form method="POST" action="{{ route('login_validate') }}" class="user">
                                    {{ csrf_field() }}
                                    {{-- Login (email or username) --}}
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="login"
                                            value="{{ old('login') }}"
                                            class="form-control form-control-user @error('login') is-invalid @enderror"
                                            placeholder="Email or Username..."
                                            required
                                            autofocus
                                        >

                                        @error('login')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- Password --}}
                                    <div class="form-group">
                                        <input
                                            type="password"
                                            name="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            placeholder="Password"
                                            required
                                        >

                                        @error('password')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- Remember Me --}}
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input
                                                type="checkbox"
                                                name="remember"
                                                class="custom-control-input"
                                                id="remember"
                                                {{ old('remember') ? 'checked' : '' }}
                                            >
                                            <label class="custom-control-label" for="remember">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>

                                    {{-- Submit --}}
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                    <hr>

                                </form>

                                {{-- Forgot password --}}
                                @if (Route::has('password.request'))
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}">
                                            Forgot Password?
                                        </a>
                                    </div>
                                @endif

                                {{-- Registration --}}
                                @if (Route::has('register'))
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">
                                            Create an Account!
                                        </a>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

<!-- Core Scripts -->
<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

</body>
</html>
