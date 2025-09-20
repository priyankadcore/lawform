@extends('admin.layouts.master')
@section('title', 'View Subscriber')
@section('content')
    <x-breadcrub pagetitle="Newsletter" subtitle="Subscribers" title="View Subscriber" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title mb-4">Subscriber Details</h4>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-sm-end">
                                        <a href="{{ route('admin.subscribers.edit', $subscriber->id) }}" class="btn btn-primary">
                                            <i class="mdi mdi-pencil me-1"></i> Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $subscriber->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ $subscriber->name ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td>{{ $subscriber->phone ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                @if($subscriber->status === 'active')
                                                    <span class="badge badge-soft-success">Active</span>
                                                @elseif($subscriber->status === 'unsubscribed')
                                                    <span class="badge badge-soft-danger">Unsubscribed</span>
                                                @else
                                                    <span class="badge badge-soft-warning">Bounced</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Email Verified</th>
                                            <td>
                                                @if($subscriber->email_verified_at)
                                                    <span class="badge badge-soft-success">Yes ({{ $subscriber->email_verified_at->format('M d, Y H:i') }})</span>
                                                @else
                                                    <span class="badge badge-soft-warning">No</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Subscribed At</th>
                                            <td>{{ $subscriber->created_at->format('M d, Y H:i') }}</td>
                                        </tr>
                                        @if($subscriber->deleted_at)
                                        <tr>
                                            <th>Deleted At</th>
                                            <td>{{ $subscriber->deleted_at->format('M d, Y H:i') }}</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="mt-4">
                                @if(!$subscriber->email_verified_at)
                                <a href="{{ route('admin.subscribers.verify', $subscriber->id) }}" class="btn btn-info me-2">
                                    <i class="mdi mdi-check-circle me-1"></i> Mark as Verified
                                </a>
                                @endif
                                
                                @if($subscriber->status !== 'unsubscribed')
                                <a href="{{ route('admin.subscribers.unsubscribe', $subscriber->id) }}" class="btn btn-warning me-2">
                                    <i class="mdi mdi-email-remove me-1"></i> Unsubscribe
                                </a>
                                @endif
                                
                                <a href="{{ route('admin.subscribers.index') }}" class="btn btn-secondary">
                                    <i class="mdi mdi-arrow-left me-1"></i> Back to List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection