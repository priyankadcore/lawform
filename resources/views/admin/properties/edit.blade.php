@extends('admin.layouts.master')
@section('title', 'Edit Property')
@section('content')
    <x-breadcrub pagetitle="Real Estate" title="Edit Property" subtitle="Property Management" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit Property</h4>
                            @include('admin.properties.form', [
                                'property' => $property,
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
