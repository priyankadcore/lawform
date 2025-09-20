@extends('admin.layouts.master')
@section('title', 'Add State')
@section('content')
    <x-breadcrub 
        pagetitle="System" 
        subtitle="Locations" 
        title="Add State" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add New State</h4>
                            @include('admin.states.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection