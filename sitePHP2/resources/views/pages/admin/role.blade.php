@extends("layouts.layoutAdmin")

@section("title") Role Table @endsection
@section("description") Role Admin Panel @endsection
@section("keywords") admin, role, panel @endsection

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
                    <p class="navbar-brand">Role Table</p>
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
                        <h3>Role</h3>
                        <div id="role">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">role</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $r)
                                    <tr>
                                        <form action="/adminPanel/role/put" method="POST">
                                            <input type="hidden" name="hiddenId" value="{{$r->id}}"/>
                                            <th scope="row">{{$r->id}}</th>
                                            <td><input type="text" name="nameRole" class="form-control" value="{{$r->role}}"></td>
                                            <td><input type="submit" value="Update"  class="updateRole btn btn-dark"/></td>
                                            @csrf
                                        </form>
                                        <form action="/adminPanel/role/delete" method="POST">
                                            <input type="hidden" name="hiddenId" value="{{$r->id}}"/>
                                            <td><input type="submit" value="Delete"  class="deleteRole btn btn-danger"/></td>
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
                            <h3>Insert role</h3>
                            <tbody>
                            <tr>
                                <form action="/adminPanel/role/store" method="POST">
                                    <td><input type="text" name="nameRole" class="form-control" placeholder="Enter name"></td>
                                    <td><input type="submit" value="Insert" class="insertRole btn btn-dark"/></td>
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
