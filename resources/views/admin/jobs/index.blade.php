@extends('admin.layouts.master')
@section('title')
   Jobs Management
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
    <link href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f1f3f4;
        }

        .job-card {
            border: 1px solid #e3e6f0;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .job-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transform: translateY(-2px);
        }

        .status-badge {
            font-size: 0.75rem;
            padding: 4px 8px;
        }

        .action-buttons .btn {
            padding: 4px 8px;
            margin: 0 2px;
        }
    </style>
@endsection

@section('content')
  <x-breadcrub pagetitle="Admin" subtitle="Jobs" title="Manage" />
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Jobs Management</h4>
                <div class="page-title-right">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#jobModal" id="addJobBtn">
                        <i class="fas fa-plus mr-1"></i> Add New Job
                    </button>
                </div>
            </div>
        </div>
    </div>

   @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <!-- Jobs Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover" id="jobsTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>Job Title</th>
                                    <th>Company</th>
                                    <th>Location</th>
                                    <th>Type</th>
                                    <th>Salary</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $job)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            
                                            <div>
                                                <h5 class="font-14 mb-1">{{ $job->title }}</h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $job->company_name }}</td>
                                    <td>
                                        @if($job->is_remote)
                                            <span class="badge badge-soft-info">Remote</span>
                                        @else
                                            {{ $job->location }}
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-soft-primary text-uppercase">
                                            {{ str_replace('-', ' ', $job->job_type) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($job->salary_min && $job->salary_max)
                                            {{ number_format($job->salary_min) }} - {{ number_format($job->salary_max) }}
                                        @else
                                            <span class="text-muted">Negotiable</span>
                                        @endif
                                    </td>
                                    
                                    <td>{{ $job->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <button type="button" class="btn btn-sm btn-outline-primary edit-job-btn" 
                                                    data-job-id="{{ $job->id }}" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#jobModal"
                                                    title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            
                                            <form action="{{ route('admin.job.destroy', $job->id) }}" 
                                                  method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-outline-danger delete-btn" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Job Modal (Used for both Add and Edit) -->
<div class="modal fade" id="jobModal" tabindex="-1" aria-labelledby="jobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jobModalLabel">Add New Job</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="jobForm" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="job_id" name="job_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="title" class="form-label">Job Title *</label>
                                <input type="text" class="form-control" id="title" name="title" required placeholder="Enter Job Title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="company_name" class="form-label">Company Name *</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" required
                                placeholder="Enter Company Name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="job_type" class="form-label">Job Type *</label>
                                <select class="form-control" id="job_type" name="job_type" required>
                                    <option value="">Select Type</option>
                                    <option value="full-time">Full Time</option>
                                    <option value="part-time">Part Time</option>
                                    <option value="contract">Contract</option>
                                    <option value="freelance">Freelance</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="location" class="form-label">Location *</label>
                                <input type="text" class="form-control" id="location" name="location" required
                                placeholder="Enter Job Location">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="salary_min" class="form-label">Salary Range</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" id="salary_min" name="salary_min" placeholder="Min">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" id="salary_max" name="salary_max" placeholder="Max">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="contact_email" class="form-label">Contact Email *</label>
                                <input type="email" class="form-control" id="contact_email" name="contact_email" required
                                placeholder="Enter Contact Email">
                            </div>
                        </div>
                    </div>

                     <div class="form-group mb-3">
                        <label for="experience_level" class="form-label">Experience</label>
                       <input type="text" class="form-control" id="experience_level" name="experience_level" required
                       placeholder="Enter Job Experience">
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Job Description *</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="requirements" class="form-label">Requirements *</label>
                        <textarea class="form-control" id="requirements" name="requirements" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitBtn">Add Job</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize DataTable
            const table = $('#jobsTable').DataTable({
                "pageLength": 10,
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "order": [[5, 'desc']],
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search jobs...",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    "infoEmpty": "Showing 0 to 0 of 0 entries",
                    "infoFiltered": "(filtered from _MAX_ total entries)",
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next": "Next",
                        "previous": "Previous"
                    }
                }
            });

            // Job Modal Setup
            const jobModal = document.getElementById('jobModal');
            const jobForm = document.getElementById('jobForm');
            const modalTitle = document.getElementById('jobModalLabel');
            const submitBtn = document.getElementById('submitBtn');
            const jobIdInput = document.getElementById('job_id');

            // Reset form when modal is closed
            jobModal.addEventListener('hidden.bs.modal', function () {
                jobForm.reset();
                jobIdInput.value = '';
                modalTitle.textContent = 'Add New Job';
                submitBtn.textContent = 'Add Job';
                jobForm.action = "{{ route('admin.job.store') }}";
                jobForm.method = 'POST';
            });

            // Add Job Button Click
            document.getElementById('addJobBtn').addEventListener('click', function() {
                modalTitle.textContent = 'Add New Job';
                submitBtn.textContent = 'Add Job';
                jobForm.action = "{{ route('admin.job.store') }}";
                jobForm.method = 'POST';
            });

            // Edit Job Button Click
            document.addEventListener('click', function(e) {
                if (e.target.closest('.edit-job-btn')) {
                    const jobId = e.target.closest('.edit-job-btn').getAttribute('data-job-id');
                    
                    // Show loading state
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
                    
                    // Fetch job data
                    fetch(`/admin/job/${jobId}/edit`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Populate form fields
                        document.getElementById('title').value = data.title || '';
                        document.getElementById('company_name').value = data.company_name || '';
                        document.getElementById('job_type').value = data.job_type || '';
                        document.getElementById('location').value = data.location || '';
                        document.getElementById('salary_min').value = data.salary_min || '';
                        document.getElementById('salary_max').value = data.salary_max || '';
                        document.getElementById('contact_email').value = data.contact_email || '';
                        document.getElementById('experience_level').value = data.experience_level || '';
                        document.getElementById('description').value = data.description || '';
                        document.getElementById('requirements').value = data.requirements || '';
                        
                        // Set job ID
                        jobIdInput.value = jobId;
                        
                        // Update modal for edit mode
                        modalTitle.textContent = 'Edit Job';
                        submitBtn.textContent = 'Update Job';
                        jobForm.action = `/admin/job/${jobId}`;
                        jobForm.method = 'POST';
                        
                        // Add method spoofing for PUT request
                        if (!document.querySelector('input[name="_method"]')) {
                            const methodInput = document.createElement('input');
                            methodInput.type = 'hidden';
                            methodInput.name = '_method';
                            methodInput.value = 'PUT';
                            jobForm.appendChild(methodInput);
                        } else {
                            document.querySelector('input[name="_method"]').value = 'PUT';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching job data:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to load job data. Please try again.'
                        });
                    })
                    .finally(() => {
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = 'Update Job';
                    });
                }
            });

            // Delete confirmation
            document.addEventListener('click', function(e) {
                if (e.target.closest('.delete-btn')) {
                    const form = e.target.closest('.delete-form');
                    const jobTitle = form.closest('tr').querySelector('.font-14').textContent;
                    
                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You want to delete "${jobTitle}"?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                }
            });

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
        });
    </script>

    <style>
        .avatar-sm {
            width: 40px;
            height: 40px;
            line-height: 40px;
        }
        .bg-soft-primary { background-color: rgba(85, 110, 230, 0.1); }
        .bg-soft-success { background-color: rgba(52, 195, 143, 0.1); }
        .bg-soft-warning { background-color: rgba(250, 192, 76, 0.1); }
        .bg-soft-info { background-color: rgba(80, 165, 241, 0.1); }
        .badge-soft-warning { background-color: rgba(250, 192, 76, 0.1); color: #f9b43b; }
        .badge-soft-success { background-color: rgba(52, 195, 143, 0.1); color: #34c38f; }
        .badge-soft-primary { background-color: rgba(85, 110, 230, 0.1); color: #556ee6; }
        .badge-soft-secondary { background-color: rgba(132, 146, 166, 0.1); color: #8492a6; }
        .badge-soft-info { background-color: rgba(80, 165, 241, 0.1); color: #50a5f1; }
        .search-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #74788d;
        }
        .dataTables_filter {
            display: none;
        }
    </style>
@endsection