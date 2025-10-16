<?php
$settings = \App\Models\Setting::first();
$header = \App\Models\Navigation::orderBy('order')->get();

$footerlinkheader = \App\Models\Navigation::whereNull('parent_id')
                                ->orderBy('order')
                                ->limit(5)
                                ->get();

$footer = \App\Models\FooterSetting::first();
$site_title = $settings ? $settings->site_name : 'CMS';
$site_description = $settings ? $settings->site_description : 'CMS';
$site_keywords = $settings ? $settings->site_keywords : 'HTML5,CSS3,HTML,Template,Multi-Purpose,Mr_Bhuvi,Corporate FindMyHomeZ | Real Estate';
$site_author = $settings ? $settings->site_author : 'Mr_Bhuvi';
$favicon = isset($settings->favicon) ? asset('storage/' . $settings->favicon) : asset('build/images/favicon.ico');
$logo = isset($settings->logo) ? asset('storage/' . $settings->logo) : asset('build/images/logo-dark.png');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS</title>
    <meta name="keywords"
        content="{{ $site_keywords }}">
    <meta name="description" content="{{ $site_description }}">
    <meta name="author" content="{{ $site_author }}">

    <!-- FONTS ONLINE -->
    <link
        href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <link rel="shortcut icon" href="{{ $favicon }}">

    <!--MAIN STYLE-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
    <div id="wrap" class="home-1">


       @include('layouts.header', compact('header'))

        @yield('content')

        @include('layouts.footer', compact('footerlinkheader','footer'))

     
    </div>
    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.js') }}"></script>
    <script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/own-menu.js') }}"></script>
    <script src="{{ asset('js/jquery.nouislider.min.js') }}"></script>
    <script src="{{ asset('js/google-map-home.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript">

        $("#price-range").noUiSlider({
            range: {
                'min': [0],
                'max': [10000000]
            },
            start: [0, 10000000],
            connect: true,
            serialization: {
                lower: [
                    $.Link({
                        target: $("#price-min")
                    })
                ],
                upper: [
                    $.Link({
                        target: $("#price-max")
                    })
                ],
                format: {
                    // Set formatting
                    decimals: 0,
                    prefix: '$'
                }
            }
        });
    </script>
</body>

</html>
