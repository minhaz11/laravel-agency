<div class="partner-section pb-80 wow fadeInUp" data-wow-delay=".3s">
    <div class="container">
        <h6 class="text-center mb-4 pb-md-3 heading--fonts text--title">
            {{$partner->title}}
        </h6>
        <div class="partner-slider owl-theme owl-carousel">
            @foreach ($partner->logo as $item)
            <div class="partner-thumb">
                <img src="{{asset('public/sections/partners/'.$item)}}" alt="partner">
            </div>
                
            @endforeach
           
        </div>
    </div>
</div>