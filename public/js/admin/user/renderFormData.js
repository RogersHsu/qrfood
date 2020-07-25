$(document).ready(function () {
    renderDataTable();
});

function renderDataTable() {
    var url = APP_API_URL + "/user";
    $.ajax({
        'type': "GET",
        'dataType': 'JSON',
        'url': url,
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
                        "data": "name"
                    },{
                        render: function (data, type, row, meta) {
                            if(row.role == 2){
                                return "管理員";
                            }else{
                                return "一般使用者";
                            }
                        }
                    }, {
                        "data": "email"
                    },{
                        "data": "account"
                    },{
                        render: function (data, type, row, meta) {
                            if(row.gender == 1){
                                return "男";
                            }else{
                                return "女";
                            }
                        }
                    },{
                        "data": "height"
                    },{
                        "data": "weight"
                    },
                    {
                        "data": "exercise"
                    },
                    {
                        render: function (data, type, row, meta) {
                            return "<button class='btn badge-info column_edit' data-toggle='modal' data-target='#modal_edit'>編輯</button>" +
                                " <button class='btn btn-danger column_del'>刪除</button>";
                        }
                    },


                ],
            });
            table.fixedHeader.headerOffset(-6);

            // changeFoodStatus(table);
            openEditUserDataView(table);
            // openEditImageView();
            openCreateView();
            createUserData(table);
            delUser(table);
            // createRestaurantData(table);
        },
    });
}
function openCreateView(){
    $(document).on('click', '.content_insertSingle_item', function () {
        $('#modal_create_name').val('');
        $('#modal_create_account').val('');
        $('#modal_create_password').val('');
        $('#modal_create_email').val('');
        $('#modal_create_height').val('');
        $('#modal_create_weight').val('');
        $("#btn_create_submit").attr("disabled", false);
    });2
}
function delUser(table){
    $('#table tbody').on('click', '.column_del', function (event) {
        var view_row; //被查看的那行
        var view_row_data;
        view_row = table.row($(this).parent().parent());
        view_row_data = view_row.data();
        $('#modal_del_comfirm').modal('show');
        var uId = view_row_data['uId'];
        $(document).on("click", '#btn_del_submit', function () {
            console.log("aa");
            $.ajax({
                url: APP_API_URL + '/user/' + uId,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'DELETE',
                contentType: "application/json;charset=utf-8",
                success: function (response) {
                    $('#modal_del_comfirm').modal('hide');
                    $('#Modal_success').modal('show');
                    view_row.remove().draw();
                }
        });



        });
    });
}
function createUserData(table){
    $(document).on("click", '#btn_create_submit', function () {
        var JsonData = {};
        JsonData['name'] = $('#modal_create_name').val();
        JsonData['role'] = $('#modal_create_role').val();
        JsonData['account'] = $('#modal_create_account').val();
        JsonData['password'] = $('#modal_create_password').val();
        JsonData['email'] = $('#modal_create_email').val();
        JsonData['gender'] = $('#modal_create_gender').val();
        JsonData['height'] = $('#modal_create_height').val();
        JsonData['weight'] = $('#modal_create_weight').val();
        JsonData['exercise'] = $('#modal_create_exercise').val();

        var form = $('#form_create');
        if (form[0].checkValidity() == false) {
            console.log("false");
        }else{
            $("#btn_create_submit").attr("disabled", true);
            $.ajax({
                url: APP_API_URL + '/user',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                data: JSON.stringify(JsonData),
                contentType: "application/json;charset=utf-8",
                success: function (response) {
                    console.log(response);
                    if (response.status == 1) {
                        table.row.add(response.data).draw();
                        $('#modal_create').modal('hide');
                        $('#Modal_success').modal('show');
                    }
                }
            });
        }

    });
}

function openEditUserDataView(table) {
    var view_row; //被查看的那行
    var view_row_data;
    $('#table tbody').on('click', '.column_edit', function (event) {
        $(document).off("click", '#btn_view_submit'); //移除"修改"的監聽

        view_row = table.row($(this).parent().parent());
        view_row_data = view_row.data();

        console.log(view_row_data);
        $('#modal_edit_name').val(view_row_data['name']);
        $('#modal_edit_email').val(view_row_data['email']);
        $('#modal_edit_account').val(view_row_data['account']);
        $('#modal_edit_height').val(view_row_data['height']);
        $('#modal_edit_weight').val(view_row_data['weight']);

        if(view_row_data['role'] == 1){
            $('#modal_edit_role').val(1);
        }else{
            $('#modal_edit_role').val(2);
        }
        if(view_row_data['gender'] == 1){
            $('#modal_edit_gender').val(1);
        }else{
            $('#modal_edit_gender').val(2);
        }

        switch (view_row_data['exercise'])
        {
            case 1:
                $('#modal_edit_exercise').val(1);
                console.log(view_row_data['exercise']);
                break;
            case 2:
                $('#modal_edit_exercise').val(2);
                break;
            case 3:
                $('#modal_edit_exercise').val(3);
                break;
            case 4:
                $('#modal_edit_exercise').val(4);

                break;
        }

         submitDataChange(view_row);//重送修改後的資料至後端

    });

}


/**
 * 更改餐廳資料
 * @param view_row
 */
function submitDataChange(view_row) {
    $(document).on("click", '#btn_edit_submit', function () {
        var uId = view_row.data()['uId'];
        var form = document.getElementById('form_edit');

        if (form.checkValidity() === false) {
            // event.preventDefault();
            // event.stopPropagation();
        } else {
            var JsonData = {}; //要回傳後端的資料
            JsonData['uId'] = uId;
            JsonData['name'] = $('#modal_edit_name').val();
            JsonData['role'] = $('#modal_edit_role').val();
            JsonData['account'] = $('#modal_edit_account').val();
            JsonData['email'] = $('#modal_edit_email').val();
            JsonData['gender'] = $('#modal_edit_gender').val();
            JsonData['height'] = $('#modal_edit_height').val();
            JsonData['weight'] = $('#modal_edit_weight').val();
            JsonData['exercise'] = $('#modal_edit_exercise').val();



            $.ajax({
                url: APP_API_URL + '/user/' + uId,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'PUT',
                data: JSON.stringify(JsonData),
                contentType: "application/json;charset=utf-8",
                success: function (response) {
                    console.log(response);
                    var response = JSON.parse(response);
                    if (response.status == 1) {
                        view_row.data()['name'] = $('#modal_edit_name').val();
                        view_row.data()['role'] = $('#modal_edit_role').val();
                        view_row.data()['gender'] = $('#modal_edit_gender').val();
                        view_row.data()['email'] = $('#modal_edit_email').val();
                        view_row.data()['account'] = $('#modal_edit_account').val();
                        view_row.data()['height'] = $('#modal_edit_height').val();
                        view_row.data()['weight'] = $('#modal_edit_weight').val();
                        view_row.data()['exercise'] = $('#modal_edit_exercise').val();

                        view_row.data(view_row.data()).draw();
                        $('#modal_edit').modal('hide');
                        $('#Modal_success').modal('show');
                    }
                }


            });

        }
    })
}