@extends('layouts.app-neomorph')

@section('content')
    <!-- Hero Slider -->
    @include('home.slider-neomorph')
    
    <!-- Преимущества -->
    @include('parts.advantages-neomorph')
    
    <!-- Каталог -->
    @include('home.catalog-neomorph')
    
    <!-- Товары -->
    @include('parts.products-main-neomorph')
    
    <!-- Новости -->
    @include('home.about-news-neomorph')
@endsection
