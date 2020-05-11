<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use DB;
use App\food;
use App\restaurant;
use App\category;
use Validator;
use Exception;
use Illuminate\Support\Facades\Redirect;
class FoodController extends Controller
{
    /**
     * 新增一筆食物資料
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request){

        $input = $request->all();
//        //檢查input是否合
        $validator = Validator::make($request->all(), [
            'rsId' => 'required|numeric',
            'fdName' => 'required',
            'cId' => 'required|numeric',
            'gram' => 'required|numeric|between:0,9999.9999',
            'calorie' => 'required|numeric|between:0,9999.9999',
            'protein' => 'required|numeric|between:0,9999.9999',
            'fat' => 'required|numeric|between:0,9999.9999',
            'saturatedFat' => 'required|numeric|between:0,9999.9999',
            'transFat' => 'required|numeric|between:0,9999.9999',
            'cholesterol' => 'required|numeric|between:0,9999.9999',
            'carbohydrate' => 'required|numeric|between:0,9999.9999',
            'sugar' => 'required|numeric|between:0,9999.9999',
            'dietaryFiber' => 'required|numeric|between:0,9999.9999',
            'sodium' => 'required|numeric|between:0,9999.9999',
            'calcium' => 'required|numeric|between:0,9999.9999',
            'potassium' => 'required|numeric|between:0,9999.9999',
            'ferrum' => 'required|numeric|between:0,9999.9999',
            'photo' => 'mimes:jpeg,bmp,png'
        ]);
        if ($validator->passes()) {
            $lastFdId = food::select('fdId')->orderBy('fdId','DESC')->first();
//            $input['photo'] = 'http://localhost/upload/'.($lastFdId->fdId+1).".".$request->photo->getClientOriginalExtension();
//            $destination="C:\\xampp\\htdocs\\upload"; //放置圖片的位址(絕對路徑)
            $input['photo'] = ($lastFdId->fdId+1).".".$request->photo->getClientOriginalExtension();
            $destination="C:\\xampp\\htdocs\\qrfood\\img"; //放置圖片的位址(絕對路徑)
            $request->photo->move($destination,$input['photo']);
            $input['disable'] = 0;
            $create = food::create($input);
            return response()->json([
                'status' => '200',
                'message' => 'create success',
                'data' => $create,
                ], 200);
        }else{
//            return "aa";
            return response()->json([
                'status' => '403',
                'message' => 'Failed',
                'data' => [

                ]
            ], 400);
        }
//
    }

    /**
     * 更換食物的圖片
     * @param Request $request
     * @param $fdId
     * @return \Illuminate\Http\JsonResponse
     */
    public function editPhoto(Request $request,$fdId){
//        $destination="C:\\xampp\\htdocs\\upload"; //放置圖片的位址(絕對路徑)

        $destination="C:\\xampp\\htdocs\\qrfood\\img"; //放置圖片的位址(絕對路徑)
        $extension = Input::file('file')->getClientOriginalExtension(); //取得副檔名
        if($fdId < 10)
            $fileName = '0'.$fdId .'.'.$extension;
        else
            $fileName = $fdId .'.'.$extension;

        Input::file('file')->move($destination, $fileName);
        try{
            $food = food::where('fdId',$fdId)->first();
//            $food->photo = "http://localhost/upload/".$fileName;
            $food->photo = $fileName;
            $food->save();
            return response()->json([
                'status' => '200',
                'message' => 'Success',
                'data' => [
                    'photo' => $food->photo,
                ]
            ], 200);
        }catch (Exception $e){
            return response()->json([
                'status' => '403',
                'message' => 'Failed',
                'data' => [

                ]
            ], 400);
        }



    }

    public function showPatch($rsName)
    {
        $array = [];

        $rsId = restaurant::select('rsId')->where('rsName',$rsName)->first();

        $result = food::with(['restaurant', 'category'])->where('rsId',$rsId->rsId)->get();

        foreach ($result as $food) {
            $arr = [];
            $arr['fdId'] = $food['fdId'];
            $arr['fdName'] = $food['fdName'];
            $arr['rsId'] = $food['restaurant'][0]['rsId'];
            $arr['rsName'] = $food['restaurant'][0]['rsName'];
            $arr['cId'] = $food['category'][0]['cId'];
            $arr['cName'] = $food['category'][0]['cName'];
            //營養素
            $arr['gram'] = $food['gram'];
            $arr['calorie'] = $food['calorie'];
            $arr['protein'] = $food['protein'];
            $arr['fat'] = $food['fat'];
            $arr['saturatedFat'] = $food['saturatedFat'];
            $arr['transFat'] = $food['transFat'];
            $arr['cholesterol'] = $food['cholesterol'];
            $arr['carbohydrate'] = $food['carbohydrate'];
            $arr['sugar'] = $food['sugar'];
            $arr['dietaryFiber'] = $food['dietaryFiber'];
            $arr['sodium'] = $food['sodium'];
            $arr['calcium'] = $food['calcium'];
            $arr['potassium'] = $food['potassium'];
            $arr['ferrum'] = $food['ferrum'];
            $arr['disable'] = $food['disable'];
            $arr['photo'] = $food['photo'];

            array_push($array, $arr);

        }

        return $array;
    }
    /**
     * 取得所有所有食物的資料
     * @return array
     */
    public function showAll()
    {
        $array = [];

        $result = food::with(['restaurant', 'category'])->get();
        foreach ($result as $food) {
            $arr = [];
            $arr['fdId'] = $food['fdId'];
            $arr['fdName'] = $food['fdName'];
            $arr['rsId'] = $food['restaurant'][0]['rsId'];
            $arr['rsName'] = $food['restaurant'][0]['rsName'];
            $arr['rsName'] = $food['restaurant'][0]['rsName'];
            $arr['cId'] = $food['category'][0]['cId'];
            $arr['cName'] = $food['category'][0]['cName'];
            //營養素
            $arr['gram'] = $food['gram'];
            $arr['calorie'] = $food['calorie'];
            $arr['protein'] = $food['protein'];
            $arr['fat'] = $food['fat'];
            $arr['saturatedFat'] = $food['saturatedFat'];
            $arr['transFat'] = $food['transFat'];
            $arr['cholesterol'] = $food['cholesterol'];
            $arr['carbohydrate'] = $food['carbohydrate'];
            $arr['sugar'] = $food['sugar'];
            $arr['dietaryFiber'] = $food['dietaryFiber'];
            $arr['sodium'] = $food['sodium'];
            $arr['calcium'] = $food['calcium'];
            $arr['potassium'] = $food['potassium'];
            $arr['ferrum'] = $food['ferrum'];
            $arr['disable'] = $food['disable'];
            $arr['photo'] = $food['photo'];

            array_push($array, $arr);

        }

        return $array;

    }

