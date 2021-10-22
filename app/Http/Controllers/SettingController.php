<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.settings');
    }
    public function logo()
    {
        return view('admin.settings.logo');
    }

    public function update(Request $request)
    {
        $request->validate(
          [
            'sitename' => 'required'
           
          ]  
        );

        $setting = SiteSetting::first();
        $setting->sitename = $request->sitename;
       
        $setting->update();
        return back();
    }
    public function logoUpdate(Request $request)
    {
        $request->validate(
          [
            'logo'  => 'image|mimes:png',
            'favicon'  => 'image|mimes:png'
          ]  
        );

        $setting = SiteSetting::first();
        if($request->logo){
            $path = "public/assets/images/logo/";
            $old = $setting->logo ?? null;
            $setting->logo = uploadImage($request->logo,$path,'188x41', $old);
        }
        if($request->logo_dark){
            $path = "public/assets/images/logo/";
            $old = $setting->logo_dark ?? null;
            $setting->logo_dark = uploadImage($request->logo_dark,$path,'188x41', $old);
        }
        if($request->favicon){
            $path = "public/assets/images/logo/";
            $old = $setting->favicon ?? null;
            $setting->favicon = uploadImage($request->favicon,$path,'40x40', $old);
        }
        $setting->save();
        return back()->with('success','Logo and Favicon updated');
    }
}
