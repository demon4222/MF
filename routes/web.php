<?php

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
// DB::listen(function($query) {
//     var_dump($query->sql, $query->bindings,$query->time);
// });
// DB::listen(function($query) {
//     var_dump($query->time);
// });
Route::get('/', function () {
	$head_slides = DB::table('head_sliders')->get();
	
    return view('home',['head_slides' => $head_slides]);
});
Route::get('/item', function () {
    return view('layouts.item');
});
/*ADMIN*/
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/admin/head-slider','HeadSliderController@index');
Route::get('/admin/head-slider/edit/{slide_id}','HeadSliderController@show');
Route::get('/admin/head-slider/add','HeadSliderController@add');
Route::post('/admin/head-slider/add','HeadSliderController@addRequest');
Route::post('/admin/head-slider/{slide_id}/change-button','HeadSliderController@changeButton');
Route::post('/admin/head-slider/{slide_id}/change-text','HeadSliderController@changeText');
Route::post('/admin/head-slider/{slide_id}/change-photo','HeadSliderController@changePhoto');
Route::post('/admin/head-slider/{slide_id}/delete','HeadSliderController@delete');
Route::get('/admin/all-products','BouquetController@indexAdmin');
Route::get('/admin/add-bouquet','BouquetController@add');
Route::post('/admin/add-bouquet/ajax-subtypes','BouquetsSubTypeController@getSubTypes');
Route::post('/admin/add-bouquet','BouquetController@addRequest');
Route::get('/admin/edit-bouquet/{bouquet_id}', 'BouquetController@edit');
/*ENDADMIN*/
