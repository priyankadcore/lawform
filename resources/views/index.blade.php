@extends('layouts.app')
@section('content')
    <!--======= BANNER =========-->
    <div id="banner">
        <div class="flex-banner">
            <ul class="slides">
                <!--======= SLIDER =========-->
                {{-- <li> <img src="images/slider-img-1.jpg" alt=""> </li> --}}
                @foreach ($home_sliders as $slider)
                    <li> <img src="{{ asset('storage/' . $slider->image) }}" alt=""> </li>
                @endforeach

            </ul>
        </div>

        <!--======= FIND PROPERTY =========-->
        <div class="finder">
            <div class="container">
                <h1>Welcome to {{ $settings->site_name ?? 'FindMyHomeZ' }}</h1>

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
                                        <label>Pricing Range: <span id="price-min" class="price-min"></span> <i>-</i> <span
                                                id="price-max" class="price-max"></span></label>
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
                    <div class="col-xs-4"> <a href="#."> <img class="img-responsive" src="images/propt-img-1.jpg"
                                alt=""> </a> </div>
                    <div class="col-xs-8">
                        <div class="pri-info"> <span class="sale">For Sale</span> <a class="f-mont" href="#.">$
                                13,512,002 3 Bed Room At Newyork</a>
                            <p><i class="fa fa-map-marker"></i> Down Street</p>
                            <div class="auther"> <img src="images/auther-1.jpg" alt="">
                                <h6>Anderia jus</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--======= PROPERTY SLIDE =========-->
            <div class="plots">
                <div class="row">
                    <div class="col-xs-4"> <a href="#."> <img class="img-responsive" src="images/propt-img-1.jpg"
                                alt=""> </a> </div>
                    <div class="col-xs-8">
                        <div class="pri-info"> <span class="sale">For Sale</span> <a class="f-mont" href="#.">$
                                13,512,002 3 Bed Room At Newyork</a>
                            <p><i class="fa fa-map-marker"></i> Down Street</p>
                            <div class="auther"> <img src="images/auther-1.jpg" alt="">
                                <h6>Anderia jus</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--======= PROPERTY SLIDE =========-->
            <div class="plots">
                <div class="row">
                    <div class="col-xs-4"> <a href="#."> <img class="img-responsive" src="images/propt-img-2.jpg"
                                alt=""> </a> </div>
                    <div class="col-xs-8">
                        <div class="pri-info"> <span class="sale">For Sale</span> <a class="f-mont" href="#.">$
                                13,512,002 3 Bed Room At Newyork</a>
                            <p><i class="fa fa-map-marker"></i> Down Street</p>
                            <div class="auther"> <img src="images/auther-1.jpg" alt="">
                                <h6>Anderia jus</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--======= PROPERTY SLIDE =========-->
            <div class="plots">
                <div class="row">
                    <div class="col-xs-4"> <a href="#."> <img class="img-responsive" src="images/propt-img-3.jpg"
                                alt=""> </a> </div>
                    <div class="col-xs-8">
                        <div class="pri-info"> <span class="sale">For Sale</span> <a class="f-mont" href="#.">$
                                13,512,002 3 Bed Room At Newyork</a>
                            <p><i class="fa fa-map-marker"></i> Down Street</p>
                            <div class="auther"> <img src="images/auther-1.jpg" alt="">
                                <h6>Anderia jus</h6>
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
            <div class="tittle"> <img src="{{ asset('images/head-top.png') }}" alt="">
                <h3>services we provide</h3>
                <p>Engage buyers with immersive virtual tour scripts that highlight property layouts, finishes, and unique
                    selling points, enhancing online viewing experiences.</p>
            </div>
            <ul class="row">

                <!--======= SERVICE SECTION =========-->
                @foreach ($services as $service)
                    <li class="col-sm-3">
                        <section>
                            <!--======= SERVICE IMG =========-->
                            <img class="img-responsive" src="{{ asset('storage/' . $service->image) }}" alt=""
                                style="width: 100%; height: 250px; object-fit: cover; border-radius: 4px;">
                            <div class="icon"> <img src="images/icon-services-1.png" alt=""> </div>

                            <!--======= SERVICE HOVER =========-->
                            <div class="ser-hover">
                                <p>{{ Str::limit($service->description, 100) }}
                                    <a href="#." class="read-more">Read more <i
                                            class="fa fa-angle-double-right"></i></a>
                                </p>
                            </div>
                            <a href="#." class="heading">{{ $service->title ?? 'NA' }}</a>
                        </section>
                    </li>
                @endforeach

            </ul>
        </div>
    </section>

    <!--======= PROPERTY =========-->
    <section class="properties">
        <div class="container">

            <!--======= TITTLE =========-->
            <div class="tittle"> <img src="images/head-top.png" alt="">
                <h3>new properties list</h3>
                <p>This time there's no stopping us. Straightnin' the curves. Flatnin' the hills Someday the mountain might
                    get ‘em but the law never will. The weather started getting rough - the tiny ship was tossed.</p>
            </div>

            <!--======= PROPERTIES ROW =========-->
            <ul class="row">

                @foreach ($properties as $property)
                    <li class="col-sm-4">
                        <!--======= TAGS =========-->
                        @if (isset($property->propertyStatus))
                            <span
                                class="tag font-montserrat 
                                    @if (strtolower($property->propertyStatus->name) === 'for sale') sale
                                    @elseif(strtolower($property->propertyStatus->name) === 'for rent') rent
                                    @else
                                        style-bg-blue @endif">
                                {{ $property->propertyStatus->name }}
                            </span>
                        @endif

                        <section>
                            <!--======= IMAGE =========-->
                            <div class="img">
                                <img class="img-responsive"
                                    style="width: 100%; height: 250px; object-fit: cover; border-radius: 2px;"
                                    src="{{ $property->main_image ? $property->main_image : 'images/img-1.jpg' }}"
                                    alt="{{ $property->title }}">
                                <!--======= IMAGE HOVER =========-->
                                <div class="over-proper">
                                    <a href="{{ route('property.detail', $property->id) }}"
                                        class="btn font-montserrat">more details</a>
                                </div>
                            </div>

                            <!--======= HOME INNER DETAILS =========-->
                            <ul class="home-in">
                                <li><span><i class="fa fa-home"></i> {{ $property->area ?? '20,000' }} Acres</span></li>
                                <li><span><i class="fa fa-bed"></i> {{ $property->bedrooms ?? '3' }} Bedrooms</span></li>
                                <li><span><i class="fa fa-tty"></i> {{ $property->bathrooms ?? '3' }} Bathrooms</span>
                                </li>
                            </ul>

                            <!--======= HOME DETAILS =========-->
                            <div class="detail-sec">
                                <a href="{{ route('property.detail', $property->id) }}"
                                    class="font-montserrat">{{ $property->title ?? 'Sweet home for small family' }}</a>
                                <span class="locate"><i class="fa fa-map-marker"></i>
                                    {{ $property->city->name }}, {{ $property->state->name }}</span>
                                <p>{{ $property->description ?? 'Beautiful property with great amenities' }}</p>
                                <div class="share-p">
                                    <span class="price font-montserrat">₹
                                        {{ number_format($property->price ?? 256596) }}</span>
                                    {{-- <i class="fa fa-star-o"></i>
                                    <i class="fa fa-share-alt"></i> --}}
                                </div>
                            </div>
                        </section>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <!--======= TEAM =========-->
    <section id="team">
        <div class="container">
            <!--======= TITTLE =========-->
            <div class="tittle"> <img src="images/head-top.png" alt="">
                <h3>our great agents</h3>
                <p>This time there's no stopping us. Straightnin' the curves. Flatnin' the hills Someday the mountain might
                    get ‘em but the law never will. The weather started getting rough - the tiny ship was tossed.</p>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <!--======= TEAM ROW =========-->
                    <ul class="row">

                        <!--======= TEAM =========-->
                        @foreach ($teamMembers as $teamMember)
                            <li class="col-sm-3">
                                <div class="team"> <img class="img-responsive"
                                        src="{{ asset('storage/' . $teamMember->photo) ?? 'images/agent-1.jpg' }}"
                                        alt=""
                                        style="width: 100%; height: 250px; object-fit: cover; border-radius: 2px;">
                                    <div class="team-over">
                                        <!--======= SOCIAL ICON =========-->
                                        <ul class="social_icons animated-6s fadeInUp">
                                            <li class="facebook"><a
                                                    href="{{ old('social_links.facebook', $socialLinks['facebook'] ?? '') }}"><i
                                                        class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="twitter"><a
                                                    href="{{ old('social_links.twitter', $socialLinks['twitter'] ?? '') }}"><i
                                                        class="fa fa-twitter"></i></a></li>
                                            <li class="instagram"><a
                                                    href="{{ old('social_links.instagram', $socialLinks['instagram'] ?? '') }}"><i
                                                        class="fa fa-instagram"></i></a>
                                            </li>
                                            <li class="linkedin"><a
                                                    href="{{ old('social_links.linkedin', $socialLinks['linkedin'] ?? '') }}"><i
                                                        class="fa fa-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <!--======= TEAM DETAILS =========-->
                                    <div class="team-detail">
                                        <h6>{{ $teamMember->name ?? 'NA' }}</h6>
                                        <p>{{ $teamMember->position }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach

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
                        <div class="col-md-12"> <img src="images/comment-icon.png" alt="">
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
                                        src="images/avatar-1.jpg" alt=""> </li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"> <img
                                        src="images/avatar-2.jpg" alt=""></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"> <img
                                        src="images/avatar-3.jpg" alt=""></li>
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
                @foreach ($blogs as $blog)
                    <li class="col-sm-4">
                        <div class="b-inner"> <img class="img-responsive" src="{{ asset('storage/'.$blog->featured_image) ?? 'images/blog-img-1.jpg' }}" alt="" style="width: 100%; height: 250px; object-fit: cover; border-radius: 2px;">
                            <div class="b-details">
                                <div class="post-admin"> <img src="images/auther-1.jpg" alt="">
                                    <h6>{{ $blog->author->name }}</h6>
                                    {{-- <span class="pull-right"><i class="fa fa-comment-o"></i> 6 </span> <span
                                        class="pull-right"><i class="fa fa-heart-o"></i> 10 &nbsp; &nbsp;|
                                        &nbsp;&nbsp;</span> --}}
                                </div>
                                <div class="bottom-sec"> <span><i class="fa fa-calendar"></i>{{ $blog->created_at->format('M d, Y') }}</span> <a
                                        class="font-montserrat" href="#.">{{ $blog->title }}</a>
                                    <hr>
                                    <p>{{ Str::limit($blog->content,100) }}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </section>
@endsection
