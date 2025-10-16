@extends('admin.layouts.master')
@section('title')
   Portfolio Management
@endsection

<link href="{{ URL::asset('build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<style>
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
    
    .portfolio-card {
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }
    
    .portfolio-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .portfolio-image-container {
        height: 200px;
        overflow: hidden;
        position: relative;
    }
    
    .portfolio-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .portfolio-card:hover .portfolio-image {
        transform: scale(1.05);
    }
    
    .portfolio-status {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 2;
    }
    
    .portfolio-actions {
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 2;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .portfolio-card:hover .portfolio-actions {
        opacity: 1;
    }
    
    .portfolio-meta {
        display: flex;
        justify-content: space-between;
        font-size: 0.85rem;
        color: #6c757d;
        margin-bottom: 10px;
    }
    
    .portfolio-category {
        display: inline-block;
        background: #727ae9;
        color: #fcfdffff;
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 0.75rem;
        margin-bottom: 8px;
    }
    
    .portfolio-description {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        color: #6c757d;
        margin-bottom: 15px;
    }
    
    .filter-container {
        background: #dfe0e1;
        padding: 20px;
        margin-bottom: 25px;
    }
    
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #6c757d;
    }
    
    .empty-state i {
        font-size: 48px;
        margin-bottom: 15px;
        color: #dee2e6;
    }
    
    .view-toggle {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }
    
    .view-toggle-btn {
        border: 1px solid #dee2e6;
        background: white;
        padding: 8px 12px;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .view-toggle-btn.active {
        background: #007bff;
        color: white;
        border-color: #007bff;
    }
    
    .grid-view {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
    }
    
    .list-view .portfolio-card {
        display: flex;
        height: auto;
    }
    
    .list-view .portfolio-image-container {
        width: 200px;
        height: 150px;
        flex-shrink: 0;
    }
    
    .list-view .card-body {
        flex: 1;
    }
    
    @media (max-width: 768px) {
        .list-view .portfolio-card {
            flex-direction: column;
        }
        
        .list-view .portfolio-image-container {
            width: 100%;
            height: 180px;
        }
    }
</style>
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h5 class="mb-0" style="color:white;">Admin / Portfolio / manage</h5>
                
            </div>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="row m-0">
        <div class="filter-container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h4 class="mb-0">Portfolio Management</h4>
                </div>
                <div class="col-md-2 text-right">
                    <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus mr-1"></i> Add Portfolio Item
                    </a>
                </div>
            </div>
         </div>
    </div>

    

    <!-- Portfolio Items Grid -->
    <div class="row">
        <div class="col-12">
            <div id="portfolioContainer" class="grid-view">
                @if(isset($portfolios) && count($portfolios) > 0)
                    @foreach($portfolios as $portfolio)
                    <div class="portfolio-card card" data-category="{{ $portfolio->category_id }}" data-status="{{ $portfolio->status }}" data-date="{{ $portfolio->project_date ? \Carbon\Carbon::parse($portfolio->project_date)->format('Y-m') : '' }}">
                        <div class="portfolio-image-container">
                            @if($portfolio->featured_image)
                                <img src="{{ asset('storage/' . $portfolio->featured_image) }}" class="portfolio-image" alt="{{ $portfolio->name }}">
                            @else
                                <div class="portfolio-image bg-light d-flex align-items-center justify-content-center">
                                    <i class="fas fa-image fa-2x text-muted"></i>
                                </div>
                            @endif
                            
                            <div class="portfolio-status">
                                @if($portfolio->status)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-secondary">Inactive</span>
                                @endif
                            </div>
                            
                            <div class="portfolio-actions">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-light" title="Edit" style="height: 30px;">
                                        <i class="fas fa-edit text-primary" style="font-size: medium;"></i>
                                    </a>
                                    <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-light delete-btn" title="Delete">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-body" style="background-color: #dfdddd;">
                            <div class="portfolio-meta">
                                <span><i class="far fa-calendar-alt mr-1"></i> {{ $portfolio->project_date ? \Carbon\Carbon::parse($portfolio->project_date)->format('M d, Y') : 'N/A' }}</span>
                                <span><i class="far fa-user mr-1"></i> {{ $portfolio->client ?? 'N/A' }}</span>
                            </div>
                            
                            <span class="portfolio-category">
                                @php
                                    $categoryName = $categories->where('id', $portfolio->category_id)->first()->name ?? 'Uncategorized';
                                @endphp
                                {{ $categoryName }}
                            </span>
                            
                            <h5 class="card-title" style="color:black;">{{ $portfolio->name }}</h5>
                            
                            @if($portfolio->short_description)
                                <p class="portfolio-description">{{ $portfolio->short_description }}</p>
                            @endif
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">Slug: {{ $portfolio->slug }}</small>
                                <div>
                                    <a href="{{ route('admin.portfolio.show', $portfolio->id) }}" class="btn btn-sm btn-outline-primary mr-1">View</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div id="emptyState" class="empty-state">
                        <i class="fas fa-folder-open"></i>
                        <h4>No portfolio items found</h4>
                        <p>Try adjusting your filters or add a new portfolio item.</p>
                       
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-6" style="margin-top: 39px;">
        <div class="text-muted">
            Showing <span id="itemCount">{{ count($portfolios ?? []) }}</span> of {{ count($portfolios ?? []) }} portfolio items
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        // Delete confirmation
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('.delete-form');
                    
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
            
            // View Toggle Functionality
            const viewToggleBtns = document.querySelectorAll('.view-toggle-btn');
            const portfolioContainer = document.getElementById('portfolioContainer');
            
            viewToggleBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active class from all buttons
                    viewToggleBtns.forEach(b => b.classList.remove('active'));
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // Change view
                    const viewType = this.getAttribute('data-view');
                    portfolioContainer.className = '';
                    portfolioContainer.classList.add(viewType + '-view');
                    
                    // Adjust grid for list view
                    if (viewType === 'grid') {
                        portfolioContainer.classList.add('grid-view');
                    }
                });
            });
            
            // Filter Functionality
            const categoryFilter = document.getElementById('categoryFilter');
            const statusFilter = document.getElementById('statusFilter');
            const dateFilter = document.getElementById('dateFilter');
            const searchFilter = document.getElementById('searchFilter');
            const resetFiltersBtn = document.getElementById('resetFilters');
            const portfolioCards = document.querySelectorAll('.portfolio-card');
            const emptyState = document.getElementById('emptyState');
            const itemCount = document.getElementById('itemCount');
            
            function filterPortfolio() {
                const categoryValue = categoryFilter.value;
                const statusValue = statusFilter.value;
                const dateValue = dateFilter.value;
                const searchValue = searchFilter.value.toLowerCase();
                
                let visibleCount = 0;
                
                portfolioCards.forEach(card => {
                    const cardCategory = card.getAttribute('data-category');
                    const cardStatus = card.getAttribute('data-status');
                    const cardDate = card.getAttribute('data-date');
                    const cardTitle = card.querySelector('.card-title').textContent.toLowerCase();
                    const cardDescription = card.querySelector('.portfolio-description') ? 
                        card.querySelector('.portfolio-description').textContent.toLowerCase() : '';
                    
                    const categoryMatch = !categoryValue || cardCategory === categoryValue;
                    const statusMatch = !statusValue || cardStatus === statusValue;
                    const dateMatch = !dateValue || cardDate === dateValue;
                    const searchMatch = !searchValue || 
                        cardTitle.includes(searchValue) || 
                        cardDescription.includes(searchValue);
                    
                    if (categoryMatch && statusMatch && dateMatch && searchMatch) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });
                
                // Update item count
                itemCount.textContent = visibleCount;
                
                // Show/hide empty state
                const existingEmptyState = document.getElementById('emptyState');
                if (visibleCount === 0 && portfolioCards.length > 0) {
                    if (!existingEmptyState) {
                        const emptyStateHTML = `
                            <div id="emptyState" class="empty-state">
                                <i class="fas fa-folder-open"></i>
                                <h4>No portfolio items found</h4>
                                <p>Try adjusting your filters or add a new portfolio item.</p>
                              
                            </div>
                        `;
                        portfolioContainer.innerHTML = emptyStateHTML;
                    }
                } else if (visibleCount > 0 && existingEmptyState) {
                    existingEmptyState.remove();
                }
            }
            
            // Add event listeners to filters
            categoryFilter.addEventListener('change', filterPortfolio);
            statusFilter.addEventListener('change', filterPortfolio);
            dateFilter.addEventListener('change', filterPortfolio);
            searchFilter.addEventListener('input', filterPortfolio);
            
            // Reset filters
            resetFiltersBtn.addEventListener('click', function() {
                categoryFilter.value = '';
                statusFilter.value = '';
                dateFilter.value = '';
                searchFilter.value = '';
                filterPortfolio();
            });
            
            // Initialize filter on page load
            filterPortfolio();
        });
    </script>
@endsection