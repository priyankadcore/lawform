@extends('layouts.app')
@section('content')
    <!--======= BANNER =========-->
    <div id="banner">

        <div id="homeMap"></div>


    </div>

    <!--======= FIND PROPERTY =========-->
    <div class="finder">
        <div class="container">
            <h6>Search for properties</h6>
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
                    <li class="col-sm-3">
                        <label>Minimum Price</label>
                        <select class="selectpicker">
                            <option value="">100,000,00</option>
                            <option value="">200,000,00</option>
                            <option value="">300,000,00</option>
                            <option value="">400,000,00</option>
                            <option value="">500,000,00</option>
                            <option value="">600,000,00</option>
                        </select>
                    </li>
                    <li class="col-sm-3">
                        <label>Maximum Price</label>
                        <select class="selectpicker">
                            <option value="">200,000,00</option>
                            <option value="">300,000,00</option>
                            <option value="">400,000,00</option>
                            <option value="">500,000,00</option>
                            <option value="">600,000,00</option>
                            <option value="">700,000,00</option>
                        </select>
                    </li>
                    <li class="col-lg-12">
                        <div class="search">
                            <button type="submit" class="btn">Search</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

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

                            <div class="over-proper"> <a href="#." class="btn font-montserrat">more details</a> </div>
                        </div>
                        <!--======= HOME INNER DETAILS =========-->
                        <ul class="home-in">
                            <li><span><i class="fa fa-home"></i> 20,000 Acres</span></li>
                            <li><span><i class="fa fa-bed"></i> 3 Bedrooms</span></li>
                            <li><span><i class="fa fa-tty"></i> 3 Bathrooms</span></li>
                        </ul>
                        <!--======= HOME DETAILS =========-->
                        <div class="detail-sec"> <a href="#." class="font-montserrat">sweet home for small family</a>
                            <span class="locate"><i class="fa fa-map-marker"></i> Boston,USA</span> <span
                                class="price-bg  font-montserrat">$ 256,596</span> <a href="#." class="btn">more
                                details</a> </div>
                    </section>
                </li>

                <!--======= PROPERTY =========-->
                <li class="col-sm-4">
                    <!--======= TAGS =========-->
                    <section>
                        <!--======= IMAGE =========-->
                        <div class="img"> <img class="img-responsive" src="images/img-2.jpg" alt="">
                            <!--======= IMAGE HOVER =========-->

                            <div class="over-proper"> <a href="#." class="btn font-montserrat">more details</a> </div>
                        </div>
                        <!--======= HOME INNER DETAILS =========-->
                        <ul class="home-in">
                            <li><span><i class="fa fa-home"></i> 20,000 Acres</span></li>
                            <li><span><i class="fa fa-bed"></i> 3 Bedrooms</span></li>
                            <li><span><i class="fa fa-tty"></i> 3 Bathrooms</span></li>
                        </ul>
                        <!--======= HOME DETAILS =========-->
                        <div class="detail-sec"> <a href="#." class="font-montserrat">sweet home for small family</a>
                            <span class="locate"><i class="fa fa-map-marker"></i> Boston,USA</span> <span
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

                            <div class="over-proper"> <a href="#." class="btn font-montserrat">more details</a> </div>
                        </div>
                        <!--======= HOME INNER DETAILS =========-->
                        <ul class="home-in">
                            <li><span><i class="fa fa-home"></i> 20,000 Acres</span></li>
                            <li><span><i class="fa fa-bed"></i> 3 Bedrooms</span></li>
                            <li><span><i class="fa fa-tty"></i> 3 Bathrooms</span></li>
                        </ul>
                        <!--======= HOME DETAILS =========-->
                        <div class="detail-sec"> <a href="#." class="font-montserrat">sweet home for small family</a>
                            <span class="locate"><i class="fa fa-map-marker"></i> Boston,USA</span> <span
                                class="price-bg  font-montserrat">$ 256,596</span> <a href="08-Property-Details.html"
                                class="btn">more details</a> </div>
                    </section>
                </li>
            </ul>
        </div>
    </section>

    <!--======= TESTIMONILAS =========-->
    <section id="testimonials">
        <div class="container">

            <!--======= TITTLE =========-->
            <div class="tittle">
                <h3>what people say about us</h3>
            </div>
            <div class="testi">
                <div class="testi-slide">
                    <div class="item">
                        <div class="avatar"><img src="images/avatar-1.jpg" alt=""></div>
                        <p>These days are all Happy and Free. These days are all share them with me oh baby. The year is
                            1987 and NASA launches the last of Americas deep space probes. Flying If you have a problem if
                            no one else can help and if you can find them maybe you can hire a prayer.</p>
                        <h5>mitchell warner</h5>
                        <span>Sydney, Australia</span>
                    </div>
                    <div class="item">
                        <div class="avatar"><img src="images/avatar-1.jpg" alt=""></div>
                        <p>These days are all Happy and Free. These days are all share them with me oh baby. The year is
                            1987 and NASA launches the last of Americas deep space probes. Flying If you have a problem if
                            no one else can help and if you can find them maybe you can hire a prayer.</p>
                        <h5>mitchell warner</h5>
                        <span>Sydney, Australia</span>
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
                <h3>new properties list</h3>
                <p>This time there's no stopping us. Straightnin' the curves. Flatnin' the hills Someday the mountain might
                    get ‘em but the law never will. The weather started getting rough - the tiny ship was tossed.</p>
            </div>

            <!--======= PROPERTIES ROW =========-->
            <ul class="row">

                <!--======= PROPERTY =========-->
                <li class="col-sm-4">
                    <!--======= TAGS =========-->
                    <span class="tag font-montserrat rent">FOR RENT</span>
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
                                family</a> <span class="locate"><i class="fa fa-map-marker"></i> Boston,USA</span>
                            <p>Till the one day when the lady met this fellow and they knew it was much more than </p>
                            <div class="share-p"> <span class="price font-montserrat">$ 256,596</span> <i
                                    class="fa fa-star-o"></i> <i class="fa fa-share-alt"></i> </div>
                        </div>
                    </section>
                </li>

                <!--======= PROPERTY =========-->
                <li class="col-sm-4">
                    <!--======= TAGS =========-->
                    <span class="tag font-montserrat rent">FOR RENT</span>
                    <section>
                        <!--======= IMAGE =========-->
                        <div class="img"> <img class="img-responsive" src="images/img-2.jpg" alt="">
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
                                family</a> <span class="locate"><i class="fa fa-map-marker"></i> Boston,USA</span>
                            <p>Till the one day when the lady met this fellow and they knew it was much more than </p>
                            <div class="share-p"> <span class="price font-montserrat">$ 256,596</span> <i
                                    class="fa fa-star-o"></i> <i class="fa fa-share-alt"></i> </div>
                        </div>
                    </section>
                </li>

                <!--======= PROPERTY =========-->
                <li class="col-sm-4">
                    <!--======= TAGS =========-->
                    <span class="tag font-montserrat sale">FOR SALE</span>
                    <section>
                        <!--======= IMAGE =========-->
                        <div class="img"> <img class="img-responsive" src="images/img-3.jpg" alt="">
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
                                family</a> <span class="locate"><i class="fa fa-map-marker"></i> Boston,USA</span>
                            <p>Till the one day when the lady met this fellow and they knew it was much more than </p>
                            <div class="share-p"> <span class="price font-montserrat">$ 256,596</span> <i
                                    class="fa fa-star-o"></i> <i class="fa fa-share-alt"></i> </div>
                        </div>
                    </section>
                </li>

                <!--======= PROPERTY =========-->
                <li class="col-sm-4">
                    <!--======= TAGS =========-->
                    <span class="tag font-montserrat rent">FOR RENT</span>
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
                                family</a> <span class="locate"><i class="fa fa-map-marker"></i> Boston,USA</span>
                            <p>Till the one day when the lady met this fellow and they knew it was much more than </p>
                            <div class="share-p"> <span class="price font-montserrat">$ 2,956,596</span> <i
                                    class="fa fa-star-o"></i> <i class="fa fa-share-alt"></i> </div>
                        </div>
                    </section>
                </li>

                <!--======= PROPERTY =========-->
                <li class="col-sm-4">
                    <!--======= TAGS =========-->
                    <span class="tag font-montserrat sale">FOR SALE</span>
                    <section>
                        <!--======= IMAGE =========-->
                        <div class="img"> <img class="img-responsive" src="images/img-5.jpg" alt="">
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
                                family</a> <span class="locate"><i class="fa fa-map-marker"></i> Boston,USA</span>
                            <p>Till the one day when the lady met this fellow and they knew it was much more than </p>
                            <div class="share-p"> <span class="price font-montserrat">$ 256,596</span> <i
                                    class="fa fa-star-o"></i> <i class="fa fa-share-alt"></i> </div>
                        </div>
                    </section>
                </li>

                <!--======= PROPERTY =========-->
                <li class="col-sm-4">
                    <!--======= TAGS =========-->
                    <span class="tag font-montserrat rent">FOR RENT</span>
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
                                family</a> <span class="locate"><i class="fa fa-map-marker"></i> Boston,USA</span>
                            <p>Till the one day when the lady met this fellow and they knew it was much more than </p>
                            <div class="share-p"> <span class="price font-montserrat">$ 2,956,596</span> <i
                                    class="fa fa-star-o"></i> <i class="fa fa-share-alt"></i> </div>
                        </div>
                    </section>
                </li>
            </ul>
        </div>
    </section>

    <!--======= TEAM =========-->
    <section id="team" class="gray-bg">
        <div class="container">

            <!--======= TITTLE =========-->
            <div class="tittle"> <img src="images/head-top.png" alt="">
                <h3>our great agents</h3>
                <p>This time there's no stopping us. Straightnin' the curves. Flatnin' the hills Someday the mountain might
                    get ‘em but the law never will. The weather started getting rough - the tiny ship was tossed.</p>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <!--======= TEAM ROW =========-->
                    <ul class="row">

                        <!--======= TEAM =========-->
                        <li class="col-sm-6">
                            <div class="team"> <img class="img-responsive" src="images/agent-1.jpg" alt="">
                                <div class="team-over">
                                    <!--======= SOCIAL ICON =========-->
                                    <ul class="social_icons animated-6s fadeInUp">
                                        <li class="facebook"><a href="#."><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#."><i class="fa fa-twitter"></i></a></li>
                                        <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>

                                <!--======= TEAM DETAILS =========-->
                                <div class="team-detail">
                                    <h6>David Martin</h6>
                                    <p>Founder</p>
                                </div>
                            </div>
                        </li>

                        <!--======= TEAM =========-->
                        <li class="col-sm-6">
                            <div class="team"> <img class="img-responsive" src="images/agent-2.jpg" alt="">
                                <div class="team-over">
                                    <!--======= SOCIAL ICON =========-->
                                    <ul class="social_icons animated-6s fadeInUp">
                                        <li class="facebook"><a href="#."><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#."><i class="fa fa-twitter"></i></a></li>
                                        <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>

                                <!--======= TEAM DETAILS =========-->
                                <div class="team-detail">
                                    <h6>Hendrick jack </h6>
                                    <p>co-Founder</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">

                    <!--======= TEAM ROW =========-->
                    <ul class="row">

                        <!--======= TEAM =========-->
                        <li class="col-sm-6">
                            <div class="team"> <img class="img-responsive" src="images/agent-3.jpg" alt="">
                                <div class="team-over">
                                    <!--======= SOCIAL ICON =========-->
                                    <ul class="social_icons animated-6s fadeInUp">
                                        <li class="facebook"><a href="#."><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#."><i class="fa fa-twitter"></i></a></li>
                                        <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>

                                <!--======= TEAM DETAILS =========-->
                                <div class="team-detail">
                                    <h6>charles edward </h6>
                                    <p>team leader </p>
                                </div>
                            </div>
                        </li>

                        <!--======= TEAM =========-->
                        <li class="col-sm-6">
                            <div class="team"> <img class="img-responsive" src="images/agent-4.jpg" alt="">
                                <div class="team-over">
                                    <!--======= SOCIAL ICON =========-->
                                    <ul class="social_icons animated-6s fadeInUp">
                                        <li class="facebook"><a href="#."><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#."><i class="fa fa-twitter"></i></a></li>
                                        <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>

                                <!--======= TEAM DETAILS =========-->
                                <div class="team-detail">
                                    <h6>jessica wevins </h6>
                                    <p>team leader</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--======= PROPERTIRES SMALL POST =========-->
    <section class="properties-small">
        <div class="container">
            <div class="row">

                <!--======= TOP RATED PROPERTIES =========-->
                <div class="col-md-4">
                    <h6>top rated properties</h6>
                    <ul>

                        <!--======= PROPERTIRES SMALL POST =========-->
                        <li>
                            <div class="img"> <a href="#"><img src="images/small-post-1.jpg" alt="">
                                </a></div>
                            <div class="text-po"> <a href="#.">Sweet home for family</a>
                                <div class="locat"> <span><i class="fa fa-star"></i></span> <span><i
                                            class="fa fa-star"></i></span> <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span> <span><i class="fa fa-star-half-o"></i></span>
                                </div>
                                <span class="font-montserrat">$3,569,000</span>
                            </div>
                        </li>

                        <!--======= PROPERTIRES SMALL POST =========-->
                        <li>
                            <div class="img"><a href="#"> <img src="images/small-post-2.jpg" alt="">
                                </a></div>
                            <div class="text-po"> <a href="#.">Sweet home for family</a>
                                <div class="locat"> <span><i class="fa fa-star"></i></span> <span><i
                                            class="fa fa-star"></i></span> <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span> <span><i class="fa fa-star-half-o"></i></span>
                                </div>
                                <span class="font-montserrat">$3,569,000</span>
                            </div>
                        </li>

                        <!--======= PROPERTIRES SMALL POST =========-->
                        <li>
                            <div class="img"><a href="#"> <img src="images/small-post-3.jpg" alt="">
                                </a></div>
                            <div class="text-po"> <a href="#.">Sweet home for family</a>
                                <div class="locat"> <span><i class="fa fa-star"></i></span> <span><i
                                            class="fa fa-star"></i></span> <span><i class="fa fa-star"></i></span>
                                    <span><i class="fa fa-star"></i></span> <span><i class="fa fa-star-half-o"></i></span>
                                </div>
                                <span class="font-montserrat">$3,569,000</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <!--======= FEATURED PROPERTIES =========-->
                <div class="col-md-4">
                    <h6>featured properties</h6>
                    <ul>

                        <!--======= PROPERTIRES SMALL POST =========-->
                        <li>
                            <div class="img"><a href="#"> <img src="images/small-post-4.jpg" alt="">
                                </a> </div>
                            <div class="text-po"> <a href="#.">Sweet home for family</a>
                                <div class="locat">
                                    <p> <span><i class="fa fa-map-marker"></i> </span> California</p>
                                </div>
                                <span class="font-montserrat">$3,569,000</span>
                            </div>
                        </li>

                        <!--======= PROPERTIRES SMALL POST =========-->
                        <li>
                            <div class="img"> <a href="#"><img src="images/small-post-5.jpg" alt="">
                                </a> </div>
                            <div class="text-po"> <a href="#.">Sweet home for family</a>
                                <div class="locat">
                                    <p> <span><i class="fa fa-map-marker"></i> </span> New York</p>
                                </div>
                                <span class="font-montserrat">$3,569,000</span>
                            </div>
                        </li>

                        <!--======= PROPERTIRES SMALL POST =========-->
                        <li>
                            <div class="img"><a href="#"> <img src="images/small-post-6.jpg" alt="">
                                </a></div>
                            <div class="text-po"> <a href="#.">Sweet home for family</a>
                                <div class="locat">
                                    <p> <span><i class="fa fa-map-marker"></i> </span> Sydney</p>
                                </div>
                                <span class="font-montserrat">$3,569,000</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <!--======= TOP RATED PROPERTIES =========-->
                <div class="col-md-4">
                    <h6>RECENT properties</h6>
                    <ul>

                        <!--======= PROPERTIRES SMALL POST =========-->
                        <li>
                            <div class="img"><a href="#"> <img src="images/small-post-7.jpg"
                                        alt=""></a> </div>
                            <div class="text-po"> <a href="#.">Sweet home for family</a>
                                <div class="locat">
                                    <p> <span><i class="fa fa-map-marker"></i> </span> California</p>
                                </div>
                                <span class="font-montserrat">$3,569,000</span>
                            </div>
                        </li>

                        <!--======= PROPERTIRES SMALL POST =========-->
                        <li>
                            <div class="img"> <a href="#"><img src="images/small-post-8.jpg" alt="">
                                </a></div>
                            <div class="text-po"> <a href="#.">Sweet home for family</a>
                                <div class="locat">
                                    <p> <span><i class="fa fa-map-marker"></i> </span> New York</p>
                                </div>
                                <span class="font-montserrat">$3,569,000</span>
                            </div>
                        </li>

                        <!--======= PROPERTIRES SMALL POST =========-->
                        <li>
                            <div class="img"><a href="#"> <img src="images/small-post-9.jpg" alt="">
                                </a> </div>
                            <div class="text-po"> <a href="#.">Sweet home for family</a>
                                <div class="locat">
                                    <p> <span><i class="fa fa-map-marker"></i> </span> Sydney</p>
                                </div>
                                <span class="font-montserrat">$3,569,000</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
