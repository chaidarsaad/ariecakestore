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
                    <img class="unactive" src="{{ asset('assets') }}/images/svg/bag.svg" alt="bag" />
                    <img class="active" src="{{ asset('assets') }}/images/svg/bag-fill.svg" alt="bag" />
                </div>
            </a>
        </li>
        <li class="{{ request()->routeIs('front.wishlist') ? 'active' : '' }}">
            <a href="{{ route('front.wishlist') }}">
                <div class="icon">
                    <img class="unactive" src="{{ asset('assets') }}/images/svg/heart.svg" alt="heart" />
                    <img class="active" src="{{ asset('assets') }}/images/svg/heart-fill.svg" alt="heart" />
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
