@extends('admin.layouts.master')
@section('title', 'Subscribers')
@section('css')
    <link href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <x-breadcrub pagetitle="Newsletter" subtitle="Subscribers" title="Subscriber Management" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <h4 class="card-title">Subscriber List</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-end">
                                        <a href="{{ route('admin.subscribers.create') }}" class="btn btn-primary me-2">
                                            <i class="mdi mdi-plus-circle me-1"></i> Add Subscriber
                                        </a>
                                        <a href="{{ route('admin.subscribers.export') }}" class="btn btn-success">
                                            <i class="mdi mdi-download me-1"></i> Export
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered datatable dt-responsive nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Email</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Verified</th>
                                            <th>Subscribed At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subscribers as $subscriber)
                                            <tr>
                                                <td>{{ $subscriber->email }}</td>
                                                <td>{{ $subscriber->name ?? 'N/A' }}</td>
                                                <td>
                                                    @if ($subscriber->status === 'active')
                                                        <span class="badge badge-soft-success">Active</span>
                                                    @elseif($subscriber->status === 'unsubscribed')
                                                        <span class="badge badge-soft-danger">Unsubscribed</span>
                                                    @else
                                                        <span class="badge badge-soft-warning">Bounced</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($subscriber->email_verified_at)
                                                        <span class="badge badge-soft-success">Verified</span>
                                                    @else
                                                        <span class="badge badge-soft-warning">Pending</span>
                                                    @endif
                                                </td>
                                                <td>{{ $subscriber->created_at->format('M d, Y') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.subscribers.show', $subscriber->id) }}"
                                                        class="me-2 text-primary" title="View">
                                                        <i class="mdi mdi-eye font-size-18"></i>
                                                    </a>
                                                    <a href="{{ route('admin.subscribers.edit', $subscriber->id) }}"
                                                        class="me-2 text-success" title="Edit">
                                                        <i class="mdi mdi-pencil font-size-18"></i>
                                                    </a>
                                                    @if (!$subscriber->email_verified_at)
                                                        <a href="{{ route('admin.subscribers.verify', $subscriber->id) }}"
                                                            class="me-2 text-info" title="Mark as Verified">
                                                            <i class="mdi mdi-check-circle font-size-18"></i>
                                                        </a>
                                                    @endif
                                                    @if ($subscriber->status !== 'unsubscribed')
                                                        <a href="{{ route('admin.subscribers.unsubscribe', $subscriber->id) }}"
                                                            class="me-2 text-warning" title="Unsubscribe">
                                                            <i class="mdi mdi-email-remove font-size-18"></i>
                                                        </a>
                                                    @endif
                                                    <form
                                                        action="{{ route('admin.subscribers.destroy', $subscriber->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-danger border-0 bg-transparent"
                                                            title="Delete"
                                                            onclick="return confirm('Are you sure you want to delete this subscriber?')">
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
