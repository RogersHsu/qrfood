<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="css/backend/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/backend/simple-sidebar.css" rel="stylesheet">

  <!-- Bootstrap core JavaScript -->
  <script src="js/backend/jquery/jquery.min.js"></script>
  <script src="js/backend/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- 用於表格選取-->

  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>  -->
  
   <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script> 
</head>

<body>

  <div class="d-flex" id="wrapper">
    
    @include('backend.Sidebar')
    <!-- Page Content -->
    <div id="page-content-wrapper" style="">
    @include('backend.Nav')
    @include('backend.Content')
    

    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->


  <!-- Menu Toggle Script -->
<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
</script>
<!-- 選擇食堂/餐廳 Script -->
<script>
  $("#chooseLocation a").click(function(){
    var selText = $(this).text();
    $("#chooseLocation button").text(selText);
  });
  $("#chooseRestaurant a").click(function(){
    var selText = $(this).text();
    $("#chooseRestaurant button").text(selText);
  });
</script>
<!--Datatable Script -->
<script>
  $(document).ready(function(){
    var arr = new Array();
    //繪製DataTable
    var table = $('#example').DataTable({
      "bInfo" : false, //取消左下顯示Entries
      ajax: {
        url:"http://127.0.0.1:8000/food",
        dataSrc:''
      },
      "columns" : [
          {
            "data" : "fdId"
          }, {
            "data" : "rsId"
          }, {
            "data" : "fdName"
          }, {
            "data" : "cId"
          }, {
            "data" : "gram"
          }, {
            "data" : "calorie"
          },{
            "data" : null,
            defaultContent:"<button class='btn btn-success' data-toggle='modal' data-target='#Modal_edit'>修改</button>",
          }
        ],
      });
      
      var edit_row ; //要修改內容的row
      //點選修改按鈕
      $('#example tbody').on('click','button',function(){
        //設定表單值
        edit_row = table.row($(this).parent().parent());
        var data = edit_row.data();
        $('#modal_edit_fdId').attr('value',data['fdId']);
        $('#modal_edit_rsId').attr('value',data['rsId']);
        $('#modal_edit_fdName').attr('value',data['fdName']);
        $('#modal_edit_cId').attr('value',data['cId']);
        $('#modal_edit_gram').attr('value',data['gram']);
        $('#modal_edit_calorie').attr('value',data['calorie']);
        table.row($(this).parent().parent()).data(data).draw();
        console.log(data);
      });
      //提交修改內容
      $('#btn_edit_submit').on('click',function(){
        var data = edit_row.data();
        data['fdId'] = $('#modal_edit_fdId').val();
        data['rsId'] = $('#modal_edit_rsId').val();
        data['fdName'] = $('#modal_edit_fdName').val();
        data['cId'] = $('#modal_edit_cId').val();
        data['gram'] = $('#modal_edit_gram').val();
        data['calorie'] = $('#modal_edit_calorie').val();
        edit_row.data(data).draw(); //重新繪製
        $('#Modal_edit').modal('hide');
      });
    //點選欄位反白
    $('#example tbody').on( 'click','tr', function (){
      $(this).toggleClass('selected');
    });
    //點選刪除欄位
    $('#btn_nav_del').click( function () {
      var object = new Object();
      var data = table.rows('.selected').data().toArray();
      
      for(var key in data){
          object.fdId = data[key]['fdId'];
          arr = arr.concat(object); 
          object = new Object();
      }
      //彈跳視窗上的DataTable
      $('#modal_del_datatable').DataTable( {
        data: data,
        destroy:true,
        "columns" : [
          {
            "data" : "fdId"
          }, {
            "data" : "rsId"
          }, {
            "data" : "fdName"
          }, {
            "data" : "cId"
          }, {
            "data" : "gram"
          }, {
            "data" : "calorie"
          }, 
        ]
      });
    });
    //確認刪除
    $('#btn_del_submit').on("click",function(){
        $.ajax({
          url : 'http://127.0.0.1:8000/food',
          headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          type : 'delete',
          data:JSON.stringify(arr),
          contentType: "application/json;charset=utf-8",
          success : function(data) {
            console.log(data);
            table.rows('.selected').remove().draw();
            $('#exampleModal').modal('hide');
          }
        });
        
    });
});
</script>
</body>

</html>
