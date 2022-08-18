@extends("layouts.layoutAdmin")

@section("title") Admin Panel @endsection
@section("description") admin panel @endsection
@section("keywords") admin, panel @endsection

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
                    <p class="navbar-brand">Admins profile</p>
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
                        <div class="card text-center mx-auto" style="width: 18rem;">
                            <img class="card-img-top" src="{{asset("asset/images/user.png")}}" alt="Card image cap">
                        </div>
                        <div class="tm-container-inner-2 tm-contact-section">
                            <div class="row">
                                <div class="col-md-12" id="con">
                                    <form action="" method="POST">
                                        @csrf
                                        <meta name="csrf-token" content="{{csrf_token()}}">
                                        <div class="form-group">
                                            <input type="text" id="nameInputAdmin" name="nameInputAdmin" class="form-control" placeholder="Name" value="{{$admin->firstName}}"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="lastNameInputAdmin"  name="lastNameInputAdmin" class="form-control" placeholder="Last Name" value="{{$admin->lastName}}"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="emailInputAdmin" id="emailInputAdmin" placeholder="Email" value="{{$admin->email}}"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text"  class="form-control" id="time" placeholder="Email" value="{{$admin->created_at}}" disabled/>
                                        </div>
                                        <p id="doneA"></p>
                                        <div class="form-group tm-d-flex">
                                            <button type="button" id="updateAdmin" class="btn tm-btn-right">Update profile</button>
                                        </div>
                                    </form>
                                        <div id="msg" class="alert alert-dark">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
