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
                            <input type="text" class="form-control" placeholder="Enter rsId" id="modal_view_fdName"
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
<div class="modal fade bd-example-modal-sm" id="Modal_status" tabindex="-1" role="dialog"
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
                狀態修改成功!
            </div>

        </div>
    </div>
</div>
