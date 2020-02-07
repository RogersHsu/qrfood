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
    
    
     $.ajax({
      'type':"GET",
      'dataType':'JSON',
      'url':"http://127.0.0.1:8000/food",
      'success':function(response){
        var fooddata = response.food;
        console.log(fooddata);
        //繪製DataTable
        var table = $('#example').DataTable({
      "bInfo" : false, //取消左下顯示Entries
      
      data : fooddata ,
      columns : [
          {
            "data" : null,
            defaultContent:"<input name = 'checkbox' type='checkbox'>",
          }, {
            "data" : "restaurant[0].rsName"
          }, {
            "data" : "fdName"
          }, {
            "data" : "category[0].cName"
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

        $('#modal_edit_rsName').attr('value',data['restaurant'][0]['rsName']);
        $('#modal_edit_fdName').attr('value',data['fdName']);
        $('#modal_edit_cName').attr('value',data['category'][0]['cName']);
        $('#modal_edit_gram').attr('value',data['gram']);
        $('#modal_edit_calorie').attr('value',data['calorie']);
        
        table.row($(this).parent().parent()).data(data).draw();
      });
      //提交修改內容
      $('#btn_edit_submit').on('click',function(){
        var data = edit_row.data();
        data['rsName'] = $('#modal_edit_rsName').val();
        data['fdName'] = $('#modal_edit_fdName').val();
        data['cName'] = $('#modal_edit_cName').val();
        data['gram'] = $('#modal_edit_gram').val();
        data['calorie'] = $('#modal_edit_calorie').val();
        $.ajax({
          url : 'http://127.0.0.1:8000/food',
          headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          type : 'PUT',
          data:JSON.stringify(data),
          contentType: "application/json;charset=utf-8",
          success : function(dataa) {
            console.log((data));
            edit_row.data(data).draw(); //重新繪製
            $('#Modal_edit').modal('hide');
           
          }
        });

       
      });

    //點選刪除欄位
    var data_json = new Array(); //要傳給後端的json資料
    var checkbox_checked_row_index = []; //已勾選欄位索引

    $('#btn_nav_del').click( function () {
      var checkbox = $('[name="checkbox"]');
      
      for(var key in checkbox){
        if(checkbox[key].checked == true)
          checkbox_checked_row_index.push(parseInt(key));
      }
      var data = table.rows(checkbox_checked_row_index).data();
      
      for(var key in data){
        if(isNaN(key)){
          break;
        }
        var object = new Object();
        object.fdId = data[key]['fdId'];
        data_json = data_json.concat(object);   
      }
      console.log(checkbox_checked_row_index);
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
      //確認刪除
     });
     $('#btn_del_submit').on("click",function(){
        $.ajax({
          url : 'http://127.0.0.1:8000/food',
          headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          type : 'delete',
          data:JSON.stringify(data_json),
          contentType: "application/json;charset=utf-8",
          success : function(data) {
            table.rows(checkbox_checked_row_index).remove().draw();
            checkbox_checked_row_index = [];
            $('#exampleModal').modal('hide');
          }
        });
     });
      },
      
    });
  
   
    
    
      
    
     
});
</script>
</body>

</html>
