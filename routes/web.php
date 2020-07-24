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


Route::get('/', 'HomeController@index');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::POST('/login', 'Auth\LoginController@login');


Route::middleware(['auth'])->group(function() {
    
});

Route::middleware(['admin', 'auth'])->group(function() {

    //顯示管理者畫面
    Route::get('/manage_food', function () {
        $location = \App\restaurant::select('location')->groupBy('location')->get();
        $restaurant = \App\restaurant::all();
        $category = \App\category::all();
        return view('admin/food/main', ['location' => $location,'restaurant' => $restaurant,'category' => $category]);
    })->name('manage_food');

    Route::get('/manage_food/restaurant', function () {
        $location = \App\restaurant::select('location')->groupBy('location')->get();
        return view('admin/restaurant/main',['location' => $location]);
    })->name('manage_food/restaurant');

    Route::get('/manage_food/category', function () {
        return view('admin/category/main');
    })->name('manage_food/category');

    Route::get('/manage_food/user', function () {
        return view('admin/user/main');
    })->name('manage_food/user');

    Route::POST('/logout', 'Auth\LoginController@logout')->name('logout');

    //API
    //exercise
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
