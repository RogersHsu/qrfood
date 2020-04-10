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
}