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
    $restaurantName = \App\restaurant::select('location')->groupBy('location')->get();
    return view('admin/food/main', ['restaurantName' => $restaurantName]);
});



//exercise
Route::get('/qqq',function(){
    return view('qqq');
});

Route::post('/exercise/create','exerciseController@create');
Route::get('/food','Admin\FoodController@showAll');
Route::put('/food/{fdId}', 'Admin\FoodController@update');
Route::patch('food/{fdId}', 'Admin\FoodController@updatee');
Route::put('food/{fdId}/restore', 'Admin\FoodController@restore');
Route::delete('/food/{fdId}', 'Admin\FoodController@delete');

Route::get('/restaurant', 'Admin\RestaurantController@show');

Route::get('/category', 'Admin\CategoryController@show');

Route::get('/api/admin/location','API\Admin\admin_food@getRestaurantlocation');
Route::get('/api/admin/restaurant','API\Admin\admin_food@restaurant');
Route::get('/api/admin/category', 'API\Admin\admin_food@getAllCategory');