<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Client;
use App\Models\How;
use App\Models\Partner;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['banner'] = Banner::first();
        $data['about'] = About::first();
        $data['service'] = Service::first();
        $data['client'] = Client::first();
        $data['how'] = How::get();
        $data['partner'] = Partner::first();
        return view('frontend.home',$data);
    }
}
