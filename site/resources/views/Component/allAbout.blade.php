
    <div class="container mt-5">
        <div class="row">
           
            <div class="col-md-6">
            <h3>Our Story</h3> 
            <p>Consulting represents success at realizing the company is going in the wrong direction. The only time the company fails is when it is not possible to do a turnaround anymore. We help companies pivot into more profitable directions where they can expand and grow. It is inevitable that companies will end up making a few mistakes; we help them correct these mistakes.</p>
<p>Consulting represents success at realizing the company is going in the wrong direction. The only time the company fails is when it is not possible to do a turnaround anymore. We help companies pivot into more profitable directions where they can expand and grow. It is inevitable that companies will end up making a few mistakes; we help them correct these mistakes.</p>
            </div>

            <div class="col-md-6">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d164776.17085878825!2d90.16175965302628!3d24.1340614101658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755fdb28eec55c5%3A0x1117679d80957ff!2z4Kau4Ka_4Kaw4KeN4Kac4Ka-4Kaq4KeB4Kaw!5e0!3m2!1sbn!2sbd!4v1615312597390!5m2!1sbn!2sbd" width="550" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>></iframe>
            </div>
        </div>
    </div>


<!-- Service side -->
<div class="container section-marginTop text-center">
    <h1 class="">Our Services </h1>
    <div class="row mt-5">
        @foreach($servesData as $servesData)
    

        <div class="col-lg-4 col-md-6">
<div class="single_travel text-center">
<div class="icon">
<img src="{{$servesData->service_img}}" alt="">
</div>
<h3>{{$servesData->service_name}}</h3>
<p>{{$servesData->service_des}}</p>
</div>
</div>
        @endforeach

    </div>
</div>

<!-- Rewiew side -->


<div class="container section-marginTop text-center">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 text-center">
            <div id="two" class="owl-carousel mb-4 owl-theme">
                @foreach($ReviewData as $ReviewData)

                <div class="item m-1 text-center ">
                    <img class="review-img text-center" src="{{$ReviewData->img}}" alt="Card image cap">
                    <h5 class="service-card-title mt-3">{{$ReviewData->name}} </h5>
                    <h6 class="service-card-subTitle p-0 m-0">{{$ReviewData->des}}</h6>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
