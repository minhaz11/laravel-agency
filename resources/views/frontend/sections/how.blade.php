@if ($how->count() > 0)
<section class="how-section pt-60 pb-120 position-relative overflow-hidden">
    <div class="shapes-grp-2">
        <img src="{{asset('public')}}/assets/frontend/images/about/bubble4.png" alt="how" class="img3">
        <img src="{{asset('public')}}/assets/frontend/images/about/bubble1.png" alt="how" class="img1">
        <img src="{{asset('public')}}/assets/frontend/images/about/bubble2.png" alt="how" class="img2">
    </div>
  
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="appdevs-tabs-btn">
                    <ul class="nav flex-column nav-tabs">
                        @foreach ($how as $key =>  $step)
                        <li class="nav-item">
                            <a href="#id-{{$key}}" class="nav-link {{$loop->first ? 'active':''}}" data-bs-toggle="tab"><i class="las la-file-invoice"></i>{{$step->step}}</a>
                        </li>  
                        @endforeach
                    </ul>
                </div>  
            </div>
            <div class="col-lg-9">
                <div class="tab-content">
                    @foreach ($how as $key =>  $item)
                    <div class="tab-pane {{$loop->first ? 'active':''}}" id="id-{{$key}}">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="appdevs-thumb text-center">
                                    <img src="{{asset('public/sections/how/'.$item->image)}}" alt="how">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="appdevs-content">
                                    <div class="section-title mb-4">
                                        <span class="cate">{{$item->title}}</span>
                                        <h2 class="title">{{$item->heading}}</h2>
                                        <p>
                                            {{$item->short_details}}
                                        </p>
                                    </div>
                                    <a href="{{url($item->button_link)}}" class="cmn--btn btn">{{$item->button_text}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach             
                </div>
            </div>
        </div>
    </div>
</section>  
@endif