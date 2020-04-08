/**
 * 渲染食物資料在表格內
 * 最後修改日期:2020/04/08
 */
$(document).ready(function () {
    $.ajax({
        'type': "GET",
        'dataType': 'JSON',
        'url': APP_URL + "/food",
        'success': function (response) {
            var fooddata = response;
            //繪製DataTable
            var table = $('#example').DataTable({
                "bInfo": false, //取消左下顯示Entries

                data: fooddata,
                columns: [
                    {
                        "data": "rsName"
                    }, {
                        "data": "fdName"
                    }, {
                        "data": null,
                        defaultContent: "<button id = 'view' class='btn btn-success' data-toggle='modal' data-target='#Modal_view'>查看/修改</button>",
                    }, {
                        "data": null,
                        defaultContent: "<button id = 'edit' class='btn btn-success' data-toggle='modal' data-target='#Modal_edit'>修改</button>",
                    }, {
                        "data": null,
                        defaultContent: "<input name = 'checkbox' type='checkbox'>",
                    }
                ],
            });

            var view_row; //被查看的那行
            var view_row_data;
            $('#example tbody').on('click', '#view', function () {
                view_row = table.row($(this).parent().parent());
                view_row_data = view_row.data();
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
                console.log(view_row_data);
            });

            var edit_row; //被編輯的那行
            var edit_row_data; //被編輯那行的資料
            //點選修改按鈕
            $('#example tbody').on('click', '#edit', function () {
                //設定表單值
                edit_row = table.row($(this).parent().parent());
                edit_row_data = edit_row.data();

                $('#modal_edit_rsName').attr('value', edit_row_data['rsName']);
                $('#modal_edit_fdName').attr('value', edit_row_data['fdName']);
                $('#modal_edit_cName').attr('value', edit_row_data['cName']);
                $('#modal_edit_gram').attr('value', edit_row_data['gram']);
                $('#modal_edit_calorie').attr('value', edit_row_data['calorie']);
            });
            //提交修改內容
            $('#btn_edit_submit').on('click', function () {
                var JsonData = {}; //要回傳後端的資料
                JsonData['fdId'] = edit_row_data['fdId'];
                JsonData['rsId'] = edit_row_data['rsId'];
                JsonData['cId'] = edit_row_data['cId'];
                JsonData['rsName'] = $('#modal_edit_rsName').val();
                JsonData['fdName'] = $('#modal_edit_fdName').val();
                JsonData['cName'] = $('#modal_edit_cName').val();
                JsonData['gram'] = $('#modal_edit_gram').val();
                JsonData['calorie'] = $('#modal_edit_calorie').val();

                $.ajax({
                    url: APP_URL + '/food',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'PUT',
                    data: JSON.stringify(JsonData),
                    contentType: "application/json;charset=utf-8",
                    success: function (response) {
                        var response = JSON.parse(response);
                        if (response.status == 1) {
                            edit_row_data['rsName'] = $('#modal_edit_rsName').val();
                            edit_row_data['fdName'] = $('#modal_edit_fdName').val();
                            edit_row_data['cName'] = $('#modal_edit_cName').val();
                            edit_row_data['gram'] = $('#modal_edit_gram').val();
                            edit_row_data['calorie'] = $('#modal_edit_calorie').val();
                            edit_row.data(edit_row_data).draw(); //重新繪製
                            $('#Modal_edit').modal('hide');
                            console.log(response);
                        } else {
                            alert(response.message);
                        }

                    }
                });


            });


            var data_json = new Array(); //要傳給後端的json資料
            var checkbox_checked_row_index = []; //已勾選欄位索引
            //當Modal被關閉時，欄位刷新
            $('#Modal_delete').on('hide.bs.modal', function (e) {
                data_json = new Array();
                checkbox_checked_row_index = [];
            });
            //點選刪除
            $('#btn_nav_del').click(function () {
                var checkbox = $('[name="checkbox"]');
                for (var key in checkbox) {
                    if (checkbox[key].checked == true)
                        checkbox_checked_row_index.push(parseInt(key));
                }
                var data = table.rows(checkbox_checked_row_index).data();

                for (var i = 0; i < data.length; i++) {
                    var object = new Object();
                    object.fdId = data[i]['fdId'];
                    data_json = data_json.concat(object);
                }
                //彈跳視窗上的DataTable
                // $('#modal_del_datatable').DataTable({
                //     data: data,
                //     destroy: true,
                //     "columns": [
                //         {
                //             "data": "fdId"
                //         }, {
                //             "data": "rsId"
                //         }, {
                //             "data": "fdName"
                //         }, {
                //             "data": "cId"
                //         }, {
                //             "data": "gram"
                //         }, {
                //             "data": "calorie"
                //         },
                //     ]
                // });
                //確認刪除
            });
            $('#btn_del_submit').on("click", function () {
                $.ajax({
                    url: 'http://localhost/food',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'delete',
                    data: JSON.stringify(data_json),
                    contentType: "application/json;charset=utf-8",
                    success: function (data) {
                        table.rows(checkbox_checked_row_index).remove().draw();
                        $('#Modal_delete').modal('hide');
                        console.log(data);
                    }
                });
            });

        },
    });
});
