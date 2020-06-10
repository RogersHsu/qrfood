<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2020/4/10
 * Time: 下午 5:19
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

/**
 * 抓出所有分類的資料
 * Class CategoryController
 * @package App\Http\Controllers\Admin
 */
class CategoryController extends Controller
{
    public function show()
    {
        $response = category::all();
        return response()->json($response, 200);
    }
    public function create(Request $request){

        $input = $request->all();

//        //檢查input是否合
        $validator = Validator::make($request->all(), [
            'cName' => 'required',
        ]);
        if ($validator->passes()) {
            $category = new Category;
            $category->cName = $input['cName'];
            $category->save();

            return response()->json([
                'status' => '1',
                'message' => 'create success',
                'data' => $category,
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
    /**
     * 更新該筆分類的數據
     * @param Request $request 前端傳來該筆資料的更新數據
     * @return string
     */
    public function update(Request $request, $cId)
    {
        $postJsonData = $request->getContent();
        //做資料驗證
        $ValidData = json_decode($postJsonData, true);

        $rules = [
            'cId' => 'required|numeric',
            'cName' => 'required',
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

            $category = category::where('cId', $cId)->first();

            $category->cId = $updateData->cId;
            $category->cName = $updateData->cName;


            try{
                $response = $category->save();
            }catch (Exception $e){
                $data['status'] = 0;
                $data['message'] = "名稱不能大於五個字";
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

}