<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    @include('admin.inc.head')
    @yield('head')
    @stack('css')
</head>
<body>
@include('admin.inc.header')
@yield('content')
@yield('javascript')
@stack('scripts')
</body>
</html>
