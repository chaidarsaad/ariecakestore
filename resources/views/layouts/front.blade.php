<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

<body class="{{ Route::currentRouteName() == 'front.product' ? 'details-page' : '' }}">
    @yield('content')

    @if (!in_array(Route::currentRouteName(), ['front.cart', 'front.product', 'front.category', 'front.all-products']))
        <!-- bottom navbar start -->
        @include('components.bottomnavbar')
        <!-- bottom navbar end -->
    @endif


    {{-- script --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
     <!-- Histats.com  (div with counter) -->
     <div style="z-index: 99;" id="histats_counter"></div>
    <!-- Histats.com  START  (aync)-->
    <script type="text/javascript">var _Hasync= _Hasync|| [];
    _Hasync.push(['Histats.startgif', '1,4884118,4,10008,"div#histatsC {position: absolute;top:0px;right:0px;}body>div#histatsC {position: fixed;}"']);
    _Hasync.push(['Histats.fasi', '1']);
    _Hasync.push(['Histats.track_hits', '']);
    (function() {
    var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
    hs.src = ('//s10.histats.com/js15_giftop_as.js');
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
    })();</script>
    <noscript><style type="text/css">div#histatsC {position: absolute;top:0px;right:0px;}body>div#histatsC {position: fixed;}</style>
    <a href="/" alt="" target="_blank" ><div id="histatsC"><img border="0" src="//s4is.histats.com/stats/i/4884118.gif?4884118&103"></div></a>
    </noscript>
    <!-- Histats.com  END  -->
</body>

</html>
