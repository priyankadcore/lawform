@extends('admin.layouts.master')
@section('title')
   Portfolio Details
@endsection

<style>
    .tech-tags .badge {
        font-size: 0.85rem;
        border: 1px solid #dee2e6;
    }
    .project-meta div:last-child {
        border-bottom: none !important;
    }
    .swal2-toast {
        font-size: 12px !important;
        padding: 6px 10px !important;
        min-width: auto !important;
        width: 220px !important;
        line-height: 1.3em !important;
    }

    .swal2-toast .swal2-icon {
        width: 24px !important;
        height: 24px !important;
        margin-right: 6px !important;
    }

    .swal2-toast .swal2-title {
        font-size: 13px !important;
    }
</style>
<style>
.image-container {
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 8px;
    background: white;
    transition: transform 0.2s ease;
}

.image-container:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.delete-image-btn {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0.8;
    transition: opacity 0.2s ease;
}

.delete-image-btn:hover {
    opacity: 1;
    transform: scale(1.1);
}

.img-fluid {
    max-height: 200px;
    width: 100%;
    object-fit: cover;
}
</style>

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Portfolio Details</h4>
                <div class="page-title-right">
                    <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i> Back to Portfolio
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>{{ $portfolio->name }}</h4>
                            <p class="text-muted">{{ $portfolio->short_description }}</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <span class="badge badge-{{ $portfolio->status ? 'success' : 'secondary' }}">
                                {{ $portfolio->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Project Information</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%"><strong>Client:</strong></td>
                                    <td>{{ $portfolio->client ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Project Date:</strong></td>
                                    <td>{{ $portfolio->project_date ? \Carbon\Carbon::parse($portfolio->project_date)->format('M d, Y') : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Category:</strong></td>
                                    <td>{{ $portfolio->category->name ?? 'Uncategorized' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Slug:</strong></td>
                                    <td>{{ $portfolio->slug }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5>Technical Information</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <td width="40%"><strong>Status:</strong></td>
                                    <td>
                                        <span class="badge badge-{{ $portfolio->status ? 'success' : 'secondary' }}">
                                            {{ $portfolio->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Created:</strong></td>
                                    <td>{{ $portfolio->created_at->format('M d, Y') }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Last Updated:</strong></td>
                                    <td>{{ $portfolio->updated_at->format('M d, Y') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Technologies Section -->
                    @if($portfolio->technologies)
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>Technologies Used</h5>
                            <div class="d-flex flex-wrap gap-2">
                                @php
                                    $technologies = explode(',', $portfolio->technologies);
                                @endphp
                                @foreach($technologies as $tech)
                                    <span class="badge badge-primary badge-pill py-2 px-3">
                                        <i class="fas fa-code mr-1"></i>{{ trim($tech) }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Project URL -->
                    @if($portfolio->project_url)
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>Project Link</h5>
                            <a href="{{ $portfolio->project_url }}" target="_blank" class="btn btn-outline-primary">
                                <i class="fas fa-external-link-alt mr-1"></i> View Live Project
                            </a>
                        </div>
                    </div>
                    @endif
                    
                    <!-- Description -->
                    @if($portfolio->description)
                    <div class="mt-4">
                        <h5>Project Description</h5>
                        <div class="border p-3 rounded bg-light">
                            {!! $portfolio->description !!}
                        </div>
                    </div>
                    @endif
                    
                </div>
            </div>
             <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gallery Images</h5>
                    
                    @if($portfolio->images && count($portfolio->images) > 0)
                        <div class="row">
                            @foreach($portfolio->images as $image)
                            <div class="col-md-4 mb-3 position-relative">
                                <div class="image-container position-relative">
                                    <img src="{{ asset('storage/' . $image->image) }}" 
                                        alt="{{ $portfolio->name }}" 
                                        class="img-fluid rounded shadow-sm">
                                    
                                    <!-- Delete Button - Top Right -->
                                    <form action="{{ route('admin.portfolio.image.delete', $image->id) }}" method="POST" class="delete-image-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm delete-image-btn position-absolute" 
                                                style="top: 10px; right: 10px;"
                                                title="Delete Image">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center text-muted py-4">
                            <i class="fas fa-image fa-3x mb-2"></i>
                            <p>No Gallery images found</p>
                        </div>
                    @endif
                </div>
            </div>


        </div>
        
        <div class="col-lg-4">
            <!-- Featured Image Card -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Featured Image</h5>
                    @if($portfolio->featured_image)
                        <img src="{{ asset('storage/' . $portfolio->featured_image) }}" 
                             alt="{{ $portfolio->name }}" 
                             class="img-fluid rounded">
                        <div class="mt-2 text-center">
                            <small class="text-muted">Featured Image</small>
                        </div>
                    @else
                        <div class="text-center text-muted py-4">
                            <i class="fas fa-image fa-3x mb-2"></i>
                            <p>No featured image</p>
                        </div>
                    @endif
                </div>
            </div>


            <!-- Project Details Card -->
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Project Details</h5>
                    <div class="project-meta">
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <strong>Status:</strong>
                            <span class="badge badge-{{ $portfolio->status ? 'success' : 'secondary' }}">
                                {{ $portfolio->status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <strong>Category:</strong>
                            <span>{{ $portfolio->category->name ?? 'Uncategorized' }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <strong>Client:</strong>
                            <span>{{ $portfolio->client ?? 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-2 border-bottom">
                            <strong>Project Date:</strong>
                            <span>{{ $portfolio->project_date ? \Carbon\Carbon::parse($portfolio->project_date)->format('M d, Y') : 'N/A' }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <strong>Created:</strong>
                            <span>{{ $portfolio->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technologies Card -->
            @if($portfolio->technologies)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Technologies</h5>
                    <div class="tech-tags">
                        @php
                            $technologies = array_map('trim', explode(',', $portfolio->technologies));
                        @endphp
                        @foreach($technologies as $tech)
                            <span class="badge badge-light border text-dark d-inline-block mb-2 mr-1 p-2">
                                <i class="fas fa-check text-success mr-1"></i>{{ $tech }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Additional Information Row -->
    <div class="row mt-4">
        <!-- Project URL Card -->
        

        <!-- Short Description Card -->
        @if($portfolio->short_description)
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Short Description</h5>
                    <p class="card-text">{{ $portfolio->short_description }}</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>


@endsection

<!-- Add this script section -->
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Delete image confirmation
        const deleteButtons = document.querySelectorAll('.delete-image-btn');
        
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('.delete-image-form');
                
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
<script>
     @if (session('success'))
            Swal.fire({
                toast: true,
                icon: 'success',
                title: "{{ session('success') }}",
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        @endif

        @if (session('error'))
            Swal.fire({
                toast: true,
                icon: 'error',
                title: "{{ session('error') }}",
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        @endif
    </script>
@endsection