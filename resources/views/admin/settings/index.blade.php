@extends('admin.layouts.master')
@section('title', 'Settings')
@section('css')
    <link href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .settings-logo {
            max-width: 80px;
            max-height: 50px;
            object-fit: contain;
        }
    </style>
@endsection

@section('content')
    <x-breadcrub pagetitle="General Setting" title="Settings" subtitle="Management" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <h4 class="card-title">Settings List</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-end">
                                        <a href="{{ route('admin.settings.create') }}" class="btn btn-primary">
                                            <i class="mdi mdi-plus-circle me-1"></i> Add New Setting
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered datatable dt-responsive nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>ID</th>
                                            <th>Site Name</th>
                                            <th>Logo</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($settings as $setting)
                                        <tr>
                                            <td>{{ $setting->id }}</td>
                                            <td>{{ $setting->site_name }}</td>
                                            <td>
                                                @if($setting->logo)
                                                    <img src="{{ asset('storage/' . $setting->logo) }}" 
                                                         alt="Logo" class="settings-logo img-thumbnail">
                                                @else
                                                    <span class="text-muted">No logo</span>
                                                @endif
                                            </td>
                                            <td>{{ $setting->email ?? 'N/A' }}</td>
                                            <td>{{ $setting->phone ?? 'N/A' }}</td>
                                            <td>{{ $setting->updated_at->format('M d, Y H:i') }}</td>
                                            <td>
                                                <a href="{{ route('admin.settings.edit', $setting->id) }}" 
                                                   class="me-3 text-primary" title="Edit">
                                                   <i class="mdi mdi-pencil font-size-18"></i>
                                                </a>
                                                <form action="{{ route('admin.settings.destroy', $setting->id) }}" 
                                                      method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger border-0 bg-transparent" 
                                                            title="Delete"
                                                            onclick="return confirm('Are you sure you want to delete this setting?')">
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
                columnDefs: [{
                        orderable: false,
                        targets: [5]
                    } // Disable sorting for actions column
                ],
                order: [
                    [4, 'desc']
                ] // Default sort by subscribed date
            });
        });
    </script>
@endsection