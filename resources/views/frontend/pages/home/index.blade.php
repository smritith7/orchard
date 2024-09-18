@extends('frontend.layouts.main')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <section id="top">
        @include('frontend.pages.home.components.banner')
    </section>

    <!-- ***** About Area Starts ***** -->
    <section id="about">
        @include('frontend.pages.home.components.about')

    </section>

    <!-- ***** Menu Area Starts ***** -->
    <section id="menu">
        @include('frontend.pages.home.components.food-menu')
    </section>

    <!-- ***** Chefs Area Starts ***** -->
    <section id="chefs">
        @include('frontend.pages.home.components.chefs')
    </section>

    <!-- ***** Reservation Us Area Starts ***** -->
    <section id="reservation area">
        @include('frontend.pages.home.components.reservation')
    </section>


    <!-- ***** offers Area Starts ***** -->
    <section id="offers">
        @include('frontend.pages.home.components.offers')
    </section>
@endsection
