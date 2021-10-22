<section class="about-section position-relative overflow-hidden pt-120 pb-120">
    <div class="shapes-grp">
        <img src="{{asset('public')}}/assets/frontend/images/about/bubble1.png" alt="about" class="img1">
        <img src="{{asset('public')}}/assets/frontend/images/about/bubble2.png" alt="about" class="img2">
        <img src="{{asset('public')}}/assets/frontend/images/about/bubble3.png" alt="about" class="img3">
    </div>
    <div class="container">
        <div class="row gy-5 justify-content-between align-items-center">
            <div class="col-lg-6 col-xl-5">
                <div class="row align-items-center g-2 g-sm-3">
                    <div class="col-5">
                        <img src="{{asset('public/sections/about/'.$about->image_1)}}" class="skew-effects wow fadeInUp" alt="about">
                    </div>
                    <div class="col-7">
                        <div class="row g-2 g-sm-3">
                            <div class="col-12">
                                <img src="{{asset('public/sections/about/'.$about->image_2)}}" class="skew-effects wow fadeInUp" alt="about">
                            </div>
                            <div class="col-12">
                                <img src="{{asset('public/sections/about/'.$about->image_3)}}" class="skew-effects wow fadeInUp" alt="about">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-7 col-xxl-6">
                <div class="about-content">
                    <div class="section-title wow fadeInUp">
                        <span class="cate">{{$about->title}}</span>
                        <h2 class="title">{{$about->heading}}</h2>
                        <p>
                            {{$about->short_details}}
                        </p>
                    </div>
                    <ul class="f-boxes">
                        @foreach ($about->elements as $item)
                        <li>
                            <div class="item wow fadeInUp">
                                <div class="icon">
                                    {!! $item->icon !!}
                                </div>
                                <h6 class="subtitle">{{$item->title}}</h6>
                            </div>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>