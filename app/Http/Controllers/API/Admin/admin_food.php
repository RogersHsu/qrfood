<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;

use App\food;
use App\restaurant;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
class admin_food extends Controller
{
    private $response = array(
      'code' => 0,
      'message' => '',
      'data' => array() ,
    );

    public function getRestaurantlocation(){
        $this->response['code'] = 1;
        $this->response['message'] = "success";
        $location = restaurant::select('location')->groupBy('location')->get();

        $this->response['data'] = $location;
        return response()->json(json_encode($this->response));

    }
    public function getRestaurantNameByLocation(Request $request){
        //$postJsonData = $request->getContent();
        $location = $request->input('location');
        $restaurant = restaurant::select('rsId','rsName')->where('location',$location)->get();
        return $restaurant;
    }
}