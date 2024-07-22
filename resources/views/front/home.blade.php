@extends('layouts.front')

@section('title')
    Arie Cake Store | Home
@endsection

@push('addon-style')
    {{-- addon style --}}
    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/swiper-bundle.min.css') }}" />
@endpush

@section('content')
    <!-- side bar start -->
    <div class="offcanvas sidebar-offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft">
        <div class="offcanvas-header">
            <img class="img-fluid profile-pic" src="assets/images/icons/profile.png" alt="profile" />
            <h4>Hello, Agasya!</h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="sidebar-content">
                <ul class="link-section">
                    <li>
                        <div class="pages">
                            <h4>Dark</h4>
                            <div class="switch-btn">
                                <input id="dark-switch" type="checkbox" />
                            </div>
                        </div>
                    </li>

                    <li>
                        <a href="page-listing.html" class="pages">
                            <h4>Pages List</h4>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>

                    <li>
                        <a href="setting.html" class="pages">
                            <h4>Setting</h4>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>

                    <li>
                        <a href="login.html" class="pages">
                            <h4>Logout</h4>
                            <i class="ri-arrow-drop-right-line"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- side bar end -->

    <!-- header start -->
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header">
                <div class="head-content">
                    <button class="sidebar-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
                        <i class="iconsax menu-icon" data-icon="menu-hamburger"></i>
                    </button>
                    {{-- <div class="header-info">
                        <img class="img-fluid profile-pic" src="assets/images/icons/profile.png" alt="profile" />
                        <div>
                            <h4 class="light-text">Hello</h4>
                            <h2 class="theme-color">Agasya!</h2>
                        </div>
                    </div> --}}
                </div>
                {{-- <a href="notification.html" class="notification">
                    <i class="iconsax notification-icon" data-icon="bell-2"></i>
                </a> --}}
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- search section starts -->
    <section>
        <div class="custom-container">
            <form class="theme-form search-head" target="_blank">
                <div class="form-group">
                    <div class="form-input">
                        <input type="text" class="form-control search" id="inputusername" placeholder="Search here..." />
                        <i class="iconsax search-icon" data-icon="search-normal-2"></i>
                    </div>

                    {{-- <a href="#search-filter" class="btn filter-btn mt-0" data-bs-toggle="modal">
                        <i class="iconsax filter-icon" data-icon="media-sliders-3"></i>
                    </a> --}}
                </div>
            </form>
        </div>
    </section>
    <!-- search section end -->

    <!-- banner section start -->
    <section class="banner-wapper">
        <div class="custom-container">
            <div class="banner-bg">
                <img class="img-fluid img-bg w-100" src="{{ Storage::url($banner1->image) }}" alt="banner-1" />
                {{-- <div class="banner-content">
                    <h2 class="fw-semibold">{{ $banner1->title }}</h2>
                    <h4>{{ $banner1->subtitle }}</h4>
                </div> --}}
                {{-- <a href="#" class="more-btn">
                    <h4>View More</h4>
                    <i class="iconsax right-arrow" data-icon="arrow-right"></i>
                </a> --}}
            </div>
        </div>
    </section>
    <!-- banner section start -->

    <!-- categories section start -->
    <section>
        <div class="custom-container">
            <div class="swiper categories">
                <div class="swiper-wrapper ratio_square">
                    <div class="swiper-slide">
                        <a href="{{ route('front.categories') }}" class="categories-item active">
                            {{-- <img class="categories-img" src="assets/images/svg/sofa.svg" alt="sofa" /> --}}
                            <h4>Semua</h4>
                        </a>
                    </div>
                    @forelse ($categories as $category)
                        <div class="swiper-slide">
                            <a href="{{ route('front.category', $category->slug) }}" class="categories-item text-center">
                                <h4>{{ $category->name }}</h4>
                            </a>
                        </div>
                    @empty
                    @endforelse

                </div>
            </div>
        </div>
    </section>
    <!-- categories section end -->

    <!-- New Arrivals section start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="title">
                <h2>New Products</h2>
                <a href="shop.html">View All Products</a>
            </div>

            <div class="row g-3">
                @forelse ($newArrivals as $nwa)
                    <div class="col-6">
                        <div class="product-box">
                            <div class="product-box-img">
                                <a href="{{ route('front.product', $nwa->id) }}">
                                    <img class="img" src="{{ Storage::url($nwa->thumbnail) }}" alt="p2" />
                                </a>

                                <div class="cart-box">
                                    <a href="cart.html" class="cart-bag">
                                        <i class="iconsax bag" data-icon="basket-2"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="like-btn animate inactive">
                                <img class="outline-icon" src="assets/images/svg/like.svg" alt="like" />
                                <img class="fill-icon" src="assets/images/svg/like-fill.svg" alt="like" />
                                <div class="effect-group">
                                    <span class="effect"></span>
                                    <span class="effect"></span>
                                    <span class="effect"></span>
                                    <span class="effect"></span>
                                    <span class="effect"></span>
                                </div>
                            </div>
                            <div class="product-box-detail">
                                <h4>{{ $nwa->name }}</h4>
                                <h5>{{ $nwa->category->name }}</h5>
                                <div class="bottom-panel">
                                    <div class="price">
                                        <h4>Rp {{ number_format($nwa->price) }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No product found.</p>
                @endforelse

                {{-- <div class="col-6">
                    <div class="product-box">
                        <div class="product-box-img">
                            <a href="shop.html"><img class="img" src="{{ Storage::url($newArrival->thumbnail) }}"
                                    alt="p1" /></a>

                            <div class="cart-box">
                                <a href="cart.html" class="cart-bag">
                                    <i class="iconsax bag" data-icon="basket-2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="like-btn animate active inactive">
                            <img class="outline-icon" src="assets/images/svg/like.svg" alt="like" />
                            <img class="fill-icon" src="assets/images/svg/like-fill.svg" alt="like" />
                            <div class="effect-group">
                                <span class="effect"></span>
                                <span class="effect"></span>
                                <span class="effect"></span>
                                <span class="effect"></span>
                                <span class="effect"></span>
                            </div>
                        </div>
                        <div class="product-box-detail">
                            <h4>{{ $newArrival->name }}</h4>
                            <h5>{{ $newArrival->category->name }}</h5>
                            <div class="bottom-panel">
                                <div class="price">
                                    <h4>Rp {{ number_format($newArrival->price) }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- New Arrivals section end -->

    <!-- Trending Product section start -->
    @if ($trendingProducts->isNotEmpty())
        <section class="section-t-space">
            <div class="custom-container">
                <div class="title">
                    <h2>Trending Product</h2>
                    {{-- <a href="product-details.html">View All</a> --}}
                </div>

                <div class="row g-3">
                    @foreach ($trendingProducts as $trp)
                        <div class="col-12">
                            <div class="horizontal-product-box">
                                <a href="{{ route('front.product', $trp->id) }}" class="horizontal-product-img">
                                    <img class="img-fluid img" src="{{ Storage::url($trp->thumbnail) }}"
                                        alt="p3" />
                                </a>
                                <div class="horizontal-product-details">
                                    <a href="{{ route('front.product', $trp->id) }}">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4>{{ $trp->name }}</h4>
                                        </div>
                                        <h5>{{ $trp->category->name }}</h5>
                                    </a>


                                    <div class="d-flex align-items-center justify-content-between mt-1">
                                        <div class="d-flex align-items-center gap-2">
                                            <h3 class="fw-semibold">Rp {{ number_format($trp->price) }}</h3>
                                        </div>
                                        <a href="cart.html" class="cart-bag">
                                            <i class="iconsax bag" data-icon="basket-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    <!-- Trending Furniture section end -->

    <!-- banner section start -->
    <section class="banner-wapper">
        <div class="custom-container">
            <div class="banner-bg">
                <img class="img-fluid img-bg" src="{{ Storage::url($banner2->image) }}" alt="banner-2" />
                {{-- <div class="banner-content">
                    <h2 class="fw-semibold">{{ $banner1->title }}</h2>
                    <h4>{{ $banner1->subtitle }}</h4>
                </div> --}}
                {{-- <a href="#" class="more-btn">
                    <h4>View More</h4>
                    <i class="iconsax right-arrow" data-icon="arrow-right"></i>
                </a> --}}
            </div>
        </div>
    </section>
    <!-- banner section end -->

    <!-- offer section start -->
    {{-- <section class="offer-zone section-b-space pt-0">
        <div class="custom-container">
            <div class="title">
                <h2>Offer Zone</h2>
                <a href="product-details.html">View All</a>
            </div>

            <div class="swiper offer">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="horizontal-product-box">
                            <a href="product-details.html" class="horizontal-product-img">
                                <img class="img-fluid img" src="assets/images/product/6.png" alt="p6" />
                            </a>
                            <div class="horizontal-product-details">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4>Table Lamp</h4>
                                </div>
                                <h5>Bedroom Study Table Lamp</h5>
                                <div class="rating d-flex align-items-center gap-1 mt-1">
                                    <img src="assets/images/svg/Star.svg" alt="star" />

                                    <img src="assets/images/svg/Star.svg" alt="star" />

                                    <img src="assets/images/svg/Star.svg" alt="star" />

                                    <img src="assets/images/svg/Star.svg" alt="star" />

                                    <img src="assets/images/svg/Star.svg" alt="star" />
                                </div>

                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <div class="d-flex align-items-center gap-2">
                                        <h3 class="fw-semibold">$37</h3>
                                    </div>
                                    <a href="cart.html" class="cart-bag">
                                        <i class="iconsax bag" data-icon="basket-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="horizontal-product-box mt-3">
                            <a href="product-details.html" class="horizontal-product-img">
                                <img class="img-fluid img" src="assets/images/product/7.png" alt="p7" />
                            </a>
                            <div class="horizontal-product-details">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4>Side Table</h4>
                                </div>
                                <h5>Solid wood console table</h5>
                                <div class="rating d-flex align-items-center gap-1 mt-1">
                                    <img src="assets/images/svg/Star.svg" alt="star" />

                                    <img src="assets/images/svg/Star.svg" alt="star" />

                                    <img src="assets/images/svg/Star.svg" alt="star" />

                                    <img src="assets/images/svg/Star.svg" alt="star" />

                                    <img src="assets/images/svg/Star.svg" alt="star" />
                                </div>

                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <div class="d-flex align-items-center gap-2">
                                        <h3 class="fw-semibold">$37</h3>
                                    </div>
                                    <a href="cart.html" class="cart-bag">
                                        <i class="iconsax bag" data-icon="basket-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="horizontal-product-box">
                            <a href="product-details.html" class="horizontal-product-img">
                                <img class="img-fluid img" src="assets/images/product/8.png" alt="p8" />
                            </a>
                            <div class="horizontal-product-details">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4>Lounge Chair</h4>
                                </div>
                                <h5>Modern arms chair</h5>
                                <div class="rating d-flex align-items-center gap-1 mt-1">
                                    <img src="assets/images/svg/Star.svg" alt="star" />

                                    <img src="assets/images/svg/Star.svg" alt="star" />

                                    <img src="assets/images/svg/Star.svg" alt="star" />

                                    <img src="assets/images/svg/Star.svg" alt="star" />

                                    <img src="assets/images/svg/Star.svg" alt="star" />
                                </div>

                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <div class="d-flex align-items-center gap-2">
                                        <h3 class="fw-semibold">$37</h3>
                                    </div>
                                    <a href="cart.html" class="cart-bag">
                                        <i class="iconsax bag" data-icon="basket-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="horizontal-product-box mt-3">
                            <a href="product-details.html" class="horizontal-product-img">
                                <img class="img-fluid img" src="assets/images/product/9.png" alt="p9" />
                            </a>
                            <div class="horizontal-product-details">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4>Swing Chair</h4>
                                </div>
                                <h5>Modern steel swing chair</h5>
                                <div class="rating d-flex align-items-center gap-1 mt-1">
                                    <img src="assets/images/svg/Star.svg" alt="star" />

                                    <img src="assets/images/svg/Star.svg" alt="star" />

                                    <img src="assets/images/svg/Star.svg" alt="star" />

                                    <img src="assets/images/svg/Star.svg" alt="star" />

                                    <img src="assets/images/svg/Star.svg" alt="star" />
                                </div>

                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <div class="d-flex align-items-center gap-2">
                                        <h3 class="fw-semibold">$37</h3>
                                    </div>
                                    <a href="cart.html" class="cart-bag">
                                        <i class="iconsax bag" data-icon="basket-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- offer section start -->

    <!-- other furniture section start -->
    <section class="section-t-space">
        <div class="custom-container">
            <div class="title">
                <h2>You Might Like</h2>
            </div>

            <div class="row g-4">
                {{-- <div class="col-6">
                    <div class="product-box">
                        <div class="product-box-img">
                            <a href="shop.html"> <img class="img" src="assets/images/product/10.png"
                                    alt="p10" /></a>

                            <div class="cart-box">
                                <a href="cart.html" class="cart-bag">
                                    <i class="iconsax bag" data-icon="basket-2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="like-btn animate active inactive">
                            <img class="outline-icon" src="assets/images/svg/like.svg" alt="like" />
                            <img class="fill-icon" src="assets/images/svg/like-fill.svg" alt="like" />

                            <div class="effect-group">
                                <span class="effect"></span>
                                <span class="effect"></span>
                                <span class="effect"></span>
                                <span class="effect"></span>
                                <span class="effect"></span>
                            </div>
                        </div>
                        <div class="product-box-detail">
                            <h4>Bubble Swing Chair</h4>
                            <div class="d-flex justify-content-between gap-3">
                                <h5>Modern Swing Chair</h5>
                                <h3 class="fw-semibold">$120</h3>
                            </div>
                        </div>
                    </div>
                </div> --}}

                @foreach ($randomProducts as $rndmp)
                    <div class="col-6">
                        <div class="product-box">
                            <div class="product-box-img">
                                <a href="{{ route('front.product', $rndmp->id) }}"> <img class="img"
                                        src="{{ Storage::url($rndmp->thumbnail) }}" alt="p11" /></a>

                                <div class="cart-box">
                                    <a href="cart.html" class="cart-bag">
                                        <i class="iconsax bag" data-icon="basket-2"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="like-btn animate inactive">
                                <img class="outline-icon" src="assets/images/svg/like.svg" alt="like" />
                                <img class="fill-icon" src="assets/images/svg/like-fill.svg" alt="like" />
                                <div class="effect-group">
                                    <span class="effect"></span>
                                    <span class="effect"></span>
                                    <span class="effect"></span>
                                    <span class="effect"></span>
                                    <span class="effect"></span>
                                </div>
                            </div>
                            <a href="{{ route('front.product', $rndmp->id) }}">
                                <div class="product-box-detail">
                                    <h4>{{ $rndmp->name }}</h4>
                                    <div class="d-flex justify-content-between gap-3">
                                        <h5>{{ $rndmp->category->name }}</h5>
                                    </div>
                                    <h3 class="fw-semibold">Rp {{ number_format($rndmp->price) }}</h3>
                                </div>
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- other furniture section end -->

    <!-- banner section start -->
    {{-- <section class="banner-wapper grid-banner">
        <div class="custom-container">
            <div class="row">
                <div class="col-6">
                    <div class="banner-bg">
                        <img class="img-fluid img-bg" src="assets/images/banner/banner-3.jpg" alt="banner-3" />
                        <div class="banner-content">
                            <h3>Wingback Chair</h3>
                        </div>
                        <a href="shop.html" class="more-btn d-block">
                            <i class="iconsax right-arrow" data-icon="arrow-right"></i>
                            <h3>View More</h3>
                        </a>
                        <div class="banner-bg"></div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="banner-bg">
                        <img class="img-fluid img-bg" src="assets/images/banner/banner-4.jpg" alt="banner-3" />
                        <div class="banner-content">
                            <h3>Wingback Chair</h3>
                        </div>
                        <a href="shop.html" class="more-btn d-block">
                            <i class="iconsax right-arrow" data-icon="arrow-right"></i>
                            <h3>View More</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- banner section end -->

    <!-- filter offcanvas start -->
    <div class="modal search-filter" id="search-filter" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-title">
                    <a href="landing.html" data-bs-dismiss="modal">
                        <i class="iconsax back-btn" data-icon="arrow-left"></i>
                    </a>
                    <h3 class="fw-semibold">Filter</h3>
                </div>

                <div class="tab-body d-flex align-items-start">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-sort-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-sort" type="button" role="tab" aria-controls="v-pills-sort"
                            aria-selected="true">Sort By</button>

                        <button class="nav-link" id="v-pills-color-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-color" type="button" role="tab" aria-controls="v-pills-color"
                            aria-selected="false">Color</button>

                        <button class="nav-link" id="v-pills-price-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-price" type="button" role="tab" aria-controls="v-pills-price"
                            aria-selected="false">Price</button>

                        <button class="nav-link" id="v-pills-material-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-material" type="button" role="tab"
                            aria-controls="v-pills-material" aria-selected="false">Material</button>
                    </div>

                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane tab-info fade show active" id="v-pills-sort" role="tabpanel"
                            aria-labelledby="v-pills-sort-tab" tabindex="0">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="radio1" />
                                <label class="form-check-label" for="radio1">Relevance</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radio2" />
                                <label class="form-check-label" for="radio2">Highest Priced First</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radio3" checked />
                                <label class="form-check-label" for="radio3">Lowest Priced First</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radio4" />
                                <label class="form-check-label" for="radio4">Fastest Shipping</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radio5" />
                                <label class="form-check-label" for="radio5">Newest</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radio" id="radio6" />
                                <label class="form-check-label" for="radio6">Highest Rating First</label>
                            </div>
                        </div>

                        <div class="tab-pane tab-info color-info fade" id="v-pills-color" role="tabpanel"
                            aria-labelledby="v-pills-color-tab" tabindex="0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="color1" />
                                <label class="form-check-label" for="color1">Black</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="color2" />
                                <label class="form-check-label" for="color2">Gray</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="color3" />
                                <label class="form-check-label" for="color3">Blue</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="color4" />
                                <label class="form-check-label" for="color4">Yellow</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="color5" />
                                <label class="form-check-label" for="color5">Green</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="color6" />
                                <label class="form-check-label" for="color6">Red</label>
                            </div>
                        </div>

                        <div class="tab-pane price-info fade" id="v-pills-price" role="tabpanel"
                            aria-labelledby="v-pills-price-tab" tabindex="0">
                            <div class="range-slider">
                                <span>From <input type="number" value="250" min="0" max="100000"
                                        step="50" /> To <input type="number" value="750" min="0"
                                        max="1000" step="50" /> </span>
                                <input value="250" min="0" max="1000" step="50" type="range" />
                                <input value="500" min="0" max="1000" step="50" type="range" />
                                <svg width="100%" height="24">
                                    <line x1="4" y1="0" x2="480" y2="0" stroke="#444"
                                        stroke-width="12" stroke-dasharray="1 28"></line>
                                </svg>
                            </div>
                        </div>

                        <div class="tab-pane tab-info fade" id="v-pills-material" role="tabpanel"
                            aria-labelledby="v-pills-material-tab" tabindex="0">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="flexRadioDefault"
                                    id="flexRadioDefault1" />
                                <label class="form-check-label" for="flexRadioDefault1">Fabric</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="flexRadioDefault"
                                    id="flexRadioDefault2" checked />
                                <label class="form-check-label" for="flexRadioDefault2">Wooden</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="flexRadioDefault"
                                    id="flexRadioDefault3" />
                                <label class="form-check-label" for="flexRadioDefault2">Metal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="flexRadioDefault"
                                    id="flexRadioDefault4" />
                                <label class="form-check-label" for="flexRadioDefault1">Plastic</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="flexRadioDefault"
                                    id="flexRadioDefault5" />
                                <label class="form-check-label" for="flexRadioDefault2">Glass</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-modal d-flex gap-3">
                    <a href="landing.html" class="btn gray-btn btn-inline mt-0 w-50">Clear Filter</a>
                    <a href="landing.html" class="theme-btn btn btn-inline mt-0 w-50" data-bs-dismiss="modal">apply</a>
                </div>
            </div>
        </div>
    </div>
    <!-- filter offcanvas end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->
@endsection

@push('addon-script')
    {{-- addon script --}}
    <!-- swiper js -->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/custom-swiper.js"></script>

    <!-- range-slider js -->
    <script src="assets/js/range-slider.js"></script>
@endpush
