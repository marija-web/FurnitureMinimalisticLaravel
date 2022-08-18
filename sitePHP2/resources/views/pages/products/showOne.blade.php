@extends("layouts.layout")

@section("title") Gallery @endsection
@section("description") Check our onlne gallery for some fresh ideas! @endsection
@section("keywords") FURNITURE.minimalistic gallery, come and look. @endsection


@section("content")
    <div class="container" id="fixedMargin">
        <div class="row">
            <div class="col-md-12 MB">
                <div class="team-item ">
                    <div class="team-image">
                        <img src="{{asset("asset/images/gallery/$oneProduct->image")}}" class="img-responsive center-block" alt="{{$oneProduct->name}}">
                    </div>
                    <div class="team-text">
                        <h3>{{$oneProduct->name}} - {{$oneProduct->category->name}}</h3>
                        @foreach($oneProduct->price as $price)
                            <div class="team-position">${{$price->price}}</div>
                        @endforeach
                        @if($description)
                            <p>{{$oneProduct->description}}</p>
                            @endif
                            </br>
                    </div>
                    <button type="button" class="btn btn-secondary MB addToCart">Add to cart</button>
                    <a href="/products" class="btn btn-secondary MB" id="goBack">Go back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
