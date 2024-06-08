<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    @include('inc.head')
    @yield('head')
    @stack('css')
</head>
<body>
    @include('inc.header')
    @yield('content')
    @include('inc.footer')
    @yield('javascript')
    @stack('scripts')
</body>
</html>
