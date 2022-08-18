@extends("layouts.layout")

@section("title") Contact @endsection
@section("description") Contact page. Come see our location and send a message. @endsection
@section("keywords") contact, map, message @endsection

@section("content")
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Contact Us</h2>
                        <p>If you have some Questions for administrator, Please Contact Us through this field bellow<br>We are here to listen!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <form action="/contact" method="POST">
                        <input type="hidden" name="idUser" value="{{session()->get("user")->id}}"/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Your Message: " id="message" name="message"></textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <input type="submit" class="btn" id="btn" value="Send Message"/>
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
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2>Our Location</h2>
                    </div>
                </div>
            </div>
            <div class="row text-center" id="loc">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d90593.29045061053!2d20.473446298187802!3d44.800366791900124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7007ae411f8d%3A0xfc2b6c76f90bb500!2sMap!5e0!3m2!1sen!2srs!4v1646221250978!5m2!1sen!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
@endsection

