<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;

use App\food;
use App\restaurant;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use phpDocumentor\Reflection\Types\Object_;

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
//location: "one ":
    }
    public function getRestaurantNameByLocation(Request $request){


        $postJsonData = $request->getContent();

        $location = $request->input('location');
        $restaurant = restaurant::select('rsId','rsName')->where('location',$location)->get();
        $this->response['code'] = 1;
        $this->response['message'] = "success";
        $this->response['data'] = $restaurant;
        return response()->json(json_encode($this->response));
    }
    public function restaurant(){
        $location = restaurant::select('location')->groupBy('location')->get();

        foreach($location as $i){
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