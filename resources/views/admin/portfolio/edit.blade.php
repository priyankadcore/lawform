@extends('admin.layouts.master')
@section('title')
  Edit Portfolio Item
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Edit Portfolio Item</h4>
                <div class="page-title-right">
                    <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i> Back to Portfolio
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Portfolio Item Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $portfolio->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Portfolio Slug *</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                           id="slug" name="slug" value="{{ old('slug', $portfolio->slug) }}" required>
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">URL-friendly version of the name (lowercase, hyphens instead of spaces)</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Category *</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" 
                                            id="category_id" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                           <option value="{{ $category->id }}" 
                                                   {{ old('category_id', $portfolio->category_id) == $category->id ? 'selected' : '' }}>
                                               {{ $category->name }}
                                           </option> 
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" 
                                             name="status" required>
                                        <option value="1" {{ old('status', $portfolio->status) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $portfolio->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client">Client Name</label>
                                    <input type="text" class="form-control @error('client') is-invalid @enderror" 
                                           id="client" name="client" value="{{ old('client', $portfolio->client) }}">
                                    @error('client')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project_date">Project Date</label>
                                    <input type="date" class="form-control @error('project_date') is-invalid @enderror" 
                                           id="project_date" name="project_date" value="{{ old('project_date', $portfolio->project_date ? \Carbon\Carbon::parse($portfolio->project_date)->format('Y-m-d') : '') }}">
                                    @error('project_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="short_description">Short Description</label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                      id="short_description" name="short_description" rows="2" 
                                      placeholder="Brief description for listing pages">{{ old('short_description', $portfolio->short_description) }}</textarea>
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="description">Project Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="5">{{ old('description', $portfolio->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="project_url">Project URL</label>
                            <input type="url" class="form-control @error('project_url') is-invalid @enderror" 
                                   id="project_url" name="project_url" value="{{ old('project_url', $portfolio->project_url) }}" 
                                   placeholder="https://example.com">
                            @error('project_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="technologies">Technologies Used</label>
                            <input type="text" class="form-control @error('technologies') is-invalid @enderror" 
                                   id="technologies" name="technologies" value="{{ old('technologies', $portfolio->technologies) }}" 
                                   placeholder="HTML, CSS, JavaScript, PHP">
                            @error('technologies')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Separate technologies with commas</small>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="featured_image">Featured Image</label>
                            <input type="file" class="form-control @error('featured_image') is-invalid @enderror" 
                                   id="featured_image" name="featured_image" accept="image/*">
                            @error('featured_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Leave empty to keep current image. Allowed types: jpeg, png, jpg, gif. Max size: 2MB</small>
                            
                            <!-- Current Image Preview -->
                            @if($portfolio->featured_image)
                                <div class="mt-3">
                                    <label>Current Featured Image:</label>
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $portfolio->featured_image) }}" 
                                             alt="Current Featured Image" 
                                             class="img-thumbnail" 
                                             style="max-height: 150px;">
                                        <div class="mt-2">
                                            <small class="text-muted">{{ $portfolio->featured_image }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- New Image Preview -->
                            <div id="featuredImagePreview" class="mt-2"></div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-1"></i> Update Portfolio
                            </button>
                            <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Featured image preview for new image
        document.getElementById('featured_image').addEventListener('change', function() {
            const file = this.files[0];
            const preview = document.getElementById('featuredImagePreview');
            
            if (file) {
                // Check file size (2MB limit)
                if (file.size > 2 * 1024 * 1024) {
                    alert('File size must be less than 2MB');
                    this.value = '';
                    preview.innerHTML = '';
                    return;
                }
                
                // Check file type
                const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
                if (!validTypes.includes(file.type)) {
                    alert('Please select a valid image file (JPEG, PNG, JPG, GIF)');
                    this.value = '';
                    preview.innerHTML = '';
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <label>New Image Preview:</label>
                        <div class="mt-2">
                            <img src="${e.target.result}" class="img-thumbnail" style="max-height: 150px;">
                            <div class="mt-1">
                                <small class="text-muted">${file.name} (${(file.size / 1024).toFixed(2)} KB)</small>
                            </div>
                        </div>
                    `;
                }
                reader.readAsDataURL(file);
            } else {
                preview.innerHTML = '';
            }
        });

        // Auto-generate slug from name
        document.getElementById('name').addEventListener('input', function() {
            const slugField = document.getElementById('slug');
            // Only auto-generate if slug field is empty or matches the old name
            if (!slugField.value || slugField.value === '{{ $portfolio->slug }}') {
                const name = this.value;
                const slug = name.toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
                
                slugField.value = slug;
            }
        });

        // Allow manual slug editing without auto-generation
        document.getElementById('slug').addEventListener('input', function() {
            this.dataset.manualEdit = 'true';
        });
    });
</script>
@endsection