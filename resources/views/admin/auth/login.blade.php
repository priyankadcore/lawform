@extends('admin.layouts.master-without-nav')
@section('title')
    Login page
@endsection
@section('content')
    <?php
    $settings = \App\Models\Setting::first();
    $logo = isset($settings->logo) ? asset('storage/' . $settings->logo) : asset('build/images/logo-dark.png');
    ?>

    <style>
        .bg-primary {
            --bs-bg-opacity: 1;
            background-color: rgb(225 227 253) !important;
        }
        </style>
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container">

                <div class="home-btn"><a href="/" class="text-white router-link-active"><i class="fas fa-home h2"></i></a>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">


                                    <div class="text-center">
                                        <h2>Login</h2>
                                    </div>

                                    <form method="POST" action="#" class="form-horizontal mt-4 pt-2">
                                        @csrf
                                        <div class="mb-2">
                                            <label for="email" class="form-label">Email</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                                value="admin@themesbrand.com">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label" for="password-input">Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Enter password" id="password-input" name="password" required
                                                autocomplete="current-password" value="12345678">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">Remember
                                                me</label>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                        </div>

                                        {{-- <div class="mt-4 text-center">
                                            <a href="#" class="text-muted"><i
                                                    class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>

            </div>


        </div>
        <!-- End Log In page -->
    </div>
@endsection
@section('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
