@extends('admin.layouts.master')
@section('title')
    Footer - Admin
@endsection

@section('css')
    <link href="{{ URL::asset('build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .property-type-img {
            max-width: 80px;
            max-height: 60px;
            border-radius: 4px;
            object-fit: cover;
        }

        .icon-preview {
            font-size: 24px;
            margin-right: 10px;
            vertical-align: middle;
        }

        .swal2-toast {
            font-size: 12px !important;
            padding: 6px 10px !important;
            min-width: auto !important;
            width: 220px !important;
            line-height: 1.3em !important;
        }

        .swal2-toast .swal2-icon {
            width: 24px !important;
            height: 24px !important;
            margin-right: 6px !important;
        }

        .swal2-toast .swal2-title {
            font-size: 13px !important;
        }
        
        .form-container {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border: 1px solid #e9ecef;
        }
        
        .social-input-group {
            position: relative;
        }
        
        .social-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 16px;
        }
        
        .social-input {
            padding-left: 40px;
        }
    </style>
@endsection

@section('content')
    <x-breadcrub pagetitle="Admin" subtitle="Footer" title="Footer Settings" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pt-0">

                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <h4 class="card-title">Footer Settings</h4>
                                    <p class="card-title-desc">Manage your website footer content and social links</p>
                                </div>

                                <div class="col-sm-6 d-flex justify-content-end gap-2">
                                    {{-- <a href="{{ route('admin.section_template.index') }}" class="btn btn-danger">
                                        Back
                                    </a> --}}
                                </div>
                            </div>

                            <div class="form-container">
                                <form action="{{ route('admin.footer.store') }}" method="POST">
                                    @csrf
                                    
                                    <div class="row">
                                        <!-- About Us Section -->
                                        <div class="col-md-12 mb-3">
                                            <label for="about_us" class="form-label">About Us</label>
                                            <textarea name="about_us" id="about_us" class="form-control" rows="4" 
                                                placeholder="Enter about us description...">{{ old('about_us', $footer->about_us ?? '') }}</textarea>
                                            @error('about_us')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Social Media Links -->
                                        <div class="col-md-6 mb-3">
                                            <h5 class="mb-3">Social Media Links</h5>
                                            
                                            <!-- Facebook -->
                                            <div class="social-input-group mb-3 position-relative">
                                                <input type="url" name="facebook" class="form-control social-input pe-5" 
                                                    placeholder="https://facebook.com/yourpage" 
                                                    value="{{ old('facebook', $footer->facebook ?? '') }}">
                                                <div class="position-absolute top-50 end-0 translate-middle-y me-3">
                                                    <i class="fab fa-facebook-f text-primary"></i>
                                                </div>
                                            </div>
                                            
                                            <!-- Instagram -->
                                            <div class="social-input-group mb-3 position-relative">
                                                <input type="url" name="instagram" class="form-control social-input pe-5" 
                                                    placeholder="https://instagram.com/yourprofile" 
                                                    value="{{ old('instagram', $footer->instagram ?? '') }}">
                                                <div class="position-absolute top-50 end-0 translate-middle-y me-3">
                                                    <i class="fab fa-instagram text-danger"></i>
                                                </div>
                                            </div>
                                            
                                            <!-- LinkedIn -->
                                            <div class="social-input-group mb-3 position-relative">
                                                <input type="url" name="linkedin" class="form-control social-input pe-5" 
                                                    placeholder="https://linkedin.com/company/yourcompany" 
                                                    value="{{ old('linkedin', $footer->linkedin ?? '') }}">
                                                <div class="position-absolute top-50 end-0 translate-middle-y me-3">
                                                    <i class="fab fa-linkedin-in text-primary"></i>
                                                </div>
                                            </div>
                                            
                                            <!-- Twitter -->
                                            <div class="social-input-group mb-3 position-relative">
                                                <input type="url" name="twitter" class="form-control social-input pe-5" 
                                                    placeholder="https://twitter.com/yourhandle" 
                                                    value="{{ old('twitter', $footer->twitter ?? '') }}">
                                                <div class="position-absolute top-50 end-0 translate-middle-y me-3">
                                                    <i class="fab fa-twitter text-info"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Contact Information -->
                                        <div class="col-md-6 mb-3">
                                            <h5 class="mb-3">Contact Information</h5>
                                            
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <textarea name="address" id="address" class="form-control" rows="3" 
                                                    placeholder="Enter full address">{{ old('address', $footer->address ?? '') }}</textarea>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="text" name="phone" class="form-control" 
                                                    placeholder="Enter phone number" 
                                                    value="{{ old('phone', $footer->phone ?? '') }}">
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" name="email" class="form-control" 
                                                    placeholder="Enter email address" 
                                                    value="{{ old('email', $footer->email ?? '') }}">
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="timing" class="form-label">Business Hours</label>
                                                <input type="text" name="timing" class="form-control" 
                                                    placeholder="e.g., Mon-Fri: 9am-5pm" 
                                                    value="{{ old('timing', $footer->timing ?? 'Mon-Fri: 9am-5pm') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Save Footer Settings</button>
                                            <button type="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- Preview Section -->
                            @if($footer && ($footer->about_us || $footer->facebook || $footer->address))
                            <div class="row mt-5">
                                <div class="col-12">
                                    <h5>Footer Preview</h5>
                                    <div class="card">
                                        <div class="card-body bg-light">
                                            <div class="row">
                                                @if($footer->about_us)
                                                <div class="col-md-4 mb-3">
                                                    <h6>About Us</h6>
                                                    <p class="small">{{ Str::limit($footer->about_us, 150) }}</p>
                                                </div>
                                                @endif
                                                
                                                @if($footer->facebook || $footer->instagram || $footer->linkedin || $footer->twitter)
                                                <div class="col-md-4 mb-3">
                                                    <h6>Follow Us</h6>
                                                    <div class="d-flex gap-2">
                                                        @if($footer->facebook)
                                                        <a href="{{ $footer->facebook }}" target="_blank" class="text-dark">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </a>
                                                        @endif
                                                        @if($footer->instagram)
                                                        <a href="{{ $footer->instagram }}" target="_blank" class="text-dark">
                                                            <i class="fab fa-instagram"></i>
                                                        </a>
                                                        @endif
                                                        @if($footer->linkedin)
                                                        <a href="{{ $footer->linkedin }}" target="_blank" class="text-dark">
                                                            <i class="fab fa-linkedin-in"></i>
                                                        </a>
                                                        @endif
                                                        @if($footer->twitter)
                                                        <a href="{{ $footer->twitter }}" target="_blank" class="text-dark">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endif
                                                
                                                @if($footer->address || $footer->phone || $footer->email || $footer->timing)
                                                <div class="col-md-4 mb-3">
                                                    <h6>Contact Info</h6>
                                                    @if($footer->address)
                                                    <p class="small mb-1"><i class="fas fa-map-marker-alt me-2"></i>{{ $footer->address }}</p>
                                                    @endif
                                                    @if($footer->phone)
                                                    <p class="small mb-1"><i class="fas fa-phone me-2"></i>{{ $footer->phone }}</p>
                                                    @endif
                                                    @if($footer->email)
                                                    <p class="small mb-1"><i class="fas fa-envelope me-2"></i>{{ $footer->email }}</p>
                                                    @endif
                                                    @if($footer->timing)
                                                    <p class="small mb-1"><i class="fas fa-clock me-2"></i>{{ $footer->timing }}</p>
                                                    @endif
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
    <script>
        @if (session('success'))
            Swal.fire({
                toast: true,
                icon: 'success',
                title: "{{ session('success') }}",
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        @endif

        @if (session('error'))
            Swal.fire({
                toast: true,
                icon: 'error',
                title: "{{ session('error') }}",
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        @endif
    </script>
    <script>
        setTimeout(function() {
            let alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
    </script>
@endsection