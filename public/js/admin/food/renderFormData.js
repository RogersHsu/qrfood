/**
 * 渲染食物資料在表格內
 * 最後修改日期:2020/04/08
 */

$(document).ready(function () {
    renderDataTable();
    //查看指定餐廳
    $('#btn_search').on('click',function(){
        var rsName = $('#navbar_selectRestaurant a').text();
        if($('#navbar_selectRestaurant a').hasClass("able") == true) {
            drawDataTable(rsName);
        }
    });

    $('#form_create').submit(function (event) {
        event.preventDefault();
    });
    create();
});
function drawDataTable(rsName){
    if(rsName === '不限餐廳'){
        var url = APP_URL + "/food/";
        $.ajax({
            'type': "GET",
            'dataType': 'JSON',
            'url':  url,
            'success': function (response) {
                var datatable = $('#table').DataTable();
                datatable.clear().draw();
                datatable.rows.add(response); // Add new data
                datatable.draw(); // Redraw the DataTable

            }
        });
    }else{
        var url = APP_URL + "/food/" + rsName;
        $.ajax({
            'type': "GET",
            'dataType': 'JSON',
            'url':  url,
            'success': function (response) {
                var datatable = $('#table').DataTable();
                datatable.clear().draw();
                datatable.rows.add(response); // Add new data
                datatable.draw(); // Redraw the DataTable

            }
        });
    }
}
function create(){
    $(document).on('click','#btn_create_submit',function(){
        var form = $('#form_create');
        if(form[0].checkValidity() === false){

        }else{
            var fd = new FormData();
            fd.append("rsId",$('#modal_create_rsId').val());
            fd.append("fdName",$('#modal_create_fdName').val());
            fd.append("cId",$('#modal_create_cId').val());
            fd.append("gram",$('#modal_create_gram').val());
            fd.append("protein",$('#modal_create_protein').val());
            fd.append("calorie",$('#modal_create_calorie').val());
            fd.append("fat",$('#modal_create_fat').val());
            fd.append("saturatedFat",$('#modal_create_saturatedFat').val());
            fd.append("transFat",$('#modal_create_transFat').val());
            fd.append("cholesterol",$('#modal_create_cholesterol').val());
            fd.append("carbohydrate",$('#modal_create_carbohydrate').val());
            fd.append("sugar",$('#modal_create_sugar').val());
            fd.append("dietaryFiber",$('#modal_create_dietaryFiber').val());
            fd.append("sodium",$('#modal_create_sodium').val());
            fd.append("calcium",$('#modal_create_calcium').val());
            fd.append("potassium",$('#modal_create_potassium').val());
            fd.append("ferrum",$('#modal_create_ferrum').val());
            var image = $('#modal_create_image')[0].files[0];
            fd.append("photo",image);

            var url = APP_URL + "/food";
            $.ajax({
                url: url,
                type: 'POST',
                data: (fd),
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                contentType: false,
                processData: false,
                success:function(response){
                    if(response.status === '200'){
                        $data  = response.data;
                        $data['rsName'] = $('#modal_create_rsId option:selected').text();
                        $data['cName'] = $('#modal_create_cId option:selected').text();
                        var $arr = [];
                        $arr.push($data);
                        var datatable = $('#table').DataTable();
                        datatable.rows.add($arr); // Add new data
                        datatable.draw(); // Redraw the DataTable
                        $('#Modal_create').modal('hide');
                        $('#Modal_success').modal('show');
                    }
                },
            });        }

        // var JsonData = {};
        // JsonData['aa'] = 11;
        // console.log(JsonData);
        // console.log($('#modal_create_cId option:selected').html());
    });
}
function renderDataTable(){
    var url = APP_URL + "/food";
    $.ajax({
        'type': "GET",
        'dataType': 'JSON',
        'url':  url,
        'success': function (response) {
            //繪製DataTable
            var table = $('#table').DataTable({
                "bInfo": false, //取消左下顯示Entries
                fixedHeader: {
                    header: true,
                    // footer: true
                },

                data: response,
                columns: [
                    {
                        "data": "rsName"
                    }, {
                        "data": "fdName"
                    },
                    {
                        render: function (data, type, row, meta) {
                            return '<img style="height:50px;" src=' + row.photo + '>';
                        }
                    },
                    {
                        render: function (data, type, row, meta) {
                            return "<button class='btn btn-info column_view' data-toggle='modal' data-target='#Modal_view'>查看/修改</button>"
                        }
                    },
                    {
                        render: function (data, type, row, meta) {
                            return "<button class='btn btn-info column_image' data-toggle='modal' data-target='#Modal_image'>更換</button>"
                        }
                    },
                    {
                        render: function (data, type, row, meta) {
                            if (row.disable === 0)
                                return '<button type = "button " class = "btn btn-success column_status">顯示中</button>';
                            else
                                return '<button type = "button" class = "btn btn-danger column_status" >隱藏中</button>';

                        }
                    },


                ],
            });
            table.fixedHeader.headerOffset( -6 );

            changeFoodStatus(table);
            openEditFoodDataView(table);
            openEditImageView();
            openCreateView();
        },
    });
}
function openCreateView(){
    //輸入內容淨空
    $(document).on('click','#btn_nav_create',function(){
        $('#form_create input').val('');
    });
}
/**
 * 打開 食物資料的彈跳視窗
 * @param table
 */
