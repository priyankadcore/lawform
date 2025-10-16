@extends('admin.layouts.master')
@section('title')
  Contact List
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Contact Management</h4>
                <div class="page-title-right">
                    <button class="btn btn-outline-secondary" id="refreshBtn">
                        <i class="fas fa-sync-alt mr-1"></i> Refresh
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Overview Stats -->
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="mb-0">1,254</h4>
                            <p class="text-muted mb-0">Total Contacts</p>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="avatar-sm rounded-circle bg-primary bg-soft text-center">
                                <i class="fas fa-users font-20 avatar-title text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="mb-0">856</h4>
                            <p class="text-muted mb-0">New Today</p>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="avatar-sm rounded-circle bg-success bg-soft text-center">
                                <i class="fas fa-user-plus font-20 avatar-title text-success"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="mb-0">42</h4>
                            <p class="text-muted mb-0">Unread Messages</p>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="avatar-sm rounded-circle bg-warning bg-soft text-center">
                                <i class="fas fa-envelope font-20 avatar-title text-warning"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 42%" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="mb-0">98%</h4>
                            <p class="text-muted mb-0">Response Rate</p>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="avatar-sm rounded-circle bg-info bg-soft text-center">
                                <i class="fas fa-chart-line font-20 avatar-title text-info"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters and Actions -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   
                    <!-- Contacts List -->
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover" id="contactsTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="selectAll">
                                        </div>
                                    </th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Contact 1 -->
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="contactCheck">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm rounded-circle bg-soft-primary text-center me-3">
                                                <i class="fas fa-user font-16 avatar-title text-primary"></i>
                                            </div>
                                            <div>
                                                <h5 class="font-14 mb-1">John Doe</h5>
                                                <small class="text-muted">Customer</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>john.doe@email.com</td>
                                    <td>+1 234 567 890</td>
                                    <td>Website Inquiry</td>
                                    <td>
                                        <span class="badge badge-soft-warning">Unread</span>
                                    </td>
                                    <td>2024-01-15</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-primary" title="View">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-success" title="Reply">
                                                <i class="fas fa-reply"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- DataTables CSS and JS -->
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize DataTable
        const table = $('#contactsTable').DataTable({
            "pageLength": 10,
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            "order": [[6, 'desc']], // Sort by date descending
            "language": {
                "search": "",
                "searchPlaceholder": "Search contacts...",
                "lengthMenu": "Show _MENU_ entries",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "Showing 0 to 0 of 0 entries",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                }
            },
            "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rt<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
            "columns": [
                { "orderable": false }, // Checkbox column
                null, // Contact
                null, // Email
                null, // Phone
                null, // Subject
                null, // Status
                null, // Date
                { "orderable": false } // Actions
            ]
        });

        // Custom search input
        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });

        // Status filter
        $('#statusFilter').on('change', function() {
            const status = this.value;
            if (status) {
                table.column(5).search(status, true, false).draw();
            } else {
                table.column(5).search('').draw();
            }
        });

        // Select All functionality
        const selectAll = document.getElementById('selectAll');
        selectAll.addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('input[name="contactCheck"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });
        });

        // Refresh button
        document.getElementById('refreshBtn').addEventListener('click', function() {
            table.ajax.reload();
        });

        // Delete button functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-outline-danger')) {
                const contactName = e.target.closest('tr').querySelector('.font-14').textContent;
                if (confirm(`Are you sure you want to delete ${contactName}?`)) {
                    // Add your delete logic here
                    e.target.closest('tr').remove();
                    table.draw();
                }
            }
        });

        // View button functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-outline-primary')) {
                const contactName = e.target.closest('tr').querySelector('.font-14').textContent;
                alert(`View details for: ${contactName}`);
                // Add your view logic here
            }
        });

        // Reply button functionality
        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-outline-success')) {
                const contactEmail = e.target.closest('tr').querySelector('td:nth-child(3)').textContent;
                alert(`Reply to: ${contactEmail}`);
                // Add your reply logic here
            }
        });
    });
</script>
@endsection

<style>
.avatar-sm {
    width: 40px;
    height: 40px;
    line-height: 40px;
}
.bg-soft-primary { background-color: rgba(85, 110, 230, 0.1); }
.bg-soft-success { background-color: rgba(52, 195, 143, 0.1); }
.bg-soft-warning { background-color: rgba(250, 192, 76, 0.1); }
.bg-soft-info { background-color: rgba(80, 165, 241, 0.1); }
.bg-soft-danger { background-color: rgba(242, 101, 107, 0.1); }
.badge-soft-warning { background-color: rgba(250, 192, 76, 0.1); color: #f9b43b; }
.badge-soft-success { background-color: rgba(52, 195, 143, 0.1); color: #34c38f; }
.badge-soft-primary { background-color: rgba(85, 110, 230, 0.1); color: #556ee6; }
.badge-soft-secondary { background-color: rgba(132, 146, 166, 0.1); color: #8492a6; }
.search-icon {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #74788d;
}

/* DataTable Custom Styling */
.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter {
    margin-bottom: 1rem;
}

.dataTables_wrapper .dataTables_filter input {
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    padding: 0.375rem 0.75rem;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    border: 1px solid #dee2e6;
    padding: 0.375rem 0.75rem;
    margin-left: -1px;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background: #007bff;
    color: white !important;
    border-color: #007bff;
}

/* Hide default DataTable search */
.dataTables_filter {
    display: none;
}
</style>