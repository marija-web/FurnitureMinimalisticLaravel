@extends("layouts.layout")

@section("title") Login @endsection
@section("description") Login Page. Come log in @endsection
@section("keywords") login, page @endsection

@section("content")
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Login</h2>
                        <p>We are glad you are back<br>Login down bellow!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <form action="/login" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email: " id="email" name="email""/>
                                    <span class="help-block" id="errorEmail"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
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
                                <input type="submit" class="btn" id="btn" value="Login"/>
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
                        <div class="alert alert-danger">
                            {{ session('msg') }}</br>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
