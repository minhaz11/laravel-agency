
@extends('layouts.frontend')

@section('title')
    Home
@endsection

@section('content')
    <!-- Banner Starts Here -->
    @include('frontend.sections.banner')
    <!-- Banner Ends Here -->


    <!-- About Starts Here -->
    @include('frontend.sections.about')
    <!-- About Ends Here -->


    <!-- Service Starts Here -->
    @include('frontend.sections.services')
    <!-- Service Ends Here -->


    <!-- Clients Say Starts Here -->
    @include('frontend.sections.clients')
    <!-- Clients Say Ends Here -->

    
    <!-- How Section Starts Here -->
    @include('frontend.sections.how')
    <!-- How Section Ends Here -->


    <!-- Partners Starts Here -->
    @include('frontend.sections.partners')
    <!-- Partners Ends Here -->


    <!-- CTAs Starts Here -->
    @include('frontend.sections.cta')
    <!-- CTAs Starts Here -->
    
@endsection
