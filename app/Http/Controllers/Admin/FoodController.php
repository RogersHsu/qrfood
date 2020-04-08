<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\food;
use App\restaurant;
use App\category;
use Validator;

class FoodController extends Controller
{
    /**
     * 取得所有所有食物的資料
     * @return array
     */
    public function showAll(){
        $array = [];

        $result = food::with(['restaurant', 'category'])->get();
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

            array_push($array,$arr);
        }
        
        return $array;
    }

    /**
     * 更新該筆食物的數據
     * @param Request $request 前端傳來該筆資料的更新數據
     * @return string
     */
    public function update(Request $request){
        $postJsonData = $request->getContent();
        //做資料驗證
        $ValidData = json_decode($postJsonData,true);
        //return $ValidData;
        $rules = [
            'rsName' => 'required|alpha',
            'fdName' => 'required|alpha',
            'cName' => 'required|alpha',
            'gram' => 'required|numeric|between:0,9999.9999',
            'calorie' => 'required|numeric|between:0,9999.9999',
        ];
        $messages = array(
            'required' => '欄位不能為空',
            'alpha' => ':attribute 格式錯誤',
            'numeric' => ':attribute 必須為數字',
            'between' => ':attribute 必須介於0~9999.9999之間'
        );
        $validator = Validator::make($ValidData,$rules,$messages);

        //要回傳前端的json
        $data = array(
            'status' => 0,
            'message' => '',
            'data' => ''
        );

        if ($validator->passes()) {
            $data['status'] = 1;
            $data['message'] = 'success';

            //資料庫更新該筆資料
            $updateData = json_decode($postJsonData);
            $Food = food::where('fdId',$updateData->fdId)->first();

            $Food->rsId = $updateData->rsId;
            $Food->fdName = $updateData->fdName;
            $Food->cId = $updateData->cId;
            $Food->gram = $updateData->gram;
            $Food->calorie = $updateData->calorie;
            $test = $Food->save();
            $data['data'] = $test;
            return json_encode($data);
        } else {
            $data['status'] = 0;
            $data['message'] = $validator->errors()->all();
            return json_encode($data);
        }
    }

    /**
     * 刪除該筆資料
     * @param Request $request 前端傳來該筆資料的數據
     * @return array
     */
    public function delete(Request $request){
        $postJsonData = $request->getContent();
        $postJsonData = json_decode($postJsonData);
        $arr = [];
        foreach($postJsonData as $data){
            array_push($arr,$data->fdId);
        }

        food::destroy($arr);

        return $arr;
    }
}
