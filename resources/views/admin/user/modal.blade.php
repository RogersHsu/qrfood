{{--restuaraant view modal--}}
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">編輯</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="del_tabledata_comfirm">
                <form id="form_edit" class="was-validated">

                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label>姓名</label>
                            <input type="text" class="form-control" placeholder="姓名" id="modal_edit_name"
                                   required>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>身分</label>
                            <select id ="modal_edit_role" name ="role" class="custom-select" required>
                                <option value="1">一般使用者</option>
                                <option value="2">管理員</option>
                            </select>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>信箱地址</label>
                            <input type="text" class="form-control" placeholder="信箱地址" id="modal_edit_email"
                                   required>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>帳號</label>
                            <input type="text" class="form-control" placeholder="帳號" id="modal_edit_account"
                                   required>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>性別</label>
                            <select id ="modal_edit_gender" name ="gender" class="custom-select" required>
                                <option value="1">男</option>
                                <option value="2">女</option>
                            </select>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>身高</label>
                            <input type="text" class="form-control" placeholder="身高" id="modal_edit_height"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$">
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">體重</label>
                            <input type="text" class="form-control" placeholder="體重" id="modal_edit_weight"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$">
                            <div class="invalid-feedback">此欄位必須填寫</div>

                        </div>
                        <div class="form-group col-md-6">
                            <label>運動量</label>
                            <select id ="modal_edit_exercise" name ="exercise" class="custom-select" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>

                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="submit" id="btn_edit_submit" class="btn btn-primary">修改</button>
            </div>
        </div>
    </div>
</div>
{{--刪除確認--}}
<div class="modal fade bd-example-modal-sm" id="modal_del_comfirm" tabindex="-1" role="dialog"
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
                您即將刪除該使用者!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="submit" id="btn_del_submit" class="btn btn-primary">刪除</button>
            </div>
        </div>
    </div>
</div>

{{--create new user--}}
<div class="modal fade" id="modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">新增</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_create" class="was-validated">

                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label>姓名</label>
                            <input type="text" class="form-control" placeholder="姓名" id="modal_create_name"
                                   required>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>身分</label>
                            <select id ="modal_create_role" name ="role" class="custom-select" required>
                                <option value="1">一般使用者</option>
                                <option value="2">管理員</option>
                            </select>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>帳號</label>
                            <input type="text" class="form-control" placeholder="帳號" id="modal_create_account"
                                   required>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>密碼</label>
                            <input type="text" class="form-control" placeholder="密碼" id="modal_create_password"
                                   required>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>信箱地址</label>
                            <input type="text" class="form-control" placeholder="信箱地址" id="modal_create_email"
                                   required>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>性別</label>
                            <select id ="modal_create_gender" name ="gender" class="custom-select" required>
                                <option value="1">男</option>
                                <option value="2">女</option>
                            </select>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>身高</label>
                            <input type="text" class="form-control" placeholder="身高" id="modal_create_height"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$">
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pwd">體重</label>
                            <input type="text" class="form-control" placeholder="體重" id="modal_create_weight"
                                   required pattern="^[0-9]*|[0-9]*\.[0-9]+$">
                            <div class="invalid-feedback">此欄位必須填寫</div>

                        </div>
                        <div class="form-group col-md-6">
                            <label>運動量</label>
                            <select id ="modal_create_exercise" name ="exercise" class="custom-select" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="submit" id="btn_create_submit" class="btn btn-primary">新增</button>
            </div>
        </div>
    </div>
</div>
{{--用於顯示成功--}}
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
                成功!
            </div>

        </div>
    </div>
</div>