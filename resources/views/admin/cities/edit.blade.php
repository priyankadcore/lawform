<div>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
</div>
@extends('admin.layouts.master')
@section('title', 'Edit City')
@section('content')
    <x-breadcrub pagetitle="System" subtitle="Locations" title="Edit City" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit City</h4>
                            @include('admin.cities.form', ['city' => $city])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection