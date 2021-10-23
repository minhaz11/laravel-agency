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
    Route::get('/logo-setting', 'SettingController@logo')->name('logo');
    Route::post('/logo-setting', 'SettingController@logoUpdate');

    //manage section
    Route::get('/manage-section/{key}', 'ManageSectionController@index')->name('manage.section');
    Route::post('/update-section', 'ManageSectionController@update')->name('update.section');

    Route::post('/store-services', 'ManageSectionController@serviceElements')->name('store.services');
    Route::get('/remove-services/{id}', 'ManageSectionController@removeServiceElements')->name('remove.services');
    Route::post('/store-about', 'ManageSectionController@aboutElements')->name('store.about');
    Route::get('/remove-about/{id}', 'ManageSectionController@removeAboutElements')->name('remove.about');

    Route::post('/store-clients', 'ManageSectionController@clientElements')->name('store.clients');
    Route::get('/remove-clients/{id}', 'ManageSectionController@removeClientElements')->name('remove.clients');

    Route::get('/remove-how/{id}', 'ManageSectionController@removeHow')->name('remove.how');
    Route::get('/remove-partner/{file}', 'ManageSectionController@removePartner')->name('remove.partner');

    //manage Category
    Route::get('/manage-categories', 'CategoryController@index')->name('manage.categories');
    Route::post('/store-category', 'CategoryController@store')->name('store.category');
    Route::post('/update-category', 'CategoryController@update')->name('update.category');

    //manage project
    Route::get('/manage-projects', 'ProjectController@projects')->name('manage.projects');
    Route::get('/create-project', 'ProjectController@create')->name('project.create');
    Route::post('/store-project', 'ProjectController@store')->name('project.store');
    Route::get('/edit-project/{id}', 'ProjectController@edit')->name('project.edit');
    Route::post('/update-project', 'ProjectController@update')->name('project.update');
    Route::post('project-remove/{id}', 'ProjectController@remove')->name('project.remove');
    
});


//frontend
Route::get('/', 'HomeController@index')->name('home');

