@extends('admin.layouts.master')
@section('title', 'Sliders')
@section('css')

    <link href="{{ URL::asset('build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .slider-image {
            max-width: 150px;
            max-height: 80px;
            object-fit: cover;
        }

        .status-toggle {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <x-breadcrub pagetitle="Home" subtitle="Sliders" title="Slider Management" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <h4 class="card-title">Slider List</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-end">
                                        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
                                            <i class="mdi mdi-plus-circle me-1"></i> Add Slider
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
                                            <th>Subtitle</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sliders as $slider)
                                            <tr>
                                                <td>
                                                    <img src="{{ $slider->image_url }}" alt="{{ $slider->title }}"
                                                        class="slider-image">
                                                </td>
                                                <td>{{ $slider->title }}</td>
                                                <td>{{ $slider->subtitle ?? 'N/A' }}</td>
                                                <td>
                                                    <div class="form-check form-switch status-toggle">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="status-{{ $slider->id }}" data-id="{{ $slider->id }}"
                                                            {{ $slider->status ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="status-{{ $slider->id }}"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.sliders.edit', $slider->id) }}"
                                                        class="me-3 text-primary" title="Edit">
                                                        <i class="mdi mdi-pencil font-size-18"></i>
                                                    </a>
                                                    <form action="{{ route('admin.sliders.destroy', $slider->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-danger border-0 bg-transparent"
                                                            title="Delete"
                                                            onclick="return confirm('Are you sure you want to delete this slider?')">
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
                    targets: [0, 3, 4]
                }],
                order: [
                    [1, 'asc']
                ]
            });

            // Status toggle
            $('.status-toggle input').change(function() {
                var sliderId = $(this).data('id');
                var status = $(this).is(':checked') ? 1 : 0;

                $.ajax({
                    // In your JavaScript
                    url: "{{ route('admin.sliders.status.update', ['slider' => ':id']) }}".replace(
                        ':id', sliderId),
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        status: status
                    },
                    success: function(response) {
                        toastr.success(response.success);
                    },
                    error: function(xhr) {
                        toastr.error('Error updating status');
                    }
                });
            });
        });
    </script>
@endsection
