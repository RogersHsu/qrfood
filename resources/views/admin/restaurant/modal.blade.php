{{--restuaraant view modal--}}
<div class="modal fade" id="Modal_Res_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <div class="form-group col-md-4">
                            <label>餐廳位址</label>
                            <input type="text" class="form-control" placeholder="餐廳位址" id="modalView_resLocation"
                                   required>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="pwd">餐廳名稱</label>
                            <input type="text" class="form-control" placeholder="餐廳名稱" id="modal_view_res_rsName"
                                   required>
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

{{--create restaurant--}}
<div class="modal fade" id="Modal_Res_create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <div class="form-group col-md-4">
                            <label>餐廳位址</label>
                            <input type="text" class="form-control" placeholder="餐廳位址" id="modalCreate_resLocation"
                                   required>
                            <div class="invalid-feedback">此欄位必須填寫</div>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="pwd">餐廳名稱</label>
                            <input type="text" class="form-control" placeholder="餐廳名稱" id="modalCreate_resRsName"
                                   required>
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