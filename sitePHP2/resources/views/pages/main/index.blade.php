@extends("layouts.layout")
@section("title") FURNITURE.minimalistic | Gallery @endsection
@section("description") Visit our online gallery with best minimalistic furniture you can find while browsing-click on us and let's shop! @endsection
@section("keywords") FURNITURE.minimalistic gallery, come and look. @endsection

@section("content")
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center" id="fixedMargin">
                    <div class="section-title">
                        <h2>-Welcome to our online shop-</h2>
                        <p>This is a safe place for minimalistic(and other) people to come and walk around via internet through our gallery.
                            We have everything and nothing in the same time-minimalistic right?</p>
                    </div>
                </div>
            </div>
            <div class="row row-0-gutter" id='items'>
                @foreach($productsMain as $key => $value)
                    @include("partials.mainProduct")
                @endforeach
            </div>
        </div><!-- container -->
    </section>
    <section id="about" class="mz-module">
        <div class="container light-bg">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>ABOUT US</h2>
                    </div>
                </div>
            </div>
            <div class="row MB">
                <div class="col-md-6 text-center">
                    <div class="mz-about-container">
                        <p> As we are based only at one place in this world - we would say we are minimalistic for that to. Jokes aside, we
                        love our little company that we established 2016.-year, where all bloomed and started. With our creator, Sarah, we
                        can do anything - she's like the glue - always keeping us together, which is the most important thing for a bussines.</p>
                    </div>
                </div>
                <div class="col-md-6 MB">
                    <!-- skill bar item -->
                    <div class="skillPic mt-5">
                        <img src="{{asset("asset/images/block1.jpg")}}" alt="pic1" class="img-responsive center-block" style="width: 330px; opacity: 0.9;">
                    </div>
                </div>
            </div>
            <div class="row row-0-gutter" id="blackIcons">
                <div class="col-md-3 col-0-gutter mz-about-default text-center">
                    <div class="mz-module-about"><i class="fa-solid fa-chair ot-circle"></i>
                        <h3>Unique-minimalistic</h3>
                    </div>
                </div>
                <div class="col-md-3 col-0-gutter mz-about-default text-center">
                    <div class="mz-module-about"><i class="fa-solid fa-shop ot-circle"></i>
                        <h3>Small bussines shop!</h3>
                    </div>
                </div>
                <div class="col-md-3 col-0-gutter mz-about-default text-center">
                    <div class="mz-module-about">
                        <i class="fa-solid fa-couch ot-circle"></i>
                        <h3>Comfortable seating</h3>
                    </div>
                </div>
                <div class="col-md-3 col-0-gutter mz-about-default text-center">
                    <div class="mz-module-about"><i class="fa-solid fa-tag ot-circle">
                        </i><h3>Best prices!</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about" class="mz-module">
        <div class="container light-bg">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>ABOUT OUR MERCHANDISE</h2>
                    </div>
                </div>
            </div>
            <div class="row MB">
                <div class="col-md-6 MB">
                    <!-- skill bar item -->
                    <div class="skillPic mt-5">
                        <img src="{{asset("asset/images/block2.jpg")}}" alt="pic1" class="img-responsive center-block" style="width: 330px; opacity: 0.9;">
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="mz-about-container">
                        <p>Our merchandise is top notch, unique and minimalistic too. Simple look - simple color.
                            If we caught your attention here is a link so you can chech it out right now.</p></br>
                        <div class="modal-works text-center"> <a href="{{route("products")}}" target="_blank"><span>Click here for some shopping</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <p id="back-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
    </p>
    <!-- Modal for portfolio items -->
    @foreach($productsMain as $key => $value)
    <div class="modal fade" id="Modal-{{$key+1}}" tabindex="-1" role="dialog" aria-labelledby="Modal-label-{{$key+1}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="Modal-label-1">{{$value->category->name}}</h4>
                </div>
                <div class="modal-body">
                    <img src="{{asset("asset/images/main/$value->image")}}" alt="{{$value->name}}" class="img-responsive" />
                    <div class="modal-works text-center" ><a href="{{route("products")}}" target="_blank"><span>Click here if you're interested</span></a></div>
                    <p class="text-center">{{$value->description}} </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection


