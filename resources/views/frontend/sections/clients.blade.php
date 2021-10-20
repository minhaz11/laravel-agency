<section class="clients-section position-relative overflow-hidden pt-60 pb-60">
    <div class="shapes-grp">
        <img src="{{asset('public')}}/assets/frontend/images/about/bubble3.png" alt="about" class="img3">
        <img src="{{asset('public')}}/assets/frontend/images/about/bubble1.png" alt="about" class="img1">
        <img src="{{asset('public')}}/assets/frontend/images/about/bubble2.png" alt="about" class="img2">
    </div>
    <div class="container">
        <div class="row justify-content-between align-items-end flex-row-reverse">
            <div class="col-lg-5">
                <div class="section-title wow fadeInUp text-lg-end" data-wow-delay=".3s">
                    <span class="cate">{{$client->title}}</span>
                    <h2 class="title">{{$client->heading}}</h2>
                    <p>
                        {{$client->sub_heading}}
                    </p>
                </div>
            </div>
        </div>
        <div class="m--12">
            <div class="client__slider owl-carousel owl-theme">
                @foreach ($client->elements as $item)
                <div class="client__item">
                    <div class="client__item-content">
                        <p>
                            {{$item->quote}}
                        </p>
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="author">
                                <h6 class="title">{{$item->author}}</h6>
                                <span class="info">{{$item->designation}}</span>
                            </div>
                            <div class="ratings">
                                <span>
                                    <i class="las la-star"></i>
                                </span>
                                <span>
                                    <i class="las la-star"></i>
                                </span>
                                <span>
                                    <i class="las la-star"></i>
                                </span>
                                <span>
                                    <i class="las la-star"></i>
                                </span>
                                <span>
                                    <i class="las la-star"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="client__item-thumb">
                        <img src="{{asset('public/sections/clients/'.$item->image)}}" alt="clients">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>