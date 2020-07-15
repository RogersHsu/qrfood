{{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"--}}
{{--        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--<span class="navbar-toggler-icon">--}}

{{--</span>--}}
{{--</button>--}}

<div class="collapse navbar-collapse" id="navbarSupportedContent">

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
</div>