@extends('admin.layouts.master')
@section('title', 'Add City')
@section('content')
    <x-breadcrub pagetitle="System" subtitle="Locations" title="Add City" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add New City</h4>
                            @include('admin.cities.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection