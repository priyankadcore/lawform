@extends('admin.layouts.master')
@section('title')
    Countries
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- Flag icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icons/6.6.6/css/flag-icons.min.css" />
    <style>
        .fi {
            width: 24px;
            height: 18px;
            border: 1px solid #dee2e6;
            background-size: cover;
            display: inline-block;
            vertical-align: middle;
            margin-right: 5px;
        }
    </style>
@endsection
@section(section: 'content')
    <x-breadcrub pagetitle="System" subtitle="Locations" title="Countries" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <h4 class="card-title">Country List</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-end">
                                        <a href="{{ route('admin.countries.create') }}" class="btn btn-primary">
                                            <i class="mdi mdi-plus-circle me-1"></i> Add Country
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered datatable dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead class="thead-light">
                                        <tr>
                                            <th style="width: 20px;">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="countrycheck">
                                                    <label class="form-check-label" for="countrycheck">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Flag</th>
                                            <th>Country Name</th>
                                            <th>Code</th>
                                            <th>Phone Code</th>
                                            <th>Currency</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th style="width: 120px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($countries as $country)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="countrycheck{{ $country->id }}">
                                                    <label class="form-check-label" for="countrycheck{{ $country->id }}">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>
                                                @if($country->code)
                                                    <span class="fi fi-{{ strtolower($country->code) }}"></span>
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                            <td>{{ $country->name }}</td>
                                            <td>{{ $country->code ?? 'N/A' }}</td>
                                            <td>{{ $country->phone_code ?? 'N/A' }}</td>
                                            <td>
                                                @if($country->currency_symbol && $country->currency)
                                                    {{ $country->currency_symbol }} ({{ $country->currency }})
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                @if($country->status)
                                                    <span class="badge badge-soft-success">Active</span>
                                                @else
                                                    <span class="badge badge-soft-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>{{ $country->created_at->format('d M, Y') }}</td>
                                            <td id="tooltip-container{{ $country->id }}">
                                                <a href="{{ route('admin.countries.edit', $country->id) }}" class="me-3 text-primary"
                                                    data-bs-container="#tooltip-container{{ $country->id }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Edit">
                                                    <i class="mdi mdi-pencil font-size-18"></i>
                                                </a>
                                                <form action="{{ route('admin.countries.destroy', $country->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger border-0 bg-transparent"
                                                        data-bs-container="#tooltip-container{{ $country->id }}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Delete"
                                                        onclick="return confirm('Are you sure you want to delete this country?')">
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
            <!-- end row -->
        </div>
    </div> <!-- container-fluid -->
@endsection

@section('scripts')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: [0, 1, 8] }, // Disable sorting for checkbox, flag, and action columns
                    { searchable: false, targets: [0, 1, 6, 8] } // Disable searching for these columns
                ],
                order: [[2, 'asc']] // Default sort by country name
            });

            // Initialize tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection