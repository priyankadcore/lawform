@extends('admin.layouts.master')
@section('title', 'Properties')
@section('css')
    <link href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .property-image {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }
    </style>
@endsection

@section('content')
    <x-breadcrub pagetitle="Real Estate" subtitle="Properties" title="Property Management" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <h4 class="card-title">Property List</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-end">
                                        <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">
                                            <i class="mdi mdi-plus-circle me-1"></i> Add Property
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered datatable dt-responsive nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th>Location</th>
                                            <th>Featured</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($properties as $property)
                                        <tr>
                                            <td>
                                                <img src="{{ $property->main_image }}" alt="{{ $property->title }}" class="property-image">
                                            </td>
                                            <td>{{ $property->title }}</td>
                                            <td>{{ $property->propertyType->name }}</td>
                                            <td>{{ $property->propertyStatus->name }}</td>
                                            <td>₹{{ $property->price }}</td>
                                            <td>{{ $property->city->name }}, {{ $property->state->name }}</td>
                                            <td>
                                                @if($property->featured)
                                                    <span class="badge badge-soft-success">Yes</span>
                                                @else
                                                    <span class="badge badge-soft-secondary">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($property->status)
                                                    <span class="badge badge-soft-success">Active</span>
                                                @else
                                                    <span class="badge badge-soft-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.properties.edit', $property->id) }}" 
                                                   class="me-2 text-success" title="Edit">
                                                   <i class="mdi mdi-pencil font-size-18"></i>
                                                </a>
                                                <form action="{{ route('admin.properties.destroy', $property->id) }}" 
                                                      method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger border-0 bg-transparent" 
                                                            title="Delete"
                                                            onclick="return confirm('Are you sure you want to delete this property?')">
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
                    { orderable: false, targets: [0, 8] }
                ],
                order: [[1, 'asc']]
            });
        });
    </script>
@endsection