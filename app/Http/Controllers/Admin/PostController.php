<?php

namespace App\Http\Controllers\Admin;

use App\Picture;
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
    /***
     * 建立一篇文章
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $uId =  JWTAuth::parseToken()->authenticate()->uId;

        $validator = Validator::make($request->all(), [

            'subject' => 'required|string',
            'context' => 'required|string',
            'location' => 'required|string',
        ]);
        if ($validator->passes()) {
            $post = new Post;
            $post->uId = $uId;
            $post->subject = $request->subject;
            $post->context = $request->context;
            $post->location = $request->location;
            $post->save();

            if($request->picture){
                $pId = $post->pId;
                if (preg_match('/^data:image\/(\w+);base64,/', $request->picture)) {
                    $data = substr($request->picture, strpos($request->picture, ',') + 1);
                    $data = base64_decode($data);
                    Storage::disk('img')->put($pId.".png", $data);
                    $picture = new Picture();
                    $picture->pId = $pId;
                    $picture->url = 'http://localhost/qrfood/storage/app/picture/'.$pId.".png";
                    $picture->save();
                }
            }

            return response()->json([
                "success" => true,
                "message" => "新增成功!",
            ]);

        }else{
            return response()->json([
                "success" => false,
                "message" => "無標題或內文",
            ]);
        }
    }

    /***
     * 取得所有人的發文
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request){
        $posts = Post::orderBy('time','ASC')->get();
        if($posts->first()){
            $array = [];
            foreach ($posts as $post){
                if($post->subject == null) break;
                $object = new \stdClass;
                $object->pId = $post->pId;
                $object->subject = $post->subject;
                $picture = Picture::select('url')->where('pId',$post->pId)->get();
                if($picture->first()){
                    $object->picture = $picture[0]->url;
                }else{
                    $object->picture = "";
                }
                array_push($array,$object);
            }
            return response()->json([
                "success" => true,
                "message" => "成功取得",
                "data" => $array,
            ]);
        }else{
            return response()->json([
                "success" => true,
                "message" => "沒有任何文章",
                "data" => [],

            ]);
        }

    }

    /***
     * 取得特定文章內容
     * @param $pId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSpecPost($pId){
        $post = Post::where('pId',$pId)->get();
        if($post->first()){
            $post = $post[0];
            $picture = Picture::select('url')->where('pId',$pId)->get();
            $comments = Post::where('rId',$pId)->get();
            $comm = [];
            foreach($comments as $comment){
                $object = new \stdClass();
                $object->user = User::select('name')->where('uId',$comment->uId)->get()[0]->name;
                $object->context = $comment->r_context;
                $object->time = $comment->time;
                array_push($comm,$object);
            }
            $array = [];
            $object = new \stdClass();
            $object->pId = $pId;
            $object->subject = $post->subject;
            if($picture->first()){
                $object->picture = $picture[0]->url;

            }else{
                $object->picture = "";
            }
            $object->location = $post->location;
            $object->time = $post->time;
            $object->context = $post->context;
            $object->comment = $comm;
            array_push($array,$object);
            return response()->json([
                "success" => true,
                "message" => "成功取得",
                "data" => $array,
            ]);
        }
        return response()->json([
            "success" => false,
            "message" => "未知的錯誤",
        ]);
    }

    /***
     * 取得使用者所有發文
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserPosts(){
        $uId =  JWTAuth::parseToken()->authenticate()->uId;
        $posts = Post::where('uId',$uId)->get();
        if(!$posts->isEmpty()){
            $array = [];
            foreach ($posts as $post){
                $picture = Picture::select('url')->where('pId',$post->pId)->get();
                $object = new \stdClass;
                $object->pId = $post->pId;
                $object->subject = $post->subject;
                if($picture->first()){
                    $object->picture = $picture[0]->url;
                }else{
                    $object->picture = "";
                }
                array_push($array,$object);
            }
            return response()->json([
                "success" => true,
                "message" => "成功取得",
                "data" => $array,
            ]);
        }else{
            return response()->json([
                "success" => true,
                "message" => "使用者沒有任何文章",
            ]);
        }

    }
}
