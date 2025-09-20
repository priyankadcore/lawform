@extends('admin.layouts.master')
@section('title', 'Add Service')
@section('content')
    <x-breadcrub pagetitle="Services" subtitle="Management" title="Add Service" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add New Service</h4>
                            @include('admin.services.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection