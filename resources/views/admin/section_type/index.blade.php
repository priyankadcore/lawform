@extends('admin.layouts.master')
@section('title', 'Section Types')
@section('css')
    <link href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
         
    </style>
    <style>
    .swal2-toast {
        font-size: 12px !important;      /* text chhota */
        padding: 6px 10px !important;    /* kam padding */
        min-width: auto !important;      /* default width remove */
        width: 220px !important;         /* custom width */
        line-height: 1.3em !important;   /* compact line spacing */
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
                                    <h4 class="card-title">Section Type List</h4>
                                </div>
                                
                                 <div class="col-sm-6 d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.section_template.index') }}" class="btn btn-danger" >
                                          Back
                                        </a>
                                   <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSectionTypeModal">
                                            <i class="mdi mdi-plus-circle me-1"></i> Add Section Type
                                        </button>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered datatable dt-responsive nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sectionTypes as $type)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $type->name }}</td>
                                            <td>{{ $type->slug }}</td>
                                            <td>
                                                @if($type->status)
                                                    <span class="badge badge-soft-success">Active</span>
                                                @else
                                                    <span class="badge badge-soft-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $type->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary edit-btn" 
                                                        data-id="{{ $type->id }}"
                                                        data-name="{{ $type->name }}"
                                                        data-slug="{{ $type->slug }}"
                                                        data-status="{{ $type->status }}">
                                                    <i class="mdi mdi-pencil font-size-14"></i>
                                                </button>
                                                <form action="{{ route('admin.section_types.destroy', $type->id) }}" 
                                                      method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" 
                                                            onclick="return confirm('Are you sure you want to delete this section type?')">
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

    <!-- Add Section Type Modal -->
    <div class="modal fade" id="addSectionTypeModal" tabindex="-1" aria-labelledby="addSectionTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSectionTypeModalLabel">Add Section Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.section_types.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" id="slug" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="1" selected>Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Section Type</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Section Type Modal -->
    <div class="modal fade" id="editSectionTypeModal" tabindex="-1" aria-labelledby="editSectionTypeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSectionTypeModalLabel">Edit Section Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="edit_id" name="id">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" id="edit_name" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_slug" class="form-label">Slug</label>
                            <input type="text" id="edit_slug" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="edit_status" class="form-label">Status</label>
                            <select id="edit_status" name="status" class="form-control" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Section Type</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{ asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
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
            timerProgressBar: true,
            
        });
    @endif
    </script>



    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('.datatable').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: [5] }, // Disable sorting for actions column
                    { searchable: false, targets: [5] } // Disable searching for actions column
                ],
                order: [[0, 'asc']] // Default sort by ID
            });

            // Auto-generate slug from name
            $('#name').on('keyup', function() {
                let slug = $(this).val().toLowerCase()
                    .replace(/ /g, '-')
                    .replace(/[^\w-]+/g, '');
                $('#slug').val(slug);
            });

            // Edit button click handler
            $('.edit-btn').on('click', function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var slug = $(this).data('slug');
                var status = $(this).data('status');
                
                $('#edit_id').val(id);
                $('#edit_name').val(name);
                $('#edit_slug').val(slug);
                $('#edit_status').val(status);
                
                // Set the form action
                $('#editForm').attr('action', '{{ url("admin/section_types") }}/' + id);
                
                // Show the modal
                $('#editSectionTypeModal').modal('show');
            });

            // Auto-generate slug from name in edit modal
            $('#edit_name').on('keyup', function() {
                let slug = $(this).val().toLowerCase()
                    .replace(/ /g, '-')
                    .replace(/[^\w-]+/g, '');
                $('#edit_slug').val(slug);
            });
        });
    </script>
    <script>
    setTimeout(function () {
        let alert = document.getElementById('success-alert');
        if (alert) {
            alert.style.transition = "opacity 0.5s ease";
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500); // remove from DOM
        }
    }, 3000);
</script>

@endsection