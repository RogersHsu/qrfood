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

Route::get('/', function () {
    return view('backend/main');

});

//exercise
Route::get('/qqq',function(){
    return view('qqq');
});
Route::post('/exercise/create','exerciseController@create');
Route::get('/food','Admin\FoodController@showAll');
Route::put('/food','Admin\FoodController@update');
Route::delete('/food','Admin\FoodController@delete');

Route::get('/api/admin/location','API\Admin\admin_food@getRestaurantlocation');
Route::post('/api/admin/restaurant','API\Admin\admin_food@getRestaurantNameByLocation');
Route::get('/api/admin/restaurant','API\Admin\admin_food@restaurant');