function openEditFoodDataView(table){
    var view_row; //被查看的那行
    var view_row_data;
    $('#table tbody').on('click', '.column_view', function (event) {

        $(document).off("click", '#btn_view_submit'); //移除"修改"的監聽

        view_row = table.row($(this).parent().parent());
        view_row_data = view_row.data();
        renderRsNameDropdown(view_row_data['rsName'], view_row_data['rsId']);
        renderCategoryDropdown(view_row_data['cName'], view_row_data['cId']);
        $('#modal_view_rsName').val(view_row_data['rsName']);
        $('#modal_view_fdName').val(view_row_data['fdName']);
        $('#modal_view_cName').val(view_row_data['cName']);
        $('#modal_view_gram').val(view_row_data['gram']);
        $('#modal_view_calorie').val(view_row_data['calorie']);
        $('#modal_view_protein').val(view_row_data['protein']);
        $('#modal_view_fat').val(view_row_data['fat']);
        $('#modal_view_saturatedFat').val(view_row_data['saturatedFat']);
        $('#modal_view_transFat').val(view_row_data['transFat']);
        $('#modal_view_cholesterol').val(view_row_data['cholesterol']);
        $('#modal_view_carbohydrate').val(view_row_data['carbohydrate']);
        $('#modal_view_sugar').val(view_row_data['sugar']);
        $('#modal_view_dietaryFiber').val(view_row_data['dietaryFiber']);
        $('#modal_view_sodium').val(view_row_data['sodium']);
        $('#modal_view_calcium').val(view_row_data['calcium']);
        $('#modal_view_potassium').val(view_row_data['potassium']);
        $('#modal_view_ferrum').val(view_row_data['ferrum']);

        submitDataChange(view_row);//重送修改後的資料至後端

        // event.preventDefault();
    });
}
function openEditImageView(){
    var defaultImageUrl; //原本的圖片
    $('#table tbody').on('click','.column_image',function(event){
        $(document).off('click', '#but_upload'); //移除"修改"的監聽
        //清除input內的file
        $('#file').val('');
        //拿到該欄位的資料
        var table = $('#table').DataTable();
        var row = table.row($(this).parent().parent());
        var fdId = row.data()['fdId'];
        defaultImageUrl = row.data()['photo'];

        $('#previewImage').attr('src',defaultImageUrl); //在預覽畫面放上原本的圖片
        //預覽
        $("#file").on('change',function() {
            if(checkfile() == true){ //判斷檔名是否是圖檔
                readURL(this); //預覽上傳的圖片
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName); //input的文字變成上傳的檔名
            }else{ //
                $('#file').val(''); //清空input
                $(this).siblings(".custom-file-label").addClass("selected").html(''); //input的文字變成空白
                $(this).next().html('可接受的副檔名有.jpg .png'); //錯誤提醒
                $(' #previewImage').attr('src',defaultImageUrl); //畫面變為原本的圖片
            }
        });

        submitFoodImage(table,row); //送出更換請求

    });
    function readURL(input){
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#previewImage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    // Add the following code if you want the name of the file appear on select
    //判斷檔名是否是圖檔
    function checkfile() {
        var validExts = new Array(".png", ".jpg",".jpeg");
        var fileExt = $('#file').val();
        fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
        if (validExts.indexOf(fileExt) < 0) {
            return false;
        }else{
            return true;
        }
    }
}

