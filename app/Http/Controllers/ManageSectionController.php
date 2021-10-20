<?php

namespace App\Http\Controllers;

use App\Models\CTA;
use App\Models\How;
use App\Models\About;
use App\Models\Banner;
use App\Models\Client;
use App\Models\Partner;
use App\Models\Section;
use App\Models\Service;
use App\Models\AboutElement;
use Illuminate\Http\Request;
use App\Models\ClientElement;
use App\Models\ServiceElement;

class ManageSectionController extends Controller
{
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
            $section = How::first();
        }
        if($key == 'cta'){
            $section = CTA::first();
        }
        if($key == 'pertners'){
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
            $section = How::first();
        }
        elseif($request->section == 'cta'){
            $section = CTA::first();
        }
        elseif($request->section == 'pertners'){
            $section = Partner::first();
        }
        else{
            return back()->with('error','Section not found');
        }
        return back()->with('success',$request->section.' section has been updated');
    }

    public function banner($request)
    {
        $datas = $request->except('_token');
        $rules = [];
        foreach ($datas as $key => $val) {
            if($key == 'bg_video'){
                $rules[$key] = 'mimes:mp4|max:20,480';
            }
            $rules[$key] = 'required';
        }
        $request->validate($rules);

        $section = Banner::firstOrNew();

        if($request->bg_video){
            $path = "public/sections/$request->section/";
            $old = @$section->bg_video ?? null;
            $section->bg_video = uploadFile($request->bg_video,$path,null, $old);
        }

        $section->heading     = $request->heading;
        $section->sub_heading = $request->sub_heading;
        $section->button_1_name = $request->button_1_name;
        $section->button_1_link = $request->button_1_link;
        $section->button_2_link = $request->button_2_link;
        $section->button_2_name = $request->button_2_name;
        $section->save();
    }

    public function about($request)
    {

        $datas = $request->except('_token');
        $rules = [];
        foreach ($datas as $key => $val) {
            if($key == 'image_1'){
                $rules[$key] = 'mimes:mp4|max:5080';
            }
            if($key == 'image_2'){
                $rules[$key] = 'mimes:mp4|max:5080';
            }
            if($key == 'image_3'){
                $rules[$key] = 'mimes:mp4|max:5080';
            }

            $rules[$key] = 'required';
        }
        $request->validate($rules);

        $section = About::first();

        if($request->image_1){
            $path = "public/sections/$request->section/";
            $old = @$section->image_1 ?? null;
            $section->image_1 = uploadImage($request->image_1,$path,'701x701', $old);
        }
        if($request->image_2){
            $path = "public/sections/$request->section/";
            $old = @$section->image_2 ?? null;
            $section->image_2 = uploadImage($request->image_2,$path,'701x395', $old);
        }
        if($request->image_3){
            $path = "public/sections/$request->section/";
            $old = @$section->image_3 ?? null;
            $section->image_3 = uploadImage($request->image_3,$path,'698x440', $old);
        }

        $section->title = $request->title;
        $section->heading = $request->heading;
        $section->short_details = $request->short_details;
        $section->save();

       
    }

    public function services($request)
    {
       
        $datas = $request->except('_token');
        $rules = [];
        foreach ($datas as $key => $val) {
            $rules[$key] = 'required';
        }
        $request->validate($rules);

        $section = Service::first();
        $section->title = $request->title;
        $section->heading = $request->heading;
        $section->sub_heading = $request->sub_heading;
        $section->save();

    }

    public function clients($request)
    {

        $datas = $request->except('_token');
        $rules = [];
        foreach ($datas as $key => $val) {
            $rules[$key] = 'required';
        }
        $request->validate($rules);

        $section = Client::first();

        $section->title = $request->title;
        $section->heading = $request->heading;
        $section->sub_heading = $request->sub_heading;
        $section->save();

       
    }

    //elements

    public function aboutElements(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'title' => 'required',
        ]);

        $element = AboutElement::firstOrNew(['id'=>$request->id]);
        $element->icon = $request->icon;
        $element->title = $request->title;
        $element->about_id = $request->about_id;
        $element->save();
        return back()->with('success','About element has been updated');
    }


    public function removeAboutElements($id)
    {
        $element = AboutElement::findOrFail($id);
        $element->delete();
        return back()->with('success','About element has been removed');
    }

    public function serviceElements(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_details' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $element = ServiceElement::firstOrNew(['id'=>$request->id]);
        $element->title = $request->title;
        $element->service_id = $request->service_id;
        $element->short_details = $request->short_details;
        if($request->image) {
            $path = "public/sections/services/";
            $old = @$element->image ?? null;
            $element->icon_image = uploadImage($request->image,$path,'95x90', $old);
        }

        $element->save();
        return back()->with('success','Services has been updated');
    }

    public function removeServiceElements($id)
    {
        $element = ServiceElement::findOrFail($id);
        $element->delete();
        return back()->with('success','Services has been removed');
    }

    public function clientElements(Request $request)
    {
        $request->validate([
            'author' => 'required',
            'designation' => 'required',
            'quote' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $element = ClientElement::firstOrNew(['id'=>$request->id]);
        $element->client_id = $request->client_id;
        $element->author = $request->author;
        $element->designation = $request->designation;
        $element->quote = $request->quote;
      
        if($request->image) {
            $path = "public/sections/clients/";
            $old = @$element->image ?? null;
            $element->image = uploadImage($request->image,$path,'446x446', $old);
        }

        $element->save();
        return back()->with('success','Clients has been updated');
    }

    public function removeClientElements($id)
    {
        $element = ClientElement::findOrFail($id);
        $element->delete();
        return back()->with('success','Services has been removed');
    }
}
