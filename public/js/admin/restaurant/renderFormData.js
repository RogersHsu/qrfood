$(document).ready(function () {
    $('#btn_search').on('click', function () {
        var location = $('#navbarDropdown').text();
        console.log(location);
        if ($('#navbarDropdown').hasClass("able") == true) {
            drawDataTable(location);
            // console.log("aa");
        }
    });
    renderDataTable();

});


function drawDataTable(location) {

        var url = APP_URL + "/restaurant/" + location;
        $.ajax({
            'type': "GET",
            'dataType': 'JSON',
            'url': url,
            'success': function (response) {
                var datatable = $('#resTable').DataTable();
                datatable.clear().draw();
                datatable.rows.add(response); // Add new data
                datatable.draw(); // Redraw the DataTable
            }
        });

}

function renderDataTable() {
    var url = APP_URL + "/restaurant";
    $.ajax({
        'type': "GET",
        'dataType': 'JSON',
        'url': url,
        'success': function (response) {
            //繪製DataTable
            var table = $('#resTable').DataTable({
                "bInfo": false, //取消左下顯示Entries
                fixedHeader: {
                    header: true,
                    // footer: true
                },

                data: response,
                columns: [
                    {
                        "data": "location"
                    }, {
                        "data": "rsName"
                    },
                    {
                        render: function (data, type, row, meta) {
                            return "<button class='btn btn-info column_res_view' data-toggle='modal' data-target='#Modal_Res_view'>查看/修改</button>"
                        }
                    },


                ],
            });
            table.fixedHeader.headerOffset(-6);

            // changeFoodStatus(table);
            openEditRestaurantDataView(table);
            // openEditImageView();
            openCreateView();
            createRestaurantData(table);
        },
    });
}
function createRestaurantData(table){
    $(document).on("click", '#btn_create_submit', function () {
        var JsonData = {};
        JsonData['location'] = $('#modalCreate_resLocation').val();
        JsonData['rsName'] = $('#modalCreate_resRsName').val();

        $.ajax({
            url: APP_URL + '/restaurant',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            data: JSON.stringify(JsonData),
            contentType: "application/json;charset=utf-8",
            success: function (response) {
                // console.log(response);
                // var response = JSON.parse(response);
                if (response.status == 1) {
                    table.row.add(response.data).draw();
                    $('#Modal_Res_create').modal('hide');
                    $('#Modal_success').modal('show');
                }
            }


        });
    });
}
function openCreateView(){

}
function openEditRestaurantDataView(table) {
    var view_row; //被查看的那行
    var view_row_data;
    $('#resTable tbody').on('click', '.column_res_view', function (event) {
        $(document).off("click", '#btn_view_submit'); //移除"修改"的監聽

        view_row = table.row($(this).parent().parent());
        view_row_data = view_row.data();


        $('#modalView_resLocation').val(view_row_data['location']);

        $('#modal_view_res_rsName').val(view_row_data['rsName']);

        submitDataChange(view_row);//重送修改後的資料至後端

    });

}


/**
 * 更改餐廳資料
 * @param view_row
 */
function submitDataChange(view_row) {
    $(document).on("click", '#btn_view_submit', function () {
        var rsId = view_row.data()['rsId'];
        var form = document.getElementById('form_view');

        if (form.checkValidity() === false) {
            // event.preventDefault();
            // event.stopPropagation();
        } else {
            var JsonData = {}; //要回傳後端的資料
            JsonData['rsId'] = rsId;
            JsonData['location'] = $('#modalView_resLocation').val();
            JsonData['rsName'] = $('#modal_view_res_rsName').val();



            $.ajax({
                url: APP_URL + '/restaurant/' + rsId,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'PUT',
                data: JSON.stringify(JsonData),
                contentType: "application/json;charset=utf-8",
                success: function (response) {
                    console.log(response);
                    var response = JSON.parse(response);
                    if (response.status == 1) {
                        view_row.data()['location'] = $('#modalView_resLocation').val();
                        view_row.data()['rsName'] = $('#modal_view_res_rsName').val();
                        view_row.data(view_row.data()).draw();
                        $('#Modal_Res_view').modal('hide');
                        $('#Modal_success').modal('show');
                    }
                }


            });

        }
    })
}