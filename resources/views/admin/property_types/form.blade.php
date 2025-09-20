<!-- resources/views/admin/property_types/form.blade.php -->
@php
    $action = isset($propertyType)
        ? route('admin.property_types.update', $propertyType->id)
        : route('admin.property_types.store');
    $method = isset($propertyType) ? 'PUT' : 'POST';
@endphp

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Name *</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $propertyType->name ?? '') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="icon" class="form-label">Icon Class</label>
            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon"
                value="{{ old('icon', $propertyType->icon ?? '') }}" placeholder="Example: mdi mdi-home">
            @error('icon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                rows="3">{{ old('description', $propertyType->description ?? '') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                name="image" accept="image/*">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if (isset($propertyType) && $propertyType->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $propertyType->image) }}" alt="{{ $propertyType->name }}"
                        class="img-thumbnail" style="max-height: 100px;">
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="remove_image" name="remove_image"
                            value="1">
                        <label class="form-check-label" for="remove_image">Remove current image</label>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <label class="form-label">Status</label>
            <div class="form-check form-switch">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" class="form-check-input" id="status" name="status" value="1"
                    {{ old('status', $propertyType->status ?? 0) ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Active</label>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="mdi mdi-content-save me-1"></i> Save
        </button>
        <a href="{{ route('admin.property_types.index') }}" class="btn btn-secondary">
            <i class="mdi mdi-close me-1"></i> Cancel
        </a>
    </div>
</form>
