/***
 * 用於指定餐廳、食堂搜尋
 */
$(document).ready(function () {
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: APP_API_URL + '/restaurant/groupByLocation',
        success: function (response) {
            linstenSelectLocation(response);
            listenSelectRestaurant(response);
        }
    });
    $('#btn_search').on('click', function () {
        var rsName = $('#navbar_selectRestaurant a').text();
        if ($('#navbar_selectRestaurant a').css('pointer-events') == 'auto') { //可點擊
            drawDataTable(rsName);
        }
    });
});

/**
 * 重新渲染Datatable
 * @param rsName 餐廳名稱
 */
function drawDataTable(rsName) {
    if (rsName === '不限餐廳') {
        var url = APP_API_URL + "/food";
        $.ajax({
            'type': "GET",
            'dataType': 'JSON',
            'url': url,
            'success': function (response) {
                var datatable = $('#table').DataTable();
                datatable.clear();
                datatable.rows.add(response); // Add new data
                datatable.draw(); // Redraw the DataTable

            }
        });
    } else {
        var url = APP_API_URL + "/food/" + rsName;
        $.ajax({
            'type': "GET",
            'dataType': 'JSON',
            'url': url,
            'success': function (response) {
                var datatable = $('#table').DataTable();
                datatable.clear();
                datatable.rows.add(response); // Add new data
                datatable.draw(); // Redraw the DataTable

            }
        });
    }
}
/***
 * 選擇指定食堂
 * @param response 各個食堂的餐廳
 */
function linstenSelectLocation(response) {
    $('#navbar_selectLocation').on("click", ".nav_selectLocation_item", function () {
        $("#navbar_selectLocation a").html($(this).text());
        $("#navbar_selectRestaurant a").css("pointer-events", "");
        if($(this).text() === '不限食堂'){
            $("#navbar_selectRestaurant a").html('不限餐廳');
            $('#navbar_selectRestaurant div').empty(); //reset restuarant list
            $('#navbar_selectRestaurant div').css("display","none");
        }else{
            renderRestaurantList(response);
        }
    });
};

/***
 * 選擇指定餐廳
 * @param response
 */
function listenSelectRestaurant(response) {
    $('#navbar_selectRestaurant').on("click", ".nav_selectRestaurant_item", function () {
        $("#navbar_selectRestaurant a").html($(this).text());
    });
};

/***
 * 選擇食堂後，渲染餐廳 item
 * @param response
 */
function renderRestaurantList(response) {
    $('#navbar_selectRestaurant div').empty(); //reset restuarant list
    $('#navbar_selectRestaurant div').css("display",""); //移除display屬性
    var location = $("#navbar_selectLocation a").text();
    for (var key in response.data) {
        if (location == response.data[key].location) {
            for (var res in response.data[key].restaurant) {
                var data = response.data[key].restaurant[res].rsName;
                var str = "<span " +
                    "class = \"dropdown-item nav_selectRestaurant_item\" >" +
                    data +
                    "</span>";
                $("#navbar_selectRestaurant div").append(str);
            }
            $("#navbar_selectRestaurant a").html(response.data[key].restaurant[0].rsName); //default selectRestaurant
        }
    }
};