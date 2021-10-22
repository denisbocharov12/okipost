<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}" class="js">
@include('backend.admin.layouts.head')
<body class="nk-body bg-lighter npc-default has-sidebar no-touch nk-nio-theme">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
    @include('backend.admin.layouts.sidebar')
    <!-- wrap @s -->
        <div class="nk-wrap ">
        @include('backend.admin.layouts.header')
        <!-- content @s -->
        @yield('content')
        <!-- content @e -->
            @include('backend.admin.layouts.footer')
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
</body>

</html>
