<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\User;
use App\restaurant;
use App\Post;
class PostController extends Controller
{
    public function getAllPosts(Request $request){
        $user =  JWTAuth::parseToken()->authenticate();
        $uId = $user->uId;
        $posts = Post::where('uId',8)->orderBy('time','ASC')->get();
        if(!$posts->isEmpty()){
            $array = [];
            foreach ($posts as $post){
                $object = new \stdClass;
                $object->pId = $post->pId;
                $object->subject = $post->subject;
                array_push($array,$object);
            }
            return response()->json([
                "success" => true,
                "message" => "success",
                "data" => $array,
            ]);
        }else{
            return response()->json([
                "success" => true,
                "message" => "No posts.",
                "data" => [],

            ]);
        }

    }
}
