<div class = "container-fluid">
    <div id="tableArea" class="container-fluid" style="width:100% ;">
    <table id="example" class="ui celled table">
      <thead>
        <tr>
            <th>fdId</th>
            <th>rsId</th>
            <th>fdName</th>
            <th>cId</th>
            <th>克數</th>
            <th>熱量</th>
            <th>編輯</th>
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
    <!-- Edit Modal -->
  <div class="modal fade" id="Modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">修改確認</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="del_tabledata_comfirm">
      <form action="/action_page.php">
  <div class="form-group">
    <label for="email">fdId</label>
    <input type="text" class="form-control" placeholder="Enter fdId" id="modal_edit_fdId">
  </div>
  <div class="form-group">
    <label for="pwd">rsId</label>
    <input type="text" class="form-control" placeholder="Enter rsId" id="modal_edit_rsId">
  </div>
  <div class="form-group">
    <label for="pwd">fdName</label>
    <input type="text" class="form-control" placeholder="Enter fdName" id="modal_edit_fdName">
  </div>
  <div class="form-group">
    <label for="pwd">cId</label>
    <input type="text" class="form-control" placeholder="Enter cId" id="modal_edit_cId">
  </div>
  <div class="form-group">
    <label for="pwd">gram</label>
    <input type="text" class="form-control" placeholder="Enter gram" id="modal_edit_gram">
  </div>
  <div class="form-group">
    <label for="pwd">calorie</label>
    <input type="text" class="form-control" placeholder="Enter calorie" id="modal_edit_calorie">
  </div>
  
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" id="btn_edit_submit" class="btn btn-primary">確定</button>
      </div>
    </div>
  </div>
</div>
</div>
