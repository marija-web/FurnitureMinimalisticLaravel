@extends("layouts.layoutAdmin")

@section("title") Cart Activity Table @endsection
@section("description") Cart Admin Panel @endsection
@section("keywords") cart, admin, panel @endsection

@section("content")
    <div class="main-panel" style="height: 100vh;">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <p class="navbar-brand">Cart Activity Table</p>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container" style="color:#F4F3EF; ">
                <div class="row">
                    <div class="col-md-12">
                        <h3 style="color: #1b1e21">Cart Activity - Users Orders</h3>
                        <div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="" method="POST">
                                            <th class="font-weight-bold"><span  style="color: #1b1e21">Filter orders by date</span></th>
                                            <meta name="csrf-token" content="{{csrf_token()}}">
                                            <td><input type="date" id="dateCart" class="form-control"/></td>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <th>&nbsp;</th>
                                        <form action="/adminPanel/cart">
                                            <input type="submit" value="Remove filter" class="form-control" >
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table class="table" id="cart">
                                <h3 id="text" class="alert after"></h3>
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">User</th>
                                    <th scope="col">products in users order</th>
                                    <th scope="col">total price</th>
                                </tr>
                                </thead>
                                <tbody id="cartDate">
                                @foreach($carts as $c)
                                        @php
                                            ($allP=0)
                                        @endphp
                                    <tr>
                                        <th scope="row">{{$c->id}}</th>
                                        <td name="nameUser">{{$c->user->firstName}} {{$c->user->lastName}}</td>
                                        <td>
                                            <select name="productsCart" class="form-control">
                                                <option selected value="0">{{$c->user->firstName}}'s products</option>
                                            @foreach($orders as $o)
                                                    @if($o->cart_id == $c->id)
                                                    <option value="{{$o->product->id}}">{{$o->product->name}} ({{$o->quantity}})</option>
                                                    @endif
                                            @endforeach
                                            </select>
                                        </td>
                                        @foreach($orders as $o)
                                            @if($o->cart_id == $c->id)
                                                @foreach($prices as $p)
                                                    @if($p->products_id == $o->products_id)
                                                    {{$allP+=$p->price * $o->quantity}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                        <td>${{$allP}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
