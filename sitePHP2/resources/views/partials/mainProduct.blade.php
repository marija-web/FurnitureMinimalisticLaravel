<!-- start portfolio item-->
<div class="col-md-6 col-0-gutter" >
    <div class="ot-portfolio-item">
        <figure class="effect-bubba">
            <img width="948px" src="{{asset("asset/images/main/$value->image")}}" alt="{{$value->name}}" class="img-responsive" />
            <figcaption>
                <h2>{{$value->category->name}}</h2>
                <p>{{$value->description}}</p>
                <a href="#" data-toggle="modal" data-target="#Modal-{{$key+1}}">View more</a>
            </figcaption>
        </figure>
    </div>
</div>
<!-- end portfolio item -->
