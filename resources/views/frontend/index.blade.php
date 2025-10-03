@extends('layouts.app')
@section('content')
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Montserrat', sans-serif;
            line-height: 1.6;
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }
        
        .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, 
        .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
            padding: 0 15px;
        }
        
        .col-sm-3 { width: 25%; }
        .col-sm-4 { width: 33.3333%; }
        .col-sm-6 { width: 50%; }
        
        .img-responsive {
            max-width: 100%;
            height: auto;
        }
        
        .btn {
            display: inline-block;
            background: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn:hover {
            background: #c0392b;
        }
        
        .tittle {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .tittle h3 {
            font-size: 28px;
            margin: 15px 0;
            text-transform: uppercase;
        }
        
        .tittle p {
            max-width: 700px;
            margin: 0 auto;
            color: #777;
        }
        
        /* Banner Section */
        #banner {
            position: relative;
            height: 700px;
            overflow: hidden;
        }
        
        .flex-banner {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        
        .flex-banner .slides {
            list-style: none;
            height: 100%;
        }
        
        .flex-banner .slides li {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s;
        }
        
        .flex-banner .slides li:first-child {
            opacity: 1;
        }
        
        .flex-banner .slides img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .finder {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 30px 0;
        }
        
        .finder h1 {
            font-size: 36px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .find-sec ul {
            list-style: none;
        }
        
        .find-sec li {
            margin-bottom: 15px;
        }
        
        .find-sec label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }
        
        .find-sec select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        
        .cost-price-content {
            padding-top: 25px;
        }
        
        .price-range {
            height: 5px;
            background: #ddd;
            border-radius: 5px;
            margin-top: 10px;
            position: relative;
        }
        
        .price-range:before {
            content: '';
            position: absolute;
            left: 0;
            right: 70%;
            height: 100%;
            background: #e74c3c;
            border-radius: 5px;
        }
        
        .search {
            text-align: right;
            padding-top: 25px;
        }
        
        /* Property Slider */
        .property-slide {
            padding: 60px 0;
            background: #f9f9f9;
        }
        
        .prot-slide {
            display: flex;
            overflow-x: auto;
            padding: 20px 0;
        }
        
        .plots {
            flex: 0 0 300px;
            margin-right: 20px;
            background: white;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .plots .row {
            margin: 0;
        }
        
        .plots .col-xs-4, .plots .col-xs-8 {
            padding: 0;
        }
        
        .plots .col-xs-4 {
            width: 40%;
        }
        
        .plots .col-xs-8 {
            width: 60%;
            padding: 15px;
        }
        
        .plots img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }
        
        .pri-info .sale {
            background: #e74c3c;
            color: white;
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 12px;
            display: inline-block;
            margin-bottom: 10px;
        }
        
        .pri-info a {
            font-weight: 600;
            color: #333;
            text-decoration: none;
            display: block;
            margin-bottom: 5px;
        }
        
        .pri-info p {
            font-size: 14px;
            color: #777;
            margin-bottom: 10px;
        }
        
        .auther {
            display: flex;
            align-items: center;
        }
        
        .auther img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .auther h6 {
            font-size: 14px;
            margin: 0;
        }
        
        /* Services Section */
        .services {
            padding: 80px 0;
        }
        
        .services ul {
            list-style: none;
        }
        
        .services li {
            margin-bottom: 30px;
            position: relative;
        }
        
        .services section {
            text-align: center;
            position: relative;
        }
        
        .services img {
            border-radius: 4px;
            margin-bottom: 15px;
        }
        
        .services .icon {
            position: absolute;
            top: 20px;
            right: 20px;
            background: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .services .ser-hover {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(231, 76, 60, 0.9);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s;
            border-radius: 4px;
            padding: 20px;
        }
        
        .services li:hover .ser-hover {
            opacity: 1;
        }
        
        .ser-hover .read-more {
            color: white;
            font-weight: 600;
            margin-top: 10px;
            display: inline-block;
        }
        
        .services .heading {
            font-weight: 600;
            color: #333;
            text-decoration: none;
            font-size: 18px;
        }
        
        /* Properties Section */
        .properties {
            padding: 80px 0;
            background: #f9f9f9;
        }
        
        .properties ul {
            list-style: none;
        }
        
        .properties li {
            margin-bottom: 30px;
            position: relative;
        }
        
        .tag {
            position: absolute;
            top: 15px;
            left: 15px;
            color: white;
            padding: 5px 10px;
            border-radius: 3px;
            font-size: 12px;
            z-index: 2;
        }
        
        .sale {
            background: #e74c3c;
        }
        
        .rent {
            background: #3498db;
        }
        
        .properties section {
            background: white;
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .properties .img {
            position: relative;
            overflow: hidden;
        }
        
        .properties .img img {
            width: 100%;
            transition: transform 0.5s;
        }
        
        .properties .img:hover img {
            transform: scale(1.05);
        }
        
        .over-proper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .properties .img:hover .over-proper {
            opacity: 1;
        }
        
        .home-in {
            list-style: none;
            display: flex;
            padding: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .home-in li {
            margin: 0;
            flex: 1;
            text-align: center;
            font-size: 14px;
            color: #777;
        }
        
        .detail-sec {
            padding: 20px;
        }
        
        .detail-sec a {
            font-weight: 600;
            color: #333;
            text-decoration: none;
            font-size: 18px;
            display: block;
            margin-bottom: 10px;
        }
        
        .locate {
            color: #777;
            font-size: 14px;
            display: block;
            margin-bottom: 10px;
        }
        
        .detail-sec p {
            color: #777;
            margin-bottom: 15px;
            font-size: 14px;
        }
        
        .share-p {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .price {
            font-weight: 600;
            font-size: 20px;
            color: #e74c3c;
        }
        
        /* Team Section */
        #team {
            padding: 80px 0;
        }
        
        #team ul {
            list-style: none;
        }
        
        #team li {
            margin-bottom: 30px;
        }
        
        .team {
            position: relative;
            border-radius: 4px;
            overflow: hidden;
        }
        
        .team img {
            width: 100%;
            transition: transform 0.5s;
        }
        
        .team:hover img {
            transform: scale(1.05);
        }
        
        .team-over {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(231, 76, 60, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .team:hover .team-over {
            opacity: 1;
        }
        
        .social_icons {
            list-style: none;
            display: flex;
        }
        
        .social_icons li {
            margin: 0 5px;
        }
        
        .social_icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            color: #333;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .social_icons a:hover {
            background: #333;
            color: white;
        }
        
        .team-detail {
            padding: 15px;
            text-align: center;
            background: #f9f9f9;
        }
        
        .team-detail h6 {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .team-detail p {
            color: #777;
            font-size: 14px;
        }
        
        /* Testimonials Section */
        #testimonials {
            padding: 80px 0;
            background: #f9f9f9;
        }
        
        .testi {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .testi img {
            margin-bottom: 30px;
        }
        
        .testi p {
            font-size: 18px;
            font-style: italic;
            margin-bottom: 20px;
            color: #555;
        }
        
        .testi h5 {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .testi span {
            color: #777;
        }
        
        .carousel-indicators {
            position: relative;
            bottom: 0;
            left: 0;
            margin-top: 30px;
            justify-content: center;
        }
        
        .carousel-indicators li {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 10px;
            border: 3px solid transparent;
            transition: all 0.3s;
        }
        
        .carousel-indicators li.active {
            border-color: #e74c3c;
        }
        
        .carousel-indicators img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        /* Call Us Section */
        .call-us {
            background: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') center/cover no-repeat;
            padding: 60px 0;
            color: white;
            text-align: center;
        }
        
        .call-us .overlay {
            background: rgba(0, 0, 0, 0.7);
            padding: 40px 0;
        }
        
        .call-us ul {
            list-style: none;
            align-items: center;
        }
        
        .call-us h4 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .call-us h6 {
            font-size: 16px;
            color: #ddd;
        }
        
        .call-us h1 {
            font-size: 36px;
            font-weight: 700;
        }
        
        /* Blog Section */
        .blog {
            padding: 80px 0;
        }
        
        .blog ul {
            list-style: none;
        }
        
        .blog li {
            margin-bottom: 30px;
        }
        
        .b-inner {
            border-radius: 4px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .b-inner img {
            width: 100%;
        }
        
        .b-details {
            padding: 20px;
        }
        
        .post-admin {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .post-admin img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .post-admin h6 {
            font-weight: 600;
            margin: 0;
            flex: 1;
        }
        
        .bottom-sec span {
            color: #777;
            font-size: 14px;
            display: block;
            margin-bottom: 10px;
        }
        
        .bottom-sec a {
            font-weight: 600;
            color: #333;
            text-decoration: none;
            font-size: 18px;
            display: block;
            margin-bottom: 15px;
        }
        
        .bottom-sec hr {
            margin: 15px 0;
            border: none;
            border-top: 1px solid #eee;
        }
        
        .bottom-sec p {
            color: #777;
            font-size: 14px;
        }
        
        /* Utility Classes */
        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }
        
        .no-padding {
            padding: 0;
        }
        
        .pull-right {
            float: right;
        }
        
        .text-center {
            text-align: center;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .col-sm-3, .col-sm-4, .col-sm-6 {
                width: 100%;
            }
            
            #banner {
                height: 500px;
            }
            
            .finder h1 {
                font-size: 28px;
            }
        }
    </style>

    @include('frontend.banner')
    


    
@endsection
