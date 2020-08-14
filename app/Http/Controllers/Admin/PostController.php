<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\User;
use App\restaurant;
use App\Post;
use Validator;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    public function create(Request $request)
    {
        $uId =  JWTAuth::parseToken()->authenticate()->uId;

        $validator = Validator::make($request->all(), [

            'subject' => 'required|string',
            'context' => 'required|string',
            'location' => 'required|string',
        ]);
        if($request->picture){

        if ($validator->passes()) {
            $post = new Post;
            $post->uId = $uId;
            $post->subject = $request->subject;
            $post->context = $request->context;
            $post->location = $request->location;
            $post->save();

            //if has picture
            if($request->picture){
                $pId = $post->pId;
                if (preg_match('/^data:image\/(\w+);base64,/', $request->picture)) {
                    $data = substr($request->picture, strpos($request->picture, ',') + 1);
                    $data = base64_decode($data);
                    Storage::disk('img')->put($pId.".png", $data);
                }
            }

            return response()->json([
                "success" => true,
                "message" => "新增成功!",
            ]);
        }

        }else{
            return response()->json([
                "success" => false,
                "message" => "缺少參數",
            ]);
        }
    }
    public function show(Request $request){
        $posts = Post::orderBy('time','ASC')->get();
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
