
@extends('Layout.app')
@section('title')
Popular Destination
@endsection

@section('content')
@include('Component.PopularDestinationTopBaner')
@include('Component.allPopularDestination')


@endsection