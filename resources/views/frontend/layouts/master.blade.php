<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}">
@include('frontend.layouts.head')
<body class="page">
@include('frontend.layouts.header')
<main>
    @yield('content')
</main>
@include('frontend.layouts.footer')
</body>
</html>
