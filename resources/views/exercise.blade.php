<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#submit').on("click",function(){
                var JsonArr = new Array();
                var JsonObject = new Object;
                JsonObject.fdName = $('#fdName').val();
                JsonObject.price = $('#price').val();
                JsonArr = JsonArr.concat(JsonObject); 
                $.ajax({
                    type:"post",
                    url:"{{ url('/exercise/create') }}",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:JSON.stringify(JsonArr),
                    dataType:"json",
                    contentType: "application/json;charset=utf-8",
                   
                    success:function(response){
                        //var data = JSON.parse(response);
                        console.log(response);
                        
                       // alert(data.fdName + " " + data.price);
                    },
                    error:function(response){
                        console.log(response);
                    }
                    
                })
            })
        })
     </script>
</head>
<body>

        <span>填寫食物名稱</span>
        <input id = "fdName" type = "text"></input> 
        <span>填寫價格</span>
        <input id = "price" type = "text"></input>
        <button id = "submit" type = "button">執行</button> 
  
</body>
</html>