/**
 * 更改食物照片
 * @param table
 * @param row
 */
function submitFoodImage(table,row){
    $(document).on('click',"#but_upload",function() {
        var form = $('#form_Image');
        if (form[0].checkValidity() === false) {

            }else{
            var fdId = row.data()['fdId'];
            var fd = new FormData();
            var files = $('#file')[0].files[0];
            fd.append('file', files);
            fd.append('food',"aa");
            $.ajax({
                url: APP_URL + '/food/' + fdId + '/photo',
                type: 'POST',
                // headers: { 'Content-Type' : 'application/x-www-form-urlencoded'},
                data: (fd),
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                contentType: false,
                processData: false,
                success: function(response) {
                    // response = JSON.parse(response);
                    row.data()['photo']=response['data']['photo']+"?"+Math.random();
                    row.data(row.data()).draw();
                    console.log(response);

                }
            });
        }

    });
}

/**
 * 更改食物資料
 * @param view_row
 */
function submitDataChange(view_row) {
    $(document).on("click", '#btn_view_submit', function () {
        var fdId = view_row.data()['fdId'];
        var form = document.getElementById('form_view');

        if (form.checkValidity() === false) {
            // event.preventDefault();
            // event.stopPropagation();
        } else {
            var JsonData = {}; //要回傳後端的資料
            JsonData['fdId'] = fdId;
            JsonData['fdName'] = $('#modal_view_fdName').val();
            JsonData['rsId'] = $('#modal_view_dropdown_rsName').val();
            JsonData['cId'] = $('#modal_view_dropdown_category').val();
            JsonData['gram'] = $('#modal_view_gram').val();
            JsonData['calorie'] = $('#modal_view_calorie').val();
            JsonData['protein'] = $('#modal_view_protein').val();
            JsonData['fat'] = $('#modal_view_fat').val();
            JsonData['saturatedFat'] = $('#modal_view_saturatedFat').val();
            JsonData['transFat'] = $('#modal_view_transFat').val();
            JsonData['cholesterol'] = $('#modal_view_cholesterol').val();
            JsonData['carbohydrate'] = $('#modal_view_carbohydrate').val();
            JsonData['sugar'] = $('#modal_view_sugar').val();
            JsonData['dietaryFiber'] = $('#modal_view_dietaryFiber').val();
            JsonData['sodium'] = $('#modal_view_sodium').val();
            JsonData['calcium'] = $('#modal_view_calcium').val();
            JsonData['potassium'] = $('#modal_view_potassium').val();
            JsonData['ferrum'] = $('#modal_view_ferrum').val();


            $.ajax({
                url: APP_URL + '/food/' + fdId,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'PUT',
                data: JSON.stringify(JsonData),
                contentType: "application/json;charset=utf-8",
                success: function (response) {
                    var response = JSON.parse(response);
                    if (response.status == 1) {
                        view_row.data()['fdName'] = $('#modal_view_fdName').val();
                        view_row.data()['rsName'] = $("#modal_view_dropdown_rsName option:selected").text();
                        view_row.data()['rsId'] = $('#modal_view_dropdown_rsName').val();
                        view_row.data()['cName'] = $("#modal_view_dropdown_category option:selected").text();
                        view_row.data()['cId'] = $('#modal_view_dropdown_category').val();
                        view_row.data()['gram'] = $('#modal_view_gram').val();
                        view_row.data()['calorie'] = $('#modal_view_calorie').val();
                        view_row.data()['protein'] = $('#modal_view_protein').val();
                        view_row.data()['fat'] = $('#modal_view_fat').val();
                        view_row.data()['saturatedFat'] = $('#modal_view_saturatedFat').val();
                        view_row.data()['transFat'] = $('#modal_view_transFat').val();
                        view_row.data()['cholesterol'] = $('#modal_view_cholesterol').val();
                        view_row.data()['carbohydrate'] = $('#modal_view_carbohydrate').val();
                        view_row.data()['sugar'] = $('#modal_view_sugar').val();
                        view_row.data()['dietaryFiber'] = $('#modal_view_dietaryFiber').val();
                        view_row.data()['sodium'] = $('#modal_view_sodium').val();
                        view_row.data()['calcium'] = $('#modal_view_calcium').val();
                        view_row.data()['potassium'] = $('#modal_view_potassium').val();
                        view_row.data()['ferrum'] = $('#modal_view_ferrum').val();
                        view_row.data(view_row.data()).draw();
                        $('#Modal_view').modal('hide');
                        $('#Modal_success').modal('show');
                    }
                }


            });

        }
    })
}


