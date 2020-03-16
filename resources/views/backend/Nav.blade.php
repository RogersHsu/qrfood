<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <button class="btn btn-primary" id="menu-toggle">三</button>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown" id = "navbar_selectLocation" >
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    選擇食堂
                </a>
                <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown" >
                    {{--append location data in JS--}}
                </div>
            </li>
            <li class="nav-item dropdown" id = "navbar_selectRestaurant">
                <a class="nav-link dropdown-toggle" href="#" id="aaa" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    選擇餐廳
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    {{--append restaurant data in JS--}}
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
            </li>
            <li class="nav-item">
                <button type="button" id="btn_nav_del" class="btn btn-primary" data-toggle="modal"
                        data-target="#Modal_delete">
                    刪除
                </button>
            </li>
        </ul>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="Modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">刪除確認</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="del_tabledata_comfirm">
                    <table id="modal_del_datatable" class="ui celled table" style="margin:0px auto;">
                        <thead>
                        <tr>
                            <th>fdId</th>
                            <th>rsId</th>
                            <th>fdName</th>
                            <th>cId</th>
                            <th>克數</th>
                            <th>熱量</th>
                            <!-- <th>蛋白質</th>
                            <th>脂肪(總)</th>
                            <th>飽和脂肪</th>
                            <th>反式脂肪</th>
                            <th>膽固醇(毫克)</th>
                            <th>碳水化合物(總)</th>
                            <th>糖</th>
                            <th>膳食纖維</th>
                            <th>鈉(毫克)</th>
                            <th>鈣(毫克)</th>
                            <th>鉀(毫克)</th>
                            <th>鐵(毫克)</th> -->
                        </tr>
                        </thead>
                        <tbody>
                        <!-- data -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button type="button" id="btn_del_submit" class="btn btn-primary">確定</button>
                </div>
            </div>
        </div>
    </div>
</nav>