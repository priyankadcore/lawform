@extends('admin.layouts.master')
@section('title')
   Add Portfolio Item
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Add Portfolio Item</h4>
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
                    <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Portfolio Item Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug">Portfolio Slug *</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                           id="slug" name="slug" value="{{ old('slug') }}" required>
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
                                    <label for="category">Category *</label>
                                    <select class="form-control @error('category') is-invalid @enderror" 
                                            id="category" name="category_id" required>
                                             <option value="">Select Category</option>
                                        @foreach ($categories as  $category)
                                           <option value="{{ $category->id  }}" >{{ $category->name }}</option> 
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" 
                                            name="status" required>
                                        <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
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
                                           id="client" name="client" value="{{ old('client') }}">
                                    @error('client')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project_date">Project Date</label>
                                    <input type="date" class="form-control @error('project_date') is-invalid @enderror" 
                                           id="project_date" name="project_date" value="{{ old('project_date') }}">
                                    @error('project_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="description">Project Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="project_url">Project URL</label>
                            <input type="url" class="form-control @error('project_url') is-invalid @enderror" 
                                   id="project_url" name="project_url" value="{{ old('project_url') }}" 
                                   placeholder="https://example.com">
                            @error('project_url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="technologies">Technologies Used</label>
                            <input type="text" class="form-control @error('technologies') is-invalid @enderror" 
                                   id="technologies" name="technologies" value="{{ old('technologies') }}" 
                                   placeholder="HTML, CSS, JavaScript, PHP">
                            @error('technologies')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Separate technologies with commas</small>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="featured_image">Featured Image *</label>
                            <input type="file" class="form-control @error('featured_image') is-invalid @enderror" 
                                   id="featured_image" name="featured_image" accept="image/*" required>
                            @error('featured_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div id="featuredImagePreview" class="mt-2"></div>
                        </div>

                        
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save Portfolio</button>
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
    // Featured image preview
    document.getElementById('featured_image').addEventListener('change', function() {
        const file = this.files[0];
        const preview = document.getElementById('featuredImagePreview');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" class="img-thumbnail" style="max-height: 150px;">`;
            }
            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = '';
        }
    });

    // Auto-generate slug from name
    document.getElementById('name').addEventListener('input', function() {
        const name = this.value;
        const slug = name.toLowerCase()
            .trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');
        
        document.getElementById('slug').value = slug;
    });
</script>
@endsection