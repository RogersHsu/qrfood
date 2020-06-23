{{--category view modal--}}
<div class="modal fade" id="Modal_Cat_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <div class="form-group col-md-12">
                            <label>食物類別名稱</label>
                            <input type="text" class="form-control" placeholder="食物類別名稱" id="modalView_cName"
                                   required maxlength="5">
                            <div class="invalid-feedback">此欄位必須填寫</div>
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

{{--create category--}}
<div class="modal fade" id="Modal_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <div class="form-group col-md-12">
                            <label>食物類別名稱</label>
                            <input type="text" class="form-control" placeholder="食物類別名稱" id="modalCreate_cName"
                                   required maxlength="5">
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>


                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="submit" id="btn_create_submit" class="btn btn-primary">建立</button>
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