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
        :root {
            --primary-color: #7269ef;
            --secondary-color: #7a7f9a;
            --dark-color: #343a40;
            --light-color: #f8f9fa;
            --success-color: #06d6a0;
            --border-radius: 8px;
            --box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        
      .bg-primary {
            --bs-bg-opacity: 1;
            background-color: rgb(225 227 253) !important;
        }
        
        .login-container {
            max-width: 440px;
            width: 100%;
            margin: 0 auto;
        }
        
        .home-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 10;
        }
        
        .home-btn a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(114, 105, 239, 0.3);
        }
        
        .home-btn a:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(114, 105, 239, 0.4);
        }
        
        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }
        
        .card-body {
            padding: 2rem;
        }
        
        .brand-text {
            text-align: center;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
        }
        
        .brand-subtext {
            text-align: center;
            color: var(--secondary-color);
            margin-bottom: 2rem;
            font-size: 0.9rem;
        }
        
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }
        
        .form-control {
            padding: 0.75rem 1rem;
            border-radius: var(--border-radius);
            border: 1px solid #e6ebf5;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(114, 105, 239, 0.25);
        }
        
        .input-group .btn {
            border-radius: 0 var(--border-radius) var(--border-radius) 0;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.75rem;
            border-radius: var(--border-radius);
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: #6159d3;
            border-color: #6159d3;
            transform: translateY(-2px);
        }
        
        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
        }
        
        .forgot-password:hover {
            color: #6159d3;
            text-decoration: underline;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: var(--secondary-color);
        }
        
        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #e6ebf5;
        }
        
        .divider span {
            padding: 0 1rem;
            font-size: 0.9rem;
        }
        
        .social-login {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .social-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: white;
            color: var(--secondary-color);
            border: 1px solid #e6ebf5;
            transition: all 0.3s;
        }
        
        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .social-btn.google:hover {
            color: #DB4437;
            border-color: #DB4437;
        }
        
        .social-btn.facebook:hover {
            color: #4267B2;
            border-color: #4267B2;
        }
        
        .social-btn.github:hover {
            color: #333;
            border-color: #333;
        }
        
        .signup-link {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--secondary-color);
            font-size: 0.9rem;
        }
        
        .signup-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }
        
        .signup-link a:hover {
            text-decoration: underline;
        }
        
        /* Responsive adjustments */
        @media (max-width: 576px) {
            .card-body {
                padding: 1.5rem;
            }
            
            .home-btn {
                top: 10px;
                left: 10px;
            }
            
            .home-btn a {
                width: 40px;
                height: 40px;
            }
        }
    </style>
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container">

                <div class="home-btn"><a href="/" class="text-white router-link-active"><i class="fas fa-home h2"></i></a>
                </div>

                 <div class="login-container">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="brand-text">LOGIN</h1>
                            
                        <form method="POST" action="#" class="form-horizontal mt-4 pt-2">
                                        @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus 
                                        placeholder="Enter your email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password-input">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                            placeholder="Enter password" id="password-input" name="password" required 
                                            autocomplete="current-password">
                                        <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                            <i class="mdi mdi-eye-off"></i>
                                        </button>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">Remember me</label>
                                    </div>
                                    
                                    <a href="#" class="forgot-password">
                                        <i class="fas fa-lock me-1"></i> Forgot your password?
                                    </a>
                                </div>

                                <div class="mb-4">
                                    <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                </div>
                            </form>

                           
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- End Log In page -->
    </div>
@endsection
@section('scripts')
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password-input');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle eye icon
            const eyeIcon = this.querySelector('i');
            if (type === 'password') {
                eyeIcon.className = 'mdi mdi-eye-off';
            } else {
                eyeIcon.className = 'mdi mdi-eye';
            }
        });
    </script>

@endsection
