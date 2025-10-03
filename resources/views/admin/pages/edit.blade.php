@extends('admin.layouts.master')
@section('title')
    Add Pages
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('css')
    <link href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet">
    <style>
        .selected-image {
            box-shadow: 0 0 0 4px #198754; /* Bootstrap success green */
            transition: box-shadow 0.3s ease;
        }
        /* Space between breadcrumb and card */
        .page-content-wrapper {
            margin-top: 20px;
        }

        /* Card styling */
        .card {
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            background-color: #fff;
            border: none;
            margin-bottom: 20px;
        }

        /* Card header styling */
        .card-header {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            border-radius: 10px 10px 0 0 !important;
            padding: 15px 20px;
            border-bottom: none;
        }

        /* Align and space the top row */
        .row.mb-3.align-items-center {
            margin-bottom: 30px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        /* Dropdown width */
        #pageDropdown {
            max-width: 100%;
            margin: 0 auto;
            border-radius: 6px;
            border: 1px solid #ced4da;
            padding: 10px 15px;
        }

        /* Button styling */
        .btn {
            border-radius: 6px;
            padding: 10px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: #2575fc;
            border: none;
        }

        .btn-success {
            background: linear-gradient(135deg, #00b09b 0%, #96c93d 100%);
            border: none;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        /* Button spacing fix */
        .btn+.btn {
            margin-left: 10px;
        }

        /* Modal styling */
        .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            color: rgb(24, 23, 23);
            border-radius: 12px 12px 0 0;
            border-bottom: none;
        }

        .modal-header .btn-close {
            color: black
        }

        /* Form styling */
        .form-control,
        .form-select {
            border-radius: 6px;
            padding: 10px 15px;
            border: 1px solid #e1e5eb;
            transition: all 0.3s;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 0 0.2rem rgba(106, 17, 203, 0.15);
        }

        /* Table styling */
        .table-container {
            margin-top: 30px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .table thead th {
            background: rgb(231 229 244);
            color: rgb(0, 0, 0);
            border: none;
            /* padding: 15px; */
            font-weight: 600;
        }

        .table tbody td {
            /* padding: 12px 15px; */
            vertical-align: middle;
            border-color: #f1f3f4;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .table tbody tr:hover {
            background-color: #f1f5f9;
        }

        /* Status badges */
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }

        .badge.bg-success {
            background: linear-gradient(135deg, #00b09b 0%, #96c93d 100%) !important;
        }

        .badge.bg-warning {
            background: linear-gradient(135deg, #f46b45 0%, #eea849 100%) !important;
            color: white;
        }

        /* Action buttons */
        .action-btns .btn {
            padding: 6px 10px;
            margin: 0 3px;
            border-radius: 4px;
        }

        /* Property image style, from original */
        .property-image {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }

        /* Swal toast style, from original */
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

        /* Section styling */
        .section-title {
            font-size: 18px;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f1f3f4;
        }
    </style>
@endsection

@section('content')
    <x-breadcrub pagetitle="Admin" subtitle="Pages" title="Add pages" />

    <div class="container-fluid">
        <!-- Page Management Card -->
        <div class="card">

            <div class="card-body p-0">
                <div class="row mb-3 align-items-center">
                    <!-- Left: Add Pages Button -->
                    <div class="col-sm-3 text-sm-start">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addPageModal">
                            <i class="mdi mdi-plus-circle me-1"></i> Add Page
                        </button>
                    </div>

                    <!-- Center: Pages Dropdown -->
                    <div class="col-sm-6 text-center">
                        <select class="form-select" id="pageDropdown">
                            <option value="">Select Page</option>
                            @foreach ($pages as $page)
                                <option value="{{ $page->id }}">{{ $page->name }}</option>
                            @endforeach
                        </select>
                    </div>



                    <!-- Right: Add Section Button -->
                    <div class="col-sm-3 text-sm-end">
                        <button type="button" id="addSectionBtn" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#sectionModal" disabled>
                            <i class="mdi mdi-view-grid-plus-outline me-1"></i> Add Section
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pages Table Card -->
        <div class="card p-0 table-container">
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table table-hover datatable" style="background-color: white !important;">
                        <thead>
                            <tr>
                                <th>Section Type</th>
                                <th>Style</th>
                                <th>Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="sectionsTableBody">
                            <tr>
                                <td colspan="5" class="text-center">Please select a page to view its sections.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add Page Modal -->
        <div class="modal fade" id="addPageModal" tabindex="-1" aria-labelledby="addPageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('admin.pages.store') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-black" id="addPageModalLabel">Add New Page</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="pageName" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="pageName" required
                                        placeholder="Enter page name">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="pageSlug" class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control" id="pageSlug" required
                                        placeholder="eg - /page-name-example">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="pageStatus" class="form-label">Status</label>
                                    <select name="status" class="form-select" id="pageStatus" required>
                                        <option value="draft">Draft</option>
                                        <option value="published">Published</option>
                                    </select>
                                </div>
                            </div>
                            <h5 class="mt-4 text-black">SEO Meta Tags</h5>
                            <hr>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="metaTitle" class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" id="metaTitle"
                                        placeholder="Enter meta title">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="canonicalUrl" class="form-label">Canonical URL</label>
                                    <input type="text" name="canonical_url" class="form-control" id="canonicalUrl"
                                        placeholder="https://example.com/page-url">
                                </div>

                            </div>

                            <div class="row">
                                <div class="mb-3">
                                    <label for="metaKeywords" class="form-label">Meta Keywords</label>
                                    <input type="text" name="meta_keywords" class="form-control" id="metaKeywords"
                                        placeholder="keyword1, keyword2, keyword3">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="metaDescription" class="form-label">Meta Description</label>
                                    <textarea type="text" name="meta_description" class="form-control" id="metaDescription"
                                        placeholder="Enter meta description"> </textarea>
                                </div>
                            </div>

                            <h5 class="mt-4 text-black">Open Graph Tags</h5>
                            <hr>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="ogTitle" class="form-label">OG Title</label>
                                    <input type="text" name="og_title" class="form-control" id="ogTitle"
                                        placeholder="Enter OG title">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="ogImage" class="form-label">OG Image URL</label>
                                    <input type="text" name="og_image" class="form-control" id="ogImage"
                                        placeholder="https://example.com/image.jpg">
                                </div>

                            </div>
                            <div class="row">
                                <div class="mb-3">
                                    <label for="ogDescription" class="form-label">OG Description</label>
                                    <textarea type="text" name="og_description" class="form-control" id="ogDescription"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Page</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Add Section --}}
        <div class="modal fade" id="sectionModal" tabindex="-1" aria-labelledby="sectionModalLabel"
            aria-hidden="true">
            <div class="modal-dialog ">
                <form action="{{ route('admin.pages.section-add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="page_id" id="selectedPageId" value="">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPageModalLabel">Add Section</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Section Type -->
                            <div class="mb-3">
                                <label for="sectionType" class="form-label">Section Type</label>
                                <select name="section_type_id" class="form-select" id="sectionType" required>
                                    <option value="">Select Type</option>
                                    @foreach ($sectionTypes as $type)
                                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Style with Preview -->
                            <div class="mb-3">
                                <label for="sectionStyle" class="form-label">Style</label>
                                <select name="section_template_id" class="form-select" id="sectionStyle" required>
                                    <option value="">First select Section Type</option>
                                </select>

                                <!-- Preview Image -->
                                <div id="stylePreview" class="mt-2" style="display: none;">
                                    <img id="previewImage" src="" alt="Style Preview" class="img-thumbnail"
                                        style="max-height: 200px;">
                                    <small id="previewDescription" class="text-muted d-block mt-1"></small>
                                </div>
                            </div>

                            <!-- Dynamic Fields Container -->
                            <div id="dynamicFieldsContainer">
                                <!-- Fields will be loaded here based on selected template -->
                            </div>

                            <!-- Status -->
                            <div class="mb-3">
                                <label for="pageStatus" class="form-label">Order</label>
                                <input type="number" name="order" class="form-control" id="pageStatus" required
                                    value="1">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Section</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <!-- Dynamic fields will be injected here -->

                     
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="editForm" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Selection Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Select an Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="imageGallery" class="row g-3">
                    @foreach ($upload_images as $upload)
                    <div class="col-md-3 col-sm-4 col-6 mb-3">
                        <div class="image-card position-relative">
                            <img src="{{ asset('storage/uploads/' . $upload->filename) }}" 
                                 alt="{{ $upload->filename }}" 
                                 class="img-thumbnail w-100"
                                 style="height: 150px; object-fit: cover; cursor: pointer;"
                                 onclick="selectImage('{{ asset('storage/uploads/' . $upload->filename) }}', '{{ $upload->filename }}')">
                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


    
@endsection


@section('scripts')
    <script src="{{ asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                responsive: true,
                columnDefs: [{
                    orderable: false,
                    targets: [6] // Actions column
                }],
                order: [
                    [1, 'asc'] // Sort by page name
                ],
                language: {
                    search: "Search pages:",
                    lengthMenu: "Show _MENU_ entries"
                }
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

        // Enable/disable Add Section button based on dropdown selection
        document.addEventListener('DOMContentLoaded', function() {
            const pageDropdown = document.getElementById('pageDropdown');
            const addSectionBtn = document.getElementById('addSectionBtn');


            pageDropdown.addEventListener('change', function() {
                addSectionBtn.disabled = !this.value;

                if (this.value) {
                    addSectionBtn.classList.remove('btn-secondary');
                    addSectionBtn.classList.add('btn-success');
                } else {
                    addSectionBtn.classList.remove('btn-success');
                    addSectionBtn.classList.add('btn-secondary');
                }
                const selectedPageId = $('#pageDropdown').val();
                $('#selectedPageId').val(selectedPageId);

                if (!selectedPageId) {
                    e.preventDefault();
                    alert('Please select a page first');
                    return false;
                }
            });

            // Auto-generate slug from page name
            document.getElementById('pageName').addEventListener('input', function() {
                const name = this.value;
                const slug = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                document.getElementById('pageSlug').value = slug;
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Section Type Change
            $('#sectionType').change(function() {
                var sectionTypeId = $(this).val();

                if (sectionTypeId) {
                    $.ajax({
                        url: '/admin/pages/get-templates/' + sectionTypeId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#sectionStyle').empty();
                            $('#sectionStyle').append('<option value="">Select Style</option>');

                            $.each(data, function(key, template) {
                                $('#sectionStyle').append(
                                    '<option value="' + template.id + '" ' +
                                    'data-preview="' + (template
                                        .preview_image_url || '') + '" ' +
                                    'data-fields=\'' + JSON.stringify(template
                                        .fields || []) + '\'>' +
                                    template.style_variant +
                                    '</option>'
                                );
                            });

                            // Hide preview and clear fields
                            $('#stylePreview').hide();
                            $('#dynamicFieldsContainer').empty();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error loading templates:', error);
                            $('#sectionStyle').empty();
                            $('#sectionStyle').append(
                                '<option value="">Error loading styles</option>');
                        }
                    });
                } else {
                    $('#sectionStyle').empty();
                    $('#sectionStyle').append('<option value="">First select Section Type</option>');
                    $('#stylePreview').hide();
                    $('#dynamicFieldsContainer').empty();
                }
            });

            // Style Change - Show Preview and Dynamic Fields
            $('#sectionStyle').change(function() {
                var selectedOption = $(this).find('option:selected');
                var previewImageUrl = selectedOption.data('preview');
                var fields = selectedOption.data('fields');

                console.log('Preview URL:', previewImageUrl); // Debugging के लिए

                // Show/Hide Preview
                if (previewImageUrl && previewImageUrl !== '') {
                    $('#previewImage').attr('src', previewImageUrl);
                    $('#stylePreview').show();
                } else {
                    $('#stylePreview').hide();
                }

                // Load Dynamic Fields
                if (fields && Array.isArray(fields)) {
                    loadDynamicFields(fields);
                } else {
                    $('#dynamicFieldsContainer').empty();
                }
            });


        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pageDropdown = document.getElementById('pageDropdown');
            const tableBody = document.getElementById('sectionsTableBody');
            const editModal = new bootstrap.Modal(document.getElementById('editModal'));
            const editForm = document.getElementById('editForm');

            // Handle page dropdown change
            pageDropdown.addEventListener('change', function() {
                const pageId = this.value;

                if (!pageId) {
                    tableBody.innerHTML = '';
                    return;
                }

                fetch(`/admin/pages/${pageId}/sections`)
                    .then(response => response.json())
                    .then(data => {
                        tableBody.innerHTML = '';

                        if (data.length === 0) {
                            tableBody.innerHTML =
                                '<tr><td colspan="5" class="text-center">No sections found.</td></tr>';
                            return;
                        }

                        data.forEach(section => {
                            const row = `
                        <tr>
                            <td><h6 class="mb-0">${section.sectionType.type}</h6></td>
                            <td>${section.sectionTemplate.style_variant}</td>
                            <td>${section.order}</td>
                            <td class="action-btns">
                                <button class="btn btn-sm btn-outline-primary edit-section-btn"
                                   
                                    data-pageid="${section.id}"
                                    data-templateid="${section.sectionTemplate.template_id}"
                                    data-fields='${section.sectionTemplate.fields}'
                                    title="Edit">
                                    <i class="mdi mdi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" data-id="${section.id}" title="Delete">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                            </td>
                        </tr>
                    `;
                            tableBody.insertAdjacentHTML('beforeend', row);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching sections:', error);
                        tableBody.innerHTML =
                            '<tr><td colspan="5" class="text-danger text-center">Failed to load sections.</td></tr>';
                    });
            });

            // Handle edit button click
            tableBody.addEventListener('click', function(e) {
                const editBtn = e.target.closest('.edit-section-btn');
                if (!editBtn) return;

                const pageSectionId = editBtn.getAttribute('data-pageid');
                const templateId = editBtn.getAttribute('data-templateid');
                const fieldsData = editBtn.getAttribute('data-fields');

                let fields;
                try {
                    fields = JSON.parse(fieldsData);
                    console.log('Total objects in array:', fields.length);

                    // Har {} object ko access karo
                    for (let i = 0; i < fields.length; i++) {
                        console.log(`Object ${i}:`, fields[i]);
                        console.log(`  key: ${fields[i].key}`);
                        console.log(`  label: ${fields[i].label}`);
                        console.log(`  type: ${fields[i].type}`);
                    }

                } catch (err) {
                    console.error('JSON parse error:', err);
                    fields = [];
                }

                editForm.innerHTML = '';

                // Add hidden inputs
                editForm.insertAdjacentHTML('beforeend', `
                <input type="hidden" name="page_section_id" value="${pageSectionId}">
            `);

                if (Array.isArray(fields) && fields.length > 0) {
                    fields.forEach(fieldObject => {
                        const key = fieldObject.key; // "headline", "description", "image"
                        const label = fieldObject.label; // "Headline", "Description", "Image"  
                        const type = fieldObject.type; // "text", "textarea", "file"

                        console.log('Creating field:', {
                            key,
                            label,
                            type
                        });

                        if (type === 'textarea') {
                            const fieldHTML = `
                            <div class="mb-3">
                                <label for="${key}" class="form-label">${label}</label>
                                <textarea class="form-control" id="${key}" name="${key}" rows="3"></textarea>
                            </div>
                        `;
                            editForm.insertAdjacentHTML('beforeend', fieldHTML);
                        } else if (type === 'file') {
                            const fieldHTML = `
                            <div class="mb-3">
                                <label for="${key}" class="form-label">${label}</label>
                                <input type="file" class="form-control" id="${key}" name="${key}">
                            </div>
                        `;
                            editForm.insertAdjacentHTML('beforeend', fieldHTML);
                        }else if (type === 'button') {
                                const fieldHTML = `
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary" id="${key}">${label}</button>
                                </div>
                            `;
                                editForm.insertAdjacentHTML('beforeend', fieldHTML);
                            }
                            else if (type === 'list' && Array.isArray(fieldObject.fields)) {
                            const listContainer = document.createElement('div');
                            listContainer.className = 'mb-3';
                            listContainer.id = `${key}-container`;

                            const labelEl = document.createElement('label');
                            labelEl.textContent = label;
                            labelEl.className = 'form-label d-block mb-2';
                            listContainer.appendChild(labelEl);

                            const itemsWrapper = document.createElement('div');
                            itemsWrapper.className = 'list-items';
                            listContainer.appendChild(itemsWrapper);

                            const addButton = document.createElement('button');
                            addButton.type = 'button';
                            addButton.className = 'btn btn-success mb-2';
                            addButton.textContent = 'Add Item';
                            listContainer.appendChild(addButton);

                            editForm.appendChild(listContainer);

                            function createListCard() {
                                const card = document.createElement('div');
                               card.className = 'card p-3 mb-2 position-relative shadow border border-black';

                                fieldObject.fields.forEach(subField => {
                                    const subKey = subField.key;
                                    const subLabel = subField.label;
                                    const subType = subField.type;

                                    const fieldGroup = document.createElement('div');
                                    fieldGroup.className = 'mb-2';

                                    const fieldLabel = document.createElement('label');
                                    fieldLabel.textContent = subLabel;
                                    fieldLabel.className = 'form-label';

                                    let input;
                                    if (subType === 'text') {
                                        input = document.createElement('input');
                                        input.type = 'text';
                                        input.className = 'form-control';
                                    } else if (subType === 'textarea') {
                                        input = document.createElement('textarea');
                                        input.className = 'form-control';
                                        input.rows = 3;
                                    }

                                    input.name = `${key}[${subKey}][]`;

                                    fieldGroup.appendChild(fieldLabel);
                                    fieldGroup.appendChild(input);
                                    card.appendChild(fieldGroup);
                                });

                                const deleteBtn = document.createElement('button');
                                deleteBtn.type = 'button';
                                deleteBtn.className = 'btn position-absolute top-0 end-0 m-2';
                                deleteBtn.innerHTML = '<i class="fas fa-trash"></i>';
                                deleteBtn.onclick = () => card.remove();
                                card.appendChild(deleteBtn);

                                itemsWrapper.appendChild(card);
                            }

                            // Initial card
                            createListCard();

                            // Add new card on button click
                            addButton.addEventListener('click', createListCard);
                        }
                         else {
                            const fieldHTML = `
                            <div class="mb-3">
                                <label for="${key}" class="form-label">${label}</label>
                                <input type="${type}" class="form-control" id="${key}" name="${key}">
                            </div>
                        `;
                            editForm.insertAdjacentHTML('beforeend', fieldHTML);
                        }
                       
                    });
                } else {
                    editForm.insertAdjacentHTML('beforeend', `
                    <div class="alert alert-info">No editable fields available for this template.</div>
                `);
                }
                 // Add static "Choose Existing Image" button
                        // editForm.insertAdjacentHTML('beforeend', `
                        //     <div class="mb-3">
                        //         <button type="button" class="btn btn-secondary" id="chooseImageBtn"
                        //         data-bs-toggle="modal"  data-bs-target="#imageModal">Choose Existing Image</button>
                        //     </div>
                        // `);

                // Show modal
                editModal.show();
            });

            // Handle form submission
            // editForm.addEventListener('submit', function(e) {
            //     e.preventDefault();

            //     const formData = new FormData(this);

            //     // Convert FormData to JSON
            //     const data = {};
            //     formData.forEach((value, key) => {
            //         data[key] = value;
            //     });

            //     // Send update request
            //     fetch('/admin/pages/section-update', {
            //             method: 'POST',
            //             headers: {
            //                 'Content-Type': 'application/json',
            //             },
            //             body: JSON.stringify(data)
            //         })
            //         .then(response => response.json())
            //         .then(result => {
            //             if (result.success) {
            //                 editModal.hide();
            //                 // Refresh the table
            //                 pageDropdown.dispatchEvent(new Event('change'));
            //             } else {
            //                 alert('Error updating section: ' + result.message);
            //             }
            //         })
            //         .catch(error => {
            //             console.error('Error updating section:', error);
            //             alert('Failed to update section');
            //         });
            // });

            
        });


        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-outline-danger')) {
                const button = e.target.closest('.btn-outline-danger');
                const sectionId = button.getAttribute('data-id');
                const row = button.closest('tr');

                if (!confirm('Are you sure you want to delete this section?')) return;

                fetch(`/admin/pages/sections/${sectionId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success') {
                            row.remove();
                            Swal.fire({
                                toast: true,
                                icon: 'success',
                                title: "Section deleted successfully.",
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        } else {
                            Swal.fire({
                                toast: true,
                                icon: 'error',
                                title: "Failed to delete section.",
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            ss
                        }
                    })
                    .catch(err => {
                        console.error('Delete error:', err);
                        alert('Something went wrong while deleting.');
                    });
            }
        });
    </script>

    <script>
        function selectImage(imageUrl, filename) {
            // Remove 'selected' class from all images
            document.querySelectorAll('.image-card img').forEach(img => {
                img.classList.remove('border-success');
                img.classList.remove('selected-image');
            });

            // Highlight selected image
            const clickedImage = document.querySelector(`img[onclick*="${filename}"]`);
            if (clickedImage) {
                clickedImage.classList.add('border-success');
                clickedImage.classList.add('selected-image');
            }

            // Store selected image filename in hidden input
            let hiddenInput = document.querySelector('#editForm input[name="selected_image"]');
            if (!hiddenInput) {
                hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'selected_image';
                editForm.appendChild(hiddenInput);
            }
            hiddenInput.value = filename;

            console.log('Selected image:', filename);
        }
    </script>

    <script>
        // Handle form submission - Modified version
        editForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const pageSectionId = formData.get('page_section_id');

            // Agar file upload hai toh FormData hi use karo, nahi toh JSON use karo
            let hasFiles = false;
            for (let [key, value] of formData.entries()) {
                if (value instanceof File) {
                    hasFiles = true;
                    break;
                }
            }

            if (hasFiles) {
                // File upload ke liye FormData use karo
                fetch('/admin/pages/section-update', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        editModal.hide();
                        pageDropdown.dispatchEvent(new Event('change'));
                        alert('Section updated successfully!');
                    } else {
                        alert('Error updating section: ' + result.message);
                    }
                })
                .catch(error => {
                    console.error('Error updating section:', error);
                    alert('Failed to update section');
                });
            } else {
                // No files - JSON use karo
                const data = {};
                formData.forEach((value, key) => {
                    // Array fields ko properly handle karo
                    if (key.includes('[') && key.includes(']')) {
                        this.parseArrayField(data, key, value);
                    } else {
                        data[key] = value;
                    }
                });

                fetch('/admin/pages/section-update', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        editModal.hide();
                        pageDropdown.dispatchEvent(new Event('change'));
                        alert('Section updated successfully!');
                    } else {
                        alert('Error updating section: ' + result.message);
                    }
                })
                .catch(error => {
                    console.error('Error updating section:', error);
                    alert('Failed to update section');
                });
            }
        });

        // Array fields ko parse karne ka helper function
        function parseArrayField(data, key, value) {
            const matches = key.match(/(\w+)\[(\w+)\]\[(\d+)\]/);
            
            if (matches) {
                const mainKey = matches[1]; // headline
                const subKey = matches[2];  // title
                const index = matches[3];   // 0
                
                if (!data[mainKey]) {
                    data[mainKey] = {};
                }
                if (!data[mainKey][subKey]) {
                    data[mainKey][subKey] = [];
                }
                data[mainKey][subKey][index] = value;
            }
        }
    </script>
@endsection
