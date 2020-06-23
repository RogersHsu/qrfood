<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/4/10
 * Time: 下午 3:49
 */

namespace App\Http\Controllers\Admin;

use App\category;
use App\food;
use App\Http\Controllers\Controller;
use App\restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class RestaurantController extends Controller
{
    private $response = array(
        'code' => 0,
        'message' => '',
        'data' => array() ,
    );
    public function create(Request $request){

        $input = $request->all();
//        //檢查input是否合
        $validator = Validator::make($request->all(), [
            'rsName' => 'required',
            'location' => 'required',
        ]);

        if ($validator->passes()) {
            $restaurant = new Restaurant;
            $restaurant->location = $input['location'];
            $restaurant->rsName = $input['rsName'];
            $restaurant->photo = "";
            $restaurant->save();


            return response()->json([
                'status' => '1',
                'message' => 'create success',
                'data' => $restaurant,
            ], 200);
        }else{
            return response()->json([
                'status' => '0',
                'message' => 'Failed',
                'data' => [

                ]
            ], 200);
        }
    }
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
    /**
     * 更新該筆餐廳的數據
     * @param Request $request 前端傳來該筆資料的更新數據
     * @return string
     */
    public function update(Request $request, $rsId)
    {
        $postJsonData = $request->getContent();
        //做資料驗證
        $ValidData = json_decode($postJsonData, true);

        $rules = [
            'rsId' => 'required|numeric',
            'location' => 'required',
            'rsName' => 'required',
        ];
        $messages = array(
            'required' => '欄位不能為空',
            'numeric' => ':attribute 必須為數字',
        );

        $validator = Validator::make($ValidData, $rules, $messages);
//        //要回傳前端的json
        $data = array(
            'status' => 0,
            'message' => '',
            'data' => ''
        );
//
        if ($validator->passes()) {
            $data['status'] = 1;
            $data['message'] = 'success';


            //資料庫更新該筆資料
            $updateData = json_decode($postJsonData);

            $restaurant = restaurant::where('rsId', $rsId)->first();

            $restaurant->rsId = $updateData->rsId;
            $restaurant->location = $updateData->location;
            $restaurant->rsName = $updateData->rsName;


            try{
                $response = $restaurant->save();
            }catch (Exception $e){
                $data['status'] = 0;
                $data['message'] = "名稱不能大於十個字";
                return json_encode($data);
            }


            $data['data'] = $response;
            return json_encode($data);
        } else {
            $data['status'] = 0;
            $data['message'] = $validator->errors()->all();
            return json_encode($data);
        }
    }
    public function showPatch($location)
    {
        $restaurant = restaurant::where('location',$location)->get();
        return $restaurant;
    }
}