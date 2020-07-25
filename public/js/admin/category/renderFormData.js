$(document).ready(function () {
    renderDataTable();
});

/**
 * 對DataTable進行操作
 */
function renderDataTable() {
    var url = APP_API_URL + "/category";
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
                        "data": "cName"
                    },
                    {
                        render: function (data, type, row, meta) {
                            return "<button class='btn btn-info column_category_view' data-toggle='modal' data-target='#Modal_Cat_view'>查看/修改</button>"
                        }
                    },


                ],
            });
            table.fixedHeader.headerOffset(-6);

            renderEditCategoryDataView();
            createCategoryData();
            clearCreateViewData();
        },
    });
}

/**
 * 清除「新增視窗」的舊值
 */
function clearCreateViewData() {
    //輸入內容淨空
    $(document).on('click', '#content_insertSingle_item', function () {
        $('#modalCreate_cName').val('');
        $("#btn_create_submit").attr("disabled", false);
    });
}

/**
 * 打開編輯資料視窗、渲染內容
 */
function renderEditCategoryDataView() {
    var view_row ; //被查看的那行
    var view_row_data;
    var table = $('#table').DataTable();
    $('#table tbody').on('click', '.column_category_view', function (event) {
        view_row = table.row($(this).parent().parent());
        view_row_data = view_row.data();
        $(document).off("click", '#btn_view_submit'); //移除"修改"的監聽
        $('#modalView_cName').val(view_row_data['cName']);
        submitEditDataChange(view_row);//重送修改後的資料至後端

    });
}

/**
 * 編輯、更改分類資料
 * @param view_row
 */
function submitEditDataChange(view_row) {
    $(document).on("click", '#btn_view_submit', function () {
        var cId = view_row.data()['cId'];
        var form = document.getElementById('form_view');

        if (form.checkValidity() === false) {

        } else {
            var JsonData = {}; //要回傳後端的資料
            JsonData['cId'] = cId;
            JsonData['cName'] = $('#modalView_cName').val();
            $.ajax({
                url: APP_API_URL + '/category/' + cId,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'PUT',
                data: JSON.stringify(JsonData),
                contentType: "application/json;charset=utf-8",
                success: function (response) {
                    var response = JSON.parse(response);
                    if (response.status == 1) {

                        view_row.data()['cName'] = $('#modalView_cName').val();
                        view_row.data(view_row.data()).draw();
                        $('#Modal_Cat_view').modal('hide');
                        $('#Modal_success').modal('show');
                    }
                }
            });

        }
    })
}

/**
 * 新增一筆分類資料
 * @param table
 */
function createCategoryData(){
    var table = $('#table').DataTable();
    $(document).on("click", '#btn_create_submit', function () {
        var JsonData = {};
        JsonData['cName'] = $('#modalCreate_cName').val();
        var form = document.getElementById('form_create');
        if (form.checkValidity() === false) {

        }else{
            $("#btn_create_submit").attr("disabled", true);

            $.ajax({
                url: APP_API_URL + '/category',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                data: JSON.stringify(JsonData),
                contentType: "application/json;charset=utf-8",
                success: function (response) {
                    if (response.status == 1) {
                        table.row.add(response.data).draw();
                        $('#Modal_create').modal('hide');
                        $('#Modal_success').modal('show');
                    }
                }
            });
        }


    });
}