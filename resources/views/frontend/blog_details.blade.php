@extends('layouts.app')
@section('content')


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* SweetAlert Toast Customization */
        .swal2-toast {
            font-family: 'Arial', sans-serif;
            border-radius: 8px !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
        }

        .swal2-toast.swal2-success {
            background: #d4edda !important;
            border: 1px solid #c3e6cb !important;
        }

        .swal2-toast.swal2-error {
            background: #f8d7da !important;
            border: 1px solid #f5c6cb !important;
        }
        .comment {
            display: flex;
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #e1e1e1;
            border-radius: 8px;
            background: #fff;
        }

        .comment-avatar {
            margin-right: 15px;
        }

        .avatar-initial {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .comment-content {
            flex: 1;
        }

        .comment-content h4 {
            margin: 0 0 5px 0;
            color: #333;
            font-size: 16px;
        }

        .comment-meta {
            color: #888;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .comment-content p {
            margin: 0;
            color: #555;
            line-height: 1.5;
        }

        .reply {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
        }

        .reply:hover {
            text-decoration: underline;
        }
     
        .blog-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            margin: 40px 0;
        }

        .blog-post {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .blog-post:hover {
            transform: translateY(-5px);
        }

        .blog-header {
            position: relative;
        }

        .blog-image {
            width: 100%;
            height: 450px;
            object-fit: cover;
        }

        .blog-title {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
            color: white;
            padding: 30px;
        }

        .blog-title h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .blog-meta {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
        }

        .blog-meta span {
            margin-right: 20px;
            display: flex;
            align-items: center;
        }

        .blog-meta i {
            margin-right: 5px;
        }

        .blog-content {
            padding: 40px;
        }

        .blog-content p {
            margin-bottom: 20px;
            font-size: 1.1rem;
        }

        .blog-content h2 {
            margin: 30px 0 15px;
            color: #2c3e50;
            position: relative;
            padding-bottom: 10px;
        }

        .blog-content h2::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(to right, #3498db, #2ecc71);
        }

        .blog-content ul, .blog-content ol {
            margin: 20px 0;
            padding-left: 30px;
        }

        .blog-content li {
            margin-bottom: 10px;
        }

        .quote {
            background: #f8f9fa;
            border-left: 4px solid #3498db;
            padding: 20px;
            margin: 25px 0;
            font-style: italic;
            border-radius: 0 8px 8px 0;
        }

        .quote p {
            margin-bottom: 10px;
        }

        .quote-author {
            text-align: right;
            font-weight: 600;
            color: #2c3e50;
        }

        .image-caption {
            text-align: center;
            font-style: italic;
            color: #7f8c8d;
            margin-top: 5px;
            font-size: 0.9rem;
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            margin: 30px 0;
        }

        .tag {
            background: #ecf0f1;
            padding: 5px 15px;
            border-radius: 20px;
            margin-right: 10px;
            margin-bottom: 10px;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .tag:hover {
            background: #3498db;
            color: white;
            cursor: pointer;
        }

        .author-box {
            display: flex;
            background: #f8f9fa;
            padding: 25px;
            border-radius: 10px;
            margin: 40px 0;
            align-items: center;
        }

        .author-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
            border: 3px solid #3498db;
        }

        .author-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-info h3 {
            margin-bottom: 5px;
            color: #2c3e50;
        }

        .author-info p {
            margin-bottom: 10px;
            color: #7f8c8d;
        }

        .social-links {
            display: flex;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background: #3498db;
            color: white;
            border-radius: 50%;
            margin-right: 10px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: #2c3e50;
            transform: translateY(-3px);
        }

        /* Sidebar Styles */
        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .sidebar-widget {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .widget-title {
            font-size: 1.3rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ecf0f1;
            color: #2c3e50;
            position: relative;
        }

        .widget-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 50px;
            height: 2px;
            background: #3498db;
        }

        .recent-posts {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .recent-post {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ecf0f1;
            transition: all 0.3s;
        }

        .recent-post:hover {
            transform: translateX(5px);
        }

        .recent-post:last-child {
            border-bottom: none;
        }

        .recent-post img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 15px;
        }

        .recent-post-content h4 {
            font-size: 12px;
            margin-bottom: 5px;
        }

        .recent-post-content span {
            font-size: 11px;
            color: #7f8c8d;
        }

        .categories-list {
            list-style: none;
        }

        .categories-list li {
            padding: 10px 0;
            border-bottom: 1px solid #ecf0f1;
            transition: all 0.3s;
        }

        .categories-list li:hover {
            padding-left: 10px;
            color: #3498db;
        }

        .categories-list li:last-child {
            border-bottom: none;
        }

        .categories-list a {
            text-decoration: none;
            color: inherit;
            display: flex;
            justify-content: space-between;
        }

        .categories-list span {
            background: #ecf0f1;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 0.8rem;
        }

        /* Comments Section */
        .comments-section {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin: 40px 0;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .comments-section h2 {
            margin-bottom: 25px;
            color: #2c3e50;
            position: relative;
            padding-bottom: 10px;
        }

        .comments-section h2::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(to right, #3498db, #2ecc71);
        }

        .comment {
            display: flex;
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #ecf0f1;
        }

        .comment:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .comment-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
        }

        .comment-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .comment-content h4 {
            margin-bottom: 5px;
            color: #2c3e50;
        }

        .comment-meta {
            font-size: 0.8rem;
            color: #7f8c8d;
            margin-bottom: 10px;
        }

        .comment-content p {
            margin-bottom: 10px;
        }

        .reply {
            color: #3498db;
            font-size: 0.9rem;
            text-decoration: none;
            font-weight: 500;
        }

        .reply:hover {
            text-decoration: underline;
        }

        .comment-form {
            margin-top: 40px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #2c3e50;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
            outline: none;
        }

        .submit-btn {
            background: linear-gradient(to right, #3498db, #2ecc71);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Footer Styles */
        footer {
            background: #2c3e50;
            color: white;
            padding: 50px 0 20px;
            margin-top: 50px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-bottom: 40px;
        }

        .footer-column h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 2px;
            background: #3498db;
        }

        .footer-column p {
            margin-bottom: 20px;
            color: #bdc3c7;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: #3498db;
            padding-left: 5px;
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #34495e;
            color: #bdc3c7;
            font-size: 0.9rem;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .blog-container {
                grid-template-columns: 1fr;
            }
            
            .footer-content {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }
            
            nav ul {
                margin-top: 15px;
                justify-content: center;
            }
            
            nav ul li {
                margin: 0 10px;
            }
            
            .blog-title h1 {
                font-size: 2rem;
            }
            
            .blog-image {
                height: 350px;
            }
            
            .author-box {
                flex-direction: column;
                text-align: center;
            }
            
            .author-avatar {
                margin-right: 0;
                margin-bottom: 15px;
            }
        }

        @media (max-width: 576px) {
            .blog-meta {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .blog-meta span {
                margin-bottom: 5px;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="container">
        <div class="blog-container">
            <!-- Blog Post -->
            <div class="blog-post">
                <div class="blog-header">
                    <img src="{{ asset($blog->featured_image) }}" alt="Web Development" class="blog-image">
                    <div class="blog-title">
                        <h1 style="color:white!important;">{{ $blog->title}}</h1>
                        <div class="blog-meta">
                            <span><i class="far fa-calendar"></i>  {{ \Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}</span>
                        </div>
                    </div>
                </div>

                <div class="blog-content">
                    <p>{{ $blog->description}}</p>
                    <p>{!! $blog->content !!}</p>

 
                </div>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                

                <div class="sidebar-widget">
                    <h3 class="widget-title">Recent Posts</h3>
                    <div class="recent-posts">
                        @foreach ($blog_list as $list)
                        <a href="{{ route('blog-detail', $list->slug) }}">
                            <div class="recent-post">
                                <img src="{{ asset($list->featured_image) }}" alt="Digital Marketing">
                                <div class="recent-post-content">
                                    <h4>{{ $list->title}}</h4>
                                    <span> {{ \Carbon\Carbon::parse($list->created_at)->format('F d, Y') }}</span>
                                </div>
                            </div> 
                        </a>
                        @endforeach
                       
                        
                        
                    </div>
                </div>

                <div class="sidebar-widget">
                    <h3 class="widget-title">Categories</h3>
                    <ul class="categories-list">
                        @foreach ($categories as $categorie)
                            <li><a href="#">{{ $categorie->name }}   <span>{{  $categorie->published_blogs_count }}</span> </a></li>
                        @endforeach
                        
                    </ul>
                </div>

                <div class="sidebar-widget">
                    <h3 class="widget-title">Newsletter</h3>
                    <p>Subscribe to my newsletter to get the latest updates and articles directly in your inbox.</p>
                    <div class="form-group">
                        <input type="email" placeholder="Your email address">
                    </div>
                    <button class="submit-btn" style="width: 100%;">Subscribe</button>
                </div>
            </div>
        </div>

        <!-- Comments Section -->
        <!-- Comments Section -->
        <div class="comments-section">
            <h2>Comments</h2>
            @foreach ($comments as $comment)
                <div class="comment">
                    <div class="comment-avatar">
                        <div class="avatar-initial">
                            {{ strtoupper(substr($comment->name, 0, 1)) }}
                        </div>
                    </div>
                    <div class="comment-content">
                        <h4>{{ $comment->name }}</h4>
                        <div class="comment-meta">{{ \Carbon\Carbon::parse($comment->created_at)->format('F d, Y') }}</div>
                        <p>{{ $comment->comment }}</p>
                        {{-- <a href="#" class="reply">Reply</a> --}}
                    </div>
                </div>
            @endforeach

            <div class="comment-form">
                <h2>Leave a Comment</h2>
                <form method="POST" action="{{ route('comments.store') }}" id="commentForm">
                    @csrf
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea id="comment" name="comment" rows="5" required>{{ old('comment') }}</textarea>
                        @error('comment')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <button type="submit" class="submit-btn">Post Comment</button>
                </form>
            </div>
        </div>


</div>

@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Success message check
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: '#f8f9fa',
                iconColor: '#28a745',
                color: '#000'
            });
        @endif

        // Error messages check
        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validation Error!',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                background: '#f8f9fa',
                iconColor: '#dc3545',
                color: '#000'
            });
        @endif

        // AJAX form submission (Optional - for better UX)
        const commentForm = document.getElementById('commentForm');
        
        commentForm.addEventListener('submit', function(e) {
            // You can add AJAX submission here if needed
            // For now, let the form submit normally
        });
    });
</script>