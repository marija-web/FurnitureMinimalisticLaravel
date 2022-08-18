<div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <a href="/" class="simple-text logo-normal">
                FURNITURE.   minimalistic
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                @foreach($menuAdmin as $m)
                    <li>
                        <a href="{{$m['link']}}">
                            <i class="nc-icon {{$m['icon']}}"></i>
                            <p>{{$m['name']}}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
</div>
