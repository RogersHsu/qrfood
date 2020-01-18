<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class FoodController extends Controller
{
    public function showAll(){
        $Food = DB::table('food')->get();
        $Food = json_decode($Food,true);
        return $Food;
    }
}
