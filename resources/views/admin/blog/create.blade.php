@extends('admin.layouts.master')
@section('title')
    Blogs Add
@endsection

@section('css')
    <style>
        :root {
            --primary: #525ce5;
            --primary-light: #8e95f3ff;
            --secondary: #6c757d;
            --dark: #343a40;
            --light: #f8f9fa;
            --border: #dee2e6;
            --success: #28a745;
            --danger: #dc3545;
            --shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
            --shadow-lg: 0 1rem 3rem rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark);
        }

        .card {
            border: none;
            box-shadow: var(--shadow);
            border-radius: 0.75rem;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: var(--shadow-lg);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            border-bottom: none;
            padding: 1.5rem 2rem;
            color: white;
        }

        .card-body {
            padding: 2rem;
        }

        .page-title {
            font-weight: 700;
            font-size: 1.75rem;
            margin-bottom: 0.25rem;
            color: white!important;
        }

        .page-subtitle {
            font-size: 0.95rem;
            opacity: 0.9;
        }

        .btn-outline-primary {
            color: var(--primary);
            border-color: var(--primary);
            font-weight: 500;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            font-weight: 500;
            padding: 0.75rem 1.5rem;
        }

        .btn-primary:hover {
            background-color: #525ce5;
            border-color: #525ce5;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(241, 139, 43, 0.3);
        }

        .btn-outline-secondary {
            font-weight: 500;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(241, 139, 43, 0.25);
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .required::after {
            content: " *";
            color: var(--danger);
        }

        .note-editor.note-frame {
            border-radius: 0.5rem;
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .note-editor.note-frame .note-toolbar {
            background-color: var(--light);
            border-bottom: 1px solid var(--border);
            padding: 0.5rem;
        }

        .note-editor.note-frame .note-statusbar {
            background-color: var(--light);
            border-top: 1px solid var(--border);
        }

        .image-preview-container {
            margin-top: 1rem;
            text-align: center;
        }

        .image-preview {
            max-width: 100%;
            max-height: 300px;
            border-radius: 0.5rem;
            border: 2px dashed var(--border);
            padding: 0.5rem;
            display: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .form-text {
            color: var(--secondary);
            font-size: 0.85rem;
        }

        .sidebar-card {
            position: sticky;
            top: 2rem;
        }

        .featured-image-container {
            border: 2px dashed var(--border);
            border-radius: 0.5rem;
            padding: 1.5rem;
            text-align: center;
            background-color: var(--light);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .featured-image-container:hover {
            border-color: var(--primary);
            background-color: rgba(241, 139, 43, 0.05);
        }

        .featured-image-icon {
            font-size: 3rem;
            color: var(--secondary);
            margin-bottom: 1rem;
        }

        .status-badge {
            display: inline-block;
            padding: 0.35rem 0.75rem;
            border-radius: 50rem;
            font-size: 0.875rem;
            font-weight: 600;
        }

        .status-draft {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-published {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .form-section {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border);
        }

        .form-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--primary-light);
        }

        .action-buttons {
            background-color: var(--light);
            padding: 1.5rem;
            border-radius: 0.5rem;
            margin-top: 2rem;
        }

        .error-message {
            color: var(--danger);
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem;
            }

            .sidebar-card {
                margin-top: 2rem;
            }
        }
    </style>
@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="page-title mb-0">Create New Blog</h1>
                        </div>
                        <div>
                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-light">
                                <i class="fas fa-arrow-left me-2"></i> Back to Blogs
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="blogForm" action="{{ route('admin.blogs.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- Blog Content Section -->
                                    <div class="form-section">
                                        <h3 class="section-title">Blog Content</h3>

                                       <div class="mb-3">
                                            <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                                            <select class="form-control @error('category_id') is-invalid @enderror" 
                                                    id="category_id" name="category_id" required>
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" 
                                                        {{ old('category_id', $blog->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Title Field -->
                                        <div class="mb-4">
                                            <label for="title" class="form-label required">Blog Title</label>
                                            <input type="text"
                                                class="form-control form-control @error('title') is-invalid @enderror"
                                                id="title" name="title" placeholder="Enter an engaging blog title"
                                                value="{{ old('title') }}" required>
                                            @error('title')
                                                <div class="error-message">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Slug Field -->
                                        <div class="mb-4">
                                            <label for="slug" class="form-label required">Slug</label>
                                            <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                                id="slug" name="slug" placeholder="URL-friendly slug"
                                                value="{{ old('slug') }}" required>
                                            @error('slug')
                                                <div class="error-message">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Description Field -->
                                        <div class="mb-4">
                                            <label for="description" class="form-label required">Blog Description</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                                rows="4" placeholder="Write a compelling description that summarizes your blog post" required>{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="error-message">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Content Field with Summernote -->
                                        <div class="mb-4">
                                            <label for="content" class="form-label required">Blog Content</label>
                                            <textarea id="content" name="content" class="form-control summernote @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                                            @error('content')
                                                <div class="error-message">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Status Field -->
                                    <div class="mb-4">
                                        <label for="status" class="form-label">Status</label>
                                        <div class="d-flex align-items-center">
                                            <select class="form-control @error('status') is-invalid @enderror"
                                                name="status"  style="display:block!important;">
                                                <option value="draft"
                                                    {{ old('status', 'draft') == 'draft' ? 'selected' : '' }}>Draft
                                                </option>
                                                <option value="published"
                                                    {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                            </select>
                                           
                                        </div>
                                        @error('status')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Featured Image -->
                                    <div class="form-section">
                                        <h3 class="section-title">Featured Image</h3>

                                        <div class="mb-3">
                                            <div class="featured-image-container" id="imageUploadArea">
                                                <div class="featured-image-icon">
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                </div>
                                                <h5>Upload Featured Image</h5>
                                                <p class="text-muted">Drag & drop or click to browse</p>
                                                <input type="file" class="d-none" id="image" name="image"
                                                    accept="image/*">
                                                <button type="button" class="btn btn-outline-primary mt-2"
                                                    onclick="document.getElementById('image').click()">
                                                    <i class="fas fa-image me-1"></i> Select Image
                                                </button>
                                            </div>

                                            <div class="form-text mt-2 text-center">Recommended size: 1200x630 pixels. Max
                                                file size: 2MB.</div>

                                            <!-- Image Preview -->
                                            <div class="image-preview-container mt-3">
                                                <img id="imagePreview" class="image-preview" src="#"
                                                    alt="Image Preview">
                                            </div>
                                            @error('image')
                                                <div class="error-message text-center">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="action-buttons">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <button type="reset" class="btn btn-outline-secondary" id="resetBtn">
                                            <i class="fas fa-redo me-1"></i> Reset
                                        </button>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button type="button" class="btn btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i> Preview
                                        </button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save me-1"></i> Save Blog
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Initialize Summernote
            $('.summernote').summernote({
                height: 300,
                placeholder: 'Write your blog content here...',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            // Set initial status badge
            updateStatusBadge();

            // Image preview functionality
            $('#image').change(function() {
                const file = this.files[0];
                if (file) {
                    // Check file size (max 2MB)
                    if (file.size > 2 * 1024 * 1024) {
                        Swal.fire({
                            icon: 'error',
                            title: 'File Too Large',
                            text: 'Please select an image smaller than 2MB',
                            confirmButtonColor: '#f18b2b'
                        });
                        this.value = '';
                        return;
                    }

                    // Check file type
                    const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp', 'image/avif'];
                    if (!validTypes.includes(file.type)) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid File Type',
                            text: 'Please select a valid image (JPEG, PNG, JPG, WEBP ,AVIF)',
                            confirmButtonColor: '#f18b2b'
                        });
                        this.value = '';
                        return;
                    }

                    const reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result).show();
                        $('#imageUploadArea').hide();
                    }

                    reader.readAsDataURL(file);
                }
            });

            // Drag and drop for image upload
            const imageUploadArea = document.getElementById('imageUploadArea');
            const imageInput = document.getElementById('image');

            imageUploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.style.borderColor = 'var(--primary)';
                this.style.backgroundColor = 'rgba(241, 139, 43, 0.1)';
            });

            imageUploadArea.addEventListener('dragleave', function(e) {
                e.preventDefault();
                this.style.borderColor = 'var(--border)';
                this.style.backgroundColor = 'var(--light)';
            });

            imageUploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                this.style.borderColor = 'var(--border)';
                this.style.backgroundColor = 'var(--light)';

                if (e.dataTransfer.files.length) {
                    imageInput.files = e.dataTransfer.files;
                    const event = new Event('change', {
                        bubbles: true
                    });
                    imageInput.dispatchEvent(event);
                }
            });

            // Status badge update
            $('#status').change(function() {
                updateStatusBadge();
            });

            function updateStatusBadge() {
                const status = $('#status').val();
                const badge = $('#statusBadge');

                badge.removeClass('status-draft status-published');

                if (status === 'draft') {
                    badge.addClass('status-draft').text('Draft');
                } else {
                    badge.addClass('status-published').text('Published');
                }
            }

            // Auto-generate slug from title
            $('#title').on('blur', function() {
                if ($('#slug').val() === '') {
                    const slug = $(this).val()
                        .toLowerCase()
                        .replace(/[^\w ]+/g, '')
                        .replace(/ +/g, '-');
                    $('#slug').val(slug);
                }
            });

            // Form validation before submission
            $('#blogForm').on('submit', function(e) {
                // Basic validation
                const title = $('#title').val().trim();
                const slug = $('#slug').val().trim();
                const description = $('#description').val().trim();
                const content = $('.summernote').summernote('code').trim();

                if (title === '' || slug === '' || description === '' || content === '') {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'Missing Information',
                        text: 'Please fill in all required fields',
                        confirmButtonColor: '#f18b2b'
                    });
                    return false;
                }

                // Show loading state
                const submitBtn = $(this).find('button[type="submit"]');
                const originalText = submitBtn.html();
                submitBtn.prop('disabled', true).html(
                    '<i class="fas fa-spinner fa-spin me-1"></i> Saving...');
            });

            // Reset form
            $('#resetBtn').on('click', function() {
                $('.summernote').summernote('code', '');
                $('#imagePreview').hide();
                $('#imageUploadArea').show();
                updateStatusBadge();
            });
        });
    </script>
@endsection