    /**
     * 更新該筆食物的數據
     * @param Request $request 前端傳來該筆資料的更新數據
     * @return string
     */
    public function update(Request $request, $fdId)
    {
        $postJsonData = $request->getContent();
        //做資料驗證
        $ValidData = json_decode($postJsonData, true);
        $rules = [
            'rsId' => 'required|numeric',
            'fdName' => 'required',
            'cId' => 'required|numeric',
            'gram' => 'required|numeric|between:0,9999.9999',
            'calorie' => 'required|numeric|between:0,9999.9999',
            'protein' => 'required|numeric|between:0,9999.9999',
            'fat' => 'required|numeric|between:0,9999.9999',
            'saturatedFat' => 'required|numeric|between:0,9999.9999',
            'transFat' => 'required|numeric|between:0,9999.9999',
            'cholesterol' => 'required|numeric|between:0,9999.9999',
            'carbohydrate' => 'required|numeric|between:0,9999.9999',
            'sugar' => 'required|numeric|between:0,9999.9999',
            'dietaryFiber' => 'required|numeric|between:0,9999.9999',
            'sodium' => 'required|numeric|between:0,9999.9999',
            'calcium' => 'required|numeric|between:0,9999.9999',
            'potassium' => 'required|numeric|between:0,9999.9999',
            'ferrum' => 'required|numeric|between:0,9999.9999',
        ];
        $messages = array(
            'required' => '欄位不能為空',
            'alpha' => ':attribute 格式錯誤',
            'numeric' => ':attribute 必須為數字',
            'between' => ':attribute 必須介於0~9999.9999之間'
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

            $Food = food::where('fdId', $fdId)->first();

            $Food->rsId = $updateData->rsId;
            $Food->fdName = $updateData->fdName;
            $Food->cId = $updateData->cId;
            $Food->gram = $updateData->gram;
            $Food->calorie = $updateData->calorie;
            $Food->protein = $updateData->protein;
            $Food->fat = $updateData->fat;
            $Food->saturatedFat = $updateData->saturatedFat;
            $Food->transFat = $updateData->transFat;
            $Food->cholesterol = $updateData->cholesterol;
            $Food->carbohydrate = $updateData->carbohydrate;
            $Food->sugar = $updateData->sugar;
            $Food->dietaryFiber = $updateData->dietaryFiber;
            $Food->sodium = $updateData->sodium;
            $Food->calcium = $updateData->calcium;
            $Food->potassium = $updateData->potassium;
            $Food->ferrum = $updateData->ferrum;


            $response = $Food->save();
            $data['data'] = $response;
            return json_encode($data);
        } else {
            $data['status'] = 0;
            $data['message'] = $validator->errors()->all();
            return $data;
        }
    }

    /**
     * 把該筆資料軟刪除d
     * @param Request $request
     * @param $fdId
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request, $fdId)
    {
            $request = json_decode($request->getContent(), true);
        if ($request['disable'] == 0) {
            $food = food::find($fdId);
            $food->disable = 1;
            $food->save();

            return response()->json([
                'status' => '200',
                'message' => 'Change food status to hidden!',
            ], 200);
        } else {
            //未知錯誤
            return response()->json([
                'status' => '400',
                'message' => 'Unknown error!',
            ], 400);

        }

    }

    /**
     * 解除軟刪除的狀態
     * @param Request $request
     * @param $fdId
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore(Request $request, $fdId)
    {
        $request = json_decode($request->getContent(), true);
        if ($request['disable'] == 1) {

            $food = food::find($fdId);
            $food->disable = 0;
            $food->save();
            return response()->json([
                'status' => '200',
                'message' => 'Change food status to show!',
            ], 200);
        } else {
            //未知錯誤
            return response()->json([
                'status' => '400',
                'message' => 'Unknown error!',
            ], 400);
        }
    }
}
