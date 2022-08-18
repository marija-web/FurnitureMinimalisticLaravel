@extends("layouts.layout")

@section("title") Gallery @endsection
@section("description") Check our onlne gallery for some fresh ideas! Come shop! @endsection
@section("keywords") FURNITURE.minimalistic gallery, come and shop. @endsection

@section("content")
    <!-- COUCHES -->
    <section id="team1">
        <div class="container">
            <div class="row" id="fixedMargin">
                <div class="col-lg-12 text-center">
                    <div class="section-title" id="first">
                        <h2>Gallery shop</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <nav class="navbar navbar-light bg-light">
                        <form class="form-inline" action="" method="GET">
                            <meta name="csrf-token" content="{{csrf_token()}}">
                            <input class="form-control mr-sm-3" type="search" id="keyword" placeholder="Search by name" aria-label="Search" name="keyword">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="search">Search</button>
                        </form>
                    </nav>
                </div>
            </div>
            <div class="row" id="products">
                @if(count($products) > 0)
                @foreach($products as $p)
                    @include("partials.product", ["description"=>false])
                @endforeach
                @else
                    <h1 class="text-center">There are no products!</h1>
                @endif
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination" id="pagination">
                            @if(count($products) > 0)
                            {{ $products->links() }}
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <p id="back-top">
        <a href="#top"><i class="fa fa-angle-up"></i></a>
    </p>
@endsection
