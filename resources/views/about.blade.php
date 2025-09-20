@extends('layouts.app')
@section('content')
  <!--======= BANNER =========-->
  <div class="sub-banner">
        <div class="overlay">
            <div class="container">
                <h1>ABOUT US</h1>
                <ol class="breadcrumb">
                    <li class="pull-left">ABOUT us</li>
                    <li><a href="#">Home</a></li>
                    <li class="active">ABOUT Us</li>
                </ol>
            </div>
        </div>
  </div>
  <!--======= WHAT WE DO =========-->
  <section class="what-we-do">
        <div class="container">

            <!--======= TITTLE =========-->
            <div class="tittle"> <img src="images/head-top.png" alt="">
                <h3>who we are</h3>
                <p>This time there's no stopping us. Straightnin' the curves. Flatnin' the hills Someday the mountain might
                    get ‘em but the law never will. The weather started getting rough - the tiny ship was tossed.</p>
            </div>
            <div role="tabpanel">

                <!--======= NAV TABS =========-->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#what-we" aria-controls="home" role="tab"
                            data-toggle="tab"><i class="fa fa-bullhorn"></i> <span class="font-montserrat">what we
                                do</span></a></li>
                    <li role="presentation"><a href="#mission" aria-controls="profile" role="tab" data-toggle="tab"><i
                                class="fa fa-rocket"></i><span class="font-montserrat">our mission</span></a></li>
                    <li role="presentation"><a href="#vision" aria-controls="messages" role="tab" data-toggle="tab"><i
                                class="fa fa-lightbulb-o"></i><span class="font-montserrat">our vision</span></a></li>
                </ul>

                <!--======= TAB CONTENT =========-->
                <div class="tab-content">

                    <!--======= WHAT WE DO =========-->
                    <div role="tabpanel" class="tab-pane animated-6s flipInX active" id="what-we">
                        <h4>make your family happy</h4>
                        <p>The mate was a mighty sailin' man the Skipper brave and sure. Five passengers set sail that day
                            for a three hour tour a three hour tour. The first mate and his Skipper too will do their very
                            best to make the others comfortable in their tropic island nest. If you have a problem if no one
                            else can help and if you can find </p>
                    </div>

                    <!--======= OUR MISSION =========-->
                    <div role="tabpanel" class="tab-pane animated-6s flipInX" id="mission">
                        <h4>make your family happy</h4>
                        <p>The mate was a mighty sailin' man the Skipper brave and sure. Five passengers set sail that day
                            for a three hour tour a three hour tour. The first mate and his Skipper too will do their very
                            best to make the others comfortable in their tropic island nest. If you have a problem if no one
                            else can help and if you can find </p>
                    </div>

                    <!--======= OUR VISION =========-->
                    <div role="tabpanel" class="tab-pane animated-6s flipInX" id="vision">
                        <h4>make your family happy</h4>
                        <p>The mate was a mighty sailin' man the Skipper brave and sure. Five passengers set sail that day
                            for a three hour tour a three hour tour. The first mate and his Skipper too will do their very
                            best to make the others comfortable in their tropic island nest. If you have a problem if no one
                            else can help and if you can find </p>
                    </div>
                </div>
            </div>
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
                                        <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i></a></li>
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
                                        <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i></a></li>
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
  <!--======= PARTHNER =========-->
  <section class="parthner">
        <div class="container">
            <!--======= TITTLE =========-->
            <div class="tittle"> <img src="images/head-top.png" alt="">
                <h3>our trusted partners</h3>
                <p>This time there's no stopping us. Straightnin' the curves. Flatnin' the hills Someday the mountain might
                    get ‘em but the law never will. The weather started getting rough - the tiny ship was tossed.</p>
            </div>

            <!--======= PARTHNERS =========-->
            <div class="parthner-slide">
                <div class="part"> <a href="#."> <img src="images/parthner-img-1.png" alt=""> </a> </div>

                <!--======= PARTHNERS =========-->
                <div class="part"> <a href="#."> <img src="images/parthner-img-2.png" alt=""> </a> </div>

                <!--======= PARTHNERS =========-->
                <div class="part"> <a href="#."> <img src="images/parthner-img-3.png" alt=""> </a> </div>

                <!--======= PARTHNERS =========-->
                <div class="part"> <a href="#."> <img src="images/parthner-img-4.png" alt=""> </a> </div>

                <!--======= PARTHNERS =========-->
                <div class="part"> <a href="#."> <img src="images/parthner-img-5.png" alt=""> </a> </div>

                <!--======= PARTHNERS =========-->
                <div class="part"> <a href="#."> <img src="images/parthner-img-3.png" alt=""> </a> </div>

                <!--======= PARTHNERS =========-->
                <div class="part"> <a href="#."> <img src="images/parthner-img-4.png" alt=""> </a> </div>

                <!--======= PARTHNERS =========-->
                <div class="part"> <a href="#."> <img src="images/parthner-img-5.png" alt=""> </a> </div>

                <!--======= PARTHNERS =========-->
                <div class="part"> <a href="#."> <img src="images/parthner-img-3.png" alt=""> </a> </div>

                <!--======= PARTHNERS =========-->
                <div class="part"> <a href="#."> <img src="images/parthner-img-4.png" alt=""> </a> </div>

                <!--======= PARTHNERS =========-->
                <div class="part"> <a href="#."> <img src="images/parthner-img-5.png" alt=""> </a> </div>

                <!--======= PARTHNERS =========-->
                <div class="part"> <a href="#."> <img src="images/parthner-img-3.png" alt=""> </a> </div>
            </div>
        </div>
  </section>
@endsection
