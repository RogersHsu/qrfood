<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth.jwt')->group(function() {
    Route::get('/posts','Admin\PostController@show');
    Route::POST('/post','Admin\PostController@create');
    Route::GET('/posts/{pId}','Admin\PostController@getSpecPost');
    Route::GET('user/posts','Admin\PostController@getUserPosts');
});

Route::POST('/login','Admin\UserController@login');
Route::GET('/validJWT','Admin\UserController@validJWT');
//Route::get('/test','Admin\UserController@test');

Route::middleware('auth.jwt')->group(function(){
});
Route::middleware(['admin', 'auth'])->group(function() {
    Route::get('/food','Admin\FoodController@showAll'); //顯示所有食物
    Route::post('/food','Admin\FoodController@create');
    Route::post('/food/excel','Admin\FoodController@createExcel');
    Route::get('/food/{rsName}','Admin\FoodController@showPatch');

    Route::post('/food/{fdId}/photo', 'Admin\FoodController@editPhoto');
    Route::put('/food/{fdId}', 'Admin\FoodController@update');
    Route::patch('food/{fdId}', 'Admin\FoodController@updatee');
    Route::delete('/food/{fdId}', 'Admin\FoodController@delete');

    Route::put('food/{fdId}/restore', 'Admin\FoodController@restore');

    Route::get('/restaurant', 'Admin\RestaurantController@show');

    Route::get('/restaurant/groupByLocation', 'Admin\RestaurantController@groupByLocation');

    Route::get('/restaurant/{location}', 'Admin\RestaurantController@showPatch');

    Route::post('/restaurant', 'Admin\RestaurantController@create');

    Route::put('/restaurant/{rsId}', 'Admin\RestaurantController@update');


    Route::get('/category', 'Admin\CategoryController@show');
    Route::post('/category','Admin\CategoryController@create');
    Route::put('/category/{cId}', 'Admin\CategoryController@update');

    Route::get('/user', 'Admin\UserController@show');
    Route::post('/user','Admin\UserController@create');
    Route::put('/user/{uId}', 'Admin\UserController@update');
    Route::delete('/user/{uId}', 'Admin\UserController@delete');

});