<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}">
@include('frontend.layouts.head')
<body class="home">
@include('frontend.layouts.header-main')
<main>
    @yield('content')
</main>
@include('frontend.layouts.footer')
</body>
</html>
