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
Route::get('/', 'HomeController@index');
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
Route::get('/admin/bouquets/','BouquetController@indexAdmin');
Route::get('/admin/all-products', function(){
    return view('layouts.admin.admin-all-products');
});
Route::get('/admin/add-bouquet','BouquetController@add');
Route::post('/admin/add-bouquet/ajax-subtypes','BouquetsSubTypeController@getSubTypes');
Route::post('/admin/add-bouquet','BouquetController@addRequest');
Route::get('/admin/edit-bouquet/{bouquet_id}', 'BouquetController@edit');
Route::post('/admin/edit-bouquet/{bouquet_id}', 'BouquetController@editRequest');
Route::get('/admin/edit-bouquet/delete-size/{size_id}/{bouquet_id}', 'BouquetSizeController@deleteSize');
Route::get('/admin/all-bouquets/delete/{bouquet_id}', 'BouquetController@delete');

Route::get('/admin/flowers/','FlowerController@indexAdmin');
Route::get('/admin/flowers/add-flower', 'FlowerController@add');
Route::post('/admin/flowers/add-flower', 'FlowerController@addRequest');
Route::get('/admin/flowers/edit/{flower_id}', 'FlowerController@getForEdit');
Route::post('/admin/flowers/edit', 'FlowerController@editRequest');
Route::get('/admin/flowers/edit/{flower_id}/delete-height/{height_id}','FlowerHeightController@deleteHeight');

Route::get('/admin/hits-slider', 'HitsSliderController@indexAdmin');
Route::get('/admin/add-to-hits/{bouquet_id}', 'HitsSliderController@addBouquet');
Route::get('/admin/hits-slider/delete-slide/{slide_id}', 'HitsSliderController@deleteSlide');

Route::post('/admin/add-bouquet-of-the-day', 'BouquetOfTheDayController@addBouquetOfTheDay');
/*ENDADMIN*/
