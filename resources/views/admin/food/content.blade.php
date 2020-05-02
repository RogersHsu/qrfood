<ul class="navbar-nav ml-auto   mt-2 mt-lg-0">

    <li class="nav-item dropdown" id="navbar_selectLocation">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">
            選擇食堂
        </a>
        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
            @foreach($location as $key => $data)
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
        <button id = "btn_search" class="btn btn-success">搜尋</button>
    </li>
</ul>
<ul class="navbar-nav ml-auto mt-2 mt-lg-0">



    <li class="nav-item">
        <button type="button" id="btn_nav_create" class="btn btn-primary" data-toggle="modal"
                data-target="#Modal_create">
            新增
        </button>

    </li>
</ul>

<div id="tableArea" class="container-fluid" style="width:100% ;">
    <table id="table" class="table table-striped table-bordered" style="text-align: center">
        <thead>
        <tr>

            <th>餐廳名稱</th>
            <th>食物名稱</th>
            <th>圖片</th>
            <th style="width:10%">食物資料</th>
            <th style="width:10%">圖片</th>
            <th style="width:10%"><span>狀態
                <i class="fas fa-file balloon" balloon-data="Hello." style = ></i>
                </span></th>

        </tr>
        </thead>
        <tbody>
        <!-- render data in public/js/admin/food/renderFormData.js -->
        </tbody>

    </table>
</div>
