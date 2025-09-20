@extends('admin.layouts.master')
@section('title', 'Team Members')
@section('css')
    <link href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .member-photo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    <x-breadcrub pagetitle="Team Members" subtitle="Management" title="Team Members" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <h4 class="card-title">Team Member List</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-end">
                                        <a href="{{ route('admin.team-members.create') }}" class="btn btn-primary">
                                            <i class="mdi mdi-plus-circle me-1"></i> Add Member
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered datatable dt-responsive nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Position</th>
                                            <th>Company</th>
                                            <th>Rating</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($members as $member)
                                        <tr>
                                            <td>
                                                @if($member->photo)
                                                    <img src="{{ asset('storage/' . $member->photo) }}" 
                                                         alt="{{ $member->name }}" 
                                                         class="member-photo">
                                                @else
                                                    <div class="member-photo bg-light text-center d-flex align-items-center justify-content-center">
                                                        <i class="mdi mdi-account" style="font-size: 24px;"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $member->name }}</td>
                                            <td>{{ $member->email ?? 'N/A' }}</td>
                                            <td>{{ $member->phone ?? 'N/A' }}</td>
                                            <td>{{ $member->position ?? 'N/A' }}</td>
                                            <td>{{ $member->company ?? 'N/A' }}</td>
                                            <td>
                                                @if($member->rating)
                                                    <span class="badge badge-soft-primary">{{ $member->rating }}</span>
                                                @else
                                                    <span class="badge badge-soft-secondary">N/A</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($member->status === 'active')
                                                    <span class="badge badge-soft-success">Active</span>
                                                @else
                                                    <span class="badge badge-soft-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.team-members.edit', $member->id) }}" 
                                                   class="me-3 text-primary" title="Edit">
                                                   <i class="mdi mdi-pencil font-size-18"></i>
                                                </a>
                                                <form action="{{ route('admin.team-members.destroy', $member->id) }}" 
                                                      method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger border-0 bg-transparent" 
                                                            title="Delete"
                                                            onclick="return confirm('Are you sure you want to delete this team member?')">
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
                    { orderable: false, targets: [0, 5] } // Disable sorting for photo and actions columns
                ],
                order: [[1, 'asc']] // Default sort by name
            });
        });
    </script>
@endsection