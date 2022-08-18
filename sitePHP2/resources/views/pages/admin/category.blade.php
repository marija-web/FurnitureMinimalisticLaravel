@extends("layouts.layoutAdmin")

@section("title") Menu Table @endsection
@section("description") Category Admin Panel @endsection
@section("keywords") category, admin, panel @endsection

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
                    <p class="navbar-brand">Category Table</>
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
                        <h3>Category</h3>
                        <div id="category">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">update</th>
                                    <th scope="col">delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $c)
                                <tr>
                                    <form action="/adminPanel/category/put" method="POST">
                                        <input type="hidden" name="hiddenId" value="{{$c->id}}"/>
                                        <th scope="row">{{$c->id}}</th>
                                        <td><input type="text" name="nameCategory" class="form-control" value="{{$c->name}}"></td>
                                        <td><input type="submit" value="Update"  class="updateCategory btn btn-dark"/></td>
                                        @csrf
                                    </form>
                                   <form action="/adminPanel/category/delete" method="POST">
                                       <input type="hidden" name="hiddenId" value="{{$c->id}}"/>
                                       <td><input type="submit" value="Delete"  class="deleteCategory btn btn-danger"/></td>
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
                <!-- insert -->
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <table class="table">
                            <h3>Insert category</h3>
                            <tbody>
                            <tr>
                                <form action="/adminPanel/category/store" method="POST">
                                    <td><input type="text" name="nameCategory" class="form-control" placeholder="Enter name"></td>
                                    <td><input type="submit" value="Insert" class="insertCategory btn btn-dark"/></td>
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
