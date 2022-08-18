@extends("layouts.layout")

@section("title") Register @endsection
@section("description") Register on our site. Come register, quick!@endsection
@section("keywords") register, quick, come @endsection


@section("content")
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Register</h2>
                        <p>If you like our page and want to do some shopping<br>Just register!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <form action="/register" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name: " id="name" name="firstName"/>
                                    <span class="help-block" id="errorName"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Lastname: " id="lastname" name="lastName" />
                                    <span class="help-block" id="errorLastName"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Email: " id="email" name="email"/>
                                    <span class="help-block" id="errorEmail"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Your Password: " id="password" name="password"/>
                                    <span class="help-block" id="errorPassword"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <input type="submit" class="btn" id="btn" value="Register"/>
                            </div>
                        </div>
                        @csrf
                    </form>
                    @if($errors->any())
                        <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                        </div>
                    @endif
                    @if(session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}</br>
                            <a href="{{route("loginForm")}}" id="fontColor">Want to login now? Click me</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
