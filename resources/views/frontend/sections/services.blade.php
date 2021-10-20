<section class="service-section position-relative overflow-hidden pt-120 pb-60">
    <div class="shapes-grp-2">
        <img src="{{asset('public')}}/assets/frontend/images/about/bubble4.png" alt="about" class="img3">
        <img src="{{asset('public')}}/assets/frontend/images/about/bubble1.png" alt="about" class="img1">
        <img src="{{asset('public')}}/assets/frontend/images/about/bubble2.png" alt="about" class="img2">
    </div>
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-5">
                <div class="section-title wow fadeInUp" data-wow-delay=".3s">
                    <span class="cate">{{$service->title}}</span>
                    <h2 class="title">{{$service->heading}}</h2>
                    <p>
                        {{$service->sub_heading}}
                    </p>
                </div>
            </div>
        </div>
    
        <div class="row g-4">
            @foreach ($service->elements as $item)
            <div class="col-lg-4 col-md-6 sol-sm-10">
                <div class="service__item wow fadeInUp">
                    <div class="service__item-icon">
                        <img src="{{asset('public/sections/services/'.$item->icon_image)}}" alt="service">
                    </div>
                    <div class="service__item-cont">
                        <h4 class="service__item-title"><a href="#0">{{$item->title}}</a></h4>
                        <p>
                            {{$item->short_details}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</section>