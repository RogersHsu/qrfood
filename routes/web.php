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
    return view('admin/food/main');

});

//exercise
Route::get('/qqq',function(){
    return view('qqq');
});

Route::post('/exercise/create','exerciseController@create');
Route::get('/food','Admin\FoodController@showAll');
Route::put('/food','Admin\FoodController@update');
Route::delete('/food/{fdId}', 'Admin\FoodController@delete');

Route::get('/restaurant', 'Admin\RestaurantController@show');

Route::get('/api/admin/location','API\Admin\admin_food@getRestaurantlocation');
Route::get('/api/admin/restaurant','API\Admin\admin_food@restaurant');
Route::get('/api/admin/category', 'API\Admin\admin_food@getAllCategory');