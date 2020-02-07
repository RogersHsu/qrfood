<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\food;
use App\restaurant;
use App\category;
class FoodController extends Controller
{
    public function showAll(){
       
        // $Food = DB::table('food')->get();
        // $Food = json_encode($Food);
        $arr = [];
        
        $Food = food::with(['restaurant','category'])->get();
        $Category = category::select('cId','cName')->get();
        $Restaurant = restaurant::select('rsId','location','rsName')->get();
        $arr['food'] = $Food;
        $arr['category'] = $Category;
        $arr['restaurant'] = $Restaurant;
        // $Food = DB::table('food')
        //         ->join('restaurant','food.rsId','=','restaurant.rsId')
        //         ->join('category','food.cId','=','category.cId')
        //         ->select('food.*','restaurant.rsName','category.cName')
        //         ->orderBy('fdId')
        //         ->get();
        
        return $arr;
    }
    public function update(Request $request){
        $postJsonData = $request->getContent();
        $postJsonData = json_decode($postJsonData);
       
        $Food = food::where('fdId',$postJsonData->fdId)->first();
        $Restaurant = restaurant::where('rsName',$postJsonData->rsName)->first();
        $Category = category::where('cName',$postJsonData->cName)->first();

        $Food->rsId = $Restaurant->rsId;
        $Food->fdName = $postJsonData->fdName;
        $Food->cId = $Category->cId;
        $Food->gram = $postJsonData->gram;
        $Food->calorie = $postJsonData->calorie;
        $Food->save();

        return json_encode($Food);
    }
    public function delete(Request $request){
        $postJsonData = $request->getContent();
        return $postJsonData;
    }
    
}
