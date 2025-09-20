@extends('admin.layouts.master')
@section('title', 'Add Blog Category')
@section('content')
    <x-breadcrub pagetitle="Blog" subtitle="Categories" title="Add Category" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add New Blog Category</h4>
                            @include('admin.blog-categories.form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection