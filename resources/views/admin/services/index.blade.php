@extends('admin.layouts.master')
@section('title', 'Services')
@section('css')
    <link href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .service-img {
            max-width: 80px;
            max-height: 60px;
            border-radius: 4px;
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    <x-breadcrub pagetitle="Services" subtitle="Management" title="Services" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <h4 class="card-title">Service List</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-end">
                                        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                                            <i class="mdi mdi-plus-circle me-1"></i> Add Service
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered datatable dt-responsive nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Title</th>
                                            <th>Icon</th>
                                            <th>Image</th>
                                            <th>Featured</th>
                                            <th>Status</th>
                                            <th>Sort Order</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($services as $service)
                                        <tr>
                                            <td>{{ $service->title }}</td>
                                            <td>
                                                @if($service->icon)
                                                    <i class="{{ $service->icon }}"></i>
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($service->image)
                                                    <img src="{{ asset('storage/' . $service->image) }}" 
                                                         alt="{{ $service->title }}" 
                                                         class="service-img">
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($service->featured)
                                                    <span class="badge badge-soft-success">Yes</span>
                                                @else
                                                    <span class="badge badge-soft-secondary">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($service->status)
                                                    <span class="badge badge-soft-success">Active</span>
                                                @else
                                                    <span class="badge badge-soft-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $service->sort_order }}</td>
                                            <td>
                                                <a href="{{ route('admin.services.edit', $service->id) }}" 
                                                   class="me-3 text-primary" title="Edit">
                                                   <i class="mdi mdi-pencil font-size-18"></i>
                                                </a>
                                                <form action="{{ route('admin.services.destroy', $service->id) }}" 
                                                      method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger border-0 bg-transparent" 
                                                            title="Delete"
                                                            onclick="return confirm('Are you sure you want to delete this service?')">
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
    <script src="{{ asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: [1, 2, 6] } // Disable sorting for icon, image and actions columns
                ],
                order: [[5, 'asc']] // Default sort by sort_order
            });
        });
    </script>
@endsection