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

    public function update(Request $request)
    {
        $request->validate(
          [
            'sitename' => 'required',
          ]  
        );

        $setting = SiteSetting::first();
        $setting->sitename = $request->sitename;
        $setting->update();
        return back();
    }
}
