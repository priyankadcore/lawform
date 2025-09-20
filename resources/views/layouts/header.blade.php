<!--======= HEADER =========-->

<?php
$settings = \App\Models\Setting::first();
$logo = isset($settings->logo) ? asset('storage/' . $settings->logo) : asset('build/images/logo-dark.png');
?>
<header class="sticky">
    <div class="container">

        <!--======= LOGO =========-->
        <div class="logo">
            <a href="{{ route('home') }}"><img src="{{ $logo }}" alt="" height="42" width="75"></a>
         </div>
        <!--======= NAV =========-->
        <nav>

            <!--======= MENU START =========-->
            <ul class="ownmenu">
                <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                    <a href="{{ route('about') }}">About</a>
                </li>
                <li class="{{ request()->is('services') ? 'active' : '' }}">
                    <a href="{{ route('services') }}">Services</a>
                </li>
                <li class="{{ request()->is('properties') ? 'active' : '' }}">
                    <a href="{{ route('properties') }}">Properties</a>
                </li>
                <li class="{{ request()->is('our.team') ? 'active' : '' }}">
                    <a href="{{ route('our.team') }}">Our Team</a>
                </li>
                <li class="{{ request()->is('blog') ? 'active' : '' }}">
                    <a href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="{{ request()->is('contact') ? 'active' : '' }}">
                    <a href="{{ route('contact') }}">Contact us</a>
                </li>
                <li
                    class="{{ request()->is('second') || request()->is('third') ? 'active' : '' }}">
                    <a href="#">Pages</a>
                    <!-- Mega menu here -->
                    <div class="megamenu full-width">
                        <h6>All Pages</h6>
                        <div class="row nav-post">
                            <div class="col-sm-4 boder-da-r">
                                <ul>
                                    <li><a href="{{ route('home') }}">Home 1</a></li>
                                    <li><a href="{{ route('second') }}">Home 2</a></li>
                                    <li><a href="{{ route( 'third') }}">Home 3</a></li>
                                    <li><a href="{{ route('about') }}">About</a></li>
                                    <li><a href="{{ route('services') }}">Services</a></li>
                                    <li><a href="{{ route('our.team') }}">Our Agents</a></li>
                                    <li><a href="{{ route('property.listing') }}">Properties List</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <ul>
                                    <li><a href="{{ route('property.detail') }}">Properties Details</a></li>
                                    <li><a href="{{ route('blog') }}">Blog</a></li>
                                    <li><a href="{{ route('blog.detail') }}">Blog Details</a></li>
                                    <li><a href="11-Register.html">Register</a></li>
                                    <li><a href="12-404.html">404</a></li>
                                    <li><a href="{{ route('contact') }}">Contact us</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <img class="absu" src="images/nav-image.png" alt="">
                            </div>
                        </div>
                    </div>
                </li>
            </ul>


            <!--======= SUBMIT COUPON =========-->
            <div class="sub-nav-co"> <a href="#."><i class="fa fa-search"></i></a> </div>
        </nav>
    </div>
</header>
