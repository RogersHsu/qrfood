<div style="padding-top:0px;padding-bottom:0px;">
<ul class="nav ml-auto mt-2 mt-lg-0">
    <li class="nav-item dropdown ml-auto" id="navbar_selectLocation">
        <a class="nav-link dropdown-toggle btn btn-info" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false">
            選擇食堂
        </a>
        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
            @foreach($location as $key => $data)
                <span class="dropdown-item nav_selectLocation_item" style="text-align: center;">{{$data->location}}</span>
            @endforeach
                <span class="dropdown-item nav_selectLocation_item" style="text-align: center;">不限食堂</span>

{{--                <script>--}}
{{--                $('#navbar_selectLocation .nav_selectLocation_item').on("click", function () {--}}
{{--                    $("#navbar_selectLocation a").html($(this).text());--}}
{{--                    $("#navbar_selectRestaurant a").css("pointer-events", "");--}}
{{--                });--}}
{{--            </script>--}}

        </div>
    </li>

    <li class="nav-item dropdown " id="navbar_selectRestaurant" style="padding-left: 10px;margin-right: 10px;">


        <a class="nav-link dropdown-toggle btn btn-info" href="#" id="aaa" role="button" data-toggle="dropdown"
           aria-haspopup="true" aria-expanded="false" style="pointer-events: none;">
            選擇餐廳
        </a>

        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
        </div>
    </li>
    <li class="nav-item">
{{--        <button id = "btn_search" class="btn btn-success">搜尋</button>--}}
        <a class="nav-link btn btn-info "id = "btn_search" href="#">
            <i class="fas fa-search" style = ></i>
        </a>
    </li>

    <li class="nav-item ml-auto dropdown">
        <a type="button" id="btn_nav_create" class="btn btn-warning nav-link dropdown-toggle" data-toggle="dropdown">
            <i class="fas fa-plus"></i>
            新增食物
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

            <span class="dropdown-item content_insertSingle_item" style="text-align: center;">單筆新增</span>
            <span class="dropdown-item content_insertExcel_item" style="text-align: center;">匯入EXCEL</span>
            <script>
                $(".content_insertSingle_item").on("click",function(){

                    $('#Modal_create').modal('show');
                });
                $(".content_insertExcel_item").on("click",function(){

                    $('#Modal_create_excel').modal('show');
                });
            </script>
        </div>
    </li>
</ul>
</div>
<div id="tableArea" class="container-fluid mb-3">
        <table id="table" class="table table-striped table-bordered" style="text-align: center;width:100%;">
        <thead>
        <tr>

            <th>餐廳名稱</th>
            <th>食物名稱</th>
            <th>圖片</th>
            <th>食物資料</th>
            <th>圖片</th>
            <th>
                <span>狀態</span>
                <button id ="statusExplanation" class="btn btn-warning" style="padding: 0px 4px 0px 4px;"
                        data-toggle='modal' data-target='#Modal_image'>
                    <i class="fas fa-exclamation-circle"></i>
                </button>
                <script>
                    $('#statusExplanation').click(function(event){
                        $('#Modal_statusExplanation').modal('show');
                        event.stopPropagation();
                    });
                </script>
            </th>

        </tr>
        </thead>
        <tbody>
        <!-- render data in public/js/admin/food/renderFormData.js -->
        </tbody>

    </table>
</div>
