<div style="padding-top:5px;padding-bottom:5px;">
    <ul class="nav ml-auto mt-2 mt-lg-0">

        <li class="nav-item ml-auto dropdown">
            <a type="button" id="btn_nav_create" class="btn btn-warning nav-link dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-plus"></i>
                新增食物類別
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                <span id = "content_insertSingle_item" class="dropdown-item content_insertSingle_item" style="text-align: center;">單筆新增</span>
                <script>
                    $(".content_insertSingle_item").on("click",function(){

                        $('#Modal_create').modal('show');

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
            <th>食物類型名稱</th>
            <th>修改資料</th>
            {{--            <th>--}}
            {{--                <span>狀態</span>--}}
            {{--                <button id ="statusExplanation" class="btn btn-warning" style="padding: 0px 4px 0px 4px;"--}}
            {{--                        data-toggle='modal' data-target='#Modal_image'>--}}
            {{--                    <i class="fas fa-exclamation-circle"></i>--}}
            {{--                </button>--}}
            {{--                <script>--}}
            {{--                    $('#statusExplanation').click(function(){--}}
            {{--                        $('#Modal_statusExplanation').modal('show');--}}
            {{--                        event.stopPropagation();--}}
            {{--                    });--}}
            {{--                </script>--}}
            {{--            </th>--}}

        </tr>
        </thead>
        <tbody>
        <!-- render data in public/js/admin/food/renderFormData.js -->
        </tbody>

    </table>
</div>
