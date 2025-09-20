@extends('admin.layouts.master')
@section('title', 'Blogs')
@section('css')
    <link href="{{ asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .blog-image {
            max-width: 100px;
            max-height: 60px;
            border-radius: 4px;
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    <x-breadcrub pagetitle="Blog" subtitle="Management" title="Blog Posts" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pt-0">
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <h4 class="card-title">Blog Post List</h4>
                                </div>
                                <div class="col-sm-6">
                                    <div class="text-sm-end">
                                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                                            <i class="mdi mdi-plus-circle me-1"></i> Add Blog Post
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-centered datatable dt-responsive nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Author</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Published At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($blogs as $blog)
                                        <tr>
                                            <td>{{ $blog->title }}</td>
                                            <td>
                                                @if($blog->featured_image)
                                                    <img src="{{ asset('storage/' . $blog->featured_image) }}" 
                                                         alt="{{ $blog->title }}" 
                                                         class="blog-image">
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                            <td>{{ $blog->author->name }}</td>
                                            <td>{{ $blog->category->name }}</td>
                                            <td>
                                                @if($blog->status)
                                                    <span class="badge badge-soft-success">Published</span>
                                                @else
                                                    <span class="badge badge-soft-warning">Draft</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Not published' }}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.blogs.edit', $blog->id) }}" 
                                                   class="me-3 text-primary" title="Edit">
                                                   <i class="mdi mdi-pencil font-size-18"></i>
                                                </a>
                                                <form action="{{ route('admin.blogs.destroy', $blog->id) }}" 
                                                      method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger border-0 bg-transparent" 
                                                            title="Delete"
                                                            onclick="return confirm('Are you sure you want to delete this blog post?')">
                                                        <i class="mdi mdi-trash-can font-size-18"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                responsive: true,
                columnDefs: [
                    { orderable: false, targets: [1, 6] } // Disable sorting for image and actions columns
                ],
                order: [[5, 'desc']] // Default sort by published_at
            });
        });
    </script>
@endsection