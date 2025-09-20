@extends('admin.layouts.master')
@section('title', 'Property Statuses')
@section('css')
    <link href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <x-breadcrub pagetitle="Properties" subtitle="Settings" title="Statuses" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <h4 class="card-title">Property Status List</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-end">
                                        <a href="{{ route('admin.property_statuses.create') }}" class="btn btn-primary">
                                            <i class="mdi mdi-plus-circle me-1"></i> Add Status
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered datatable dt-responsive nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Color</th>
                                            <th>Sort Order</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($statuses as $status)
                                        <tr>
                                            <td>
                                                <span class="badge" style="background-color: {{ $status->color }}; color: white;">
                                                    {{ $status->name }}
                                                </span>
                                            </td>
                                            <td>
                                                <div style="width: 20px; height: 20px; background-color: {{ $status->color }}; border: 1px solid #ddd;"></div>
                                                <small>{{ $status->color }}</small>
                                            </td>
                                            <td>{{ $status->sort_order }}</td>
                                            <td>
                                                @if($status->status)
                                                    <span class="badge badge-soft-success">Active</span>
                                                @else
                                                    <span class="badge badge-soft-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.property_statuses.edit', $status->id) }}" 
                                                   class="me-3 text-primary" title="Edit">
                                                   <i class="mdi mdi-pencil font-size-18"></i>
                                                </a>
                                                <form action="{{ route('admin.property_statuses.destroy', $status->id) }}" 
                                                      method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger border-0 bg-transparent" 
                                                            title="Delete"
                                                            onclick="return confirm('Are you sure you want to delete this status?')">
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
                    { orderable: false, targets: [4] } // Disable sorting for action column
                ],
                order: [[2, 'asc']] // Default sort by sort_order
            });
        });
    </script>
@endsection