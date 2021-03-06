<div class="popular_places_area">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-6">
<div class="section_title text-center mb_70">
<h3>Popular Places</h3>
<p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit hella wolf moon beard words.</p>
</div>
</div>
</div>
<div class="row">
@foreach($popularPlaceData as $popularPlaceData)

<div class="col-lg-4 col-md-6  ">
<div class="single_place">
<div class="thumb imgOnRow">
<img src="{{$popularPlaceData->image_link}}"  class="imgOnRow" alt="">
<a href="#" class="prise">{{$popularPlaceData->offer_price}}</a>
</div>
<div class="place_info">
<a href="destination_details.html"><h3>{{$popularPlaceData->place_name}}</h3></a>
<p>{{$popularPlaceData->place_desc}}</p>
<div class="rating_days d-flex justify-content-between">
<span class="d-flex justify-content-center align-items-center">
<i class="fa fa-star"></i> 
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<a href="#">{{$popularPlaceData->review}}</a>
</span> 
<div class="days">
<i class="fa fa-clock-o"></i>
<a href="#">{{$popularPlaceData->Days}}</a>
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
