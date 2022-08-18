<nav class="navbar navbar-default" id="fixed">
    <div class="container">
            <p> {{ session()->has("user") ? "Hi ".session("user")->firstName." ". session("user")->lastName : "" }}</p>
        <div class="navbar-header page-scroll" id="pScroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="MB">
                <a class="navbar-brand page-scroll" href="{{route("home")}}"><h1><mark>FURNITURE.</mark>minimalistic</h1></a>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                    @if(session()->has("user"))
                        @if(session()->get("user")->roles_id == 1)
                            @foreach($menusA as $ma)
                                <li>
                                    <a class="page-scroll" href="{{route("$ma->route")}}">{{$ma->name}}
                                        @if($ma->name=="Cart") <i class="fa-solid fa-cart-shopping"><span id="countCart">0</span></i> @endif</a>
                                </li>
                            @endforeach
                        @else
                            @foreach($menusU as $mu)
                                <li>
                                    <a class="page-scroll" href="{{route("$mu->route")}}">{{$mu->name}}
                                        @if($mu->name=="Cart") <i class="fa-solid fa-cart-shopping"><span id="countCart">0</span></i> @endif</a>
                                </li>
                            @endforeach
                        @endif
                    @else
                        @foreach($menusO as $mo)
                        <li>
                            <a class="page-scroll" href="{{route("$mo->route")}}">{{$mo->name}}</a>
                        </li>
                        @endforeach
                    @endif
            </ul>
        </div>
    </div>
</nav>
