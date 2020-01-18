<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="css/backend/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/backend/simple-sidebar.css" rel="stylesheet">

  <!-- Bootstrap core JavaScript -->
  <script src="js/backend/jquery/jquery.min.js"></script>
  <script src="js/backend/bootstrap/js/bootstrap.bundle.min.js"></script>

  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
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
<script>
$("#chooseLocation a").click(function(){
   var selText = $(this).text();
   $("#chooseLocation button").text(selText);
});
$("#chooseRestaurant a").click(function(){
   var selText = $(this).text();
   $("#chooseRestaurant button").text(selText);
});

$(document).ready( function () {

$.ajax({
    url : 'http://127.0.0.1:8000/food',
    type : 'GET',
    dataType : 'json',
    success : function(data) {
      console.log(data);
      bindtoDatatable(data);
    }
});



});

function bindtoDatatable(data) {
    var table = $('#example').dataTable({
        "bAutoWidth" : false,
        "aaData" : data,
        
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
          // {
          //   "data" : "protein"
          // }, {
          //   "data" : "fat"
          // }, {
          //   "data" : "saturatedFat"
          // }, {
          //   "data" : "transFat"
          // }, {
          //   "data" : "cholesterol"
          // }, {
          //   "data" : "carbohydrate"
          // }, {
          //   "data" : "sugar"
          // }, {
          //   "data" : "dietaryFiber"
          // },{
          //   "data" : "sodium"
          // },{
          //   "data" : "calcium"
          // },{
          //   "data" : "potassium"
          // },{
          //   "data" : "ferrum"
          // },

        ]
    })
}
</script>
</body>

</html>
