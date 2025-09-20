@extends('layouts.app')
@section('content')
    <!--======= BANNER =========-->
    <div class="sub-banner">
        <div class="overlay">
            <div class="container">
                <h1>property details</h1>
                <ol class="breadcrumb">
                    <li class="pull-left">property details</li>
                    <li><a href="#">Home</a></li>
                    <li class="active">property details</li>
                </ol>
            </div>
        </div>
    </div>

    <!--======= PROPERTIES DETAIL PAGE =========-->
    <section class="properti-detsil">
        <div class="container">
            <div class="row">

                <!--======= LEFT BAR =========-->
                <div class="col-sm-9">

                    <!--======= THUMB SLIDER =========-->
                    <div class="thumb-slider">
                        <div id="slider" class="flexslider">
                            <ul class="slides">
                                <li> <img class="img-responsive" src="images/detail-img.jpg" alt=""> </li>
                                <li> <img class="img-responsive" src="images/detail-img-1.jpg" alt=""> </li>
                                <li> <img class="img-responsive" src="images/detail-img.jpg" alt=""> </li>
                                <li> <img class="img-responsive" src="images/detail-img-1.jpg" alt=""> </li>
                                <li> <img class="img-responsive" src="images/detail-img.jpg" alt=""> </li>
                                <li> <img class="img-responsive" src="images/detail-img-1.jpg" alt=""> </li>
                            </ul>
                        </div>

                        <!--======= THUMBS =========-->
                        <div id="carousel" class="flexslider">
                            <ul class="slides">
                                <li> <img class="img-responsive" src="images/thumb-1.jpg" alt=""> </li>
                                <li> <img class="img-responsive" src="images/thumb-2.jpg" alt=""> </li>
                                <li> <img class="img-responsive" src="images/thumb-3.jpg" alt=""> </li>
                                <li> <img class="img-responsive" src="images/thumb-4.jpg" alt=""> </li>
                                <li> <img class="img-responsive" src="images/thumb-5.jpg" alt=""> </li>
                                <li> <img class="img-responsive" src="images/thumb-1.jpg" alt=""> </li>
                            </ul>
                        </div>
                    </div>

                    <!--======= HOME INNER DETAILS =========-->
                    <ul class="home-in">
                        <li><span><i class="fa fa-home"></i> 20,000 Acres</span></li>
                        <li><span><i class="fa fa-bed"></i> 3 Bedrooms</span></li>
                        <li><span><i class="fa fa-tty"></i> 3 Bathrooms</span></li>
                        <li><span><i class="fa fa-print"></i> Print This Details</span></li>
                    </ul>

                    <!--======= TITTLE =========-->
                    <h5>A luxury home with swimming pool very near to you</h5>
                    <section> <span class="sale-tag font-montserrat"> For Sales</span> <span
                            class="sale-tag price font-montserrat"> $3,586,996</span> </section>
                    <p>Sometimes you want to go where everybody knows your name. And they're always glad you came. Movin' on
                        up to the east side. We finally got a piece of the pie. All of them had hair of gold like their
                        mother the youngest one in curls. The weather started getting rough the tiny ship was tossed. If not
                        for the courage of the fearless crew the Minnow would be lost. the Minnow would be lost.</p>

                    <!--======= OWNER DETSILS =========-->
                    <section class="info-property">
                        <h5 class="tittle-head">Property Details</h5>
                        <div class="inner">

                            <!--======= OWNER =========-->
                            <div class="row">
                                <div class="col-sm-2"> <img src="images/owner-img.jpg" alt=""></div>
                                <div class="col-sm-10">
                                    <ul class="row">
                                        <li class="col-sm-4">
                                            <p><span class="font-montserrat">Address </span>: 09 Design St</p>
                                            <p><span class="font-montserrat">ZIP </span>: 60006</p>
                                        </li>
                                        <li class="col-sm-4">
                                            <p><span class="font-montserrat">City </span>: Sydney</p>
                                            <p><span class="font-montserrat">counrty </span>: Australia</p>
                                        </li>
                                        <li class="col-sm-4">
                                            <p><span class="font-montserrat"> Area </span>: realestate</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!--======= PROPERTY FEATURES =========-->
                    <section class="info-property more">
                        <h5 class="tittle-head">Property features</h5>
                        <div class="inner">

                            <!--======= FEATURE DETAILS =========-->
                            <ul class="row">
                                <li class="col-sm-3">
                                    <p>Air Conditioning</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>backyard</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>balcony</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>dual sinks</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>electric range</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>emergency exit</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>Fire alaram</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>furnished</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>internet</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>lake view</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>marble floors</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>pool</p>
                                </li>
                            </ul>
                        </div>
                    </section>

                    <!--======= PROPERTY FEATURES =========-->
                    <section class="info-property more">
                        <h5 class="tittle-head">Property features</h5>
                        <div class="inner">

                            <!--======= FEATURE DETAILS =========-->
                            <ul class="row">
                                <li class="col-sm-3">
                                    <p>Hospital - 5 KM</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>school - 8 km</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>bank - 3 Km</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>park - 2 Km</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>Hotels - 3 km</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>Shopping Mall - 6 Km</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>police station - 2 km</p>
                                </li>
                                <li class="col-sm-3">
                                    <p>petrol bunk - 1 km</p>
                                </li>
                            </ul>
                        </div>
                    </section>

                    <!--======= PROPERTY FEATURES =========-->
                    <section class="info-property agents-info">
                        <h5 class="tittle-head">agent details</h5>
                        <div class="inner">
                            <!--======= AGENT DETAILS =========-->
                            <div class="row">
                                <div class="col-sm-3"> <img class="img-responsive" src="images/agent-3.jpg"
                                        alt=""> </div>
                                <div class="col-sm-9">
                                    <h5>Dwayne johnson</h5>
                                    <!--======= SOCIAL ICONS =========-->
                                    <ul class="social_icons">
                                        <li class="facebook"><a href="#."><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#."><i class="fa fa-twitter"></i></a></li>
                                        <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                    <p>Maybe you and me were never meant to be. But baby think of me once in awhile. I'm at
                                        WKRP in Cincinnati. Boy the way Glen Miller played. Songs that made the hit parade.
                                        Guys like us we had it made. Those were the days.</p>

                                    <!--======= AGENT INFOR =========-->
                                    <ul class="agent-info">
                                        <li>
                                            <p><i class="fa fa-phone"></i> +01 123 456 78 </p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-envelope-o"></i> info@Djohnson.com </p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-home"></i> Listed 3 Properties </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!--======= PROPERTY FEATURES =========-->
                    <section class="info-property location">
                        <h5 class="tittle-head">property location</h5>
                        <div class="inner"> </div>
                    </section>
                </div>

                <!--======= RIGT SIDEBAR =========-->
                <div class="col-sm-3 side-bar">

                    <!--======= FIND PROPERTY =========-->
                    <div class="finder">

                        <!--======= FORM SECTION =========-->
                        <div class="find-sec">
                            <h5>Search for properties</h5>
                            <ul class="row">

                                <!--======= FORM =========-->
                                <li class="col-sm-12">
                                    <select class="selectpicker">
                                        <option value="">City</option>
                                        <option value="">Cat 1</option>
                                        <option value="">Cat 2</option>
                                    </select>
                                </li>

                                <!--======= FORM =========-->
                                <li class="col-sm-12">
                                    <select class="selectpicker">
                                        <option value="">Location</option>
                                        <option value="">Cat 1</option>
                                        <option value="">Cat 2</option>
                                    </select>
                                </li>

                                <!--======= FORM =========-->
                                <li class="col-sm-12">
                                    <select class="selectpicker">
                                        <option value="">Property Status</option>
                                        <option value="">Cat 1</option>
                                        <option value="">Cat 2</option>
                                    </select>
                                </li>

                                <!--======= FORM =========-->
                                <li class="col-sm-12">
                                    <select class="selectpicker">
                                        <option value="">Property Type</option>
                                        <option value="">Cat 1</option>
                                        <option value="">Cat 2</option>
                                    </select>
                                </li>

                                <!--======= FORM =========-->
                                <li class="col-sm-12">
                                    <select class="selectpicker">
                                        <option value="">No of Bedrooms</option>
                                        <option value="">Cat 1</option>
                                        <option value="">Cat 2</option>
                                    </select>
                                </li>

                                <!--======= FORM =========-->
                                <li class="col-sm-12">
                                    <select class="selectpicker">
                                        <option value="">No of Bathrooms</option>
                                        <option value="">Cat 1</option>
                                        <option value="">Cat 2</option>
                                    </select>
                                </li>
                                <li class="col-sm-12">
                                    <select class="selectpicker">
                                        <option value="">Minimum price</option>
                                        <option value="">Cat 1</option>
                                        <option value="">Cat 2</option>
                                    </select>
                                </li>
                                <li class="col-sm-12">
                                    <select class="selectpicker">
                                        <option value="">Maximum price</option>
                                        <option value="">Cat 1</option>
                                        <option value="">Cat 2</option>
                                    </select>
                                </li>
                                <li class="col-sm-12"> <a href="#." class="btn">SEARCH</a> </li>
                            </ul>
                        </div>
                    </div>

                    <!--======= CATEGORIES =========-->
                    <div class="categories margin-t-40">
                        <h5>Categories</h5>
                        <hr>
                        <ul>
                            <li><a href="#."> Architecture <span>(23)</span></a></li>
                            <li><a href="#."> Art Home <span>(16)</span></a></li>
                            <li><a href="#."> Beautyful Villa <span> (09)</span></a></li>
                            <li><a href="#."> Fantastic House <span>(15)</span></a></li>
                            <li><a href="#."> Home With Pool <span> (11)</span></a></li>
                            <li><a href="#."> Beauty Office <span>(06)</span></a></li>
                        </ul>
                    </div>

                    <!--======= SOCIAL =========-->
                    <div class="socil-action margin-t-40">
                        <h5>Social With us</h5>
                        <hr>
                        <ul>
                            <li> <a class="rss" href="#."><i class="fa fa-rss"></i>RSS FEED</a> </li>
                            <li> <a class="tw" href="#."><i class="fa fa-twitter"></i>follow us</a> </li>
                            <li> <a class="fb" href="#."><i class="fa fa-facebook"></i>LIKE US</a> </li>
                            <li> <a class="pin" href="#."><i class="fa fa-pinterest"></i>follow us</a> </li>
                            <li> <a class="drib" href="#."><i class="fa fa-dribbble"></i>follow us</a> </li>
                            <li> <a class="g-plus" href="#."><i class="fa fa-google-plus"></i>plus 1 us</a> </li>
                        </ul>
                    </div>

                    <!--======= SOCIAL =========-->
                    <div class="flicker-post margin-t-40">
                        <h5>featured properties</h5>
                        <hr>
                        <ul>
                            <li> <a href="#."><img class="img-responsive" src="images/img-1.jpg"
                                        alt=""></a> </li>
                            <li> <a href="#."><img class="img-responsive" src="images/img-2.jpg"
                                        alt=""></a> </li>
                            <li> <a href="#."><img class="img-responsive" src="images/img-3.jpg"
                                        alt=""></a> </li>
                            <li> <a href="#."><img class="img-responsive" src="images/img-4.jpg"
                                        alt=""></a> </li>
                            <li> <a href="#."><img class="img-responsive" src="images/img-5.jpg"
                                        alt=""></a> </li>
                            <li> <a href="#."><img class="img-responsive" src="images/img-6.jpg"
                                        alt=""></a> </li>
                        </ul>
                    </div>

                    <!--======= Recent Properties =========-->
                    <div class="recent-come margin-t-40">
                        <h5>Categories</h5>
                        <hr>
                        <ul class="recent-come">
                            <li>
                                <div class="img-post"> <img src="images/recent-img.jpg" alt=""> </div>
                                <div class="text-post"> <a href="#.">On your mark get set and go now</a>
                                    <span>$956,205</span>
                                </div>
                            </li>
                            <li>
                                <div class="img-post"> <img src="images/recent-img-1.jpg" alt=""> </div>
                                <div class="text-post"> <a href="#.">On your mark get set and go now</a>
                                    <span>$956,205</span>
                                </div>
                            </li>
                            <li>
                                <div class="img-post"> <img src="images/recent-img-2.jpg" alt=""> </div>
                                <div class="text-post"> <a href="#.">On your mark get set and go now</a>
                                    <span>$956,205</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!--======= TAGS =========-->
                    <div class="tags margin-t-40">
                        <h5>TAGS</h5>
                        <hr>
                        <ul>
                            <li><a href="#.">Amazing</a></li>
                            <li><a href="#.">Envato</a></li>
                            <li><a href="#.">Themes</a></li>
                            <li><a href="#.">Clean</a></li>
                            <li><a href="#.">Responsiveness</a></li>
                            <li><a href="#.">SEO</a></li>
                            <li><a href="#.">Mobile</a></li>
                            <li><a href="#.">IOS</a></li>
                            <li><a href="#.">Flat</a></li>
                            <li><a href="#.">Design</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--======= PROPERTY =========-->
    <section class="properties white-bg">
        <div class="container">

            <!--======= TITTLE =========-->
            <div class="tittle"> <img src="images/head-top.png" alt="">
                <h3>our featured properties</h3>
                <p>This time there's no stopping us. Straightnin' the curves. Flatnin' the hills Someday the mountain might
                    get ‘em but the law never will. The weather started getting rough - the tiny ship was tossed.</p>
            </div>

            <!--======= PROPERTIES ROW =========-->
            <ul class="row">

                <!--======= PROPERTY =========-->
                <li class="col-sm-4">
                    <!--======= TAGS =========-->

                    <section>
                        <!--======= IMAGE =========-->
                        <div class="img"> <img class="img-responsive" src="images/img-1.jpg" alt="">
                            <!--======= IMAGE HOVER =========-->

                            <div class="over-proper"> <a href="#." class="btn font-montserrat">more details</a>
                            </div>
                        </div>
                        <!--======= HOME INNER DETAILS =========-->
                        <ul class="home-in">
                            <li><span><i class="fa fa-home"></i> 20,000 Acres</span></li>
                            <li><span><i class="fa fa-bed"></i> 3 Bedrooms</span></li>
                            <li><span><i class="fa fa-tty"></i> 3 Bathrooms</span></li>
                        </ul>
                        <!--======= HOME DETAILS =========-->
                        <div class="detail-sec"> <a href="#." class="font-montserrat">sweet home for small
                                family</a> <span class="locate"><i class="fa fa-map-marker"></i> Boston,USA</span> <span
                                class="price-bg  font-montserrat">$ 256,596</span> <a href="#." class="btn">more
                                details</a> </div>
                    </section>
                </li>

                <!--======= PROPERTY =========-->
                <li class="col-sm-4">
                    <!--======= TAGS =========-->
                    <section>
                        <!--======= IMAGE =========-->
                        <div class="img"> <img class="img-responsive" src="images/img-4.jpg" alt="">
                            <!--======= IMAGE HOVER =========-->

                            <div class="over-proper"> <a href="#." class="btn font-montserrat">more details</a>
                            </div>
                        </div>
                        <!--======= HOME INNER DETAILS =========-->
                        <ul class="home-in">
                            <li><span><i class="fa fa-home"></i> 20,000 Acres</span></li>
                            <li><span><i class="fa fa-bed"></i> 3 Bedrooms</span></li>
                            <li><span><i class="fa fa-tty"></i> 3 Bathrooms</span></li>
                        </ul>
                        <!--======= HOME DETAILS =========-->
                        <div class="detail-sec"> <a href="#." class="font-montserrat">sweet home for small
                                family</a> <span class="locate"><i class="fa fa-map-marker"></i> Boston,USA</span> <span
                                class="price-bg  font-montserrat">$ 256,596</span> <a href="#." class="btn">more
                                details</a> </div>
                    </section>
                </li>

                <!--======= PROPERTY =========-->
                <li class="col-sm-4">
                    <!--======= TAGS =========-->

                    <section>
                        <!--======= IMAGE =========-->
                        <div class="img"> <img class="img-responsive" src="images/img-6.jpg" alt="">
                            <!--======= IMAGE HOVER =========-->

                            <div class="over-proper"> <a href="#." class="btn font-montserrat">more details</a>
                            </div>
                        </div>
                        <!--======= HOME INNER DETAILS =========-->
                        <ul class="home-in">
                            <li><span><i class="fa fa-home"></i> 20,000 Acres</span></li>
                            <li><span><i class="fa fa-bed"></i> 3 Bedrooms</span></li>
                            <li><span><i class="fa fa-tty"></i> 3 Bathrooms</span></li>
                        </ul>
                        <!--======= HOME DETAILS =========-->
                        <div class="detail-sec"> <a href="#." class="font-montserrat">sweet home for small
                                family</a> <span class="locate"><i class="fa fa-map-marker"></i> Boston,USA</span> <span
                                class="price-bg  font-montserrat">$ 256,596</span> <a href="#." class="btn">more
                                details</a> </div>
                    </section>
                </li>
            </ul>
        </div>
    </section>
@endsection
