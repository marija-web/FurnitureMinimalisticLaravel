@extends("layouts.layoutAdmin")

@section("title") Product Table @endsection
@section("description") Admin Panel Product @endsection
@section("keywords") product, main, panel @endsection

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
                    <p class="navbar-brand">Products Table</p>
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
            <div class="container">
                <div class="row">
                    <!-- update i delete -->
                    <div class="col-md-12">
                        <h3>Products</h3>
                        <div id="productss">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">price</th>
                                    <th scope="col">image</th>
                                    <th scope="col">change src</th>
                                    <th scope="col">name cat</th>
                                    <th scope="col">description</th>
                                    <th scope="col">update</th>
                                    <th scope="col">delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $p)
                                <tr>
                                    <form action="/adminPanel/product/put" method="POST" enctype="multipart/form-data">
                                        <th scope="row">{{$p->id}}</th>
                                        <input type="hidden" name="hiddenId" value="{{$p->id}}"/>
                                        <td><input type="text" name="nameProducts" class="form-control" value="{{$p->name}}"></td>
                                        @foreach($p->price as $price)
                                            <td><input type="text" name="priceProducts" class="form-control" value="{{$price->price}}"></td>
                                        @endforeach
                                        <td><input type="text" name="srcProducts" class="form-control" value="{{$p->image}}" disabled></td>
                                        <td><input type="file" name="fileProducts" class="form-control-file"></td>
                                        <td>
                                            <select name="catProducts" class="form-control">
                                            @foreach($categories as $c)
                                                @if($p->categories_id == $c->id)
                                                    <option selected value="{{$c->id}}">{{$c->name}}</option>
                                                @else
                                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                                @endif
                                            @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" name="descriptionProducts" class="form-control" value="{{$p->description}}"></td>
                                        <td><input type="submit" value="Update"  class="updateProduct btn btn-sm btn-dark"/></td>
                                        @csrf
                                    </form>
                                    <form action="/adminPanel/product/delete" method="POST">
                                        <input type="hidden" name="hiddenId" value="{{$p->id}}"/>
                                        <td><input type="submit" value="Delete"  class="deleteProduct btn btn-sm btn-danger"/></td>
                                        @csrf
                                    </form>
                                </tr>
                                @endforeach
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                                @if(session('msg'))
                                    <div class="alert alert-dark">
                                        {{ session('msg') }}</br>
                                    </div>
                                @endif
                                @if(session('msgerror'))
                                    <div class="alert alert-danger">
                                        {{ session('msgerror') }}</br>
                                    </div>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- kraj update i delete -->
                <!-- insert -->
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <table class="table">
                            <h3>Insert product</h3>
                            <tbody>
                            <tr>
                                <form action="/adminPanel/product/store" method="POST" enctype="multipart/form-data">
                                    <td><input type="text" name="nameProducts" class="form-control" placeholder="Enter name"></td>
                                    <td><input type="text" name="priceProducts" class="form-control" placeholder="Enter price"></td>
                                    <td><input type="file" name="fileProducts" class="form-control-file"></td>
                                    <td>
                                        <select name="catProducts" class="form-control">
                                            <option value="0">Choose</option>
                                            @foreach($categories as $c)
                                                <option value="{{$c->id}}">{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="text" name="descriptionProducts" class="form-control" placeholder="Enter description"></td>
                                    <td><input type="submit" value="Insert"  id="insertCategory" class="btn btn-sm btn-dark"/></td>
                                    @csrf
                                </form>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- kraj inserta -->
            </div>
        </div>
@endsection
