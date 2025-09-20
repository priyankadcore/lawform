@extends('admin.layouts.master')
@section('title', 'Add Setting')
@section('content')
    <x-breadcrub pagetitle="General Setting" title="Settings" subtitle="Management" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New Setting</h4>
                            @include('admin.settings.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection