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

    <!--======= BANNER =========-->
    <div id="banner">
        <div class="flex-banner">
            <ul class="slides">
                <!--======= SLIDER =========-->
                <li> <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt=""> </li>
                <li> <img src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt=""> </li>
                <li> <img src="https://images.unsplash.com/photo-1484154218962-a197022b5858?ixlib=rb-1.2.1&auto=format&fit=crop&w=1353&q=80" alt=""> </li>
            </ul>
        </div>

        <!--======= FIND PROPERTY =========-->
        <div class="finder">
            <div class="container">
                <h1>Welcome to FindMyHomeZ</h1>

                <!--======= FORM SECTION =========-->
                <div class="find-sec">
                    <ul class="row">

                        <!--======= FORM =========-->
                        <li class="col-sm-3">
                            <label>Choose The City</label>
                            <select class="selectpicker">
                                <option>New York</option>
                                <option>Sydany</option>
                                <option>Relish</option>
                            </select>
                        </li>

                        <!--======= FORM =========-->
                        <li class="col-sm-3">
                            <label>Location</label>
                            <select class="selectpicker">
                                <option>National parks</option>
                                <option>State parks</option>
                                <option>City parks</option>
                            </select>
                        </li>

                        <!--======= FORM =========-->
                        <li class="col-sm-3">
                            <label>Property Status</label>
                            <select class="selectpicker">
                                <option>Appartment</option>
                                <option>House</option>
                                <option>Villa</option>
                                <option>Land</option>
                            </select>
                        </li>

                        <!--======= FORM =========-->
                        <li class="col-sm-3">
                            <label>Property Type</label>
                            <select class="selectpicker">
                                <option>Choose</option>
                                <option>Rent</option>
                                <option>Sale</option>
                            </select>
                        </li>

                        <!--======= FORM =========-->
                        <li class="col-sm-3">
                            <label>No of Bedrooms</label>
                            <select class="selectpicker">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </li>

                        <!--======= FORM =========-->
                        <li class="col-sm-3">
                            <label>No of Bathrooms</label>
                            <select class="selectpicker">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </li>

                        <!--======= Pricing Range =========-->
                        <li class="col-sm-6">
                            <div class="row">
                                <div class="col-xs-9">
                                    <div class="cost-price-content">
                                        <label>Pricing Range: <span id="price-min" class="price-min">$50,000</span> <i>-</i> <span
                                                id="price-max" class="price-max">$500,000</span></label>
                                        <div id="price-range" class="price-range"></div>
                                    </div>
                                </div>

                                <!--======= BUTTON =========-->
                                <div class="col-xs-3 search">
                                    <button type="submit" class="btn">Search</button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--======= PROPERTY =========-->
    <section class="property-slide">
        <!--======= PROPERTY SLIDER =========-->
        <div class="prot-slide">

            <!--======= PROPERTY SLIDE =========-->
            <div class="plots">
                <div class="row">
                    <div class="col-xs-4"> <a href="#."> <img class="img-responsive" src="https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                                alt=""> </a> </div>
                    <div class="col-xs-8">
                        <div class="pri-info"> <span class="sale">For Sale</span> <a class="f-mont" href="#.">$
                                13,512,002 3 Bed Room At Newyork</a>
                            <p><i class="fa fa-map-marker"></i> Down Street</p>
                            <div class="auther"> <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                                <h6>Anderia jus</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--======= PROPERTY SLIDE =========-->
            <div class="plots">
                <div class="row">
                    <div class="col-xs-4"> <a href="#."> <img class="img-responsive" src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                                alt=""> </a> </div>
                    <div class="col-xs-8">
                        <div class="pri-info"> <span class="sale">For Sale</span> <a class="f-mont" href="#.">$
                                9,850,000 4 Bed Room Villa</a>
                            <p><i class="fa fa-map-marker"></i> Park Avenue</p>
                            <div class="auther"> <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="">
                                <h6>Maria Wilson</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--======= PROPERTY SLIDE =========-->
            <div class="plots">
                <div class="row">
                    <div class="col-xs-4"> <a href="#."> <img class="img-responsive" src="https://images.unsplash.com/photo-1518780664697-55e3ad937233?ixlib=rb-1.2.1&auto=format&fit=crop&w=1302&q=80"
                                alt=""> </a> </div>
                    <div class="col-xs-8">
                        <div class="pri-info"> <span class="rent">For Rent</span> <a class="f-mont" href="#.">$
                                3,200/month 2 Bed Room Apartment</a>
                            <p><i class="fa fa-map-marker"></i> Central Street</p>
                            <div class="auther"> <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="">
                                <h6>John Smith</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--======= PROPERTY SLIDE =========-->
            <div class="plots">
                <div class="row">
                    <div class="col-xs-4"> <a href="#."> <img class="img-responsive" src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                                alt=""> </a> </div>
                    <div class="col-xs-8">
                        <div class="pri-info"> <span class="sale">For Sale</span> <a class="f-mont" href="#.">$
                                7,250,000 Luxury Penthouse</a>
                            <p><i class="fa fa-map-marker"></i> High Street</p>
                            <div class="auther"> <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
                                <h6>Sarah Johnson</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--======= SERVICES =========-->
    <section class="services">
        <div class="container">

            <!--======= TITTLE =========-->
            <div class="tittle"> <img src="https://via.placeholder.com/50x10/3498db/ffffff?text=+" alt="">
                <h3>services we provide</h3>
                <p>Engage buyers with immersive virtual tour scripts that highlight property layouts, finishes, and unique
                    selling points, enhancing online viewing experiences.</p>
            </div>
            <ul class="row">

                <!--======= SERVICE SECTION =========-->
                <li class="col-sm-3">
                    <section>
                        <!--======= SERVICE IMG =========-->
                        <img class="img-responsive" src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt=""
                            style="width: 100%; height: 250px; object-fit: cover; border-radius: 4px;">
                        <div class="icon"> <img src="https://via.placeholder.com/30x30/3498db/ffffff?text=H" alt=""> </div>

                        <!--======= SERVICE HOVER =========-->
                        <div class="ser-hover">
                            <p>We provide comprehensive property buying assistance, from search to closing. Our experts guide you through every step of the process.
                                <a href="#." class="read-more">Read more <i
                                        class="fa fa-angle-double-right"></i></a>
                            </p>
                        </div>
                        <a href="#." class="heading">Property Buying</a>
                    </section>
                </li>
                
                <li class="col-sm-3">
                    <section>
                        <img class="img-responsive" src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt=""
                            style="width: 100%; height: 250px; object-fit: cover; border-radius: 4px;">
                        <div class="icon"> <img src="https://via.placeholder.com/30x30/3498db/ffffff?text=H" alt=""> </div>

                        <div class="ser-hover">
                            <p>Our property selling services maximize your returns with strategic pricing, marketing, and negotiation expertise.
                                <a href="#." class="read-more">Read more <i
                                        class="fa fa-angle-double-right"></i></a>
                            </p>
                        </div>
                        <a href="#." class="heading">Property Selling</a>
                    </section>
                </li>
                
                <li class="col-sm-3">
                    <section>
                        <img class="img-responsive" src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt=""
                            style="width: 100%; height: 250px; object-fit: cover; border-radius: 4px;">
                        <div class="icon"> <img src="https://via.placeholder.com/30x30/3498db/ffffff?text=H" alt=""> </div>

                        <div class="ser-hover">
                            <p>We offer professional property management services to protect your investment and maximize rental income.
                                <a href="#." class="read-more">Read more <i
                                        class="fa fa-angle-double-right"></i></a>
                            </p>
                        </div>
                        <a href="#." class="heading">Property Management</a>
                    </section>
                </li>
                
                <li class="col-sm-3">
                    <section>
                        <img class="img-responsive" src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt=""
                            style="width: 100%; height: 250px; object-fit: cover; border-radius: 4px;">
                        <div class="icon"> <img src="https://via.placeholder.com/30x30/3498db/ffffff?text=H" alt=""> </div>

                        <div class="ser-hover">
                            <p>Our legal experts provide comprehensive real estate legal services to ensure smooth transactions and compliance.
                                <a href="#." class="read-more">Read more <i
                                        class="fa fa-angle-double-right"></i></a>
                            </p>
                        </div>
                        <a href="#." class="heading">Legal Services</a>
                    </section>
                </li>

            </ul>
        </div>
    </section>

    <!--======= PROPERTY =========-->
    <section class="properties">
        <div class="container">

            <!--======= TITTLE =========-->
            <div class="tittle"> <img src="https://via.placeholder.com/50x10/3498db/ffffff?text=+" alt="">
                <h3>new properties list</h3>
                <p>This time there's no stopping us. Straightnin' the curves. Flatnin' the hills Someday the mountain might
                    get ‘em but the law never will. The weather started getting rough - the tiny ship was tossed.</p>
            </div>

            <!--======= PROPERTIES ROW =========-->
            <ul class="row">

                <li class="col-sm-4">
                    <!--======= TAGS =========-->
                    <span class="tag font-montserrat sale">For Sale</span>

                    <section>
                        <!--======= IMAGE =========-->
                        <div class="img">
                            <img class="img-responsive"
                                style="width: 100%; height: 250px; object-fit: cover; border-radius: 2px;"
                                src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                                alt="Modern Villa">
                            <!--======= IMAGE HOVER =========-->
                            <div class="over-proper">
                                <a href="#." class="btn font-montserrat">more details</a>
                            </div>
                        </div>

                        <!--======= HOME INNER DETAILS =========-->
                        <ul class="home-in">
                            <li><span><i class="fa fa-home"></i> 20,000 Acres</span></li>
                            <li><span><i class="fa fa-bed"></i> 3 Bedrooms</span></li>
                            <li><span><i class="fa fa-tty"></i> 3 Bathrooms</span></li>
                        </ul>

                        <!--======= HOME DETAILS =========-->
                        <div class="detail-sec">
                            <a href="#." class="font-montserrat">Sweet home for small family</a>
                            <span class="locate"><i class="fa fa-map-marker"></i> New York, NY</span>
                            <p>Beautiful property with great amenities and modern design perfect for families.</p>
                            <div class="share-p">
                                <span class="price font-montserrat">₹ 25,659,600</span>
                            </div>
                        </div>
                    </section>
                </li>
                
                <li class="col-sm-4">
                    <span class="tag font-montserrat rent">For Rent</span>

                    <section>
                        <div class="img">
                            <img class="img-responsive"
                                style="width: 100%; height: 250px; object-fit: cover; border-radius: 2px;"
                                src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                                alt="Luxury Apartment">
                            <div class="over-proper">
                                <a href="#." class="btn font-montserrat">more details</a>
                            </div>
                        </div>

                        <ul class="home-in">
                            <li><span><i class="fa fa-home"></i> 15,000 Acres</span></li>
                            <li><span><i class="fa fa-bed"></i> 2 Bedrooms</span></li>
                            <li><span><i class="fa fa-tty"></i> 2 Bathrooms</span></li>
                        </ul>

                        <div class="detail-sec">
                            <a href="#." class="font-montserrat">Luxury Downtown Apartment</a>
                            <span class="locate"><i class="fa fa-map-marker"></i> Los Angeles, CA</span>
                            <p>Modern apartment in the heart of the city with stunning views and premium finishes.</p>
                            <div class="share-p">
                                <span class="price font-montserrat">₹ 85,000/month</span>
                            </div>
                        </div>
                    </section>
                </li>
                
                <li class="col-sm-4">
                    <span class="tag font-montserrat sale">For Sale</span>

                    <section>
                        <div class="img">
                            <img class="img-responsive"
                                style="width: 100%; height: 250px; object-fit: cover; border-radius: 2px;"
                                src="https://images.unsplash.com/photo-1570129477492-45c003edd2be?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                                alt="Country House">
                            <div class="over-proper">
                                <a href="#." class="btn font-montserrat">more details</a>
                            </div>
                        </div>

                        <ul class="home-in">
                            <li><span><i class="fa fa-home"></i> 50,000 Acres</span></li>
                            <li><span><i class="fa fa-bed"></i> 4 Bedrooms</span></li>
                            <li><span><i class="fa fa-tty"></i> 3 Bathrooms</span></li>
                        </ul>

                        <div class="detail-sec">
                            <a href="#." class="font-montserrat">Spacious Country House</a>
                            <span class="locate"><i class="fa fa-map-marker"></i> Austin, TX</span>
                            <p>Beautiful country house with large garden, perfect for those who love nature and space.</p>
                            <div class="share-p">
                                <span class="price font-montserrat">₹ 42,350,000</span>
                            </div>
                        </div>
                    </section>
                </li>

            </ul>
        </div>
    </section>

    <!--======= TEAM =========-->
    <section id="team">
        <div class="container">
            <!--======= TITTLE =========-->
            <div class="tittle"> <img src="https://via.placeholder.com/50x10/3498db/ffffff?text=+" alt="">
                <h3>our great agents</h3>
                <p>This time there's no stopping us. Straightnin' the curves. Flatnin' the hills Someday the mountain might
                    get ‘em but the law never will. The weather started getting rough - the tiny ship was tossed.</p>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <!--======= TEAM ROW =========-->
                    <ul class="row">

                        <!--======= TEAM =========-->
                        <li class="col-sm-3">
                            <div class="team"> <img class="img-responsive"
                                    src="https://randomuser.me/api/portraits/men/32.jpg" alt=""
                                    style="width: 100%; height: 250px; object-fit: cover; border-radius: 2px;">
                                <div class="team-over">
                                    <!--======= SOCIAL ICON =========-->
                                    <ul class="social_icons animated-6s fadeInUp">
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>

                                <!--======= TEAM DETAILS =========-->
                                <div class="team-detail">
                                    <h6>John Anderson</h6>
                                    <p>Senior Real Estate Agent</p>
                                </div>
                            </div>
                        </li>
                        
                        <li class="col-sm-3">
                            <div class="team"> <img class="img-responsive"
                                    src="https://randomuser.me/api/portraits/women/44.jpg" alt=""
                                    style="width: 100%; height: 250px; object-fit: cover; border-radius: 2px;">
                                <div class="team-over">
                                    <ul class="social_icons animated-6s fadeInUp">
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>

                                <div class="team-detail">
                                    <h6>Sarah Johnson</h6>
                                    <p>Property Consultant</p>
                                </div>
                            </div>
                        </li>
                        
                        <li class="col-sm-3">
                            <div class="team"> <img class="img-responsive"
                                    src="https://randomuser.me/api/portraits/men/22.jpg" alt=""
                                    style="width: 100%; height: 250px; object-fit: cover; border-radius: 2px;">
                                <div class="team-over">
                                    <ul class="social_icons animated-6s fadeInUp">
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>

                                <div class="team-detail">
                                    <h6>Michael Brown</h6>
                                    <p>Commercial Real Estate</p>
                                </div>
                            </div>
                        </li>
                        
                        <li class="col-sm-3">
                            <div class="team"> <img class="img-responsive"
                                    src="https://randomuser.me/api/portraits/women/68.jpg" alt=""
                                    style="width: 100%; height: 250px; object-fit: cover; border-radius: 2px;">
                                <div class="team-over">
                                    <ul class="social_icons animated-6s fadeInUp">
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>

                                <div class="team-detail">
                                    <h6>Emily Davis</h6>
                                    <p>Luxury Homes Specialist</p>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!--======= TESTIMONILAS =========-->
    <section id="testimonials">
        <div class="container">

            <!--======= TITTLE =========-->
            <div class="tittle">
                <h3>some words from our customer</h3>
            </div>
            <div class="testi">

                <!--======= TESTIMONIALS SLIDERS CAROUSEL =========-->
                <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
                    <div class="row">
                        <div class="col-md-12"> <img src="https://via.placeholder.com/50x40/3498db/ffffff?text=❝" alt="">
                            <div class="carousel-inner" role="listbox">

                                <!--======= SLIDER 1 =========-->
                                <div class="item active">
                                    <p>Can you tell me how to get how to get to Sesame Street. Believe it or not I'm walking
                                        on air. I never thought I could feel so free. The movie star the professor and Mary
                                        Ann here on Gilligans Isle. Just two good ol' boys</p>
                                    <h5>mitchell warner</h5>
                                    <span>Sydney, Australia</span>
                                </div>

                                <!--======= SLIDER 2 =========-->
                                <div class="item">
                                    <p>Can you tell me how to get how to get to Sesame Street. Believe it or not I'm walking
                                        on air. I never thought I could feel so free. The movie star the professor and Mary
                                        Ann here on Gilligans Isle. Just two good ol' boys</p>
                                    <h5>JHON SMITH</h5>
                                    <span>Sydney, Australia</span>
                                </div>

                                <!--======= SLIDER 3 =========-->
                                <div class="item">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been text ever since the 1500s, when an unknown printer took a galley of
                                        type and scrambled it to make a type specimen book.</p>
                                    <h5>JHON SMITH</h5>
                                    <span>Sydney, Australia</span>
                                </div>
                            </div>
                        </div>

                        <!--======= SLIDER AVATARS =========-->
                        <div class="col-md-12">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"> <img
                                        src="https://randomuser.me/api/portraits/men/1.jpg" alt=""> </li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"> <img
                                        src="https://randomuser.me/api/portraits/women/2.jpg" alt=""></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"> <img
                                        src="https://randomuser.me/api/portraits/men/3.jpg" alt=""></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--======= CALL US =========-->
    <section class="call-us">
        <div class="overlay">
            <div class="container">
                <ul class="row">
                    <li class="col-sm-6">
                        <h4>Do you want to sell your property ?</h4>
                        <h6>Call us and list your property here</h6>
                    </li>
                    <li class="col-sm-4">
                        <h1>+01 123 456 78</h1>
                    </li>
                    <li class="col-sm-2 no-padding"> <a href="#." class="btn">just contact us</a> </li>
                </ul>
            </div>
        </div>
    </section>

    <!--======= CLIENTS FEEDBACK =========-->
    <section class="blog">
        <div class="container">

            <!--======= TITTLE =========-->
            <div class="tittle">
                <h3>recent from our blog</h3>
            </div>
            <ul class="row">

                <!--======= BLOG 1 =========-->
                <li class="col-sm-4">
                    <div class="b-inner"> <img class="img-responsive" src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="" style="width: 100%; height: 250px; object-fit: cover; border-radius: 2px;">
                        <div class="b-details">
                            <div class="post-admin"> <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                                <h6>John Anderson</h6>
                            </div>
                            <div class="bottom-sec"> <span><i class="fa fa-calendar"></i> Mar 15, 2023</span> <a
                                    class="font-montserrat" href="#.">How to Prepare Your Home for a Quick Sale</a>
                                <hr>
                                <p>Learn the essential steps to get your property market-ready and attract serious buyers with our comprehensive guide.</p>
                            </div>
                        </div>
                    </div>
                </li>
                
                <li class="col-sm-4">
                    <div class="b-inner"> <img class="img-responsive" src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="" style="width: 100%; height: 250px; object-fit: cover; border-radius: 2px;">
                        <div class="b-details">
                            <div class="post-admin"> <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="">
                                <h6>Sarah Johnson</h6>
                            </div>
                            <div class="bottom-sec"> <span><i class="fa fa-calendar"></i> Feb 28, 2023</span> <a
                                    class="font-montserrat" href="#.">Understanding Mortgage Rates in 2023</a>
                                <hr>
                                <p>Get insights into current mortgage trends and what they mean for home buyers in the current real estate market.</p>
                            </div>
                        </div>
                    </div>
                </li>
                
                <li class="col-sm-4">
                    <div class="b-inner"> <img class="img-responsive" src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="" style="width: 100%; height: 250px; object-fit: cover; border-radius: 2px;">
                        <div class="b-details">
                            <div class="post-admin"> <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="">
                                <h6>Michael Brown</h6>
                            </div>
                            <div class="bottom-sec"> <span><i class="fa fa-calendar"></i> Feb 10, 2023</span> <a
                                    class="font-montserrat" href="#.">Top Neighborhoods for Investment in 2023</a>
                                <hr>
                                <p>Discover the up-and-coming areas that offer the best potential for property investment returns this year.</p>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </section>

    <script>
        // Simple slider functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Banner slider
            const slides = document.querySelectorAll('.flex-banner .slides li');
            let currentSlide = 0;
            
            function nextSlide() {
                slides[currentSlide].style.opacity = 0;
                currentSlide = (currentSlide + 1) % slides.length;
                slides[currentSlide].style.opacity = 1;
            }
            
            // Change slide every 5 seconds
            setInterval(nextSlide, 5000);
            
            // Testimonial slider
            const testimonialItems = document.querySelectorAll('.carousel-inner .item');
            const indicators = document.querySelectorAll('.carousel-indicators li');
            let currentTestimonial = 0;
            
            function nextTestimonial() {
                testimonialItems[currentTestimonial].classList.remove('active');
                indicators[currentTestimonial].classList.remove('active');
                
                currentTestimonial = (currentTestimonial + 1) % testimonialItems.length;
                
                testimonialItems[currentTestimonial].classList.add('active');
                indicators[currentTestimonial].classList.add('active');
            }
            
            // Change testimonial every 7 seconds
            setInterval(nextTestimonial, 7000);
            
            // Indicator click events
            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', function() {
                    testimonialItems[currentTestimonial].classList.remove('active');
                    indicators[currentTestimonial].classList.remove('active');
                    
                    currentTestimonial = index;
                    
                    testimonialItems[currentTestimonial].classList.add('active');
                    indicators[currentTestimonial].classList.add('active');
                });
            });
        });
    </script>


    
@endsection
