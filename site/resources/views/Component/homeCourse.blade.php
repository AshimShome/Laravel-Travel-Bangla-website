
<div class="popular_destination_area">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-6">
<div class="section_title text-center mb_70">
<h1>Popular Destination</h1>
<p>Suffered alteration in some form, by injected humour or good day randomised booth anim 8-bit hella wolf moon beard words.</p>
</div>
</div>
</div>

<div class="row">

@foreach($courseData as $courseData)

<div class="col-lg-4 col-md-6">
<div class="single_destination">


<div class="thumb">
<img src="{{$courseData->course_img}}" class='imgOnRow' alt="">
</div>

<div class="content">
<p class="d-flex align-items-center">{{$courseData->course_name}} <a href="travel_destination.html"> {{$courseData->course_totalclass}}</a> </p>
</div>

</div>
</div>

@endforeach


</div>

</div>
</div>



