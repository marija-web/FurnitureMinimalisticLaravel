<div class="col-md-6 MB">
    <div class="team-item ">
        <div class="team-image">
            <a href="/show/{{$p->id}}">
            <img width="400px" src="{{asset("asset/images/gallery/$p->image")}}" class="img-responsive center-block" alt="{{$p->name}}">
            </a>
        </div>
        <div class="team-text">
            <h3>{{$p->name}} - {{$p->category->name}}</h3>
            @foreach($p->price as $price)
                <div class="team-position">${{$price->price}}</div>
            @endforeach
            @if($description)
            <p>{{$p->description}}</p>
            @endif
        </br>
        </div>
        @if(session()->has("user"))
            <input type="hidden" id="session" value="{{session()->has("user")}}">
            <input type="button" class="btn btn-secondary MB addToCart" value="Add to cart" data-id="{{$p->id}}"/>
        @else
            <input type="button" class="btn btn-secondary MB disabled" value="Add to cart"/>
        @endif
    </div>
</div>

