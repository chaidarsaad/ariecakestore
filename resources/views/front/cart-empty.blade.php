@extends('layouts.front')

@section('title')
    Arie Cake Store | Cart
@endsection

@push('addon-style')
@endpush

@section('content')

    <body>
        <!-- header start -->
        <header class="section-t-space">
            <div class="custom-container">
                <div class="header-panel">
                    <a href="javascript:void(0);" onclick="window.history.back()">
                        <i class="iconsax back-btn" data-icon="arrow-left"></i>
                    </a>
                    <h3>My Cart</h3>
                </div>
            </div>
        </header>
        <!-- header end -->

        <!-- cart start -->
        <div class="custom-container">
            <div class="empty-tab">
                <img class="img-fluid empty-img w-100" src="{{ asset('assets/images/gif/cart.gif') }}" alt="empty-cart" />

                <h2>Your luggage is empty.</h2>
                <h5 class="mt-3">Check out our top products to get the right one for you.</h5>

                <a href="{{ route('front.home') }}" class="btn theme-btn w-100 mt-3 mb-3" role="button">Start Shopping</a>
            </div>
        </div>
        <!-- cart end -->
    </body>
@endsection

@push('addon-script')
@endpush
