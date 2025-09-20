@extends('admin.layouts.master')
@section('title', 'Edit Team Member')
@section('content')
    <x-breadcrub pagetitle="Team Members" subtitle="Management" title="Edit Member" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit Team Member</h4>
                            @include('admin.team-members.form', ['teamMember' => $teamMember])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection