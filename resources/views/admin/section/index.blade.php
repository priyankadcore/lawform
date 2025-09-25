@extends('admin.layouts.master')
@section('title')
    Section Template
@endsection

@section('css')
    <style>
        .template-type-badge {
            display: inline-block;
            padding: 4px 10px;
            font-size: 12px;
            font-weight: 500;
            color: #0d6efd;
            background-color: #e7f1ff;
            border: 1px solid #b6d4fe;
            border-radius: 20px;
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
                                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Template Grid View -->
                        <div class="row mt-4" id="templatesGrid">
                            @foreach ($templates as $template)
                                <div class="col-xl-4 col-lg-6 col-md-6 mb-4 template-item"
                                    data-type="{{ $template->section_type_id }}">
                                    <div class="card template-card shadow-lg p-3 mb-5 bg-body rounded">
                                        <!-- Template Image -->
                                        <div class="template-image-container">
                                            @if ($template->image)
                                                <img src="{{ asset('storage/' . $template->image) }}" class="template-image"
                                                    alt="{{ $template->name }}">
                                            @else
                                                <div class="template-image-placeholder">
                                                    <i class="mdi mdi-view-dashboard"></i>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Template Content -->
                                        <div class="template-content">
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <h4 class="card-title mb-0">{{ $template->title }}</h4>

                                            </div>
                                            <p class="template-type-badge">
                                                {{ $template->sectionType->name ?? 'Unknown' }}
                                            </p> - {{ $template->style_variant }}
                                        </div>

                                        <!-- Template Footer -->
                                        <div class="template-footer d-flex justify-content-between align-items-center">
                                            <small class="text-muted">
                                                Created: {{ $template->created_at->format('M d, Y') }}
                                            </small>
                                            <div>
                                                <button class="btn btn-sm btn-outline-primary edit-btn"
                                                    data-id="{{ $template->id }}">
                                                    <i class="mdi mdi-pencil"></i>
                                                </button>

                                                <button class="btn btn-sm btn-outline-danger delete-btn"
                                                    data-id="{{ $template->id }}">
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
                                <label for="templateName" class="form-label">Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="templateName" name="title" required
                                    placeholder="e.g., Hero Banner Dark">
                                @error('ttle')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="sectionType" class="form-label">Section Type <span
                                        class="text-danger">*</span></label>
                                <select class="form-select" id="sectionType" name="section_type_id" required>
                                    <option value="">Select Section Type</option>
                                    @foreach ($sectionTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                                @error('section_type_id')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="styleVariant" class="form-label">Style Variant</label>
                                <input type="text" class="form-control" id="styleVariant" name="style_variant"
                                    placeholder="e.g., Style 1, Style 2">
                                @error('style_variant')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Image Upload (Max: 2MB)</label>
                                <input type="file" class="form-control" id="templateImage" name="image"
                                    accept="image/*">
                                <img id="templateImagePreview" class="image-preview">
                                @error('image')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="col-md-12 mb-3">
                                <label class="form-label">Fields <span class="text-danger">*</span></label>
                                <input type="text" name="fields" class="form-control"
                                    placeholder="title,description,image" required>
                            </div> --}}
                             <div class="col-12 mb-3">
                                    <h5 class="form-label">Fields </h5>
                                    <hr>
                                    <div id="fieldsContainer">
                                        <div class="field-row">
                                            <div class="row">
                                                <div class="col-md-4 mb-2">
                                                    <label class="form-label">Key <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control field-key" name="fields[0][key]" required placeholder="e.g., title">
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <label class="form-label">Label <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control field-label" name="fields[0][label]" required placeholder="e.g., Title">
                                                </div>
                                                <div class="col-md-3 mb-2">
                                                    <label class="form-label">Type <span class="text-danger">*</span></label>
                                                     <input type="text" class="form-control field-type" name="fields[0][type]" required placeholder="e.g., Type">
                                                </div>
                                                <div class="col-md-1 mb-2 d-flex align-items-end">
                                                    <button type="button" class="btn btn-danger btn-sm remove-field-btn" disabled>
                                                        <i class="mdi mdi-trash-can"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm add-field-btn">
                                        <i class="bi bi-plus"></i> Add Field
                                    </button>
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
    <div class="modal fade" id="editTemplateModal" tabindex="-1" aria-labelledby="editTemplateModalLabel"
        aria-hidden="true">
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
                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" id="editTemplateName"
                                    required>
                                @error('ttle')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Section Type *</label>
                                <select class="form-select" name="section_type_id" id="editSectionType" required>
                                    <option value="">Select Section Type</option>
                                    @foreach ($sectionTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('section_type_id')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Style Variant</label>
                                <input type="text" class="form-control" name="style_variant" id="editStyleVariant">
                                @error('style_variant')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Image Upload (Max: 2MB)</label>
                                <input type="file" class="form-control" name="image" id="editTemplateImage"
                                    accept="image/*">
                                <div class="mt-2">
                                    <strong>Current Image:</strong>
                                    <div id="currentImageContainer" class="mt-1"></div>
                                </div>
                                <img id="editTemplatePreview" class="image-preview mt-2">
                                @error('image')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Fields <span class="text-danger">*</span></label>
                                <input type="text" name="fields" class="form-control"
                                    placeholder="title,description,image" id="editfields">
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
                        .then(response => response.json())
                        .then(template => {
                            // Fill form with template data
                            document.getElementById('editTemplateName').value = template
                                .title || '';
                            document.getElementById('editSectionType').value = template
                                .section_type_id || '';
                            document.getElementById('editStyleVariant').value = template
                                .style_variant || '';
                            let fieldsValue = '';
                            try {
                                fieldsValue = JSON.parse(template.fields).join(', ');
                            } catch (e) {
                                fieldsValue = template.fields || '';
                            }
                            document.getElementById('editfields').value = fieldsValue;


                            // Show current image
                            const currentImageContainer = document.getElementById(
                                'currentImageContainer');
                            if (template.image) {
                                currentImageContainer.innerHTML = `
                                    <img src="/storage/${template.image}" class="image-preview" style="max-width: 150px;">
                                    <small class="text-muted d-block mt-1">Current image</small>
                                `;

                            } else {
                                currentImageContainer.innerHTML =
                                    '<span class="text-muted">No image</span>';
                            }

                            // Update form action
                            document.getElementById('editTemplateForm').action =
                                `/admin/section_template/${templateId}`;

                            // Show modal
                            const editModal = new bootstrap.Modal(document.getElementById(
                                'editTemplateModal'));
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
                            bootstrap.Modal.getInstance(document.getElementById('editTemplateModal'))
                                .hide();
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
                    const templateName = this.closest('.template-item').querySelector('.card-title')
                        .textContent;

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
                                            title: data.message ||
                                                'Error deleting template!',
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Image preview functionality
            const imageInput = document.getElementById('templateImage');
            const imagePreview = document.getElementById('templateImagePreview');
            
            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.style.display = 'none';
                }
            });
            
            // Dynamic field management
            let fieldCount = 1;
            const fieldsContainer = document.getElementById('fieldsContainer');
            const addFieldBtn = document.querySelector('.add-field-btn');
            
            addFieldBtn.addEventListener('click', function() {
                const newFieldRow = document.createElement('div');
                newFieldRow.className = 'field-row';
                newFieldRow.innerHTML = `
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label class="form-label">Key <span class="text-danger">*</span></label>
                            <input type="text" class="form-control field-key" name="fields[${fieldCount}][key]" required placeholder="e.g., description">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label class="form-label">Label <span class="text-danger">*</span></label>
                            <input type="text" class="form-control field-label" name="fields[${fieldCount}][label]" required placeholder="e.g., Description">
                        </div>
                        <div class="col-md-3 mb-2">
                            <label class="form-label">Type <span class="text-danger">*</span></label>
                            <input type="text" class="form-control field-type" name="fields[${fieldCount}][type ]" required placeholder="e.g., Type">
                        </div>
                        <div class="col-md-1 mb-2 d-flex align-items-end">
                            <button type="button" class="btn btn-danger btn-sm remove-field-btn">
                               <i class="mdi mdi-trash-can"></i>
                            </button>
                        </div>
                    </div>
                `;
                
                fieldsContainer.appendChild(newFieldRow);
                fieldCount++;
                
                if (fieldCount > 1) {
                    document.querySelectorAll('.remove-field-btn')[0].disabled = false;
                }
            });
            
            fieldsContainer.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-field-btn') || 
                    e.target.parentElement.classList.contains('remove-field-btn')) {
                    
                    const btn = e.target.classList.contains('remove-field-btn') ? 
                               e.target : e.target.parentElement;
                    const fieldRow = btn.closest('.field-row');
                    
                    if (fieldsContainer.children.length > 1) {
                        fieldRow.remove();
                        fieldCount--;
                        
                        // Re-index the fields
                        const fieldRows = fieldsContainer.querySelectorAll('.field-row');
                        fieldRows.forEach((row, index) => {
                            const inputs = row.querySelectorAll('input, select');
                            inputs.forEach(input => {
                                const name = input.getAttribute('name');
                                if (name) {
                                    input.setAttribute('name', name.replace(/\[\d+\]/, `[${index}]`));
                                }
                            });
                        });
                        
                        // Disable remove button for the first field if there's only one
                        if (fieldCount === 1) {
                            document.querySelectorAll('.remove-field-btn')[0].disabled = true;
                        }
                    }
                }
            });
            
            // Form submission
            document.getElementById('templateForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Basic validation
                const title = document.getElementById('templateName').value;
                const sectionType = document.getElementById('sectionType').value;
                
                if (!title || !sectionType) {
                    alert('Please fill in all required fields.');
                    return;
                }
                
                // Validate that at least one field is added
                const fieldRows = fieldsContainer.querySelectorAll('.field-row');
                let validFields = true;
                
                fieldRows.forEach(row => {
                    const key = row.querySelector('.field-key').value;
                    const label = row.querySelector('.field-label').value;
                    const type = row.querySelector('.field-type').value;
                    
                    if (!key || !label || !type) {
                        validFields = false;
                    }
                });
                
                if (!validFields) {
                    alert('Please fill in all field properties.');
                    return;
                }
                
                // Prepare data for submission
                const formData = new FormData(this);
                
                // Convert fields to the format you want
                const fields = [];
                fieldRows.forEach((row, index) => {
                    const key = row.querySelector('.field-key').value;
                    const label = row.querySelector('.field-label').value;
                    const type = row.querySelector('.field-type').value;
                    
                    fields.push({ key, label, type });
                });
                
                // Add fields as a JSON string to the form data
                formData.append('fields_json', JSON.stringify(fields));
                
                // Here you would typically send the form data to the server
                console.log('Form data:', Object.fromEntries(formData));
                console.log('Fields array:', fields);
                
                alert('Template saved successfully! (Check console for data)');
            });
        });
    </script>
@endsection
