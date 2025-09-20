@extends('admin.layouts.master')
@section('title')
    Edit Country
@endsection
@section('content')
    <x-breadcrub pagetitle="System" subtitle="Locations" title="Edit Country" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit Country</h4>
                            @include('admin.countries.form', ['country' => $country])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection