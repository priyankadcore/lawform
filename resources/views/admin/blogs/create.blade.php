@extends('admin.layouts.master')
@section('title', 'Add Blog Post')
@section('content')
    <x-breadcrub pagetitle="Blog" subtitle="Management" title="Add Post" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add New Blog Post</h4>
                            @include('admin.blogs.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection