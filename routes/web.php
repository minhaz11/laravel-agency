<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/register', function(){
    abort(404);
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', 'AdminController@index')->name('home');
    
    //General Setting
    Route::get('/site-setting', 'SettingController@index')->name('setting');
    Route::post('/site-setting', 'SettingController@update');

    //manage section
    Route::get('/manage-section/{key}', 'ManageSectionController@index')->name('manage.section');
    Route::post('/update-section', 'ManageSectionController@update')->name('update.section');

    Route::post('/store-services', 'ManageSectionController@serviceElements')->name('store.services');
    Route::get('/remove-services/{id}', 'ManageSectionController@removeServiceElements')->name('remove.services');
    Route::post('/store-about', 'ManageSectionController@aboutElements')->name('store.about');
    Route::get('/remove-about/{id}', 'ManageSectionController@removeAboutElements')->name('remove.about');

    Route::post('/store-clients', 'ManageSectionController@clientElements')->name('store.clients');
    Route::get('/remove-clients/{id}', 'ManageSectionController@removeClientElements')->name('remove.clients');
});


//frontend
Route::get('/', 'HomeController@index')->name('home');

