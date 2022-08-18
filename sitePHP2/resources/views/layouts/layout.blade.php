<!DOCTYPE html>
<html lang="">
    @include("fixed.main.head")
    <body id="top">
    @include("fixed.main.nav")

    @yield("content")

    @include("fixed.main.footer")

    @include("fixed.main.scripts")
    </body>
</html>
