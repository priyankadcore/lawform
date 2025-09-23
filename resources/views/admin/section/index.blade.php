@extends('admin.layouts.master')
@section('title', 'Section')
@section('css')
    <link href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .property-type-img {
            max-width: 80px;
            max-height: 60px;
            border-radius: 4px;
            object-fit: cover;
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
            border: 1px solid #e9ecef;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .template-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        .template-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #6c757d;
        }
        .template-badge {
            font-size: 0.75rem;
        }
        .search-box {
            max-width: 400px;
        }
        .filter-badge {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .filter-badge.active {
            background-color: #0d6efd !important;
            color: white !important;
        }
        .template-image {
            height: 120px;
            object-fit: cover;
            border-bottom: 1px solid #e9ecef;
        }
        .template-image-placeholder {
            height: 120px;
            background: linear-gradient(45deg, #f8f9fa, #e9ecef);
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid #e9ecef;
            color: #6c757d;
        }
        .template-image-placeholder i {
            font-size: 2rem;
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
                            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addTemplateModal">
                                <i class="mdi mdi-plus-circle me-1"></i> Add Template
                            </button>
                            <a href="{{ route('admin.section_types.type') }}" class="btn btn-outline-primary">
                                <i class="mdi mdi-plus-circle me-1"></i> Add Section Type
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body pt-0">
                        <!-- Search and Filter Section -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="mdi mdi-magnify"></i></span>
                                    <input type="text" class="form-control" placeholder="Search by name, type, or style..." id="searchTemplates">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center justify-content-end">
                                    <label for="filterSectionType" class="me-2 text-muted">Filter by Type:</label>
                                    <select id="filterSectionType" class="form-select form-select-sm w-auto">
                                        <option value="all" selected>All Types</option>
                                        @foreach($sectionTypes as $type)
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
                                <div class="card template-card h-100">
                                    <!-- Template Image -->
                                    @if($template->image)
                                        <img src="{{ asset('storage/' . $template->image) }}" class="template-image" alt="{{ $template->name }}">
                                    @else
                                        <div class="template-image-placeholder">
                                            <i class="{{ $template->icon ?: 'mdi mdi-view-dashboard' }}"></i>
                                        </div>
                                    @endif
                                    
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div class="template-icon">
                                                <i class="{{ $template->icon ?: 'mdi mdi-view-dashboard' }}"></i>
                                            </div>
                                            <span class="badge template-badge bg-{{ $template->status ? 'success' : 'secondary' }}">
                                                {{ $template->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </div>
                                        
                                        <h5 class="card-title mb-2">{{ $template->name }}</h5>
                                        <p class="text-muted small mb-3">
                                            <strong>Type:</strong> 
                                            <span class="template-type">{{ $template->sectionType->name ?? 'Unknown' }}</span> - 
                                            <strong>Style:</strong> <span class="template-style">{{ $template->style_variant }}</span>
                                        </p>
                                        
                                        <p class="card-text text-muted small mb-3">
                                            {{ $template->description ?: 'No description available' }}
                                        </p>
                                        
                                        <div class="mb-3">
                                            <span class="badge bg-light text-dark template-badge">
                                                <strong>Config Schema:</strong> {{ $template->config_properties ?? 0 }} properties
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            Created: {{ $template->created_at->format('M d, Y') }}
                                        </small>
                                        <div>
                                           <button class="btn btn-sm btn-outline-primary edit-btn" data-id="{{ $template->id }}" data-bs-toggle="modal" data-bs-target="#editTemplateModal">
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
                <form action="{{ route('admin.section_template.save') }}" method="POST" enctype="multipart/form-data" id="templateForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="templateName" class="form-label">Template Name *</label>
                                <input type="text" class="form-control" id="templateName" name="name" required placeholder="e.g., About - Style 1">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="sectionType" class="form-label">Section Type *</label>
                                <select class="form-select" id="sectionType" name="section_type_id" required>
                                    <option value="">Select Section Type</option>
                                    @foreach($sectionTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="styleVariant" class="form-label">Style Variant *</label>
                                <input type="text" class="form-control" id="styleVariant" name="style_variant" required placeholder="e.g., Style 1, Variant A">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="templateIcon" class="form-label">Icon Class</label>
                                <input type="text" class="form-control" id="templateIcon" name="icon" placeholder="e.g., mdi mdi-account">
                                <div class="form-text">Use Material Design Icons class names</div>
                            </div>
                            
                            <div class="col-12 mb-3">
                                <label for="templateDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="templateDescription" name="description" rows="3" placeholder="Brief description of this template..."></textarea>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="configProperties" class="form-label">Config Properties</label>
                                <input type="number" class="form-control" id="configProperties" name="config_properties" value="1" min="0">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="templateImage" class="form-label">Preview Image</label>
                                <input class="form-control" type="file" id="templateImage" name="image" accept="image/*">
                                <div class="form-text">Recommended size: 400x300px</div>
                            </div>
                            
                            <div class="col-12 mb-3">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="templateStatus" name="status" checked>
                                    <label class="form-check-label" for="templateStatus">Active Template</label>
                                </div>
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
                    <div class="modal-body row">
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
                            <label class="form-label">Style Variant *</label>
                            <input type="text" class="form-control" name="style_variant" id="editStyleVariant" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Icon Class</label>
                            <input type="text" class="form-control" name="icon" id="editTemplateIcon">
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="editTemplateDescription"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Config Properties</label>
                            <input type="number" class="form-control" name="config_properties" id="editConfigProperties">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Preview Image</label>
                            <input type="file" class="form-control" name="image">
                            <img id="editTemplatePreview" class="mt-2" style="max-width:120px;">
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="editTemplateStatus" name="status">
                                <label class="form-check-label" for="editTemplateStatus">Active</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Template</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Search functionality
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
                
                // Show/hide empty state
                if (visibleCount === 0) {
                    emptyState.classList.remove('d-none');
                } else {
                    emptyState.classList.add('d-none');
                }
            }
            
            // Search input event
            searchInput.addEventListener('input', filterTemplates);
            
            // Filter by type select
            filterSectionType.addEventListener('change', filterTemplates);
            
            // Quick filter badges
            const filterBadges = document.querySelectorAll('.filter-badge');
            filterBadges.forEach(badge => {
                badge.addEventListener('click', function() {
                    const type = this.getAttribute('data-type');
                    
                    // Update active state
                    filterBadges.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Update select dropdown
                    filterSectionType.value = type;
                    
                    // Filter templates
                    filterTemplates();
                });
            });
            
            // Sync select dropdown with badges
            filterSectionType.addEventListener('change', function() {
                const selectedType = this.value;
                
                // Update active badge
                filterBadges.forEach(badge => {
                    badge.classList.remove('active');
                    if (badge.getAttribute('data-type') === selectedType) {
                        badge.classList.add('active');
                    }
                });
            });
            
            // Delete template functionality
            document.querySelectorAll('.delete-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const templateId = this.getAttribute('data-id');
                    const templateName = this.closest('.template-item').querySelector('.card-title').textContent;
                    
                    Swal.fire({
                        title: 'Are you sure?',
                        text: `You are about to delete "${templateName}"`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // AJAX request to delete template
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
                                        title: 'Template deleted successfully!',
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true
                                    });
                                    
                                    // Remove template from DOM
                                    this.closest('.template-item').remove();
                                    
                                    // Check if any templates left
                                    filterTemplates();
                                }
                            })
                            .catch(error => {
                                Swal.fire({
                                    toast: true,
                                    icon: 'error',
                                    title: 'Error deleting template!',
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true
                                });
                            });
                        }
                    });
                });
            });
            
            // SweetAlert notifications
            @if(session('success'))
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

            @if(session('error'))
                Swal.fire({
                    toast: true,
                    icon: 'error',
                    title: "{{ session('error') }}",
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            @endif
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle Edit Button
            document.querySelectorAll('.edit-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const templateId = this.dataset.id;
                    fetch(`/admin/section_template/${templateId}/edit`)
                        .then(res => res.json())
                        .then(data => {
                            // Fill form
                            document.getElementById('editTemplateName').value = data.name;
                            document.getElementById('editSectionType').value = data.section_type_id;
                            document.getElementById('editStyleVariant').value = data.style_variant;
                            document.getElementById('editTemplateIcon').value = data.icon || '';
                            document.getElementById('editTemplateDescription').value = data.description || '';
                            document.getElementById('editConfigProperties').value = data.config_properties || 0;
                            document.getElementById('editTemplateStatus').checked = data.status == 1;

                            // Preview image
                            if (data.image) {
                                document.getElementById('editTemplatePreview').src = `/storage/${data.image}`;
                                document.getElementById('editTemplatePreview').style.display = 'block';
                            } else {
                                document.getElementById('editTemplatePreview').style.display = 'none';
                            }

                            // Update form action
                            document.getElementById('editTemplateForm').action = `/admin/section_template/${templateId}`;

                            // Show modal
                            new bootstrap.Modal(document.getElementById('editTemplateModal')).show();
                        });
                });
            });

            // Delete already handled in your code (just confirm AJAX call)
        });

    </script>
@endsection