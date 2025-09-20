@php
    $action = isset($blog) 
        ? route('admin.blogs.update', $blog->id) 
        : route('admin.blogs.store');
    $method = isset($blog) ? 'PUT' : 'POST';
@endphp

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="row mb-3">
        <div class="col-md-8">
            <label for="title" class="form-label">Title *</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" 
                   id="title" name="title" value="{{ old('title', $blog->title ?? '') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="featured_image" class="form-label">Featured Image</label>
            <input type="file" class="form-control @error('featured_image') is-invalid @enderror" 
                   id="featured_image" name="featured_image" accept="image/*">
            @error('featured_image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            
            @if(isset($blog) && $blog->featured_image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="img-thumbnail" style="max-height: 100px;">
                    <div class="form-check mt-2">
                        <input type="checkbox" class="form-check-input" id="remove_image" name="remove_image" value="1">
                        <label class="form-check-label" for="remove_image">Remove current image</label>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="category_id" class="form-label">Category *</label>
            <select class="form-select @error('category_id') is-invalid @enderror" 
                    id="category_id" name="category_id" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ old('category_id', $blog->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="author_id" class="form-label">Author *</label>
            <select class="form-select @error('author_id') is-invalid @enderror" 
                    id="author_id" name="author_id" required>
                <option value="">Select Author</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" 
                        {{ old('author_id', $blog->author_id ?? '') == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
            @error('author_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <label for="content" class="form-label">Content *</label>
            <textarea class="form-control @error('content') is-invalid @enderror" 
                      id="content" name="content" rows="10" required>{{ old('content', $blog->content ?? '') }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="meta_title" class="form-label">Meta Title</label>
            <input type="text" class="form-control @error('meta_title') is-invalid @enderror" 
                   id="meta_title" name="meta_title" value="{{ old('meta_title', $blog->meta_title ?? '') }}"
                   maxlength="255">
            @error('meta_title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="meta_description" class="form-label">Meta Description</label>
            <textarea class="form-control @error('meta_description') is-invalid @enderror" 
                      id="meta_description" name="meta_description" 
                      maxlength="500">{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>
            @error('meta_description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <label class="form-label">Status</label>
            <div class="form-check form-switch">
                <input type="hidden" name="status" value="0">
                <input type="checkbox" class="form-check-input" 
                       id="status" name="status" value="1"
                       {{ (old('status', $blog->status ?? 0)) ? 'checked' : '' }}>
                <label class="form-check-label" for="status">Publish this post</label>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="mdi mdi-content-save me-1"></i> Save
        </button>
        <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">
            <i class="mdi mdi-close me-1"></i> Cancel
        </a>
    </div>
</form>

@push('scripts')
<script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#content',
        plugins: 'link image table code',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image table | code',
        height: 500,
        content_style: 'body { font-family: Arial, sans-serif; font-size: 14px }'
    });
</script>
@endpush