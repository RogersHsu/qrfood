<div class = "container-fluid">
    <div id="tableArea" class="container-fluid" style="width:100% ;">
    <table id="example" class="ui celled table">
      <thead>
        <tr>
            <th>刪除</th>
            <th>餐廳名稱</th>
            <th>食物名稱</th>
            <th>分類</th>
            <th>克數</th>
            <th>熱量</th>
            <th>編輯</th>

        </tr>
    </thead>
    <tbody>
        <!-- data -->
    </tbody>
    </table>
    </div>
    <!-- Edit Modal -->
  <div class="modal fade" id="Modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
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
    <label for="email">餐廳名稱</label>
    <input type="text" class="form-control" placeholder="Enter fdId" id="modal_edit_rsName">
  </div>
  <div class="form-group">
    <label for="pwd">食物名稱</label>
    <input type="text" class="form-control" placeholder="Enter rsId" id="modal_edit_fdName">
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
        <button type="button" id="btn_edit_submit" class="btn btn-primary">確定</button>
      </div>
    </div>
  </div>
</div>
</div>
