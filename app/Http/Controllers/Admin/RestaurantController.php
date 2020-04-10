<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/4/10
 * Time: 下午 3:49
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\restaurant;

class RestaurantController extends Controller
{
    /** 抓出所有餐廳的資料
     * @return \Illuminate\Http\JsonResponse
     */
    public function show()
    {
        $response = restaurant::all();
        return response()->json($response, 200);
    }
}