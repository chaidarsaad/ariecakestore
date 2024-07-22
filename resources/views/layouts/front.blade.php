<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/x-icon" />
    {{-- <title>fuzzy app</title> --}}
    <title>@yield('title')</title>

    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo/favicon.png') }}" />
    <meta name="theme-color" content="#122636" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-mobile-web-app-title" content="fuzzy" />
    <meta name="msapplication-TileImage" content="{{ asset('assets/images/logo/favicon.png') }}" />

    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    {{-- Style --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>

<body>
    @yield('content')

    @if (Route::currentRouteName() !== 'front.cart')
        <!-- bottom navbar start -->
        @include('components.bottomnavbar')
        <!-- bottom navbar end -->
    @endif


    {{-- script --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
</body>

</html>
