@extends("layouts.layoutAdmin")

@section("title") Role Table @endsection
@section("description") User Admin Panel @endsection
@section("keywords") user, admin, panel @endsection

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
                    <p class="navbar-brand">Users Table</p>
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
                    <!-- update i delete-->
                    <div class="col-md-12">
                        <h3>Users</h3>
                        <div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="" method="POST">
                                            <th class="font-weight-bold">Filter by date of registration</th>
                                            <meta name="csrf-token" content="{{csrf_token()}}">
                                            <td><input type="date" id="date" class="form-control"/></td>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <th>&nbsp;</th>
                                        <form action="/adminPanel/user">
                                            <input type="submit" value="Remove filter" class="form-control" >
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table class="table" id="users">
                                <h3 id="text" class="alert"></h3>
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">first name</th>
                                    <th scope="col">last name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">role</th>
                                    <th scope="col">update role</th>
                                    <th scope="col">delete user</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $u)
                                <tr>
                                    <form action="/adminPanel/user/put" method="POST">
                                        <input type="hidden" name="hiddenId" value="{{$u->id}}"/>
                                        <th scope="row">{{$u->id}}</th>
                                        <td name="nameUser">{{$u->firstName}}</td>
                                        <td name="lastNameUser">{{$u->lastName}}</td>
                                        <td name="emailUser">{{$u->email}}</td>
                                        <td>
                                            <select name="roleUser" class="form-control">
                                                @foreach($roles as $r)
                                                    @if($u->roles_id == $r->id)
                                                        <option selected value="{{$r->id}}">{{$r->role}}</option>
                                                    @else
                                                        <option  value="{{$r->id}}">{{$r->role}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="submit" value="Update role"  class="updateRole btn btn-dark"/></td>
                                        @csrf
                                    </form>
                                    <form action="/adminPanel/user/delete" method="POST">
                                        <input type="hidden" name="hiddenId" value="{{$u->id}}"/>
                                        <td><input type="submit" value="Delete"  class="deleteUser btn btn-danger"/></td>
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
                <!-- kraj update i update-->
            </div>
        </div>
@endsection
