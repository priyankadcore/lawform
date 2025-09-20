@php
    $action = isset($teamMember)
        ? route('admin.team-members.update', $teamMember->id)
        : route('admin.team-members.store');
    $method = isset($teamMember) ? 'PUT' : 'POST';

    $socialLinks = isset($teamMember)
        ? $teamMember->social_links
        : [
            'facebook' => null,
            'twitter' => null,
            'linkedin' => null,
            'instagram' => null,
        ];
@endphp

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="name" class="form-label">Name *</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $teamMember->name ?? '') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo"
                name="photo" accept="image/*">
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if (isset($teamMember) && $teamMember->photo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $teamMember->photo) }}" alt="{{ $teamMember->name }}"
                        class="img-thumbnail" style="max-height: 100px;">
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="remove_photo" name="remove_photo"
                            value="1">
                        <label class="form-check-label" for="remove_photo">Remove current photo</label>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                name="email" value="{{ old('email', $teamMember->email ?? '') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                name="phone" value="{{ old('phone', $teamMember->phone ?? '') }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control @error('position') is-invalid @enderror" id="position"
                name="position" value="{{ old('position', $teamMember->position ?? '') }}">
            @error('position')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="company" class="form-label">Company</label>
            <input type="text" class="form-control @error('company') is-invalid @enderror" id="company"
                name="company" value="{{ old('company', $teamMember->company ?? '') }}">
            @error('company')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <label for="bio" class="form-label">Bio</label>
            <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" rows="3">{{ old('bio', $teamMember->bio ?? '') }}</textarea>
            @error('bio')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <h5>Social Links</h5>
            <div class="row">
                <div class="col-md-3">
                    <label for="facebook" class="form-label">Facebook</label>
                    <input type="url" class="form-control @error('social_links.facebook') is-invalid @enderror"
                        id="facebook" name="social_links[facebook]"
                        value="{{ old('social_links.facebook', $socialLinks['facebook'] ?? '') }}"
                        placeholder="https://facebook.com/username">
                    @error('social_links.facebook')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="twitter" class="form-label">Twitter</label>
                    <input type="url" class="form-control @error('social_links.twitter') is-invalid @enderror"
                        id="twitter" name="social_links[twitter]"
                        value="{{ old('social_links.twitter', $socialLinks['twitter'] ?? '') }}"
                        placeholder="https://twitter.com/username">
                    @error('social_links.twitter')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="linkedin" class="form-label">LinkedIn</label>
                    <input type="url" class="form-control @error('social_links.linkedin') is-invalid @enderror"
                        id="linkedin" name="social_links[linkedin]"
                        value="{{ old('social_links.linkedin', $socialLinks['linkedin'] ?? '') }}"
                        placeholder="https://linkedin.com/in/username">
                    @error('social_links.linkedin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="url" class="form-control @error('social_links.instagram') is-invalid @enderror"
                        id="instagram" name="social_links[instagram]"
                        value="{{ old('social_links.instagram', $socialLinks['instagram'] ?? '') }}"
                        placeholder="https://instagram.com/username">
                    @error('social_links.instagram')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="rating" class="form-label">Rating *</label>
            <select class="form-select @error('rating') is-invalid @enderror" id="rating" name="rating"
                required>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}"
                        {{ old('rating', $teamMember->rating ?? 5) == $i ? 'selected' : '' }}>
                        {{ str_repeat('★', $i) . str_repeat('☆', 5 - $i) }} ({{ $i }}
                        star{{ $i > 1 ? 's' : '' }})
                    </option>
                @endfor
            </select>
            @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="status" class="form-label">Status *</label>
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status"
                required>
                <option value="active"
                    {{ old('status', $teamMember->status ?? '') === 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive"
                    {{ old('status', $teamMember->status ?? '') === 'inactive' ? 'selected' : '' }}>Inactive
                </option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="mdi mdi-content-save me-1"></i> Save
        </button>
        <a href="{{ route('admin.team-members.index') }}" class="btn btn-secondary">
            <i class="mdi mdi-close me-1"></i> Cancel
        </a>
    </div>
</form>
