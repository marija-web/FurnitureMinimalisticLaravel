@extends("layouts.layout")

@section("title") Cart @endsection
@section("description") Check our onlne gallery for some fresh ideas! Come shop @endsection
@section("keywords") FURNITURE.minimalistic gallery, come and shop. @endsection

@section("content")
    <input type="hidden" id="cartUser" value="{{session()->get("user")->id}}">
<div class="container table-responsive-sm" id="contact">
    <div class="col-12">
        <h2 class="my-5 tm-section-title text-center">-Here are the items you choose-</h2>
        <h4 id="cartEmpty" class="alert text-center mt-5"></h4>
    </div>
    <!-- ispis tabele -->
    <div>
        <form action="" method="POST">
            @csrf
            <meta name="csrf-token" content="{{csrf_token()}}">
            <div id="cartWrite">
            </div>
        </form>
        <!-- ispis tabele kraj -->
    </div>
</div>
@endsection
