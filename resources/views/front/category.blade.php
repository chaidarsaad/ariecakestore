@extends('layouts.front')

@section('title')
    Arie Cake Store | Category {{ $category->name }}
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
                </div>
            </form>
        </div>
    </section>
    <!-- search section end -->

    <!-- shop section start -->
    <section class="section-b-space">
        <div class="custom-container">
            <div class="row g-3">
                @forelse ($products as $product)
                    <div class="col-6">
                        <div class="product-box">
                            <div class="product-box-img">
                                <a href="product-details.html"> <img class="img"
                                        src="{{ Storage::url($product->thumbnail) }}" alt="p1" /></a>

                                <div class="cart-box">
                                    <a href="cart.html" class="cart-bag">
                                        <i class="iconsax bag" data-icon="basket-2"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-box-detail">
                                <h4>{{ $product->name }}</h4>
                                <h5>{{ $product->category->name }}</h5>
                                <div class="bottom-panel">
                                    <div class="price">
                                        <h4>Rp {{ number_format($product->price) }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2 style="color: #1A73E8" class=" text-center text-custom">No products found.</h3>
                @endforelse

            </div>
        </div>
    </section>
    <!-- shop section end -->
@endsection

@push('addon-script')
@endpush
