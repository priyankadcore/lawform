@php
    // Determine if we're editing or creating
$isEdit = isset($property);
$action = $isEdit ? route('admin.properties.update', $property->id) : route('admin.properties.store');
$method = $isEdit ? 'PUT' : 'POST';

$states = $isEdit ? \App\Models\State::where('country_id', $property->country_id)->get() : collect();
$cities = $isEdit ? \App\Models\City::where('state_id', $property->state_id)->get() : collect();
@endphp

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @method($method)

    <!-- Basic Information Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Basic Information</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title', $property->title ?? '') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="price" class="form-label">Price *</label>
                        <div class="input-group">
                            <span class="input-group-text">₹</span>
                            <input type="number" step="0.01"
                                class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                                value="{{ old('price', $property->price ?? '') }}" required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description *</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    rows="5" required>{{ old('description', $property->description ?? '') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Location Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Location</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="address" class="form-label">Address *</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                            name="address" value="{{ old('address', $property->address ?? '') }}" required>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="latitude" class="form-label">Latitude</label>
                        <input type="number" step="0.000001"
                            class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude"
                            value="{{ old('latitude', $property->latitude ?? '') }}">
                        @error('latitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="longitude" class="form-label">Longitude</label>
                        <input type="number" step="0.000001"
                            class="form-control @error('longitude') is-invalid @enderror" id="longitude"
                            name="longitude" value="{{ old('longitude', $property->longitude ?? '') }}">
                        @error('longitude')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="country_id" class="form-label">Country *</label>
                        <select class="form-select @error('country_id') is-invalid @enderror" id="country_id"
                            name="country_id" required>
                            <option value="">Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}"
                                    {{ old('country_id', $property->country_id ?? '') == $country->id ? 'selected' : '' }}>
                                    {{ $country->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="state_id" class="form-label">State *</label>
                        <select class="form-select @error('state_id') is-invalid @enderror" id="state_id"
                            name="state_id" required>
                            <option value="">Select State</option>
                            @if ($isEdit)
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}"
                                        {{ old('state_id', $property->state_id ?? '') == $state->id ? 'selected' : '' }}>
                                        {{ $state->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('state_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="city_id" class="form-label">City *</label>
                        <select class="form-select @error('city_id') is-invalid @enderror" id="city_id"
                            name="city_id" required>
                            <option value="">Select City</option>
                            @if ($isEdit)
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}"
                                        {{ old('city_id', $property->city_id ?? '') == $city->id ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                        @error('city_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Property Details Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Property Details</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="property_type_id" class="form-label">Property Type *</label>
                        <select class="form-select @error('property_type_id') is-invalid @enderror"
                            id="property_type_id" name="property_type_id" required>
                            <option value="">Select Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}"
                                    {{ old('property_type_id', $property->property_type_id ?? '') == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('property_type_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="property_status_id" class="form-label">Property Status *</label>
                        <select class="form-select @error('property_status_id') is-invalid @enderror"
                            id="property_status_id" name="property_status_id" required>
                            <option value="">Select Status</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}"
                                    {{ old('property_status_id', $property->property_status_id ?? '') == $status->id ? 'selected' : '' }}>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('property_status_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="created_by" class="form-label">Agent *</label>
                        <select class="form-select @error('created_by') is-invalid @enderror" id="created_by"
                            name="created_by" required>
                            <option value="">Select Agent</option>
                            @foreach ($agents as $agent)
                                <option value="{{ $agent->id }}"
                                    {{ old('created_by', $property->created_by ?? '') == $agent->id ? 'selected' : '' }}>
                                    {{ $agent->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('created_by')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="bedrooms" class="form-label">Bedrooms *</label>
                        <input type="number" class="form-control @error('bedrooms') is-invalid @enderror"
                            id="bedrooms" name="bedrooms" value="{{ old('bedrooms', $property->bedrooms ?? '') }}"
                            required min="0">
                        @error('bedrooms')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="bathrooms" class="form-label">Bathrooms *</label>
                        <input type="number" class="form-control @error('bathrooms') is-invalid @enderror"
                            id="bathrooms" name="bathrooms"
                            value="{{ old('bathrooms', $property->bathrooms ?? '') }}" required min="0">
                        @error('bathrooms')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="area" class="form-label">Area (sq ft) *</label>
                        <input type="number" class="form-control @error('area') is-invalid @enderror"
                            id="area" name="area" value="{{ old('area', $property->area ?? '') }}" required
                            min="0">
                        @error('area')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="year_built" class="form-label">Year Built</label>
                        <input type="number" class="form-control @error('year_built') is-invalid @enderror"
                            id="year_built" name="year_built"
                            value="{{ old('year_built', $property->year_built ?? '') }}" min="1800"
                            max="{{ date('Y') }}">
                        @error('year_built')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Features</label>
                        <div class="form-check form-switch mb-2">
                            <input type="hidden" name="featured" value="0">
                            <input type="checkbox" class="form-check-input" id="featured" name="featured"
                                value="1" {{ old('featured', $property->featured ?? 0) ? 'checked' : '' }}>
                            <label class="form-check-label" for="featured">Featured Property</label>
                        </div>
                        <div class="form-check form-switch mb-2">
                            <input type="hidden" name="garage" value="0">
                            <input type="checkbox" class="form-check-input" id="garage" name="garage"
                                value="1" {{ old('garage', $property->garage ?? 0) ? 'checked' : '' }}>
                            <label class="form-check-label" for="garage">Has Garage</label>
                        </div>
                        <div id="garageSizeContainer"
                            style="{{ old('garage', $property->garage ?? 0) ? '' : 'display: none;' }}">
                            <label for="garage_size" class="form-label">Garage Size</label>
                            <input type="number" class="form-control @error('garage_size') is-invalid @enderror"
                                id="garage_size" name="garage_size"
                                value="{{ old('garage_size', $property->garage_size ?? '') }}" min="0">
                            @error('garage_size')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <div class="form-check form-switch">
                            <input type="hidden" name="status" value="0">
                            <input type="checkbox" class="form-check-input" id="status" name="status"
                                value="1" {{ old('status', $property->status ?? 0) ? 'checked' : '' }}>
                            <label class="form-check-label" for="status">Active</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Media Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Media</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="amenities" class="form-label">Amenities</label>
                        <select class="form-select select2-multiple @error('amenities') is-invalid @enderror"
                            id="amenities" name="amenities[]" multiple>
                            @foreach (config('property.amenities') as $amenity)
                                <option value="{{ $amenity }}"
                                    {{ in_array($amenity, old('amenities', $property->amenities ?? [])) ? 'selected' : '' }}>
                                    {{ $amenity }}
                                </option>
                            @endforeach
                        </select>
                        @error('amenities')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="video_url" class="form-label">Video URL</label>
                        <input type="url" class="form-control @error('video_url') is-invalid @enderror"
                            id="video_url" name="video_url"
                            value="{{ old('video_url', $property->video_url ?? '') }}">
                        @error('video_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="images" class="form-label">Images</label>
                        <input type="file" class="form-control @error('images') is-invalid @enderror"
                            id="images" name="images[]" multiple accept="image/*">
                        @error('images')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @error('images.*')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if ($isEdit && $property->images)
                            <div class="mt-2">
                                <div class="row">
                                    @foreach ($property->images as $image)
                                        <div class="col-md-3 mb-2">
                                            <img src="{{ asset('storage/' . $image) }}" class="img-thumbnail"
                                                style="height: 80px;">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="floor_plans" class="form-label">Floor Plans</label>
                        <input type="file" class="form-control @error('floor_plans') is-invalid @enderror"
                            id="floor_plans" name="floor_plans[]" multiple accept=".pdf,.jpg,.jpeg,.png">
                        @error('floor_plans')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @error('floor_plans.*')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if ($isEdit && $property->floor_plans)
                            <div class="mt-2">
                                <ul class="list-group">
                                    @foreach ($property->floor_plans as $plan)
                                        <li class="list-group-item">
                                            <a href="{{ asset('storage/' . $plan) }}" target="_blank">
                                                {{ basename($plan) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SEO Section -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>SEO Settings</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="meta_title" class="form-label">Meta Title</label>
                        <input type="text" class="form-control @error('meta_title') is-invalid @enderror"
                            id="meta_title" name="meta_title"
                            value="{{ old('meta_title', $property->meta_title ?? '') }}">
                        @error('meta_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description"
                            name="meta_description">{{ old('meta_description', $property->meta_description ?? '') }}</textarea>
                        @error('meta_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <button type="submit" class="btn btn-primary me-2">
            <i class="mdi mdi-content-save me-1"></i> {{ $isEdit ? 'Update' : 'Save' }}
        </button>
        <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">
            <i class="mdi mdi-close me-1"></i> Cancel
        </a>
    </div>
</form>
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    select.loading {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath fill='%23999999' d='M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50'%3E%3CanimateTransform attributeName='transform' attributeType='XML' type='rotate' dur='1s' from='0 50 50' to='360 50 50' repeatCount='indefinite'/%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 20px 20px;
        padding-right: 35px;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Setup CSRF token for AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // 1. Garage Toggle Functionality
        function toggleGarageSize() {
            $('#garageSizeContainer').toggle($('#garage').is(':checked'));
        }
        toggleGarageSize();
        $('#garage').change(toggleGarageSize);

        // 2. Country Change -> Load States
        $('#country_id').change(function() {
            var countryId = $(this).val();
            var $stateSelect = $('#state_id');
            var $citySelect = $('#city_id');

            // Reset dependent dropdowns
            $stateSelect.html('<option value="">Select State</option>');
            $citySelect.html('<option value="">Select City</option>');

            if (!countryId) return;

            // Show loading state
            $stateSelect.prop('disabled', true).addClass('loading');

            $.ajax({
                url: "{{ route('admin.properties.get-states') }}",
                type: "GET",
                data: {
                    country_id: countryId
                },
                success: function(response) {
                    console.log('States response:', response);
                    $stateSelect.empty().append('<option value="">Select State</option>');
                    if (response && response.length > 0) {
                        $.each(response, function(index, state) {
                            $stateSelect.append(
                                $('<option></option>')
                                .val(state.id)
                                .text(state.name)
                            );
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error loading states:", xhr.responseText);
                    console.error("Status:", status);
                    console.error("Error:", error);
                    alert("Failed to load states. Please try again.");
                },
                complete: function() {
                    $stateSelect.prop('disabled', false).removeClass('loading');

                    // Set the selected state if editing
                    @if($isEdit && isset($property->state_id))
                        setTimeout(function() {
                            $stateSelect.val({{ $property->state_id }}).trigger('change');
                        }, 100);
                    @endif
                }
            });
        });

        // 3. State Change -> Load Cities
        $('#state_id').change(function() {
            var stateId = $(this).val();
            var $citySelect = $('#city_id');

            // Reset city dropdown
            $citySelect.html('<option value="">Select City</option>');

            if (!stateId) return;

            // Show loading state
            $citySelect.prop('disabled', true).addClass('loading');

            $.ajax({
                url: "{{ route('admin.properties.get-cities') }}",
                type: "GET",
                data: {
                    state_id: stateId
                },
                success: function(response) {
                    console.log('Cities response:', response);
                    $citySelect.empty().append('<option value="">Select City</option>');
                    if (response && response.length > 0) {
                        $.each(response, function(index, city) {
                            $citySelect.append(
                                $('<option></option>')
                                .val(city.id)
                                .text(city.name)
                            );
                        });
                    }

                    // Set the selected city if editing
                    @if($isEdit && isset($property->city_id))
                        setTimeout(function() {
                            $citySelect.val({{ $property->city_id }});
                        }, 100);
                    @endif
                },
                error: function(xhr, status, error) {
                    console.error("Error loading cities:", xhr.responseText);
                    console.error("Status:", status);
                    console.error("Error:", error);
                    alert("Failed to load cities. Please try again.");
                },
                complete: function() {
                    $citySelect.prop('disabled', false).removeClass('loading');
                }
            });
        });

        // 4. Initialize Select2 for amenities
        $('.select2-multiple').select2({
            placeholder: "Select amenities",
            allowClear: true
        });

        // 5. Trigger country change if editing
        @if($isEdit && isset($property->country_id))
            $('#country_id').val({{ $property->country_id }}).trigger('change');
        @endif
    });
</script>
@endpush
