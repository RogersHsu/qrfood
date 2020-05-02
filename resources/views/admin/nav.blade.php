<ul class="navbar-nav ml-auto mt-2 mt-lg-0">

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
            aria-haspopup="true" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>

        <ul class="dropdown-menu">
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    登出
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
</ul>