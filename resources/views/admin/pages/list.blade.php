@extends('admin.layouts.master')
@section('title')
    Admin | All Pages
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
    </style>
@endsection
@section('content')
    <x-breadcrub pagetitle="Admin" subtitle="Section" title="Section Types" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pt-0">

                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <h4 class="card-title">All Pages List</h4>
                                </div>

                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered datatable dt-responsive nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Page Name</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Section</th>
                                            
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pages as $index => $page)
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0">{{ $page->name }}</h6>
                                                </td>
                                                <td>{{ $page->slug }}</td>
                                                <td>
                                                    @if ($page->status == 'published')
                                                        <span class="badge bg-success">Published</span>
                                                    @else
                                                        <span class="badge bg-warning">Draft</span>
                                                    @endif
                                                </td>
                                               <td>
                                                    <span class="badge bg-primary">{{ getpageSection($page->id) }}</span>
                                                </td>
                                                <td>{{ $page->created_at->format('M d, Y') }}</td>
                                                <td class="action-btns">
                                                   <button class="btn btn-sm btn-outline-primary edit-page-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editPageModal"
                                                        data-id="{{ $page->id }}"
                                                        data-name="{{ $page->name }}"
                                                        data-slug="{{ $page->slug }}"
                                                        data-status="{{ $page->status }}"
                                                        data-meta_title="{{ $page->meta_title }}"
                                                        data-meta_description="{{ $page->meta_description }}"
                                                        data-meta_keywords="{{ $page->meta_keywords }}"
                                                        data-canonical_url="{{ $page->canonical_url }}"
                                                        data-og_title="{{ $page->og_title }}"
                                                        data-og_description="{{ $page->og_description }}"
                                                        data-og_image="{{ $page->og_image_url }}">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger" title="Delete" data-id="{{ $page->id }}" >
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
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
    </div>

      <!-- Edit Page Modal -->
        <div class="modal fade" id="editPageModal" tabindex="-1" aria-labelledby="addPageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('admin.pages.store') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-black" id="addPageModalLabel">Edit Page</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="pageName" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="pageName" required placeholder="Enter page name">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="pageSlug" class="form-label">Slug</label>
                                    <input type="text" name="slug" class="form-control" id="pageSlug" required placeholder="eg - /page-name-example" >
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
                                <input type="text" name="meta_title" class="form-control" id="metaTitle" placeholder="Enter meta title">
                                </div>
                                <div class="col-md-6 mb-3">
                                <label for="canonicalUrl" class="form-label">Canonical URL</label>
                                <input type="text" name="canonical_url" class="form-control" id="canonicalUrl" placeholder="https://example.com/page-url">
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="mb-3">
                                <label for="metaKeywords" class="form-label">Meta Keywords</label>
                                <input type="text" name="meta_keywords" class="form-control" id="metaKeywords" placeholder="keyword1, keyword2, keyword3">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3">
                                <label for="metaDescription" class="form-label">Meta Description</label>
                                <textarea type="text" name="meta_description" class="form-control" id="metaDescription" placeholder="Enter meta description"> </textarea>
                                </div>
                            </div>

                            <h5 class="mt-4 text-black">Open Graph Tags</h5>
                            <hr>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                <label for="ogTitle" class="form-label">OG Title</label>
                                <input type="text" name="og_title" class="form-control" id="ogTitle" placeholder="Enter OG title">
                                </div>
                                <div class="col-md-6 mb-3">
                                <label for="ogImage" class="form-label">OG Image URL</label>
                                <input type="text" name="og_image" class="form-control" id="ogImage" placeholder="https://example.com/image.jpg">
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
                            <button type="submit" class="btn btn-primary">Update Page</button>
                        </div>
                    </div>
                </form>
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


        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-page-btn');

            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                document.getElementById('pageName').value = this.dataset.name || '';
                document.getElementById('pageSlug').value = this.dataset.slug || '';
                document.getElementById('pageStatus').value = this.dataset.status || 'draft';
                document.getElementById('metaTitle').value = this.dataset.meta_title || '';
                document.getElementById('metaDescription').value = this.dataset.meta_description || '';
                document.getElementById('metaKeywords').value = this.dataset.meta_keywords || '';
                document.getElementById('canonicalUrl').value = this.dataset.canonical_url || '';
                document.getElementById('ogTitle').value = this.dataset.og_title || '';
                document.getElementById('ogDescription').value = this.dataset.og_description || '';
                document.getElementById('ogImage').value = this.dataset.og_image || '';

                // Update form action to send to update route
                const pageId = this.dataset.id;
                const form = document.querySelector('#editPageModal form');
                form.action = `/admin/pages/${pageId}`; // or use route('admin.pages.update', pageId)
                form.insertAdjacentHTML('beforeend', '<input type="hidden" name="_method" value="PUT">');
                });
             });
            });
    </script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('.datatable').DataTable({
                responsive: true,
                columnDefs: [{
                        orderable: false,
                        targets: [5]
                    }, // Disable sorting for actions column
                    {
                        searchable: false,
                        targets: [5]
                    } // Disable searching for actions column
                ],
                order: [
                    [0, 'asc']
                ] // Default sort by ID
            });


        });
    </script>
    <script>
        setTimeout(function() {
            let alert = document.getElementById('success-alert');
            if (alert) {
                alert.style.transition = "opacity 0.5s ease";
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500); // remove from DOM
            }
        }, 3000);
    </script>
    <script>
        document.addEventListener('click', function (e) {
            if (e.target.closest('.btn-outline-danger')) {
                const button = e.target.closest('.btn-outline-danger');
                const sectionId = button.getAttribute('data-id');
                const row = button.closest('tr');

                if (!confirm('Are you sure you want to delete this section?')) return;

                fetch(`/admin/pages/delete/${sectionId}`, {
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
                            title: "Page deleted successfully.",
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    } else {
                    Swal.fire({
                        toast: true,
                        icon: 'error',
                        title: "Failed to delete Page.",
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    }
                })
                .catch(err => {
                    console.error('Delete error:', err);
                    alert('Something went wrong while deleting.');
                });
            }
        });
    </script>
@endsection
