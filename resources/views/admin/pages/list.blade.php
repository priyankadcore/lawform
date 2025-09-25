@extends('admin.layouts.master')
@section('title')
    Admin | All Pages
@endsection

@section('css')
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
                                            {{-- <th>#</th> --}}
                                            <th>Page Name</th>
                                            <th>Slug</th>
                                            <th>Section</th>
                                            <th>Status</th>
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
                </div>
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
@endsection