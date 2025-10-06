@extends('admin.layouts.master')
@section('title')
    Navbar - Admin
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
    <x-breadcrub pagetitle="Admin" subtitle="Menu" title="Navbar" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pt-0">

                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <h4 class="card-title">Navbar List</h4>
                                </div>

                                <div class="col-sm-6 d-flex justify-content-end gap-2">
                                    {{-- <a href="{{ route('admin.section_template.index') }}" class="btn btn-danger">
                                        Back
                                    </a> --}}
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addSectionTypeModal">
                                        <i class="mdi mdi-plus-circle me-1"></i> Add Navbar
                                    </button>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered datatable dt-responsive nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Order</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Navigations as $navbar)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if($navbar->parent_id)
                                                        <span class="text-muted">↳</span> <!-- Sub menu indicator -->
                                                    @endif
                                                    {{ $navbar->title }}
                                                    @if($navbar->parent_id)
                                                        <br><small class="text-muted">Parent: {{ $navbar->parent->title ?? 'N/A' }}</small>
                                                    @endif
                                                </td>
                                                <td>{{ $navbar->slug }}</td>
                                                <td>{{ $navbar->order }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary edit-btn" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#editNavbarModal"
                                                            data-id="{{ $navbar->id }}"
                                                            data-title="{{ $navbar->title }}"
                                                            data-slug="{{ $navbar->slug }}"
                                                            data-parent_id="{{ $navbar->parent_id }}"
                                                            data-order="{{ $navbar->order }}">
                                                        <i class="mdi mdi-pencil font-size-14"></i>
                                                    </button>
                                                    <form action="{{ route('admin.navbar.destroy', $navbar->id) }}" 
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                                onclick="return confirm('Are you sure?')">
                                                            <i class="mdi mdi-trash-can font-size-14"></i>
                                                        </button>
                                                    </form>
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

  <!-- Add Navbar Modal -->
<div class="modal fade" id="addSectionTypeModal" tabindex="-1" aria-labelledby="addSectionTypeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSectionTypeModalLabel">Add Navigation Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.navbar.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" id="title" name="title" class="form-control" required>
                         @error('title')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                        <input type="text" id="slug" name="slug" class="form-control" required>
                         @error('slug')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="parent_id" class="form-label">Sub Menu</label>
                        <select id="parent_id" name="parent_id" class="form-control">
                            <option value="0">Main Menu (No Parent)</option>
                            @foreach($parentNavigations as $nav)
                                <option value="{{ $nav->id }}">{{ $nav->title }}</option>
                            @endforeach
                        </select>
                          @error('parent_id')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="order" class="form-label">Order</label>
                        <input type="number" id="order" name="order" class="form-control" value="0">
                          @error('order')<div class="text-danger">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Navigation</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Navbar Modal -->
<div class="modal fade" id="editNavbarModal" tabindex="-1" aria-labelledby="editNavbarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNavbarModalLabel">Edit Navigation Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="mb-3">
                        <label for="edit_title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" id="edit_title" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_slug" class="form-label">Slug <span class="text-danger">*</span></label>
                        <input type="text" id="edit_slug" name="slug" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_parent_id" class="form-label">Parent Menu</label>
                        <select id="edit_parent_id" name="parent_id" class="form-control">
                            <option value="0">Main Menu (No Parent)</option>
                            @foreach($parentNavigations as $nav)
                                <option value="{{ $nav->id }}">{{ $nav->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_order" class="form-label">Order</label>
                        <input type="number" id="edit_order" name="order" class="form-control" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Navigation</button>
                </div>
            </form>
        </div>
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
       // Edit button click handler
            $('.edit-btn').on('click', function() {
                var id = $(this).data('id');
                var title = $(this).data('title');
                var slug = $(this).data('slug');
                var parent_id = $(this).data('parent_id');
                var order = $(this).data('order');

                $('#edit_id').val(id);
                $('#edit_title').val(title);
                $('#edit_slug').val(slug);
                $('#edit_parent_id').val(parent_id || '0'); // Convert null to '0'
                $('#edit_order').val(order);
                
                // Set form action
                $('#editForm').attr('action', '{{ url('admin/navbar') }}/' + id);
            });
        </script>
@endsection
