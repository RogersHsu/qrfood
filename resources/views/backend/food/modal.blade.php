<!-- Edit Modal -->
<div class="modal fade" id="Modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">修改確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="del_tabledata_comfirm">
                <form id="form_edit" class="was-validated" action="">
                    <div class="form-group">
                        <label for="email">餐廳名稱</label>
                        <input type="text" class="form-control" placeholder="Enter fdId" id="modal_edit_rsName"
                               name="username"
                               required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"
                        >
                        <div class="invalid-feedback">Passwords should be a minimum of 8 characters and include at least
                            one upper case letter, one lower case letter and one number.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pwd">食物名稱</label>
                        <input type="text" class="form-control" placeholder="Enter rsId" id="modal_edit_fdName">
                        <div class="invalid-feedback">这是一个invalid-feedback</div>

                    </div>
                    <div class="form-group">
                        <label for="pwd">分類</label>
                        <input type="text" class="form-control" placeholder="Enter fdName" id="modal_edit_cName">
                    </div>
                    <div class="form-group">
                        <label for="pwd">克數</label>
                        <input type="text" class="form-control" placeholder="Enter cId" id="modal_edit_gram">
                    </div>
                    <div class="form-group">
                        <label for="pwd">熱量</label>
                        <input type="text" class="form-control" placeholder="Enter gram" id="modal_edit_calorie">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="submit" id="btn_edit_submit" class="btn btn-primary">確定</button>
            </div>
        </div>
    </div>
</div>

<!-- View Modal -->
<div class="modal fade" id="Modal_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">查看/修改</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="del_tabledata_comfirm">
                <form id="form_view" class="was-validated">
                    <div class="form-group">
                        <label for="gram">克數</label>
                        <input type="text" class="form-control" placeholder="Enter gram" id="modal_view_gram"
                               name="name"
                               required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                        >
                        <div class="invalid-feedback">請輸入正數.</div>
                    </div>
                    <div class="form-group">
                        <label for="calorie">熱量</label>
                        <input type="text" class="form-control" placeholder="Enter calorie" id="modal_view_calorie"
                               required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                        >
                        <div class="invalid-feedback">請輸入正數.</div>
                    </div>
                    <div class="form-group">
                        <label for="protein">蛋白質</label>
                        <input type="text" class="form-control" placeholder="Enter protein" id="modal_view_protein"
                               required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                        >
                        <div class="invalid-feedback">請輸入正數.</div>
                    </div>

                    <div class="form-group">
                        <label for="fat">脂肪(總)</label>
                        <input type="text" class="form-control" placeholder="Enter fat" id="modal_view_fat"
                               required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                        >
                        <div class="invalid-feedback">請輸入正數.</div>
                    </div>

                    <div class="form-group">
                        <label for="saturatedFat">飽和脂肪</label>
                        <input type="text" class="form-control" placeholder="Enter saturatedFat"
                               id="modal_view_saturatedFat"
                               required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                        >
                        <div class="invalid-feedback">請輸入正數.</div>
                    </div>
                    <div class="form-group">
                        <label for="transFat">反式脂肪</label>
                        <input type="text" class="form-control" placeholder="Enter transFat" id="modal_view_transFat"
                               required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                        >
                        <div class="invalid-feedback">請輸入正數.</div>
                    </div>
                    <div class="form-group">
                        <label for="cholesterol">膽固醇（毫克）</label>
                        <input type="text" class="form-control" placeholder="Enter cholesterol"
                               id="modal_view_cholesterol"
                               required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                        >
                        <div class="invalid-feedback">請輸入正數.</div>
                    </div>

                    <div class="form-group">
                        <label for="carbohydrate">碳水化合物（總）</label>
                        <input type="text" class="form-control" placeholder="Enter carbohydrate"
                               id="modal_view_carbohydrate"
                               required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                        >
                        <div class="invalid-feedback">請輸入正數.</div>
                    </div>
                    <div class="form-group">
                        <label for="sugar">糖</label>
                        <input type="text" class="form-control" placeholder="Enter sugar" id="modal_view_sugar"
                               required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                        >
                        <div class="invalid-feedback">請輸入正數.</div>
                    </div>
                    <div class="form-group">
                        <label for="dietaryFiber">膳食纖維</label>
                        <input type="text" class="form-control" placeholder="Enter dietaryFiber"
                               id="modal_view_dietaryFiber"
                               required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                        >
                        <div class="invalid-feedback">請輸入正數.</div>
                    </div>
                    <div class="form-group">
                        <label for="sodium">鈉（毫克）</label>
                        <input type="text" class="form-control" placeholder="Enter sodium" id="modal_view_sodium"
                               required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                        >
                        <div class="invalid-feedback">請輸入正數.</div>
                    </div>
                    <div class="form-group">
                        <label for="calcium">鈣（毫克）</label>
                        <input type="text" class="form-control" placeholder="Enter calcium" id="modal_view_calcium"
                               required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                        >
                        <div class="invalid-feedback">請輸入正數.</div>
                    </div>
                    <div class="form-group">
                        <label for="potassium">鉀（毫克）</label>
                        <input type="text" class="form-control" placeholder="Enter potassium" id="modal_view_potassium"
                               required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                        >
                        <div class="invalid-feedback">請輸入正數.</div>
                    </div>
                    <div class="form-group">
                        <label for="ferrum">鐵（毫克）</label>
                        <input type="text" class="form-control" placeholder="Enter ferrum" id="modal_view_ferrum"
                               required pattern="^[0-9]*|[0-9]*\.[0-9]+$"
                        >
                        <div class="invalid-feedback">請輸入正數.</div>
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

<!-- Delete Modal -->
<div class="modal fade" id="Modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">刪除確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="del_tabledata_comfirm">
                <table id="modal_del_datatable" class="ui celled table" style="margin:0px auto;">
                    <thead>
                    <tr>
                        <th>fdId</th>
                        <th>rsId</th>
                        <th>fdName</th>
                        <th>cId</th>
                        <th>克數</th>
                        <th>熱量</th>
                        <!-- <th>蛋白質</th>
                        <th>脂肪(總)</th>
                        <th>飽和脂肪</th>
                        <th>反式脂肪</th>
                        <th>膽固醇(毫克)</th>
                        <th>碳水化合物(總)</th>
                        <th>糖</th>
                        <th>膳食纖維</th>
                        <th>鈉(毫克)</th>
                        <th>鈣(毫克)</th>
                        <th>鉀(毫克)</th>
                        <th>鐵(毫克)</th> -->
                    </tr>
                    </thead>
                    <tbody>
                    <!-- data -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="button" id="btn_del_submit" class="btn btn-primary">確定</button>
            </div>
        </div>
    </div>
</div>