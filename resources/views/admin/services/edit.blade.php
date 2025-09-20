@extends('admin.layouts.master')
@section('title', 'Edit Service')
@section('content')
    <x-breadcrub pagetitle="Services" subtitle="Management" title="Edit Service" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit Service</h4>
                            @include('admin.services.form', ['service' => $service])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection