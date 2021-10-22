<?php

namespace App\Http\Controllers;

use App\Models\CTA;
use App\Models\How;
use App\Models\About;
use App\Models\Banner;
use App\Models\Client;
use App\Models\Partner;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Traits\updateSection;

class ManageSectionController extends Controller
{
    use updateSection;

    public function index($key)
    {
        if($key == 'banner'){
            $section = Banner::first();
        }
        if($key == 'about'){
            $section = About::first();
        }
        if($key == 'services'){
            $section = Service::first();
        }
        if($key == 'clients'){
            $section = Client::first();
        }
        if($key == 'how'){
            $section = How::latest()->get();
        }
        if($key == 'cta'){
            $section = CTA::first();
        }
        if($key == 'partners'){
            $section = Partner::first();
        }
        return view('admin.sections.'.$key,compact('section'));
    }

    public function update(Request $request)
    {
        if($request->section == 'banner'){
            $this->banner($request);
        }
        elseif($request->section == 'about'){
            $this->about($request);
        }
        elseif($request->section == 'services'){
            $this->services($request);
        }
        elseif($request->section == 'clients'){
            $this->clients($request);
        }
        elseif($request->section == 'how'){
            $this->how($request);
        }
        elseif($request->section == 'cta'){
            $this->cta($request);
        }
        elseif($request->section == 'partners'){
            $this->partners($request);
        }
        else{
            return back()->with('error','Section not found');
        }
        return back()->with('success',ucfirst($request->section).' section has been updated');
    }

   
   
}
