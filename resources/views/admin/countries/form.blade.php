<div class="card">
    <div class="card-body">
        <form method="POST"
            action="{{ isset($country) ? route('admin.countries.update', $country->id) : route('admin.countries.store') }}">
            @csrf
            @if (isset($country))
                @method('PUT')
            @endif

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Country Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $country->name ?? '') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="code" class="form-label">Country Code (ISO 2-letter)</label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                        name="code" value="{{ old('code', $country->code ?? '') }}" maxlength="2"
                        placeholder="US, GB, IN, etc.">
                    @error('code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="phone_code" class="form-label">Phone Code</label>
                    <input type="text" class="form-control @error('phone_code') is-invalid @enderror" id="phone_code"
                        name="phone_code" value="{{ old('phone_code', $country->phone_code ?? '') }}"
                        placeholder="+1, +44, +91, etc.">
                    @error('phone_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="currency" class="form-label">Currency Code</label>
                    <input type="text" class="form-control @error('currency') is-invalid @enderror" id="currency"
                        name="currency" value="{{ old('currency', $country->currency ?? '') }}"
                        placeholder="USD, EUR, INR, etc." maxlength="3">
                    @error('currency')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="currency_symbol" class="form-label">Currency Symbol</label>
                    <input type="text" class="form-control @error('currency_symbol') is-invalid @enderror"
                        id="currency_symbol" name="currency_symbol"
                        value="{{ old('currency_symbol', $country->currency_symbol ?? '') }}"
                        placeholder="$, £, €, etc." maxlength="5">
                    @error('currency_symbol')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Status</label>
                    <div class="form-check form-switch">
                        <input type="hidden" name="status" value="0">
                        <input type="checkbox" class="form-check-input" id="status" name="status" value="1"
                            {{ old('status', $country->status ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Active</label>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary waves-effect waves-light">
                    <i class="mdi mdi-content-save me-1"></i> Save
                </button>
                <a href="{{ route('admin.countries.index') }}" class="btn btn-secondary waves-effect">
                    <i class="mdi mdi-close me-1"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
