@extends('admin.layouts.master')
@section('title')
    Our Team Management
@endsection

<link href="{{ URL::asset('build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
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
    
    .team-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        border-radius: 12px;
        overflow: hidden;
    }
    
    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    
    .team-image-container {
        height: 200px;
        overflow: hidden;
        position: relative;
    }
    
    .team-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .team-card:hover .team-image {
        transform: scale(1.05);
    }
    
    .team-actions {
        position: absolute;
        top: 10px;
        right: 10px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .team-card:hover .team-actions {
        opacity: 1;
    }
    
    .social-links {
        display: flex;
        gap: 8px;
        margin-top: 10px;
    }
    
    .social-icon {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 14px;
        transition: transform 0.2s ease;
    }
    
    .social-icon:hover {
        transform: scale(1.1);
    }
    
    .facebook-bg {
        background: #3b5998;
    }
    
    .twitter-bg {
        background: #1da1f2;
    }
    
    .linkedin-bg {
        background: #0077b5;
    }
    
    .status-badge {
        position: absolute;
        top: 10px;
        left: 10px;
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }
    
    .empty-state i {
        font-size: 64px;
        color: #dee2e6;
        margin-bottom: 20px;
    }
</style>

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="page-title mb-0" style="color:black!important;">Our Team Management</h3>
                            <p class="text-muted mb-0">Manage your team members and their information</p>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#teamModal">
                                <i class="fas fa-plus me-2"></i> Add New Member
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        @if($teams->count() > 0)
                            <div class="row">
                                @foreach($teams as $team)
                                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                        <div class="card team-card h-100">
                                            <div class="team-image-container">
                                                <img src="{{ $team->image_url }}" 
                                                     alt="{{ $team->name }}" 
                                                     class="team-image"
                                                     onerror="this.src='{{ asset('build/images/default-avatar.png') }}'">
                                                
                                                <div class="team-actions">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-light edit-btn" 
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#teamModal"
                                                                data-team="{{ json_encode($team) }}">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <form action="{{ route('admin.team.destroy', $team->id) }}" 
                                                              method="POST" 
                                                              class="delete-form d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-light delete-btn">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                                
                                                <span class="status-badge badge bg-{{ $team->is_active ? 'success' : 'secondary' }}">
                                                    {{ $team->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </div>
                                            
                                            <div class="card-body">
                                                <h5 class="card-title mb-1">{{ $team->name }}</h5>
                                                <p class="text-primary mb-2">{{ $team->role }}</p>
                                                <p class="card-text text-muted small">{{ Str::limit($team->bio, 80) }}</p>
                                                
                                                @if($team->facebook_url || $team->twitter_url || $team->linkedin_url)
                                                    <div class="social-links">
                                                        @if($team->facebook_url)
                                                            <a href="{{ $team->facebook_url }}" target="_blank" class="social-icon facebook-bg">
                                                                <i class="fab fa-facebook-f"></i>
                                                            </a>
                                                        @endif
                                                        @if($team->twitter_url)
                                                            <a href="{{ $team->twitter_url }}" target="_blank" class="social-icon twitter-bg">
                                                                <i class="fab fa-twitter"></i>
                                                            </a>
                                                        @endif
                                                        @if($team->linkedin_url)
                                                            <a href="{{ $team->linkedin_url }}" target="_blank" class="social-icon linkedin-bg">
                                                                <i class="fab fa-linkedin-in"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="empty-state">
                                <i class="fas fa-users"></i>
                                <h4 class="text-muted">No Team Members Yet</h4>
                                <p class="text-muted mb-4">Start building your team by adding the first member</p>
                                
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Modal -->
    <div class="modal fade" id="teamModal" tabindex="-1" aria-labelledby="teamModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="teamModalLabel" style="color:black!important;">Add Team Member</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="teamForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="formMethod"></div>
                    
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role/Position <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('role') is-invalid @enderror" 
                                           id="role" name="role" value="{{ old('role') }}" required>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="team_image" class="form-label">Profile Image</label>
                                    <input type="file" class="form-control @error('team_image') is-invalid @enderror" 
                                           id="team_image" name="team_image" accept="image/*">
                                    @error('team_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Recommended size: 400x400px. Max 2MB.</div>
                                </div>
                            </div>
                          
                        </div>
                        
                        
                        
                        
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submitBtn">Add Team Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        $(document).ready(function() {
            // Image preview
            $('#team_image').on('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#previewImage').attr('src', e.target.result);
                        $('#imagePreview').show();
                    }
                    reader.readAsDataURL(file);
                } else {
                    $('#imagePreview').hide();
                }
            });

            // Modal reset when closed
            $('#teamModal').on('hidden.bs.modal', function() {
                resetModal();
            });

            // Edit button click
            $('.edit-btn').on('click', function() {
                const team = $(this).data('team');
                
                $('#teamModalLabel').text('Edit Team Member');
                $('#name').val(team.name);
                $('#role').val(team.role);
                $('#bio').val(team.bio);
                $('#order').val(team.order);
                $('#facebook_url').val(team.facebook_url);
                $('#twitter_url').val(team.twitter_url);
                $('#linkedin_url').val(team.linkedin_url);
                $('#is_active').prop('checked', team.is_active);
                
                // Show existing image preview
                if (team.team_image) {
                    $('#previewImage').attr('src', team.image_url);
                    $('#imagePreview').show();
                }
                
                $('#formMethod').html('<input type="hidden" name="_method" value="PUT">');
                $('#teamForm').attr('action', `/admin/team/${team.id}`);
                $('#submitBtn').text('Update Team Member');
            });

            // Delete button confirmation
            $('.delete-form').on('submit', function(e) {
                e.preventDefault();
                const form = this;
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This team member will be permanently deleted!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            // Form validation
            $('#teamForm').on('submit', function(e) {
                const name = $('#name').val().trim();
                const role = $('#role').val().trim();
                
                let isValid = true;
                
                if (!name) {
                    $('#name').addClass('is-invalid');
                    $('#name').siblings('.invalid-feedback').text('Name is required.');
                    isValid = false;
                }
                
                if (!role) {
                    $('#role').addClass('is-invalid');
                    $('#role').siblings('.invalid-feedback').text('Role is required.');
                    isValid = false;
                }
                
                // File size validation (2MB limit)
                const fileInput = $('#team_image')[0];
                if (fileInput.files.length > 0) {
                    const fileSize = fileInput.files[0].size / 1024 / 1024; // in MB
                    if (fileSize > 2) {
                        $('#team_image').addClass('is-invalid');
                        $('#team_image').siblings('.invalid-feedback').text('Image size must be less than 2MB.');
                        isValid = false;
                    }
                }
                
                if (!isValid) {
                    e.preventDefault();
                    return false;
                }
                
                return true;
            });

            // Remove validation on input
            $('input, textarea').on('input', function() {
                $(this).removeClass('is-invalid');
            });

            function resetModal() {
                $('#teamModalLabel').text('Add Team Member');
                $('#teamForm').attr('action', "{{ route('admin.team.store') }}");
                $('#formMethod').html('');
                $('#teamForm')[0].reset();
                $('#submitBtn').text('Add Team Member');
                $('#imagePreview').hide();
                $('.is-invalid').removeClass('is-invalid');
            }
        });
    </script>
@endsection