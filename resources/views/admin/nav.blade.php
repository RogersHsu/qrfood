<ul class="navbar-nav ml-auto mt-2 mt-lg-0">

    <li class="dropdown">
        <a href="#" class="dropdown-toggle btn btn-info" data-toggle="dropdown" role="button" aria-expanded="false"
            aria-haspopup="true" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu dropdown-menu-right">
            <li>
                <span class="dropdown-item" style="text-align: center;" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    登出
                </span>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
</ul>