@extends('layouts.app')
@section('content')
    <!--======= BANNER =========-->
    <div class="sub-banner">
        <div class="overlay">
            <div class="container">
                <h1>CONTACT US</h1>
                <ol class="breadcrumb">
                    <li class="pull-left">CONTACT US</li>
                    <li><a href="#">Home</a></li>
                    <li class="active">CONTACT US</li>
                </ol>
            </div>
        </div>
    </div>

    <!--======= MAP =========-->
    <div id="map"></div>
    <!--======= CONTACT =========-->
    <section class="contact">

        <!--======= CONTACT INFORMATION =========-->
        <div class="contact-info">
            <div class="container">
                <!--======= CONTACT =========-->
                <ul class="row con-det">

                    <!--======= ADDRESS =========-->
                    <li class="col-md-4"> <i class="fa fa-map-marker"></i>
                        <p>9 Downtown, design street
                            victoria, australia</p>
                        <a href="#." class="font-montserrat">Show map </a>
                    </li>

                    <!--======= EMAIL =========-->
                    <li class="col-md-4"> <i class="fa fa-phone"></i>
                        <p>Tel : +01 123 456 78</p>
                        <p>fax : +01 123 456 78</p>
                    </li>

                    <!--======= ADDRESS =========-->
                    <li class="col-md-4"> <i class="fa fa-clock-o"></i>
                        <p>Week days : 9:00 Am to 5:00 PM</p>
                        <p>Saturday : 9:00 Am to 12:00 PM</p>
                        <p>Sunday : Holiday</p>
                    </li>
                </ul>

                <!--======= CONTACT FORM =========-->

            </div>
        </div>
        <div class="contact-form">
            <div class="container">

                <!--======= TITTLE =========-->
                <div class="tittle"> <img src="images/head-top.png" alt="">
                    <h3>feel free to communicate with us</h3>
                    <p>This time there's no stopping us. Straightnin' the curves. Flatnin' the hills Someday the mountain
                        might get ‘em but the law never will. The weather started getting rough - the tiny ship was tossed.
                    </p>
                </div>
                <div id="contact_message" class="success-msg"> <i class="fa fa-paper-plane-o"></i>Thank You. Your Message
                    has been Submitted</div>
                <form role="form" id="contact_form" method="post" onSubmit="return false">
                    <ul class="row">
                        <li class="col-sm-6">
                            <label class="font-montserrat">your name *
                                <input type="text" class="form-control" name="name" id="name" placeholder="">
                            </label>
                        </li>
                        <li class="col-sm-6">
                            <label class="font-montserrat">your e-mail *
                                <input type="text" class="form-control" name="email" id="email" placeholder="">
                            </label>
                        </li>
                        <li class="col-sm-6">
                            <label class="font-montserrat">Phone *
                                <input type="text" class="form-control" name="company" id="company" placeholder="">
                            </label>
                        </li>
                        <li class="col-sm-6">
                            <label class="font-montserrat">Subject
                                <input type="text" class="form-control" name="website" id="website" placeholder="">
                            </label>
                        </li>
                        <li class="col-sm-12">
                            <label class="font-montserrat">message
                                <textarea class="form-control" name="message" id="message" rows="5" placeholder=""></textarea>
                            </label>
                        </li>
                        <li class="col-sm-12">
                            <button type="submit" value="submit" class="btn font-montserrat" id="btn_submit"
                                onClick="proceed();">Send message</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </section>
@endsection
