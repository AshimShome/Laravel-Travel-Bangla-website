

<div class="container section-marginTop text-center">
    <h1 class="">Our Services </h1>
    <div class="row mt-5">
        @foreach($serviceData as $itemData)
    

        <div class="col-lg-4 col-md-6">
<div class="single_travel text-center">
<div class="icon">
<img src="{{$itemData->service_img}}" alt="">
</div>
<h3>{{$itemData->service_name}}</h3>
<p>{{$itemData->service_des}}</p>
</div>
</div>
        @endforeach

    </div>
</div>


