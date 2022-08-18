@extends("layouts.layoutAdmin")

@section("title") Main Product Table @endsection
@section("description") Main Product Admin Panel @endsection
@section("keywords") product, main, admin, panel @endsection

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
                    <p class="navbar-brand">Main products Table</p>
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
                        <h3>Main Products</h3>
                        <div id="menu">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">image</th>
                                    <th scope="col">change src</th>
                                    <th scope="col">name cat</th>
                                    <th scope="col">description</th>
                                    <th scope="col">update</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mainProducts as $mp)
                                    <tr>
                                        <form action="/adminPanel/mainProduct/put" method="POST" enctype="multipart/form-data">
                                            <th scope="row">{{$mp->id}}</th>
                                            <input type="hidden" name="hiddenId" value="{{$mp->id}}"/>
                                            <td><input type="text" name="nameProducts" class="form-control" value="{{$mp->name}}" disabled></td>
                                            <td><input type="text" name="srcProducts" class="form-control" value="{{$mp->image}}" disabled></td>
                                            <td><input type="file" name="fileProducts" class="form-control-file"></td>
                                            <td><input type="text" name="catProducts" class="form-control" value="{{$mp->category->name}}" disabled></td>
                                            <td><input type="text" name="descriptionProducts" class="form-control" value="{{$mp->description}}"></td>
                                            <td><input type="submit" value="Update"  class="updateProduct btn btn-dark"/></td>
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- kraj update i delete -->
            </div>
        </div>
@endsection
