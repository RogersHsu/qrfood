$(document).ready(function () {
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: APP_URL + '/restaurant/groupByLocation',
        success: function (response) {
            linstenSelectLocation(response);
            listenSelectRestaurant(response);
        }
    });
});

function linstenSelectLocation(response) {
    $('#navbar_selectLocation').on("click", ".nav_selectLocation_item", function () {

        $("#navbar_selectLocation a").html($(this).text());
        $("#navbar_selectRestaurant a").css("pointer-events", "");
        $("#navbar_selectRestaurant a").addClass("able");
        if($(this).text() === '不限食堂'){

            $("#navbar_selectRestaurant a").html('不限餐廳');
            $('#navbar_selectRestaurant div').empty(); //reset restuarant list
            $('#navbar_selectRestaurant div').css("display","none");
        }else{
            renderRestaurantList(response);

        }
    });
};

function listenSelectRestaurant(response) {
    $('#navbar_selectRestaurant').on("click", ".nav_selectRestaurant_item", function () {
        $("#navbar_selectRestaurant a").html($(this).text());
    });
};

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