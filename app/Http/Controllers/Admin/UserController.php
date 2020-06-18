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
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class UserController extends Controller
{
    public function create(Request $request){

        $input = $request->all();
//        //檢查input是否合
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'account' => 'required',
            'password' => 'required',
            'role' => 'required|numeric',
            'email' => 'required',
            'gender' => 'required|numeric',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'exercise' => 'required|numeric',
        ]);

        if ($validator->passes()) {
            $user = new User;
            $user->name = $input['name'];
            $user->account = $input['account'];
            $user->password = $input['password'];
            $user->email = $input['email'];
            $user->role = $input['role'];
            $user->gender = $input['gender'];
            $user->height = $input['height'];
            $user->weight = $input['weight'];
            $user->exercise = $input['exercise'];
            $user->save();


            return response()->json([
                'status' => '1',
                'message' => 'create success',
                'data' => $user,
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
    public function show()
    {
        $response = User::all();
        return response()->json($response, 200);
    }
    /**
     * 更新該筆使用者的數據
     * @param Request $request 前端傳來該筆資料的更新數據
     * @return string
     */
    public function update(Request $request, $uId)
    {
        $postJsonData = $request->getContent();
        //做資料驗證
        $ValidData = json_decode($postJsonData, true);
        $rules = [
            'uId' => 'required|numeric',
            'name' => 'required',
            'account' => 'required',
            'role' => 'required|numeric',
            'email' => 'required',
            'gender' => 'required|numeric',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'exercise' => 'required|numeric',

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

            $user = User::where('uId', $uId)->first();
            $user->name = $updateData->name;
            $user->account = $updateData->account;
            $user->role = $updateData->role;
            $user->gender = $updateData->gender;
            $user->email = $updateData->email;
            $user->height = $updateData->height;
            $user->weight = $updateData->weight;
            $user->exercise = $updateData->exercise;


            try{
                $response = $user->save();
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
    public function delete(Request $request, $uId)
    {
        $user = User::find($uId);
        $user->delete();
        return response()->json([
            'status' => '1',
            'message' => 'delete success',
            'data' => [

            ]
        ], 200);
    }
}