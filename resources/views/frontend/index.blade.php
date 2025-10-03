@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">


    @include('frontend.banner')
    @include('frontend.about')
    @include('frontend.services')

    @include('frontend.contact')
    @include('frontend.faq')
@endsection
