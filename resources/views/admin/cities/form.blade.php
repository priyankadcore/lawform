@php
    $action = isset($city) ? route('admin.cities.update', $city->id) : route('admin.cities.store');
    $method = isset($city) ? 'PUT' : 'POST';
@endphp

<form method="POST" action="{{ $action }}" id="cityForm">
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
                        {{ old('country_id', $city->country_id ?? '') == $country->id ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
            @error('country_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="state_id" class="form-label">State *</label>
            <select class="form-select @error('state_id') is-invalid @enderror" id="state_id" name="state_id" required>
                <option value="">Select State</option>
                @if (isset($states))
                    @foreach ($states as $state)
                        <option value="{{ $state->id }}"
                            {{ old('state_id', $city->state_id ?? '') == $state->id ? 'selected' : '' }}>
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

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="name" class="form-label">City Name *</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $city->name ?? '') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Status</label>
            <div class="form-check form-switch">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" class="form-check-input" id="status" name="status" value="1"
                    {{ old('status', $city->status ?? 0) ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Active</label>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="mdi mdi-content-save me-1"></i> Save
        </button>
        <a href="{{ route('admin.cities.index') }}" class="btn btn-secondary">
            <i class="mdi mdi-close me-1"></i> Cancel
        </a>
    </div>
</form>

@push('scripts')
    <script>
        $(document).ready(function() {
            // Get the base route URL without parameters
            const statesRoute = "{{ route('admin.cities.states', ':countryId') }}";

            // Load states when country changes
            $('#country_id').change(function() {
                const countryId = $(this).val();
                if (countryId) {
                    // Replace the placeholder with actual countryId
                    const url = statesRoute.replace(':countryId', countryId);

                    $.get(url, function(data) {
                        const $stateSelect = $('#state_id');
                        $stateSelect.empty().append('<option value="">Select State</option>');

                        $.each(data, function(key, state) {
                            $stateSelect.append($('<option>', {
                                value: state.id,
                                text: state.name
                            }));
                        });

                        // If editing, set the previously selected state
                        @if (isset($city))
                            $stateSelect.val({{ $city->state_id }});
                        @endif
                    }).fail(function(xhr) {
                        console.error('Error loading states:', xhr.responseText);
                    });
                } else {
                    $('#state_id').empty().append('<option value="">Select State</option>');
                }
            });

            // Trigger change if country is pre-selected (edit mode)
            @if (isset($city) && $city->country_id)
                $('#country_id').trigger('change');
            @endif
        });
    </script>
@endpush
