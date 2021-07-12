@extends('Layout.app')
@section('title')
    Home
@endsection

@section('content')
    @include('Component.homeBaner')

    @include('Component.homePopularDestination')

    @include('Component.subscribe')

    @include('Component.homePopularPlace')


    @include('Component.video')
    @include('Component.homeService')



    @include('Component.homeContact')
    @include('Component.homeReview')


@endsection
