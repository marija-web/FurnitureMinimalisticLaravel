@extends("layouts.layout")

@section("title") Contact @endsection
@section("description") Error page. @endsection
@section("keywords") error, message, page @endsection

@section("content")
<h1>An error has occured.</h1>
<h2>Please reach our support with this ID {{ $errorId }}</h2>
@endsection
