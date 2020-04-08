<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;

use App\food;
use App\restaurant;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use phpDocumentor\Reflection\Types\Object_;

/**
 * 負責處理食物資料表
 * Class admin_food
 * @package App\Http\Controllers\API\Admin
 */
class admin_food extends Controller
{
    private $response = array(
      'code' => 0,
      'message' => '',
      'data' => array() ,
    );

    /**
     * 獲取所有食堂名稱
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRestaurantlocation()
    {
        $this->response['code'] = 1;
        $this->response['message'] = "success";
        $location = restaurant::select('location')->groupBy('location')->get();

        $this->response['data'] = $location;
        return response()->json($this->response);
    }

    /**
     * 獲取食堂底下的所有餐廳ID跟名稱
     * @param Request $request 食堂名稱
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRestaurantNameByLocation(Request $request)
    {


        $postJsonData = $request->getContent();

        $location = $request->input('location');
        $restaurant = restaurant::select('rsId','rsName')->where('location',$location)->get();
        $this->response['code'] = 1;
        $this->response['message'] = "success";
        $this->response['data'] = $restaurant;
        return response()->json(json_encode($this->response));
    }

    /**
     *
     * @return false|string
     */
    public function restaurant()
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

    public function getAllCategory()
    {

        $category = category::select('cId', 'cName')->get();

        $this->response['code'] = 1;
        $this->response['message'] = "success";
        $this->response['data'] = $category;

        return response()->json($this->response);
    }

}