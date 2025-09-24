@extends('admin.layouts.master')
@section('title')
    Section Template
@endsection

@section('css')
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
        .template-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #000000ff;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            height: 100%;
        }

        .template-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .template-image-container {
            height: 180px;
            overflow: hidden;
            position: relative;
            border-bottom: 1px solid #e9ecef;
        }

        .template-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .template-card:hover .template-image {
            transform: scale(1.05);
        }

        .template-image-placeholder {
            height: 180px;
            background: linear-gradient(45deg, #f8f9fa, #e9ecef);
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid #e9ecef;
            color: #6c757d;
        }

        .template-image-placeholder i {
            font-size: 3rem;
        }

        .template-content {
            padding: 1.25rem;
            flex: 1;
        }

        .template-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
            padding: 0.75rem 1.25rem;
        }

        .image-preview {
            max-width: 329px;
            max-height: 150px;
            object-fit: cover;
            /* border-radius: 4px; */
            /* margin-top: 8px; */
            display: none;
        }

        .swal2-toast {
            font-size: 12px !important;
            padding: 6px 10px !important;
            min-width: auto !important;
            width: 220px !important;
            line-height: 1.3em !important;
        }
    </style>
@endsection

@section('content')
    <x-breadcrub pagetitle="Admin" subtitle="Section" title="Section Template" />

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="card-title mb-0">Section Templates</h4>
                            <p class="text-muted mb-0">View all section templates ({{ $templates->count() }} total)</p>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                                data-bs-target="#addTemplateModal">
                                <i class="mdi mdi-plus-circle me-1"></i> Add Template
                            </button>
                            <a href="{{ route('admin.section_types.type') }}" class="btn btn-outline-primary">
                                <i class="mdi mdi-format-list-bulleted-type me-1"></i> Manage Section Types
                            </a>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <!-- Search and Filter Section -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="mdi mdi-magnify"></i></span>
                                    <input type="text" class="form-control"
                                        placeholder="Search by name, type, or style..." id="searchTemplates">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center justify-content-end">
                                    <label for="filterSectionType" class="me-2 text-muted">Filter by Type:</label>
                                    <select id="filterSectionType" class="form-select form-select-sm w-auto">
                                        <option value="all" selected>All Types</option>
                                        @foreach ($sectionTypes as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Template Grid View -->
                        <div class="row mt-4" id="templatesGrid">
                            @foreach($templates as $template)
                            <div class="col-xl-4 col-lg-6 col-md-6 mb-4 template-item" data-type="{{ $template->section_type_id }}">
                                <div class="card template-card shadow-lg p-3 mb-5 bg-body rounded">
                                    <!-- Template Image -->
                                    <div class="template-image-container">
                                        @if($template->image)
                                            <img src="{{ asset('storage/' . $template->image) }}" class="template-image" alt="{{ $template->name }}">
                                        @else
                                            <div class="template-image-placeholder">
                                                <i class="mdi mdi-view-dashboard"></i>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <!-- Template Content -->
                                    <div class="template-content">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <h5 class="card-title mb-0">{{ $template->name }}</h5>
                                            <span class="badge bg-{{ $template->status ? 'success' : 'secondary' }}">
                                                {{ $template->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </div>
                                        
                                        <p class="text-muted small mb-2">
                                            <strong>Type:</strong> 
                                            <span class="template-type">{{ $template->sectionType->name ?? 'Unknown' }}</span>
                                        </p>
                                        <p class="text-muted small mb-3">
                                            <strong>Style:</strong> <span class="template-style">{{ $template->style_variant }}</span>
                                        </p>
                                        
                                        {{-- <p class="card-text text-muted small mb-3">
                                            {{ Str::limit($template->description, 100) ?: 'No description available' }}
                                        </p> --}}
                                        
                                        <div class="mb-2">
                                            <span class="badge bg-light text-dark">
                                                <strong>Config Schema:</strong> {{ $template->config_properties ?? 0 }} properties
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <!-- Template Footer -->
                                    <div class="template-footer d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            Created: {{ $template->created_at->format('M d, Y') }}
                                        </small>
                                        <div>
                                            <button class="btn btn-sm btn-outline-primary edit-btn" data-id="{{ $template->id }}">
                                                <i class="mdi mdi-pencil"></i>
                                            </button>
                                           
                                            <button class="btn btn-sm btn-outline-danger delete-btn" data-id="{{ $template->id }}">
                                                <i class="mdi mdi-trash-can"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- Empty State -->
                        <div class="text-center py-5 d-none" id="emptyState">
                            <i class="mdi mdi-inbox-outline display-4 text-muted"></i>
                            <h5 class="text-muted mt-3">No templates found</h5>
                            <p class="text-muted">Try adjusting your search or filter criteria</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Template Modal -->
    <div class="modal fade" id="addTemplateModal" tabindex="-1" aria-labelledby="addTemplateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTemplateModalLabel">Add New Template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.section_template.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="templateName" class="form-label">Title   *</label>
                                <input type="text" class="form-control" id="templateName" name="title" required
                                    placeholder="e.g., Hero Banner Dark" >
                                @error('ttle')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="sectionType" class="form-label">Section Type *</label>
                                <select class="form-select" id="sectionType" name="section_type_id" required>
                                    <option value="">Select Section Type</option>
                                    @foreach ($sectionTypes as $type)
                                        <option value="{{ $type->id }}" >{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('section_type_id')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="styleVariant" class="form-label">Style Variant</label>
                                <input type="text" class="form-control" id="styleVariant" name="style_variant"
                                     placeholder="e.g., Style 1, Style 2" >
                                @error('style_variant')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Image Upload (Max: 2MB)</label>
                                <input type="file" class="form-control" id="templateImage" 
                                    name="image" accept="image/*">
                                <img id="templateImagePreview" class="image-preview">
                                @error('image')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Fields </label>
                                <input type="text" name="fields" class="form-control" placeholder="title,description,image">
                            </div>

                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Template</button>
                    </div>
                </form>
               

            </div>
        </div>
    </div>

    <!-- Edit Template Modal -->
    <div class="modal fade" id="editTemplateModal" tabindex="-1" aria-labelledby="editTemplateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="editTemplateForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title" id="editTemplateModalLabel">Edit Template</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Template Name *</label>
                                <input type="text" class="form-control" name="name" id="editTemplateName" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Section Type *</label>
                                <select class="form-select" name="section_type_id" id="editSectionType" required>
                                    <option value="">Select Section Type</option>
                                    @foreach($sectionTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Style Variant</label>
                                <input type="text" class="form-control" name="style_variant" id="editStyleVariant">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Config Properties</label>
                                <input type="number" class="form-control" name="config_properties" id="editConfigProperties" min="0">
                            </div>
                            
                            <div class="col-12 mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="editTemplateDescription" rows="3"></textarea>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Image Upload (Max: 2MB)</label>
                                <input type="file" class="form-control" name="image" id="editTemplateImage" accept="image/*">
                                <div class="mt-2">
                                    <strong>Current Image:</strong>
                                    <div id="currentImageContainer" class="mt-1"></div>
                                </div>
                                <img id="editTemplatePreview" class="image-preview mt-2">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check form-switch mt-2">
                                    <input type="hidden" name="status" value="0">
                                    <input class="form-check-input" type="checkbox" id="editTemplateStatus" name="status" value="1">

                                    {{-- <input class="form-check-input" type="checkbox" id="editTemplateStatus" name="status"> --}}
                                    <label class="form-check-label" for="editTemplateStatus">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Template</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image preview functionality
            function setupImagePreview(inputId, previewId) {
                const input = document.getElementById(inputId);
                const preview = document.getElementById(previewId);
                
                if (input && preview) {
                    input.addEventListener('change', function(e) {
                        const file = e.target.files[0];
                        if (file) {
                            if (file.size > 2 * 1024 * 1024) {
                                Swal.fire({
                                    toast: true,
                                    icon: 'error',
                                    title: 'Image size must be less than 2MB',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                input.value = '';
                                preview.style.display = 'none';
                                return;
                            }
                            
                            preview.src = URL.createObjectURL(file);
                            preview.style.display = 'block';
                        } else {
                            preview.src = '';
                            preview.style.display = 'none';
                        }
                    });
                }
            }

            // Setup image previews
            setupImagePreview('templateImage', 'templateImagePreview');
            setupImagePreview('editTemplateImage', 'editTemplatePreview');

            // Search and filter functionality
            const searchInput = document.getElementById('searchTemplates');
            const filterSectionType = document.getElementById('filterSectionType');
            const templateItems = document.querySelectorAll('.template-item');
            const emptyState = document.getElementById('emptyState');

            function filterTemplates() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedType = filterSectionType.value;
                let visibleCount = 0;

                templateItems.forEach(item => {
                    const templateText = item.textContent.toLowerCase();
                    const templateType = item.getAttribute('data-type');

                    const matchesSearch = searchTerm === '' || templateText.includes(searchTerm);
                    const matchesType = selectedType === 'all' || selectedType === templateType;

                    if (matchesSearch && matchesType) {
                        item.style.display = 'block';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });

                if (visibleCount === 0) {
                    emptyState.classList.remove('d-none');
                } else {
                    emptyState.classList.add('d-none');
                }
            }

            searchInput.addEventListener('input', filterTemplates);
            filterSectionType.addEventListener('change', filterTemplates);

            // Edit template functionality
            document.querySelectorAll('.edit-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const templateId = this.getAttribute('data-id');
                    
                    fetch(`/admin/section_template/${templateId}/edit`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(template => {
                            // Fill form with template data
                            document.getElementById('editTemplateName').value = template.name || '';
                            document.getElementById('editSectionType').value = template.section_type_id || '';
                            document.getElementById('editStyleVariant').value = template.style_variant || '';
                            document.getElementById('editTemplateDescription').value = template.description || '';
                            document.getElementById('editConfigProperties').value = template.config_properties || 1;
                            document.getElementById('editTemplateStatus').checked = template.status == 1;

                            // Show current image
                            const currentImageContainer = document.getElementById('currentImageContainer');
                            if (template.image) {
                                currentImageContainer.innerHTML = `
                                    <img src="/storage/${template.image}" class="image-preview" style="display: block;">
                                    <small class="text-muted d-block mt-1">Current image</small>
                                `;
                            } else {
                                currentImageContainer.innerHTML = '<span class="text-muted">No image</span>';
                            }

                            // Update form action
                            document.getElementById('editTemplateForm').action = `/admin/section_template/${templateId}`;
                            // Show modal
                            const editModal = new bootstrap.Modal(document.getElementById('editTemplateModal'));
                            editModal.show();
                        })
                        .catch(error => {
                            console.error('Error fetching template:', error);
                            Swal.fire({
                                toast: true,
                                icon: 'error',
                                title: 'Error loading template data',
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        });
                });
            });

            // Handle edit form submission
            document.getElementById('editTemplateForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const url = this.action;
                
                fetch(url, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: data.message,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        
                        // Close modal and reload page
                        bootstrap.Modal.getInstance(document.getElementById('editTemplateModal')).hide();
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        Swal.fire({
                            toast: true,
                            icon: 'error',
                            title: data.message,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                })
                .catch(error => {
                    console.error('Error updating template:', error);
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Error updating template',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                });
            });

            // Delete template functionality
            document.querySelectorAll('.delete-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const templateId = this.getAttribute('data-id');
                    const templateName = this.closest('.template-item').querySelector('.card-title').textContent;

                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You are about to delete "${templateName}". This action cannot be undone.`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/admin/section_template/${templateId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Content-Type': 'application/json'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        toast: true,
                                        icon: 'success',
                                        title: data.message,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });

                                    // Remove template from DOM
                                    this.closest('.template-item').remove();

                                    // Check if any templates left
                                    filterTemplates();
                                } else {
                                    Swal.fire({
                                        toast: true,
                                        icon: 'error',
                                        title: data.message || 'Error deleting template!',
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Error deleting template:', error);
                                Swal.fire({
                                    toast: true,
                                    icon: 'error',
                                    title: 'Error deleting template!',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            });
                        }
                    });
                });
            });

            // SweetAlert notifications
            @if (session('success'))
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    title: "{{ session('success') }}",
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    toast: true,
                    icon: 'error',
                    title: "{{ session('error') }}",
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            @endif

            // Show add modal if there are validation errors
            @if ($errors->any() && old('_token'))
                document.addEventListener('DOMContentLoaded', function() {
                    const addModal = new bootstrap.Modal(document.getElementById('addTemplateModal'));
                    addModal.show();
                });
            @endif
        });
    </script>
@endsection