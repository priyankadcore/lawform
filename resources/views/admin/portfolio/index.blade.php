@extends('admin.layouts.master')
@section('title')
   Portfolio Management
@endsection

<link href="{{ URL::asset('build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
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
    
    .filter-container {
        background: #dfe0e1;
        padding: 20px;
        margin-bottom: 25px;
    }
    
    .portfolio-image-thumbnail {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 4px;
    }
    
    .status-badge {
        padding: 5px 10px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
    }
    
    .status-active {
        background-color: #d4edda;
        color: #155724;
    }
    
    .status-inactive {
        background-color: #f8d7da;
        color: #721c24;
    }
    
    .action-buttons {
        display: flex;
        gap: 5px;
    }
    
    .action-btn {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        transition: all 0.2s ease;
    }
    
    .action-btn:hover {
        transform: translateY(-2px);
    }
    
    .btn-edit {
        background-color: #e3f2fd;
        color: #1976d2;
    }
    
    .btn-delete {
        background-color: #ffebee;
        color: #d32f2f;
    }
    
    .btn-gallery {
        background-color: #e8f5e9;
        color: #388e3c;
    }
    
    .btn-view {
        background-color: #f3e5f5;
        color: #7b1fa2;
    }
    
    .dataTables_wrapper {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
    
    table.dataTable {
        margin: 0 !important;
    }
    
    .table th {
        border-top: none;
        background-color: #f8f9fa;
        font-weight: 600;
        color: #495057;
    }
    
    .category-badge {
        display: inline-block;
        background: #727ae9;
        color: #fcfdffff;
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 0.75rem;
    }
    
    .dataTables_empty {
        padding: 40px !important;
        text-align: center;
        color: #6c757d;
    }
    
    .dataTables_empty i {
        font-size: 48px;
        margin-bottom: 15px;
        color: #dee2e6;
        display: block;
    }
    
    /* Gallery Modal Styles */
    .upload-area {
        border: 2px dashed #dee2e6;
        border-radius: 8px;
        padding: 40px 20px;
        text-align: center;
        background-color: #f8f9fa;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 20px;
    }
    
    .upload-area:hover {
        border-color: #007bff;
        background-color: #e7f3ff;
    }
    
    .upload-area i {
        font-size: 48px;
        color: #6c757d;
        margin-bottom: 15px;
    }
    
    .upload-area.dragover {
        border-color: #007bff;
        background-color: #e7f3ff;
    }
    
    .image-preview-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 15px;
        margin-top: 20px;
    }
    
    .image-preview {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    .image-preview img {
        width: 100%;
        height: 120px;
        object-fit: cover;
    }
    
    .remove-image {
        position: absolute;
        top: 5px;
        right: 5px;
        background: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 12px;
        color: #dc3545;
    }
    
    .file-input {
        display: none;
    }
    
    .upload-progress {
        margin-top: 15px;
    }
    
    .progress {
        height: 8px;
    }
</style>
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h5 class="mb-0" style="color:white;">Admin / Portfolio / manage</h5>
            </div>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="row m-0">
        <div class="filter-container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h4 class="mb-0">Portfolio Management</h4>
                </div>
                <div class="col-md-2 text-right">
                    <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus mr-1"></i> Add Portfolio Item
                    </a>
                </div>
            </div>
         </div>
    </div>

    <!-- Portfolio DataTable -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="portfolioTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Client</th>
                                <th>Project Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($portfolios) && count($portfolios) > 0)
                                @foreach($portfolios as $portfolio)
                                <tr>
                                    <td>
                                        @if($portfolio->featured_image)
                                            <img src="{{ asset('storage/' . $portfolio->featured_image) }}" class="portfolio-image-thumbnail" alt="{{ $portfolio->name }}">
                                        @else
                                            <div class="portfolio-image-thumbnail bg-light d-flex align-items-center justify-content-center">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="font-weight-bold">{{ $portfolio->name }}</div>
                                        <small class="text-muted">Slug: {{ $portfolio->slug }}</small>
                                        @if($portfolio->short_description)
                                            <div class="text-truncate" style="max-width: 200px;" title="{{ $portfolio->short_description }}">
                                                {{ $portfolio->short_description }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $categoryName = $categories->where('id', $portfolio->category_id)->first()->name ?? 'Uncategorized';
                                        @endphp
                                        <span class="category-badge">{{ $categoryName }}</span>
                                    </td>
                                    <td>{{ $portfolio->client ?? 'N/A' }}</td>
                                    <td>{{ $portfolio->project_date ? \Carbon\Carbon::parse($portfolio->project_date)->format('M d, Y') : 'N/A' }}</td>
                                    <td>
                                        @if($portfolio->status)
                                            <span class="status-badge status-active">Active</span>
                                        @else
                                            <span class="status-badge status-inactive">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <button type="button" class="action-btn btn-gallery gallery-btn" 
                                                    title="Manage Gallery" 
                                                    data-portfolio-id="{{ $portfolio->id }}"
                                                    data-portfolio-name="{{ $portfolio->name }}">
                                                <i class="fas fa-images"></i>
                                            </button>
                                            <a href="{{ route('admin.portfolio.show', $portfolio->id) }}" class="action-btn btn-view" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="action-btn btn-edit" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="action-btn btn-delete delete-btn" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Gallery Upload Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="galleryModalLabel">Upload Gallery Images</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="galleryUploadForm" action="{{ route('admin.portfolio.gallery.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="portfolio_id" id="portfolio_id">
                    
                    <div class="form-group">
                        <label>Portfolio Item: <strong id="portfolio_name"></strong></label>
                    </div>
                    
                    <div class="upload-area" id="uploadArea">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <h5>Drag & Drop Images Here</h5>
                        <p class="text-muted">or click to browse files</p>
                        <p class="small text-muted">Supported formats: JPG, PNG, GIF, WEBP (Max: 5MB each)</p>
                        <input type="file" name="gallery_images[]" id="gallery_images" multiple accept="image/*">
                    </div>
                    
                    <div class="upload-progress" id="uploadProgress" style="display: none;">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
                        </div>
                        <small class="text-muted mt-1" id="progressText">Uploading... 0%</small>
                    </div>
                    
                    <div class="image-preview-container" id="imagePreviewContainer">
                        <!-- Image previews will be added here -->
                    </div>
                </div>
                <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="submit" class="btn btn-primary" id="uploadBtn" disabled>
                        <i class="fas fa-upload mr-1"></i> Upload Images
                    </button> --}}

                    <button type="submit" class="btn btn-primary"> <i class="fas fa-upload mr-1"></i>Update Images</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
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

        // Initialize DataTable
        $(document).ready(function() {
            $('#portfolioTable').DataTable({
                "pageLength": 10,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "order": [[4, "desc"]], // Default sort by project date
                "language": {
                    "emptyTable": "<div class='dataTables_empty'><i class='fas fa-folder-open'></i><h4>No portfolio items found</h4><p>Add a new portfolio item to get started.</p></div>"
                },
                "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                       "<'row'<'col-sm-12'tr>>" +
                       "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                "columnDefs": [
                    { "orderable": false, "targets": [0, 6] }, // Disable sorting for image and actions columns
                    { "className": "text-center", "targets": [0, 5] } // Center align image and status columns
                ]
            });
            
            // Delete confirmation
            $('.delete-btn').on('click', function(e) {
                e.preventDefault();
                const form = $(this).closest('.delete-form');
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
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
            });

            // Gallery Modal Functionality
            $('.gallery-btn').on('click', function() {
                const portfolioId = $(this).data('portfolio-id');
                const portfolioName = $(this).data('portfolio-name');
                
                $('#portfolio_id').val(portfolioId);
                $('#portfolio_name').text(portfolioName);
                $('#galleryModal').modal('show');
                
                // Reset form
                $('#gallery_images').val('');
                $('#imagePreviewContainer').empty();
                $('#uploadBtn').prop('disabled', true);
            });

            // File upload handling
            const uploadArea = $('#uploadArea');
            const fileInput = $('#gallery_images');
            const previewContainer = $('#imagePreviewContainer');
            const uploadBtn = $('#uploadBtn');

            // Click on upload area to trigger file input
            uploadArea.on('click', function() {
                fileInput.click();
            });

            // Drag and drop functionality
            uploadArea.on('dragover', function(e) {
                e.preventDefault();
                uploadArea.addClass('dragover');
            });

            uploadArea.on('dragleave', function() {
                uploadArea.removeClass('dragover');
            });

            uploadArea.on('drop', function(e) {
                e.preventDefault();
                uploadArea.removeClass('dragover');
                const files = e.originalEvent.dataTransfer.files;
                handleFiles(files);
            });

            // File input change
            fileInput.on('change', function() {
                handleFiles(this.files);
            });

            function handleFiles(files) {
                if (files.length > 0) {
                    previewContainer.empty();
                    
                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        
                        // Validate file type
                        if (!file.type.match('image.*')) {
                            Swal.fire({
                                toast: true,
                                icon: 'error',
                                title: 'Only image files are allowed',
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            continue;
                        }
                        
                        // Validate file size (5MB)
                        if (file.size > 5 * 1024 * 1024) {
                            Swal.fire({
                                toast: true,
                                icon: 'error',
                                title: 'File size must be less than 5MB',
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            continue;
                        }
                        
                        // Create preview
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const preview = $(`
                                <div class="image-preview">
                                    <img src="${e.target.result}" alt="Preview">
                                    <button type="button" class="remove-image" data-index="${i}">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            `);
                            previewContainer.append(preview);
                        };
                        reader.readAsDataURL(file);
                    }
                    
                    if (previewContainer.children().length > 0) {
                        uploadBtn.prop('disabled', false);
                    }
                }
            }

            // Remove image preview
            previewContainer.on('click', '.remove-image', function() {
                $(this).closest('.image-preview').remove();
                
                if (previewContainer.children().length === 0) {
                    uploadBtn.prop('disabled', true);
                }
            });

            // Form submission
            $('#galleryUploadForm').on('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const files = fileInput[0].files;
                
                if (files.length === 0) {
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Please select at least one image',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    return;
                }
                
                // Show progress bar
                $('#uploadProgress').show();
                const progressBar = $('.progress-bar');
                const progressText = $('#progressText');
                
                // Simulate upload progress (you'll replace this with actual AJAX upload)
                let progress = 0;
                const interval = setInterval(() => {
                    progress += 10;
                    progressBar.css('width', progress + '%');
                    progressText.text('Uploading... ' + progress + '%');
                    
                    if (progress >= 100) {
                        clearInterval(interval);
                        
                        // Submit the form (you might want to use AJAX instead)
                        this.submit();
                    }
                }, 200);
            });
        });
    </script>
@endsection