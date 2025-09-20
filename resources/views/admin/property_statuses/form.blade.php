@php
    $action = isset($propertyStatus) 
        ? route('admin.property_statuses.update', $propertyStatus->id) 
        : route('admin.property_statuses.store');
    $method = isset($propertyStatus) ? 'PUT' : 'POST';
@endphp

<form method="POST" action="{{ $action }}">
    @csrf
    @method($method)

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Name *</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                   id="name" name="name" value="{{ old('name', $propertyStatus->name ?? '') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="color" class="form-label">Color *</label>
            <input type="color" class="form-control form-control-color @error('color') is-invalid @enderror" 
                   id="color" name="color" value="{{ old('color', $propertyStatus->color ?? '#6c757d') }}" required>
            @error('color')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="sort_order" class="form-label">Sort Order</label>
            <input type="number" class="form-control @error('sort_order') is-invalid @enderror" 
                   id="sort_order" name="sort_order" value="{{ old('sort_order', $propertyStatus->sort_order ?? 0) }}">
            @error('sort_order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Status</label>
            <div class="col-md-6">
            <label class="form-label">Status</label>
            <div class="form-check form-switch">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" class="form-check-input" id="status" name="status" value="1"
                    {{ old('status', $propertyStatus->status ?? 0) ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Active</label>
            </div>
        </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="mdi mdi-content-save me-1"></i> Save
        </button>
        <a href="{{ route('admin.property_statuses.index') }}" class="btn btn-secondary">
            <i class="mdi mdi-close me-1"></i> Cancel
        </a>
    </div>
</form>