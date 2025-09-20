<?php
$settings = \App\Models\Setting::first();
$email = $settings ? $settings->email : 'info@findmyHomez.com';
$phone = $settings ? $settings->phone : '+01 123 456 78';
$facebook = $settings->facebook ?? "#.";
$twitter = $settings->twitter ?? "#.";
$linkedin = $settings->linkedin ?? "#.";
$instagram = $settings->instagram ?? "#.";
?>
<!--======= TOP BAR =========-->
<div class="top-bar">
    <div class="container">
        <ul class="left-bar-side">
            <li>
                <p><i class="fa fa-phone"></i> Call Us Now : {{ $phone }} </p>
                <span>|</span>
            </li>
            <li>
                <p><i class="fa fa-envelope-o"></i> {{ $email }} </p>
                <span>|</span>
            </li>
            {{-- <li>
                <p><i class="fa fa-lock"></i> Login / Register </p>
                <span>|</span>
            </li> --}}
        </ul>
        <ul class="right-bar-side social_icons">
            <li class="facebook"> <a href="{{ $facebook }}"><i class="fa fa-facebook"></i> </a></li>
            <li class="twitter"> <a href="{{ $twitter }}"><i class="fa fa-twitter"></i> </a></li>
            <li class="linkedin"> <a href="{{ $linkedin }}"><i class="fa fa-linkedin"></i> </a></li>
            <li class="instagram"> <a href="{{ $instagram }}"><i class="fa fa-instagram"></i> </a></li>
        </ul>
    </div>
</div>
