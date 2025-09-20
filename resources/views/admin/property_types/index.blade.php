@extends('admin.layouts.master')
@section('title', 'Property Types')
@section('css')
    <link href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .property-type-img {
            max-width: 80px;
            max-height: 60px;
            border-radius: 4px;
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    <x-breadcrub pagetitle="Properties" subtitle="Settings" title="Property Types" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <h4 class="card-title">Property Type List</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-end">
                                        <a href="{{ route('admin.property_types.create') }}" class="btn btn-primary">
                                            <i class="mdi mdi-plus-circle me-1"></i> Add Property Type
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered datatable dt-responsive nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Icon</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($propertyTypes as $type)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($type->image)
                                                    <img src="{{ asset('storage/' . $type->image) }}" 
                                                         alt="{{ $type->name }}" 
                                                         class="property-type-img">
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>
                                            <td>{{ $type->name }}</td>
                                            <td>
                                                @if($type->icon)
                                                    <i class="{{ $type->icon }}"></i> {{ $type->icon }}
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($type->status)
                                                    <span class="badge badge-soft-success">Active</span>
                                                @else
                                                    <span class="badge badge-soft-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $type->created_at->format('d M, Y') }}</td>
                                            <td>
                                                <a href="{{ route('admin.property_types.edit', $type->id) }}" 
                                                   class="me-3 text-primary" title="Edit"
                                                   data-bs-toggle="tooltip" data-bs-placement="top">
                                                   <i class="mdi mdi-pencil font-size-18"></i>
                                                </a>
                                                <form action="{{ route('admin.property_types.destroy', $type->id) }}" 
                                                      method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger border-0 bg-transparent" 
                                                            title="Delete" data-bs-toggle="tooltip" data-bs-placement="top"
                                                            onclick="return confirm('Are you sure you want to delete this property type?')">
                                                        <i class="mdi mdi-trash-can font-size-18"></i>
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
@endsection

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{ asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: [1, 6] }, // Disable sorting for image and actions columns
                    { searchable: false, targets: [1, 6] } // Disable searching for these columns
                ],
                order: [[2, 'asc']] // Default sort by name
            });

            // Initialize tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection