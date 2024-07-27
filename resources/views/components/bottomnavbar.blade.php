<div class="navbar-menu">
    <ul>
        <li class="{{ request()->routeIs('front.home') ? 'active' : '' }}">
            <a href="{{ route('front.home') }}">
                <div class="icon">
                    <img class="unactive" src="{{ asset('assets') }}/images/svg/home.svg" alt="home" />
                    <img class="active" src="{{ asset('assets') }}/images/svg/home-fill.svg" alt="home" />
                </div>
            </a>
        </li>
        <li class="{{ request()->routeIs('front.categories') ? 'active' : '' }}">
            <a href="{{ route('front.categories') }}">
                <div class="icon">
                    <img class="unactive" src="{{ asset('assets') }}/images/svg/categories.svg" alt="categories" />
                    <img class="active" src="{{ asset('assets') }}/images/svg/categories-fill.svg" alt="categories" />
                </div>
            </a>
        </li>
        <li class="{{ request()->routeIs('front.cart') ? 'active' : '' }}">
            <a href="{{ route('front.cart') }}">
                <div class="icon">
                    {{-- <span style="position: fixed; margin-top: 7px"></span> --}}
                    <img class="unactive" src="{{ asset('assets') }}/images/svg/bag.svg" alt="bag" />
                    <img class="active" src="{{ asset('assets') }}/images/svg/bag-fill.svg" alt="bag" />
                </div>
            </a>
        </li>
        <li class="{{ request()->routeIs('front.about') ? 'active' : '' }}">
            <a href="{{ route('front.about') }}">
                <div class="icon">
                    <img class="unactive" src="{{ asset('assets') }}/images/svg/profile.svg" alt="profile" />
                    <img class="active" src="{{ asset('assets') }}/images/svg/profile-fill.svg" alt="profile" />
                </div>
            </a>
        </li>
    </ul>
</div>
<!-- Histats.com  (div with counter) -->
     <div id="histats_counter"></div>
    <!-- Histats.com  START  (aync)-->
    <script type="text/javascript">var _Hasync= _Hasync|| [];
    _Hasync.push(['Histats.start', '1,4884118,4,138,112,33,00011111']);
    _Hasync.push(['Histats.fasi', '1']);
    _Hasync.push(['Histats.track_hits', '']);
    (function() {
    var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
    hs.src = ('//s10.histats.com/js15_as.js');
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
    })();</script>
    <noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4884118&101" alt="" border="0"></a></noscript>
    <!-- Histats.com  END  -->