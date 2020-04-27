<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto   mt-2 mt-lg-0">

        <li class="nav-item dropdown" id="navbar_selectLocation">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                選擇食堂
            </a>
            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                @foreach($restaurantName as $key => $data)
                    <span class="dropdown-item nav_selectLocation_item">{{$data->location}}</span>
                @endforeach
                <script>
                    $('#navbar_selectLocation .nav_selectLocation_item').on("click", function () {
                        $("#navbar_selectLocation a").html($(this).text());
                        $("#navbar_selectRestaurant a").css("pointer-events", "");
                    });
                </script>

            </div>
        </li>

        <li class="nav-item dropdown" id="navbar_selectRestaurant">


            <a class="nav-link dropdown-toggle" href="#" id="aaa" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false" style="pointer-events: none;">
                選擇餐廳
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                {{--append restaurant data in JS--}}
                <script src="js/admin/food/renderRestaurantList.js"></script>
            </div>
        </li>
        <li class="nav-item">
            <button class="btn btn-success">搜尋</button>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">


        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                新增
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">單筆新增</a>
                <a class="dropdown-item" href="#">批量新增</a>
            </div>
        </li>
        <li class="nav-item">
            <button type="button" id="btn_nav_del" class="btn btn-primary" data-toggle="modal"
                    data-target="#Modal_delete">
                刪除
            </button>
        </li>
    </ul>
</div>
