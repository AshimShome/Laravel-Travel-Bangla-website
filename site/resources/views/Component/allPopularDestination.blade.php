
<div class="popular_destination_area mt-0">
<div class="container ">

<div class="row ">

@foreach($popularDestinationData as $popularDestinationData)

<div class="col-lg-4 col-md-6">
<div class="single_destination">


<div class="thumb">
<img src="{{$popularDestinationData->popularDestination_img}}" class='imgOnRow' alt="">
</div>

<div class="content">
<p class="d-flex align-items-center">{{$popularDestinationData->popularDestination_name}} <a href="travel_destination.html"> {{$popularDestinationData->popularDestination_place}}</a> </p>
</div>

</div>
</div>

@endforeach


</div>

</div>
</div>



