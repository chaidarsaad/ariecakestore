@extends('layouts.front')

@section('title')
    Arie Cake Store | About
@endsection

@push('addon-style')
@endpush

@section('content')
    <!-- header start -->
    <header class="profile-header section-t-space">
        <div class="custom-container">
            <div class="header-panel">
                <h3>Profile</h3>
            </div>
            <div class="d-flex align-items-center gap-2">
                <div class="profile-pic mt-5">
                    <img class="img-fluid img" src="assets/images/icons/profile1.png" alt="profile" />
                </div>
                <div class="profile-name d-flex align-items-center justify-content-between mt-3 w-100">
                    <h4 class="theme-color">Marlin Watkin</h4>
                    <a href="profile-setting.html">
                        <i class="iconsax edit-icon" data-icon="edit-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- profile section start -->
    <section class="section-b-space pt-0">
        <div class="custom-container">
            <ul class="profile-list">
                <li>
                    <a href="order-history.html" class="profile-box">
                        <div class="profile-img">
                            <i class="iconsax icon" data-icon="box"></i>
                        </div>
                        <div class="profile-details">
                            <h4>Orders</h4>
                            <h5>Ongoing orders, Recent orders..</h5>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="wishlist.html" class="profile-box">
                        <div class="profile-img">
                            <i class="iconsax icon" data-icon="heart"></i>
                        </div>
                        <div class="profile-details">
                            <h4>Wishlist</h4>
                            <h5>Your save product</h5>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="manage-payment.html" class="profile-box">
                        <div class="profile-img">
                            <i class="iconsax icon" data-icon="wallet-open"></i>
                        </div>
                        <div class="profile-details">
                            <h4>Payment</h4>
                            <h5>Saved card, Wallets</h5>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="manage-address.html" class="profile-box">
                        <div class="profile-img">
                            <i class="iconsax icon" data-icon="location"></i>
                        </div>
                        <div class="profile-details">
                            <h4>Saved Address</h4>
                            <h5>Home, Office</h5>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="language.html" class="profile-box">
                        <div class="profile-img">
                            <i class="iconsax icon" data-icon="translate"></i>
                        </div>
                        <div class="profile-details">
                            <h4>Language</h4>
                            <h5>Select your language here</h5>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="notification.html" class="profile-box">
                        <div class="profile-img">
                            <i class="iconsax icon" data-icon="bell-1"></i>
                        </div>
                        <div class="profile-details">
                            <h4>Notification</h4>
                            <h5>Offers, Order tracking messages</h5>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="setting.html" class="profile-box">
                        <div class="profile-img">
                            <i class="iconsax icon" data-icon="setting-1"></i>
                        </div>
                        <div class="profile-details">
                            <h4>Settings</h4>
                            <h5>app settings, Dark mode</h5>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="terms-conditions.html" class="profile-box">
                        <div class="profile-img">
                            <i class="iconsax icon" data-icon="info-circle"></i>
                        </div>
                        <div class="profile-details">
                            <h4>Terms & Conditions</h4>
                            <h5>T&C for use of platform</h5>
                        </div>
                    </a>
                </li>
                <li class="border-bottom-0">
                    <a href="help.html" class="profile-box">
                        <div class="profile-img">
                            <i class="iconsax icon" data-icon="phone"></i>
                        </div>
                        <div class="profile-details">
                            <h4>Help</h4>
                            <h5>Customer Support, FAQs</h5>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <!-- profile section start -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- bottom navbar start -->
    <div class="navbar-menu">
        <ul>
            <li>
                <a href="landing.html">
                    <div class="icon">
                        <img class="unactive" src="assets/images/svg/home.svg" alt="home" />
                        <img class="active" src="assets/images/svg/home-fill.svg" alt="home" />
                    </div>
                </a>
            </li>
            <li>
                <a href="categories.html">
                    <div class="icon">
                        <img class="unactive" src="assets/images/svg/categories.svg" alt="categories" />
                        <img class="active" src="assets/images/svg/categories-fill.svg" alt="categories" />
                    </div>
                </a>
            </li>
            <li>
                <a href="cart.html">
                    <div class="icon">
                        <img class="unactive" src="assets/images/svg/bag.svg" alt="bag" />
                        <img class="active" src="assets/images/svg/bag-fill.svg" alt="bag" />
                    </div>
                </a>
            </li>
            <li>
                <a href="wishlist.html">
                    <div class="icon">
                        <img class="unactive" src="assets/images/svg/heart.svg" alt="heart" />
                        <img class="active" src="assets/images/svg/heart-fill.svg" alt="heart" />
                    </div>
                </a>
            </li>
            <li class="active">
                <a href="profile.html">
                    <div class="icon">
                        <img class="unactive" src="assets/images/svg/profile.svg" alt="profile" />
                        <img class="active" src="assets/images/svg/profile-fill.svg" alt="profile" />
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <!-- bottom navbar end -->
@endsection

@push('addon-script')
@endpush
