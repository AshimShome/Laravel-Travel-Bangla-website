<div class="popular_places_area">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-6">

</div>
</div>
<div class="row">
@foreach($popularPlacesData as $popularPlacesData)

<div class="col-lg-4 col-md-6">
<div class="single_place">
<div class="thumb imgOnRow">
<img src="{{$popularPlacesData->image_link}}"class="imgOnRow" alt="">
<a href="#" class="prise">{{$popularPlacesData->offer_price}}</a>
</div>
<div class="place_info">
<a href="destination_details.html"><h3>{{$popularPlacesData->place_name}}</h3></a>
<p>{{$popularPlacesData->place_desc}}</p>
<div class="rating_days d-flex justify-content-between">
<span class="d-flex justify-content-center align-items-center">
<i class="fa fa-star"></i> 
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<a href="#">{{$popularPlacesData->review}}</a>
</span>
<div class="days">
<i class="fa fa-clock-o"></i>
<a href="#">{{$popularPlacesData->Days}}</a>
</div>
</div>
</div>
</div>
</div>
@endforeach
</div>
<div class="row">
<div class="col-lg-12">
<div class="more_place_btn text-center">
<a class="boxed-btn4" href="#">More Places</a>
</div>
</div>
</div>
</div>
