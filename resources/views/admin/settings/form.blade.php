@php
    $action = isset($setting) 
        ? route('admin.settings.update', $setting->id) 
        : route('admin.settings.store');
    $method = isset($setting) ? 'PUT' : 'POST';
@endphp

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="site_name" class="form-label">Site Name *</label>
            <input type="text" class="form-control @error('site_name') is-invalid @enderror" 
                   id="site_name" name="site_name" value="{{ old('site_name', $setting->site_name ?? '') }}" required>
            @error('site_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" class="form-control @error('logo') is-invalid @enderror" 
                   id="logo" name="logo" accept="image/*">
            @error('logo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            
            @if(isset($setting) && $setting->logo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" class="img-thumbnail" style="max-height: 60px;">
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="remove_logo" name="remove_logo" value="1">
                        <label class="form-check-label" for="remove_logo">Remove current logo</label>
                    </div>
                </div>
            @endif
        </div>
        <div class="col-md-3">
            <label for="favicon" class="form-label">Favicon</label>
            <input type="file" class="form-control @error('favicon') is-invalid @enderror" 
                   id="favicon" name="favicon" accept="image/*">
            @error('favicon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            
            @if(isset($setting) && $setting->favicon)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $setting->favicon) }}" alt="Favicon" class="img-thumbnail" style="max-height: 60px;">
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="remove_favicon" name="remove_favicon" value="1">
                        <label class="form-check-label" for="remove_favicon">Remove current favicon</label>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                   id="email" name="email" value="{{ old('email', $setting->email ?? '') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                   id="phone" name="phone" value="{{ old('phone', $setting->phone ?? '') }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control @error('address') is-invalid @enderror" 
                      id="address" name="address" rows="2">{{ old('address', $setting->address ?? '') }}</textarea>
            @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-3">
            <label for="facebook" class="form-label">Facebook URL</label>
            <input type="url" class="form-control @error('facebook') is-invalid @enderror" 
                   id="facebook" name="facebook" value="{{ old('facebook', $setting->facebook ?? '') }}">
            @error('facebook')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="twitter" class="form-label">Twitter URL</label>
            <input type="url" class="form-control @error('twitter') is-invalid @enderror" 
                   id="twitter" name="twitter" value="{{ old('twitter', $setting->twitter ?? '') }}">
            @error('twitter')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="instagram" class="form-label">Instagram URL</label>
            <input type="url" class="form-control @error('instagram') is-invalid @enderror" 
                   id="instagram" name="instagram" value="{{ old('instagram', $setting->instagram ?? '') }}">
            @error('instagram')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="linkedin" class="form-label">LinkedIn URL</label>
            <input type="url" class="form-control @error('linkedin') is-invalid @enderror" 
                   id="linkedin" name="linkedin" value="{{ old('linkedin', $setting->linkedin ?? '') }}">
            @error('linkedin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <label for="about_us" class="form-label">About Us</label>
            <textarea class="form-control ckeditor @error('about_us') is-invalid @enderror" 
                      id="about_us" name="about_us" rows="5">{{ old('about_us', $setting->about_us ?? '') }}</textarea>
            @error('about_us')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="terms_conditions" class="form-label">Terms & Conditions</label>
            <textarea class="form-control ckeditor @error('terms_conditions') is-invalid @enderror" 
                      id="terms_conditions" name="terms_conditions" rows="5">{{ old('terms_conditions', $setting->terms_conditions ?? '') }}</textarea>
            @error('terms_conditions')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="privacy_policy" class="form-label">Privacy Policy</label>
            <textarea class="form-control ckeditor @error('privacy_policy') is-invalid @enderror" 
                      id="privacy_policy" name="privacy_policy" rows="5">{{ old('privacy_policy', $setting->privacy_policy ?? '') }}</textarea>
            @error('privacy_policy')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="mdi mdi-content-save me-1"></i> Save
        </button>
        <a href="{{ route('admin.settings.index') }}" class="btn btn-secondary">
            <i class="mdi mdi-close me-1"></i> Cancel
        </a>
    </div>
</form>

@push('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    document.querySelectorAll('.ckeditor').forEach(textarea => {
        CKEDITOR.replace(textarea, {
            toolbar: [
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
                { name: 'links', items: ['Link', 'Unlink'] },
                { name: 'tools', items: ['Maximize'] },
                { name: 'document', items: ['Source'] }
            ],
            height: 200,
            removePlugins: 'elementspath',
            resize_enabled: false
        });
    });
</script>
@endpush