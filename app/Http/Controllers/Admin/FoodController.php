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
    public function showAll(){
        $array = [];
        
        $Food = food::with(['restaurant','category'])->get();
        foreach($Food as $food){
            $arr = [];
            $arr['fdId'] = $food['fdId'];
            $arr['fdName'] = $food['fdName'];
            $arr['gram'] = $food['gram'];
            $arr['calorie'] = $food['calorie'];
            $arr['rsId'] = $food['restaurant'][0]['rsId'];
            $arr['rsName'] = $food['restaurant'][0]['rsName'];
            $arr['cId'] = $food['category'][0]['cId'];
            $arr['cName'] = $food['category'][0]['cName'];
            array_push($array,$arr);
        }
        
        return $array;
    }   
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
