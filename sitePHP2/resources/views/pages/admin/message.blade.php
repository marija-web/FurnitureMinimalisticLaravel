@extends("layouts.layoutAdmin")

@section("title") Message Table @endsection
@section("description") Message Admin Panel @endsection
@section("keywords") message, admin, panel @endsection

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
                    <p class="navbar-brand">Message Table</p>
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
                    <!-- delete -->
                    <div class="col-md-12">
                        <h3>Messages from users to you</h3>
                        <div id="message">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">message</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages as $m)
                                    <tr>
                                        <form action="/adminPanel/message/delete" method="POST">
                                            <input type="hidden" name="hiddenId" value="{{$m->id}}"/>
                                            <th scope="row">{{$m->id}}</th>
                                            <td name="messageUser">{{$m->message}}</td>
                                            <td><input type="submit" value="Delete"  class="deleteMessage btn btn-danger"/></td>
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
                <!-- kraj delete -->
            </div>
        </div>
@endsection
