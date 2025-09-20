@extends('admin.layouts.master')
@section('title', 'Edit Property Status')
@section('content')
    <x-breadcrub pagetitle="Properties" subtitle="Settings" title="Edit Status" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit Property Status</h4>
                            @include('admin.property_statuses.form', ['propertyStatus' => $propertyStatus])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection