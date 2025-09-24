@extends('admin.layouts.master')
@section('title')
    Add Pages
@endsection
@section('css')
    <link href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
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
                        {{-- <button type="button" id="addSectionBtn" class="btn btn-success" disabled>
                            <i class="mdi mdi-view-grid-plus-outline me-1"></i> Add Section
                        </button> --}}
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
                                <th>Page Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Sections</th>
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
                                        <span class="badge bg-primary">{{ $page->sections_count ?? 0 }}</span>
                                    </td>
                                    <td>{{ $page->created_at->format('M d, Y') }}</td>
                                    <td class="action-btns">
                                        <button class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-success" title="View Sections">
                                            <i class="mdi mdi-eye"></i>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger" title="Delete">
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

        <!-- Add Page Modal -->
        <div class="modal fade" id="addPageModal" tabindex="-1" aria-labelledby="addPageModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('admin.pages.store') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPageModalLabel">Add New Page</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="pageName" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="pageName" required>
                            </div>
                            <div class="mb-3">
                                <label for="pageSlug" class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control" id="pageSlug" required>
                            </div>
                            <div class="mb-3">
                                <label for="pageStatus" class="form-label">Status</label>
                                <select name="status" class="form-select" id="pageStatus" required>
                                    <option value="draft">Draft</option>
                                    <option value="published">Published</option>
                                </select>
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

        <div class="modal fade" id="sectionModal" tabindex="-1" aria-labelledby="sectionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('admin.pages.store') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPageModalLabel">Add Section </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="pageName" class="form-label">Section Type</label>
                                <input type="text" name="name" class="form-control" id="pageName" required>
                            </div>
                            <div class="mb-3">
                                <label for="pageSlug" class="form-label">Style</label>
                                <input type="text" name="slug" class="form-control" id="pageSlug" required>
                            </div>
                            <div class="mb-3">
                                <label for="pageStatus" class="form-label">Status</label>
                                <select name="status" class="form-select" id="pageStatus" required>
                                    <option value="draft">Draft</option>
                                    <option value="published">Published</option>
                                </select>
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

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            });

            // Auto-generate slug from page name
            document.getElementById('pageName').addEventListener('input', function() {
                const name = this.value;
                const slug = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
                document.getElementById('pageSlug').value = slug;
            });
        });
    </script>
@endsection
