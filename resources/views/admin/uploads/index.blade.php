@extends('admin.layouts.master')
@section('title')
    Uploads - Admin
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

    <style>
        

        .top-header{
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .subtitle {
            color: #666;
            font-size: 14px;
        }

        .view-controls {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .view-toggle {
            display: flex;
            gap: 5px;
        }

        .view-button {
            background: none;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 8px 12px;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .view-button.active {
            background-color: #4a90e2;
            color: white;
            border-color: #4a90e2;
        }

        .image-count {
            font-size: 14px;
            color: #666;
        }

        .upload-section {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .upload-area {
            border: 2px dashed #ddd;
            border-radius: 8px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 20px;
            position: relative;
        }

        .upload-area:hover {
            border-color: #4a90e2;
            background-color: #f9f9f9;
        }

        .upload-area.dragover {
            border-color: #4a90e2;
            background-color: #f0f8ff;
        }

        .upload-icon {
            font-size: 48px;
            color: #4a90e2;
            margin-bottom: 15px;
        }

        .upload-text {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .upload-subtext {
            font-size: 14px;
            color: #888;
        }

        .file-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .upload-progress {
            display: none;
            margin-top: 15px;
        }

        .progress-bar {
            width: 100%;
            height: 6px;
            background-color: #f0f0f0;
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background-color: #4a90e2;
            width: 0%;
            transition: width 0.3s ease;
        }

        .progress-text {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
            text-align: center;
        }

        .uploaded-files {
            margin-top: 20px;
        }

        .file-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            border: 1px solid #eee;
            border-radius: 4px;
            margin-bottom: 8px;
            background-color: #f9f9f9;
        }

        .file-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .file-icon {
            color: #4a90e2;
        }

        .file-name {
            font-size: 14px;
        }

        .file-status {
            font-size: 12px;
            color: #28a745;
        }

        .search-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            gap: 15px;
        }

        .search-input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .search-button {
            display: none; /* Hide the search button since we're using auto-search */
        }

        .search-count-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .image-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }

        .image-card:hover {
            transform: translateY(-5px);
        }

        .image-placeholder {
            height: 150px;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #888;
            font-size: 14px;
        }

        .image-preview {
            height: 150px;
            width: 100%;
            object-fit: cover;
        }

        .image-info {
            padding: 15px;
        }

        .image-id {
            font-family: monospace;
            font-size: 12px;
            margin-bottom: 10px;
            word-break: break-all;
        }

        .image-name {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .image-size {
            font-size: 12px;
            color: #666;
            margin-bottom: 10px;
        }

        .card-actions {
            display: flex;
            gap: 8px;
            margin-top: 10px;
        }

        .action-button {
            flex: 1;
            padding: 5px 5px;
            border: none;
            border-radius: 4px;
            font-size: 10px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 3px;
        }

        .copy-button {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            color: #333;
        }

        .copy-button:hover {
            background-color: #e9e9e9;
        }

        .copy-button.copied {
            background-color: #4a90e2;
            color: white;
            border-color: #4a90e2;
        }

        .view-button-small {
            background-color: #28a745;
            color: white;
        }

        .view-button-small:hover {
            background-color: #218838;
        }

        .delete-button {
            background-color: #dc3545;
            color: white;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        /* List view styles */
        .list-view .gallery {
            grid-template-columns: 1fr;
        }

        .list-view .image-card {
            display: flex;
        }

        .list-view .image-placeholder,
        .list-view .image-preview-container {
            width: 200px;
            height: 120px;
            flex-shrink: 0;
        }

        .list-view .image-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .list-view .card-actions {
            width: auto;
            align-self: flex-start;
            margin-top: 0;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .gallery {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }

            .list-view .image-card {
                flex-direction: column;
            }

            .list-view .image-placeholder,
            .list-view .image-preview-container {
                width: 100%;
            }

           .top-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .search-container {
                flex-direction: column;
                align-items: stretch;
            }

            .search-count-container {
                justify-content: space-between;
            }
        }
    </style>
@endsection

@section('content')
    <x-breadcrub pagetitle="Admin" subtitle="Uploads" title="Uploads Image" />
    <div class="container-fluid">
        <div class="top-header">
            <div>
                <h1>Media Gallery</h1>
                <p class="subtitle">Upload and manage your images</p>
            </div>
            <div class="view-controls">
                <div class="view-toggle">
                    <button class="view-button" id="gridView">
                        <i class="fas fa-th"></i> Grid View
                    </button>
                    <button class="view-button active" id="listView">
                        <i class="fas fa-list"></i> List View
                    </button>
                </div>
            </div>
        </div>

        <section class="upload-section">
            <h2>Upload Images</h2>
            <form id="uploadForm" action="{{ route('admin.uploads.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="upload-area" id="uploadArea">
                    <input type="file" name="file" id="fileInput" class="file-input" multiple
                        accept="image/*,.png,.jpg,.jpeg,.gif">
                    <div class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                    <p class="upload-text">Click to upload or drag and drop</p>
                    <p class="upload-subtext">PNG, JPG, GIF up to 10MB</p>
                </div>

                <div class="upload-progress" id="uploadProgress">
                    <div class="progress-bar">
                        <div class="progress-fill" id="progressFill"></div>
                    </div>
                    <div class="progress-text" id="progressText">0%</div>
                </div>

                <div class="uploaded-files" id="uploadedFiles"></div>
            </form>

            <div class="search-container">
                <input type="text" class="search-input" id="searchInput" placeholder="Search images...">
                <div class="search-count-container">
                    <div class="image-count" id="imageCount">{{ $uploads->count() }} images</div>
                </div>
            </div>
        </section>

        <section class="gallery-section">
            <div class="gallery" id="imageGallery">
                @foreach ($uploads as $upload)
                    <div class="image-card" data-id="{{ $upload->id }}" data-name="{{ $upload->filename }}">
                        <div class="image-preview-container">
                            <img src="{{ asset('storage/uploads/' . $upload->filename) }}" alt="{{ $upload->filename }}"
                                class="image-preview">
                        </div>
                        <div class="image-info">
                            <div class="image-name">{{ $upload->filename }}</div>
                            <div class="card-actions">
                                <button class="action-button copy-button"
                                    data-url="{{ asset('storage/uploads/' . $upload->filename) }}">
                                    <i class="fas fa-copy"></i> Copy
                                </button>
                                <button class="action-button view-button-small"
                                    data-url="{{ asset('storage/uploads/' . $upload->filename) }}">
                                    <i class="fas fa-eye"></i> View
                                </button>
                                <button class="action-button delete-button" data-deleteId="{{ $upload->id }}">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
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
    </script>

    <script>
        // DOM elements
        const imageGallery = document.getElementById('imageGallery');
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('fileInput');
        const uploadForm = document.getElementById('uploadForm');
        const uploadProgress = document.getElementById('uploadProgress');
        const progressFill = document.getElementById('progressFill');
        const progressText = document.getElementById('progressText');
        const uploadedFiles = document.getElementById('uploadedFiles');
        const gridViewBtn = document.getElementById('gridView');
        const listViewBtn = document.getElementById('listView');
        const imageCount = document.getElementById('imageCount');
        const searchInput = document.getElementById('searchInput');

        // CSRF token for AJAX requests
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Initialize the gallery
        function initializeGallery() {
            attachEventListeners();
            initializeSearch();
        }

        // Initialize search functionality
        function initializeSearch() {
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                filterImages(searchTerm);
            });
        }

        // Filter images based on search term
        function filterImages(searchTerm) {
            const imageCards = document.querySelectorAll('.image-card');
            let visibleCount = 0;
            
            imageCards.forEach(card => {
                const imageName = card.getAttribute('data-name').toLowerCase();
                
                if (imageName.includes(searchTerm)) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Update image count
            imageCount.textContent = `${visibleCount} ${visibleCount === 1 ? 'image' : 'images'}`;
        }

        // Attach event listeners to action buttons
        function attachEventListeners() {
            // Copy buttons
            document.querySelectorAll('.copy-button').forEach(button => {
                button.addEventListener('click', function() {
                    const imageUrl = this.getAttribute('data-url');
                    copyToClipboard(imageUrl);

                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-check"></i> Copied!';
                    this.classList.add('copied');

                    setTimeout(() => {
                        this.innerHTML = originalText;
                        this.classList.remove('copied');
                    }, 2000);
                });
            });

            // View buttons
            document.querySelectorAll('.view-button-small').forEach(button => {
                button.addEventListener('click', function() {
                    const imageUrl = this.getAttribute('data-url');
                    const imageCard = this.closest('.image-card');
                    const imageName = imageCard.querySelector('.image-name').textContent;

                    Swal.fire({
                        title: 'Image Preview',
                        html: `
                            <div style="text-align: center;">
                                <img src="${imageUrl}" 
                                     style="max-width: 100%; max-height: 400px; border-radius: 8px;">
                                <p style="margin-top: 15px; font-weight: 500;">${imageName}</p>
                            </div>
                        `,
                        showConfirmButton: true,
                        confirmButtonText: 'Close'
                    });
                });
            });

            // Delete buttons
            document.querySelectorAll('.delete-button').forEach(button => {
                button.addEventListener('click', function() {
                    const imageId = this.getAttribute('data-deleteId');
                    deleteImage(imageId, this);
                });
            });
        }

        // Delete image function
        function deleteImage(imageId, button) {
            console.log('Attempting to delete image ID:', imageId);

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
                    // Show loading state
                    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Deleting...';
                    button.disabled = true;

                    // Send AJAX request to delete the image
                    fetch(`/admin/uploads/${imageId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => {
                            console.log('Response status:', response.status);
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Delete response:', data);

                            if (data.success) {
                                // Remove from DOM with animation
                                const imageCard = button.closest('.image-card');
                                imageCard.style.transition = 'all 0.3s ease';
                                imageCard.style.opacity = '0';
                                imageCard.style.transform = 'translateX(100px)';

                                setTimeout(() => {
                                    imageCard.remove();
                                    updateImageCount();

                                    Swal.fire({
                                        toast: true,
                                        icon: 'success',
                                        title: 'Image deleted successfully',
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                }, 300);
                            } else {
                                // Reset button state
                                button.innerHTML = '<i class="fas fa-trash"></i> Delete';
                                button.disabled = false;

                                Swal.fire(
                                    'Error!',
                                    data.message || 'There was a problem deleting the image.',
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            console.error('Delete error:', error);

                            // Reset button state
                            button.innerHTML = '<i class="fas fa-trash"></i> Delete';
                            button.disabled = false;

                            Swal.fire(
                                'Error!',
                                'There was a problem deleting the image. Please try again.',
                                'error'
                            );
                        });
                }
            });
        }

        // Update image count
        function updateImageCount() {
            const count = document.querySelectorAll('.image-card').length;
            imageCount.textContent = `${count} ${count === 1 ? 'image' : 'images'}`;
        }

        // Copy to clipboard function
        function copyToClipboard(text) {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
        }

        // File input change event
        fileInput.addEventListener('change', function(e) {
            handleFiles(e.target.files);
        });

        // Drag and drop events
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', function() {
            this.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('dragover');

            if (e.dataTransfer.files.length) {
                handleFiles(e.dataTransfer.files);
            }
        });

        // Handle selected files
        function handleFiles(files) {
            uploadedFiles.innerHTML = '';

            Array.from(files).forEach(file => {
                if (!file.type.match('image.*')) {
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Only image files are allowed',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    return;
                }

                if (file.size > 10 * 1024 * 1024) { // 10MB limit
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'File size must be less than 10MB',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    return;
                }

                // Show file in upload list
                const fileItem = document.createElement('div');
                fileItem.className = 'file-item';
                fileItem.innerHTML = `
                    <div class="file-info">
                        <i class="fas fa-file-image file-icon"></i>
                        <span class="file-name">${file.name}</span>
                    </div>
                    <div class="file-status">Ready to upload</div>
                `;
                uploadedFiles.appendChild(fileItem);

                // Upload file
                uploadFile(file);
            });
        }

        // Upload file via AJAX
        function uploadFile(file) {
            uploadProgress.style.display = 'block';

            const formData = new FormData();
            formData.append('file', file);
            formData.append('_token', csrfToken);

            const xhr = new XMLHttpRequest();

            xhr.upload.addEventListener('progress', function(e) {
                if (e.lengthComputable) {
                    const percentComplete = (e.loaded / e.total) * 100;
                    progressFill.style.width = percentComplete + '%';
                    progressText.textContent = Math.round(percentComplete) + '%';
                }
            });

            xhr.addEventListener('load', function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);

                    if (response.success) {
                        // Add new image to gallery
                        addImageToGallery(response.upload);

                        uploadProgress.style.display = 'none';
                        progressFill.style.width = '0%';
                        progressText.textContent = '0%';
                        uploadedFiles.innerHTML = '';

                        Swal.fire({
                            toast: true,
                            icon: 'success',
                            title: 'Image uploaded successfully',
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    } else {
                        Swal.fire({
                            toast: true,
                            icon: 'error',
                            title: response.message,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                } else {
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: 'Upload failed',
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                }
            });

            xhr.addEventListener('error', function() {
                Swal.fire({
                    toast: true,
                    icon: 'error',
                    title: 'Upload failed',
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                uploadProgress.style.display = 'none';
            });

            xhr.open('POST', '{{ route('admin.uploads.store') }}');
            xhr.send(formData);
        }

        // Add new image to gallery
        function addImageToGallery(upload) {
            const imageCard = document.createElement('div');
            imageCard.className = 'image-card';
            imageCard.setAttribute('data-id', upload.id);
            imageCard.setAttribute('data-name', upload.filename);

            imageCard.innerHTML = `
                <div class="image-preview-container">
                    <img src="${upload.url}" alt="${upload.filename}" class="image-preview">
                </div>
                <div class="image-info">
                    <div class="image-name">${upload.filename}</div>
                    
                    <div class="card-actions">
                        <button class="action-button copy-button" data-url="${upload.url}">
                            <i class="fas fa-copy"></i> Copy 
                        </button>
                        <button class="action-button view-button-small" data-url="${upload.url}">
                            <i class="fas fa-eye"></i> View
                        </button>
                        <button class="action-button delete-button" data-deleteId="${upload.id}">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
            `;

            imageGallery.insertBefore(imageCard, imageGallery.firstChild);

            // Update image count
            updateImageCount();

            attachEventListenersToCard(imageCard);
        }

        function attachEventListenersToCard(card) {
            // Copy button
            const copyButton = card.querySelector('.copy-button');
            copyButton.addEventListener('click', function() {
                const imageUrl = this.getAttribute('data-url');
                copyToClipboard(imageUrl);

                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check"></i> Copied!';
                this.classList.add('copied');

                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.classList.remove('copied');
                }, 2000);
            });

            // View button
            const viewButton = card.querySelector('.view-button-small');
            viewButton.addEventListener('click', function() {
                const imageUrl = this.getAttribute('data-url');
                const imageName = card.querySelector('.image-name').textContent;

                Swal.fire({
                    title: 'Image Preview',
                    html: `
                        <div style="text-align: center;">
                            <img src="${imageUrl}" 
                                 style="max-width: 100%; max-height: 400px; border-radius: 8px;">
                            <p style="margin-top: 15px; font-weight: 500;">${imageName}</p>
                        </div>
                    `,
                    showConfirmButton: true,
                    confirmButtonText: 'Close'
                });
            });

            // Delete button
            const deleteButton = card.querySelector('.delete-button');
            deleteButton.addEventListener('click', function() {
                const imageId = this.getAttribute('data-deleteId');
                deleteImage(imageId, this);
            });
        }

        // View toggle functionality
        gridViewBtn.addEventListener('click', function() {
            document.body.classList.remove('list-view');
            gridViewBtn.classList.add('active');
            listViewBtn.classList.remove('active');
        });

        listViewBtn.addEventListener('click', function() {
            document.body.classList.add('list-view');
            listViewBtn.classList.add('active');
            gridViewBtn.classList.remove('active');
        });

        // Initialize the gallery when page loads
        document.addEventListener('DOMContentLoaded', initializeGallery);
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