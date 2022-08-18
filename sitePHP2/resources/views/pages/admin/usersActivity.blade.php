@extends("layouts.layoutAdmin")

@section("title") Activity Table @endsection
@section("description") Activity User Admin Panel @endsection
@section("keywords") activity, admin, panel, user @endsection

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
                    <p class="navbar-brand">Users Activity Table</p>
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
                    <div class="col-md-12">
                        <h3>Users Activity</h3>
                        <div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4">
                                        <form action="" method="POST">
                                            <th class="font-weight-bold">Filter by log in date</th>
                                            <meta name="csrf-token" content="{{csrf_token()}}">
                                            <td><input type="date" id="dateLogIn" class="form-control"/></td>
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <th>&nbsp;</th>
                                        <form action="/adminPanel/activity">
                                            <input type="submit" value="Remove filter" class="form-control" >
                                        </form>
                                    </div>
                                    <div class="col-md-4">
                                        <form action="" method="POST">
                                            <th class="font-weight-bold">Filter by log out date</th>
                                            <meta name="csrf-token" content="{{csrf_token()}}">
                                            <td><input type="date" id="dateLogOut" class="form-control"/></td>
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
                                </tr>
                                </thead>
                                <tbody id="usersLoggedIn">
                                @foreach($users as $u)
                                    <tr>
                                        <th scope="row">{{$u->id}}</th>
                                        <td name="nameUser">{{$u->firstName}}</td>
                                        <td name="lastNameUser">{{$u->lastName}}</td>
                                        <td name="emailUser">{{$u->email}}</td>
                                        <td name="roleUser">{{$u->role->role}}</td>
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
