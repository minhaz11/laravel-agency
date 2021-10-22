<?php

use App\Models\SiteSetting;
use Intervention\Image\Facades\Image;


function activeLink($routeName)
{
    if (is_array($routeName)) {
            foreach ($routeName as $key => $value) {
                if (request()->routeIs($value)) {
                    return 'active';
                }
            }
    }

    if (request()->routeIs($routeName)) {
        return 'active';
    }
}

function subMenu($url)
{
   // dd($url,request()->is($url));
    if(request()->is($url)){
        return 'active';
    }
}

function setting()
{
    return SiteSetting::first();
}

function logo()
{
    $setting = SiteSetting::first();
    return [
        'logo'=> asset('public/assets/images/logo/'.$setting->logo),
        'logo_dark'=> asset('public/assets/images/logo/'.$setting->logo_dark),
        'fav'=>asset('public/assets/images/logo/'.$setting->favicon),
      ];
}

//moveable
function uploadImage($file, $location, $size = null, $old = null, $thumb = null)
{
    $path = makeDirectory($location);
    if (!$path) throw new Exception('File could not been created.');

    if ($old) {
        removeFile($location . '/' . $old);
        removeFile($location . '/thumb_' . $old);
    }
    $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
    $image = Image::make($file);
    if ($size) {
        $size = explode('x', strtolower($size));
        $image->resize($size[0], $size[1]);
    }
    $image->save($location . '/' . $filename);

    if ($thumb) {
        $thumb = explode('x', $thumb);
        Image::make($file)->resize($thumb[0], $thumb[1])->save($location . '/thumb_' . $filename);
    }

    return $filename;
}

function uploadFile($file, $location, $size = null, $old = null){
    $path = makeDirectory($location);
    if (!$path) throw new Exception('File could not been created.');

    if ($old) {
        removeFile($location . '/' . $old);
    }

    $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
    $file->move($location,$filename);
    return $filename;
}


function makeDirectory($path)
{
    if (file_exists($path)) return true;
    return mkdir($path, 0755, true);
}


function removeFile($path)
{
    return file_exists($path) && is_file($path) ? @unlink($path) : false;
}
