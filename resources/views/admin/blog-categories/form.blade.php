@php
    $action = isset($blogCategory) 
        ? route('admin.blog-categories.update', $blogCategory->id) 
        : route('admin.blog-categories.store');
    $method = isset($blogCategory) ? 'PUT' : 'POST';
@endphp

<form method="POST" action="{{ $action }}">
    @csrf
    @method($method)

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Name *</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                   id="name" name="name" value="{{ old('name', $blogCategory->name ?? '') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                   id="sort_order" name="sort_order" value="{{ old('sort_order', $blogCategory->sort_order ?? 0) }}">
            @error('sort_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" 
                      id="description" name="description" rows="3">{{ old('description', $blogCategory->description ?? '') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="meta_title" class="form-label">Meta Title</label>
            <input type="text" class="form-control @error('meta_title') is-invalid @enderror" 
                   id="meta_title" name="meta_title" value="{{ old('meta_title', $blogCategory->meta_title ?? '') }}"
                   maxlength="255">
            @error('meta_title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="meta_description" class="form-label">Meta Description</label>
            <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                      id="meta_description" name="meta_description" 
                      maxlength="500">{{ old('meta_description', $blogCategory->meta_description ?? '') }}</textarea>
            @error('meta_description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Featured</label>
            <div class="form-check form-switch">
                <input type="hidden" name="is_featured" value="0">
                <input type="checkbox" class="form-check-input" 
                       id="is_featured" name="is_featured" value="1"
                       {{ (old('is_featured', $blogCategory->is_featured ?? 0)) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_featured">Mark as featured</label>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Status</label>
            <div class="form-check form-switch">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" class="form-check-input" 
                       id="status" name="status" value="1"
                       {{ (old('status', $blogCategory->status ?? 0)) ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Active</label>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="mdi mdi-content-save me-1"></i> Save
        </button>
        <a href="{{ route('admin.blog-categories.index') }}" class="btn btn-secondary">
            <i class="mdi mdi-close me-1"></i> Cancel
        </a>
    </div>
</form>