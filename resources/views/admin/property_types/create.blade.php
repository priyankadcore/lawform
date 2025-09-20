@extends('admin.layouts.master')
@section('title', 'Add Property Type')
@section('content')
    <x-breadcrub pagetitle="Properties" subtitle="Settings" title="Add Property Type" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add New Property Type</h4>
                            @include('admin.property_types.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection