@extends("layouts.layoutAdmin")

@section("title") Menu Table @endsection
@section("description") Menu Admin Panel @endsection
@section("keywords") menu, admin, panel @endsection

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
                    <p class="navbar-brand">Menu Table</p>
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
                        <h3>Menu</h3>
                        <h4>Priority disclamer! 2 is for users/3 for admin</h4></br>
                        <div id="menu">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">name</th>
                                    <th scope="col">route</th>
                                    <th scope="col">order</th>
                                    <th scope="col">priority</th>
                                    <th scope="col">update</th>
                                    <th scope="col">delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menu as $m)
                                <tr>
                                    <form action="/adminPanel/menu/put" method="POST">
                                    <th scope="row">{{$m->id}}</th>
                                        <input type="hidden" name="hiddenId" value="{{$m->id}}"/>
                                    <td><input type="text" name="nameMenu" class="form-control" value="{{$m->name}}"></td>
                                    <td><input type="text" name="routeMenu" class="form-control" value="{{$m->route}}"></td>
                                    <td><input type="text" name="orderMenu" class="form-control" value="{{$m->order}}"></td>
                                    <td><input type="text" name="priorityMenu" class="form-control" value="{{$m->priority}}"></td>
                                        <td><input type="submit" value="Update"  class="updateMenu btn btn-outline-dark"/></td>
                                        @csrf
                                    </form>
                                    <form action="/adminPanel/menu/delete" method="POST">
                                        <input type="hidden" name="hiddenId" value="{{$m->id}}"/>
                                        <td><input type="submit" value="Delete" class="deleteMenu btn btn-danger"/></td>
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
