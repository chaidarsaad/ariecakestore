@extends('layouts.front')

@section('title')
    Arie Cake Store | Category
@endsection

@push('addon-style')
@endpush

@section('content')
    <!-- header start -->
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header-panel">
                <a href="javascript:void(0);" onclick="window.history.back()">
                    <i class="iconsax back-btn" data-icon="arrow-left"></i>
                </a>
                <h3>{{ $category->name }}</h3>
                <a href="notification.html" class="notification">
                    <i class="iconsax notification-icon" data-icon="bell-2"></i>
                </a>
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
                </div>
            </form>
        </div>
    </section>
    <!-- search section end -->

    <!-- shop section start -->
    <section class="section-b-space">
        <div class="custom-container">
            <div class="row g-3">
                <div class="col-6">
                    <div class="product-box">
                        <div class="product-box-img">
                            <a href="product-details.html"> <img class="img"
                                    src="{{ asset('assets') }}/images/product/1.png" alt="p1" /></a>

                            <div class="cart-box">
                                <a href="cart.html" class="cart-bag">
                                    <i class="iconsax bag" data-icon="basket-2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-box-detail">
                            <h4>Buddy Chair</h4>
                            <h5>Modern saddle arms</h5>
                            <div class="bottom-panel">
                                <div class="price">
                                    <h4>$14 <del class="pev-price">$20</del></h4>
                                </div>
                                <div class="rating">
                                    <img src="{{ asset('assets') }}/images/svg/Star.svg" alt="star" />
                                    <h6>4.5</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="product-box">
                        <div class="product-box-img">
                            <a href="product-details.html"> <img class="img"
                                    src="{{ asset('assets') }}/images/product/2.png" alt="p2" /></a>

                            <div class="cart-box">
                                <a href="cart.html" class="cart-bag">
                                    <i class="iconsax bag" data-icon="basket-2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-box-detail">
                            <h4>Wingback Chair</h4>
                            <h5>Modern saddle arms</h5>
                            <div class="bottom-panel">
                                <div class="price">
                                    <h4>$15 <del class="pev-price">$18</del></h4>
                                </div>
                                <div class="rating">
                                    <img src="{{ asset('assets') }}/images/svg/Star.svg" alt="star" />
                                    <h6>4.5</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="product-box">
                        <div class="product-box-img">
                            <a href="product-details.html"> <img class="img"
                                    src="{{ asset('assets') }}/images/product/14.png" alt="p14" /></a>

                            <div class="cart-box">
                                <a href="cart.html" class="cart-bag">
                                    <i class="iconsax bag" data-icon="basket-2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-box-detail">
                            <h4>Winston Chair</h4>
                            <h5>Modern saddle arms</h5>
                            <div class="bottom-panel">
                                <div class="price">
                                    <h4>$20 <del class="pev-price">$22</del></h4>
                                </div>
                                <div class="rating">
                                    <img src="{{ asset('assets') }}/images/svg/Star.svg" alt="star" />
                                    <h6>4.5</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="product-box">
                        <div class="product-box-img">
                            <a href="product-details.html"> <img class="img"
                                    src="{{ asset('assets') }}/images/product/15.png" alt="p15" /></a>

                            <div class="cart-box">
                                <a href="cart.html" class="cart-bag">
                                    <i class="iconsax bag" data-icon="basket-2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-box-detail">
                            <h4>Beige Chair</h4>
                            <h5>Modern saddle arms</h5>
                            <div class="bottom-panel">
                                <div class="price">
                                    <h4>$16 <del class="pev-price">$21</del></h4>
                                </div>
                                <div class="rating">
                                    <img src="{{ asset('assets') }}/images/svg/Star.svg" alt="star" />
                                    <h6>4.5</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="product-box">
                        <div class="product-box-img">
                            <a href="product-details.html"> <img class="img"
                                    src="{{ asset('assets') }}/images/product/16.png" alt="p16" /></a>

                            <div class="cart-box">
                                <a href="cart.html" class="cart-bag">
                                    <i class="iconsax bag" data-icon="basket-2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-box-detail">
                            <h4>Dining Chair</h4>
                            <h5>Modern saddle arms</h5>
                            <div class="bottom-panel">
                                <div class="price">
                                    <h4>$12 <del class="pev-price">$15</del></h4>
                                </div>
                                <div class="rating">
                                    <img src="{{ asset('assets') }}/images/svg/Star.svg" alt="star" />
                                    <h6>4.5</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="product-box">
                        <div class="product-box-img">
                            <a href="product-details.html">
                                <img class="img" src="{{ asset('assets') }}/images/product/17.png" alt="p17" />
                            </a>

                            <div class="cart-box">
                                <a href="cart.html" class="cart-bag">
                                    <i class="iconsax bag" data-icon="basket-2"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-box-detail">
                            <h4>Harbour Chair</h4>
                            <h5>Modern saddle arms</h5>
                            <div class="bottom-panel">
                                <div class="price">
                                    <h4>$17 <del class="pev-price">$23</del></h4>
                                </div>
                                <div class="rating">
                                    <img src="{{ asset('assets') }}/images/svg/Star.svg" alt="star" />
                                    <h6>4.5</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop section end -->
@endsection

@push('addon-script')
@endpush
