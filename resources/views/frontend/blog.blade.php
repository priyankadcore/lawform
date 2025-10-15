@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">


    <style>
        .category-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            z-index: 2;
        }

        .category-badge .badge {
           background: linear-gradient(to right, #63b1e6ff, #7df5afff);
            color: white;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }

        .category-badge .badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }
        h1 {
            text-align: center;
            margin-bottom: 50px;
            color: #2c3e50;
            font-size: 2.8rem;
            position: relative;
        }

        h1:after {
            content: '';
            display: block;
            width: 100px;
            height: 4px;
            background: linear-gradient(to right, #3498db, #2ecc71);
            margin: 15px auto;
            border-radius: 2px;
        }

        .blogs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
        }

        .blog-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            position: relative;
        }

        .blog-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .card-image {
            height: 220px;
            overflow: hidden;
            position: relative;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .blog-card:hover .card-image img {
            transform: scale(1.1);
        }

        .card-category {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(to right, #3498db, #2ecc71);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .card-content {
            padding: 25px;
        }

        .card-date {
            color: #7f8c8d;
            font-size: 12px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .card-date i {
            margin-right: 5px;
            color: #3498db;
        }

        .card-title {
            font-size: 1.4rem;
            margin-bottom: 15px;
            color: #2c3e50;
            line-height: 1.4;
            transition: color 0.3s ease;
        }

        .blog-card:hover .card-title {
            color: #3498db;
        }

        .card-excerpt {
            color: #7f8c8d;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid #ecf0f1;
        }

        .author {
            display: flex;
            align-items: center;
        }

        .author-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
        }

        .author-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .author-name {
            font-weight: 600;
            color: #2c3e50;
            font-size: 0.9rem;
        }

        .read-more {
            color: #3498db;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .read-more i {
            margin-left: 5px;
            transition: transform 0.3s ease;
        }

        .read-more:hover {
            color: #2ecc71;
        }

        .read-more:hover i {
            transform: translateX(5px);
        }

        /* Special hover effect for card 1 */
        .blog-card:nth-child(1):hover .card-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(52, 152, 219, 0.3), rgba(46, 204, 113, 0.3));
        }

        /* Special hover effect for card 2 */
        .blog-card:nth-child(2):hover .card-image img {
            filter: brightness(0.8) contrast(1.2);
        }

        /* Special hover effect for card 3 */
        .blog-card:nth-child(3):hover {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        /* Special hover effect for card 4 */
        .blog-card:nth-child(4):hover .card-content {
            background: rgba(255, 255, 255, 0.9);
            transform: translateY(-10px);
            border-radius: 0 0 15px 15px;
        }

        @media (max-width: 768px) {
            .blogs-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
            
            h1 {
                font-size: 2.2rem;
            }
        }
    </style>

    <div class="container mt-4 ">
        <h1>Latest Blog Posts</h1>
        <div class="blogs-grid">
           
            @foreach ($blogs as $blog)
               <div class="blog-card mb-5">
                <div class="card-image">
                    <img src="{{ asset($blog->featured_image) }}" alt="Web Development">
                    <div class="category-badge">
                        @if($blog->category)
                            <span class="badge">{{ $blog->category->name }}</span>
                        @else
                            <span class="badge">Uncategorized</span>
                        @endif
                    </div>
                   
                </div>
                <div class="card-content">
                    <div class="card-date">
                        <i class="far fa-calendar"></i>
                        {{ \Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}

                    </div>
                    <h3 class="card-title">{{ $blog->title}}</h3>
                    <p class="card-excerpt">  {{ \Illuminate\Support\Str::words(strip_tags($blog->description), 20, '...') }}
                            </p>
                    <div class="card-footer">
                       
                        <a href="{{ route('blog-detail', $blog->slug) }}" class="read-more">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
  
            @endforeach
           

            
        </div>
    </div>


@endsection