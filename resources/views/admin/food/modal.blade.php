<!-- View Modal -->
<div class="modal fade" id="Modal_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">查看/修改</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="del_tabledata_comfirm">
                <form id="form_view" class="was-validated">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>餐廳名稱</label>
                            <select id="modal_view_dropdown_rsName" class="custom-select" required>
                                {{--render data in renderFormData.js--}}
                            </select>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">食物名稱</label>
                            <input type="text" class="form-control" placeholder="食物名稱" id="modal_view_fdName"
                                   required>
                            <div class="invalid-feedback">此欄位必須填寫</div>

                        </div>
                        <div class="form-group col-md-3">
                            <label>分類</label>
                            <select id="modal_view_dropdown_category" class="custom-select" required>
                                {{--render data in renderFormData.js--}}
                            </select>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                    </div>
                    <hr/>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="gram">克數</label>
                            <input type="text" class="form-control" placeholder="Enter gram" id="modal_view_gram"
                                   name="name"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="calorie">熱量</label>
                            <input type="text" class="form-control" placeholder="Enter calorie" id="modal_view_calorie"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="protein">蛋白質</label>
                            <input type="text" class="form-control" placeholder="Enter protein" id="modal_view_protein"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="fat">脂肪(總)</label>
                            <input type="text" class="form-control" placeholder="Enter fat" id="modal_view_fat"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="saturatedFat">飽和脂肪</label>
                            <input type="text" class="form-control" placeholder="Enter saturatedFat"
                                   id="modal_view_saturatedFat"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="transFat">反式脂肪</label>
                            <input type="text" class="form-control" placeholder="Enter transFat"
                                   id="modal_view_transFat"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cholesterol">膽固醇（毫克）</label>
                            <input type="text" class="form-control" placeholder="Enter cholesterol"
                                   id="modal_view_cholesterol"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="carbohydrate">碳水化合物（總）</label>
                            <input type="text" class="form-control" placeholder="Enter carbohydrate"
                                   id="modal_view_carbohydrate"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="sugar">糖</label>
                            <input type="text" class="form-control" placeholder="Enter sugar" id="modal_view_sugar"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dietaryFiber">膳食纖維</label>
                            <input type="text" class="form-control" placeholder="Enter dietaryFiber"
                                   id="modal_view_dietaryFiber"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="sodium">鈉（毫克）</label>
                            <input type="text" class="form-control" placeholder="Enter sodium" id="modal_view_sodium"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="calcium">鈣（毫克）</label>
                            <input type="text" class="form-control" placeholder="Enter calcium" id="modal_view_calcium"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="potassium">鉀（毫克）</label>
                            <input type="text" class="form-control" placeholder="Enter potassium"
                                   id="modal_view_potassium"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ferrum">鐵（毫克）</label>
                            <input type="text" class="form-control" placeholder="Enter ferrum" id="modal_view_ferrum"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="submit" id="btn_view_submit" class="btn btn-primary">修改</button>
            </div>
        </div>
    </div>
</div>

{{--status Modal--}}
{{--更改狀態時,會觸發此彈跳視窗--}}
<div class="modal fade bd-example-modal-sm" id="Modal_success" tabindex="-1" role="dialog"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">訊息</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                修改成功!
            </div>

        </div>
    </div>
</div>
    <div class="modal fade bd-example-modal-sm" id="Modal_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">更換照片</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <img id = "previewImage" src = "" style="height:30%;width:30%;margin-bottom: 5%;">
                    <form id="form_Image" class="was-validated" method="post" action="" enctype="multipart/form-data" id="myform">

                        <div class="custom-file">
                            <input type="file" class ="custom-file-input" id="file" name="file" accept="image/*" required/>
                            <div class="invalid-feedback">可接受的副檔名有.jpg .png</div>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>

                    </form>
                </div>
                <div class = "modal-footer">
                    <input type="button" class="button" value="Upload" id="but_upload">
                </div>
            </div>
        </div>
    </div>

<!-- create Modal -->
{{--建立新的一筆食物--}}

