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
    private $response = array(
        'code' => 0,
        'message' => '',
        'data' => array() ,
    );

    /** 抓出所有餐廳的資料
     * @return \Illuminate\Http\JsonResponse
     */
    public function show()
    {
        $response = restaurant::all();
        return response()->json($response, 200);
    }
    public function groupByLocation()
    {

        $location = restaurant::select('location')->groupBy('location')->get();

        foreach ($location as $i) {
            $object = new \stdClass();
            $object->location = $i['location'];

            $restaurant = restaurant::select('rsId','rsName')->where('location',$i['location'])->get();
            $object->restaurant = $restaurant;
            array_push($this->response['data'],$object);

        }

        $this->response['code'] = 1;
        $this->response['message'] = "success";

        return json_encode($this->response);
    }
}