@extends('admin.layouts.master')
@section('title', 'Add Team Member')
@section('content')
    <x-breadcrub pagetitle="Team Members" subtitle="Management" title="Add Member" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add New Team Member</h4>
                            @include('admin.team-members.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection