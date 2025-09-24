@extends('admin.layouts.master')
@section('title', 'Add Property')
@section('content')
    <x-breadcrub pagetitle="Real Estate" title="Add Property" subtitle="Property Management" />


    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add New Property</h4>
                            @include('admin.properties.form', [
                                'countries' => $countries,
                                'types' => $types,
                                'statuses' => $statuses,
                                'agents' => $agents
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection