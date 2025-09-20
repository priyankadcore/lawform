@extends('admin.layouts.master')
@section('title', 'Add Slider')
@section('content')
    <x-breadcrub pagetitle="Home" subtitle="Sliders" title="Add Slider" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Add New Slider</h4>
                            <form method="POST" action="{{ route('admin.sliders.store') }}" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="title" class="form-label">Title *</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                               id="title" name="title" value="{{ old('title') }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="subtitle" class="form-label">Subtitle</label>
                                        <input type="text" class="form-control @error('subtitle') is-invalid @enderror" 
                                               id="subtitle" name="subtitle" value="{{ old('subtitle') }}">
                                        @error('subtitle')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="3">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="image" class="form-label">Image *</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                                               id="image" name="image" required accept="image/*">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Status</label>
                                        <div class="form-check form-switch">
                                            <input type="checkbox" class="form-check-input" 
                                                   id="status" name="status" value="1">
                                            <label class="form-check-label" for="status">Active</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="button_text" class="form-label">Button Text</label>
                                        <input type="text" class="form-control @error('button_text') is-invalid @enderror" 
                                               id="button_text" name="button_text" value="{{ old('button_text') }}">
                                        @error('button_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="button_link" class="form-label">Button Link</label>
                                        <input type="url" class="form-control @error('button_link') is-invalid @enderror" 
                                               id="button_link" name="button_link" value="{{ old('button_link') }}">
                                        @error('button_link')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="mdi mdi-content-save me-1"></i> Save
                                    </button>
                                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">
                                        <i class="mdi mdi-close me-1"></i> Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
