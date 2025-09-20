@php
    $action = isset($state) ? route('admin.states.update', $state->id) : route('admin.states.store');
    $method = isset($state) ? 'PUT' : 'POST';
@endphp

<form method="POST" action="{{ $action }}">
    @csrf
    @method($method)

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="country_id" class="form-label">Country *</label>
            <select class="form-select @error('country_id') is-invalid @enderror" id="country_id" name="country_id"
                required>
                <option value="">Select Country</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}"
                        {{ old('country_id', $state->country_id ?? '') == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
            @error('country_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">State Name *</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $state->name ?? '') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="code" class="form-label">State Code</label>
            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code"
                value="{{ old('code', $state->code ?? '') }}">
            @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Status</label>
            <div class="form-check form-switch">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" class="form-check-input" id="status" name="status" value="1"
                    {{ old('status', $state->status ?? true) ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Active</label>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="mdi mdi-content-save me-1"></i> Save
        </button>
        <a href="{{ route('admin.states.index') }}" class="btn btn-secondary">
            <i class="mdi mdi-close me-1"></i> Cancel
        </a>
    </div>
</form>