/**
 * 渲染[食物資料(查看/修改)] 下拉選單(分類) 的選項
 * @param default_cName 該食物原本的分類名稱
 * @param default_cId 該食物原本的分類ID
 */
function renderCategoryDropdown(default_cName, default_cId) {
    //clear all dropdown option
    $('#modal_view_dropdown_category').html("");

    var str = "<option value ='" + default_cId + "'>" + default_cName + "</option>";
    $('#modal_view_dropdown_category').append(str);

    $.ajax({
        url: APP_URL + '/category',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'GET',
        contentType: "application/json;charset=utf-8",
        success: function (response) {
            var text = "";
            for (i = 0; i < response.length; i++) {
                var cName = response[i].cName;
                var cId = response[i].cId;
                if (cName === default_cName) continue;
                text += "<option value ='" + cId + "'>" + cName + "</option>";
            }
            $('#modal_view_dropdown_category').append(text);
        }
    });
}

/**
 * 渲染[食物資料(查看/修改)] 下拉選單(餐廳名稱) 的選項
 * @param default_rsName 該食物原本的的餐廳名稱
 * @param default_rsId 該食物原本的餐廳ID
 */
function renderRsNameDropdown(default_rsName, default_rsId) {
    //clear all option
    $('#modal_view_dropdown_rsName').html("");

    //此食物的rsName
    var str = "<option value ='" + default_rsId + "'>" + default_rsName + "</option>";
    $('#modal_view_dropdown_rsName').append(str);

    $.ajax({
        // {{--<option value="1">One</option>--}}
        url: APP_URL + '/restaurant',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'GET',
        contentType: "application/json;charset=utf-8",
        success: function (response) {
            var text = "";
            for (i = 0; i < response.length; i++) {
                var rsName = response[i].rsName;
                var rsId = response[i].rsId;
                if (rsName === default_rsName) continue;
                text += "<option value ='" + rsId + "'>" + rsName + "</option>";
            }
            $('#modal_view_dropdown_rsName').append(text);
        }
    });
}

/**
 * 用於更改表單上食物的"狀態"
 * @param table 表格
 */
function changeFoodStatus(table) {
    $('#table tbody').on('dblclick', '.column_status', function () {

        var row = table.row($(this).parent().parent());
        var rowData = row.data();
        var fdId = rowData['fdId'];
        //建立傳送後端資料
        var dataJSON = {};
        dataJSON['disable'] = rowData['disable'];
        //判斷該筆資料目前是隱藏還是顯示中的狀態,以進行更換狀態
        if (rowData['disable'] === 0) {
            $.ajax({
                url: APP_URL + '/food/' + fdId,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'DELETE',
                data: JSON.stringify(dataJSON),
                contentType: "application/json;charset=utf-8",
                success: function (response) {
                    rowData['disable'] = 1;
                    row.data(rowData).draw(); //重新繪製rowData的資料
                    change_ModalStatus_style();
                }
            });
        } else {
            $.ajax({
                url: APP_URL + '/food/' + fdId + '/restore',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'PUT',
                data: JSON.stringify(dataJSON),
                contentType: "application/json;charset=utf-8",
                success: function (response) {
                    rowData['disable'] = 0;
                    row.data(rowData).draw(); //重新繪製rowData的資料
                    change_ModalStatus_style();
                }
            });
        }
    });
}

/**
 * ajax成功後,更改ModalStatus按鈕的狀態
 */
function change_ModalStatus_style() {
    $('#Modal_success').modal('show'); //顯示狀態更改成功
    if ($(this).hasClass('btn-danger')) {
        $(this).removeClass('btn-danger');
        $(this).addClass('btn-success');
        $(this).text("顯示中");
    } else {
        $(this).removeClass('btn-success');
        $(this).addClass('btn-danger');
        $(this).text("隱藏中");
    }
}
