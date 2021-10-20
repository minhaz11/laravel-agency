
<section class="banner-section">
    <video autoplay muted loop id="myVideo">
        <source src="{{asset('public/sections/banner/'.$banner->bg_video)}}" type="video/mp4">
    </video>
    <div class="container">
        <div class="banner-content">
            <h1 class="banner-title text-white wow rotateInDownLeft" data-wow-duration="1s">{{$banner->heading}}</h1>
            <p class="banner-txt wow fadeIn" data-wow-delay="1.2s">
                {{$banner->sub_heading}}
            </p>
            <div class="btn__grp wow rotateInDownRight" data-wow-duration="1s">
                <a href="{{url($banner->button_1_link)}}" class="cmn--btn">{{$banner->button_1_name}}</a>
                <a href="{{url($banner->button_2_link)}}" class="cmn--btn">{{$banner->button_2_name}}</a>
            </div>
        </div>
    </div>
</section>