<div class="modal fade" id="Modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">查看/修改</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="del_tabledata_comfirm">
                <form id="form_create" class="was-validated" action="{{url('/food')}}" method="POST"  enctype="multipart/form-data">

                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>餐廳名稱</label>
                            <select name = "rsId" class="custom-select" required>
                                @foreach($restaurant as $key => $data)
                                    <option value="{{$data->rsId}}">{{$data->rsName}}</option>
                                @endforeach
                            </select>

                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">食物名稱</label>
                            <input name = "fdName" type="text" class="form-control" placeholder="食物名稱" id="modal_create_fdName"
                                   required>
                            <div class="invalid-feedback">此欄位必須填寫</div>

                        </div>
                        <div class="form-group col-md-3">
                            <label>分類</label>
                            <select name ="cId" id="modal_create_dropdown_category" class="custom-select" required>
                                @foreach($category as $key => $data)
                                    <option value="{{$data->cId}}">{{$data->cName}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                    </div>
                    <hr/>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="gram">克數</label>
                            <input type="text" class="form-control" placeholder="Enter gram" id="modal_create_gram"
                                   name="gram"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="calorie">熱量</label>
                            <input type="text" class="form-control" placeholder="Enter calorie" id="modal_create_calorie"
                                   name="calorie" required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="protein">蛋白質</label>
                            <input type="text" class="form-control" placeholder="Enter protein" id="modal_create_protein"
                                   name = "protein" required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="fat">脂肪(總)</label>
                            <input type="text" class="form-control" placeholder="Enter fat" id="modal_create_fat"
                                   name = "fat" required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="saturatedFat">飽和脂肪</label>
                            <input type="text" class="form-control" placeholder="Enter saturatedFat"
                                   id="modal_create_saturatedFat"
                                   name="saturatedFat" required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="transFat">反式脂肪</label>
                            <input type="text" class="form-control" placeholder="Enter transFat"
                                   id="modal_create_transFat" name="transFat"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cholesterol">膽固醇（毫克）</label>
                            <input type="text" class="form-control" placeholder="Enter cholesterol"
                                   id="modal_create_cholesterol" name="cholesterol"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="carbohydrate">碳水化合物（總）</label>
                            <input type="text" class="form-control" placeholder="Enter carbohydrate"
                                   id="modal_create_carbohydrate" name="carbohydrate"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="sugar">糖</label>
                            <input type="text" class="form-control" placeholder="Enter sugar" id="modal_create_sugar"
                                   name = "sugar" required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dietaryFiber">膳食纖維</label>
                            <input type="text" class="form-control" placeholder="Enter dietaryFiber"
                                   id="modal_create_dietaryFiber"
                                   name = "dietaryFiber"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="sodium">鈉（毫克）</label>
                            <input type="text" class="form-control" placeholder="Enter sodium" id="modal_create_sodium"
                                   name = "sodium"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="calcium">鈣（毫克）</label>
                            <input type="text" class="form-control" placeholder="Enter calcium" id="modal_create_calcium"
                                   name = "calcium"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="potassium">鉀（毫克）</label>
                            <input type="text" class="form-control" placeholder="Enter potassium"
                                   id="modal_create_potassium"
                                   name = "potassium" required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ferrum">鐵（毫克）</label>
                            <input type="text" class="form-control" placeholder="Enter ferrum" id="modal_create_ferrum"
                                   name = "ferrum" required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                            >
                            <div class="invalid-feedback">請輸入正數.</div>
                        </div>
                        <div class="form-group col-md-6">

                            <div class="custom-file">
                                <input type="file" class ="custom-file-input" id="modal_create_image" name="photo" accept="image/*" required/>
                                <div class="invalid-feedback">可接受的副檔名有.jpg .png</div>
                                <label class="custom-file-label" for="customFile">選擇圖片</label>
                            </div>
                            <script>
                                $("#modal_create_image").on('change',function() {

                                    if(checkfile() == true){ //判斷檔名是否是圖檔
                                        var fileName = $(this).val().split("\\").pop();
                                        $(this).siblings(".custom-file-label").addClass("selected").html(fileName); //input的文字變成上傳的檔名
                                    }else{ //
                                        $('#modal_create_image').val(''); //清空input
                                        $(this).siblings(".custom-file-label").addClass("selected").html(''); //input的文字變成空白
                                        $(this).next().html('可接受的副檔名有.jpg .png'); //錯誤提醒

                                    }
                                });
                                function checkfile() {
                                    var validExts = new Array(".png", ".jpg",".jpeg");
                                    var fileExt = $('#modal_create_image').val();
                                    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
                                    if (validExts.indexOf(fileExt) < 0) {
                                        return false;
                                    }else{
                                        return true;
                                    }
                                }
                            </script>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" id="btn_create_submit" class="btn btn-primary">新增</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
