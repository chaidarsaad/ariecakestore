@extends('layouts.front')

@section('title')
    Arie Cake Store | Keranjang
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
                <h3>Keranjangku</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- cart section start -->
    <section>
        <div class="custom-container">
            <ul class="horizontal-product-list">
                @php
                    $totalPrice = 0;
                @endphp
                @if (session('cart'))
                    @foreach (session('cart') as $slug => $details)
                        @php
                            $totalPrice += $details['price'] * $details['quantity'];
                        @endphp
                        <li class="cart-product-box" data-slug="{{ $slug }}">
                            <div class="horizontal-product-box">
                                <div class="horizontal-product-img">
                                    <a href="{{ route('front.product', $details['slug']) }}">
                                        <img class="img-fluid img" src="{{ Storage::url($details['thumbnail']) }}"
                                            alt="p11" />
                                    </a>
                                </div>
                                <div class="horizontal-product-details">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4>{{ $details['name'] }}</h4>
                                        <a href="#" class="remove-from-cart rating d-flex align-items-center"
                                            data-slug="{{ $details['slug'] }}">
                                            <i class="iconsax trash" data-icon="trash"></i>
                                        </a>
                                    </div>

                                    <ul class="product-info">
                                        <li>Jumlah: <span class="quantity">{{ $details['quantity'] }}</span></li>
                                    </ul>
                                    <div class="d-flex align-items-center justify-content-between mt-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <h3 class="fw-semibold">Rp {{ number_format($details['price']) }}</h3>
                                        </div>
                                        <div class="plus-minus">
                                            <button class="sub plus-minus-button" data-action="subtract"
                                                data-slug="{{ $details['slug'] }}"
                                                {{ $details['quantity'] == 1 ? 'disabled' : '' }}>
                                                <i class="iconsax" data-icon="minus"></i>
                                            </button>
                                            <input type="number" value="{{ $details['quantity'] }}" min="1"
                                                class="quantity-input" data-slug="{{ $details['slug'] }}"
                                                data-price="{{ $details['price'] }}" data-name="{{ $details['name'] }}" />

                                            <button class="add plus-minus-button" data-action="add"
                                                data-slug="{{ $details['slug'] }}">
                                                <i class="iconsax" data-icon="add"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </section>
    <!-- cart section end -->

    <!-- cart bottom start -->
    @if (session('cart'))
        <div class="pay-popup">
            <div class="price-items">
                <h6>Total Harga</h6>
                <h2 id="total-price">Rp {{ number_format($totalPrice) }}</h2>
            </div>
            <a id="checkout-btn" class="btn btn-lg theme-btn pay-btn mt-0" href="#">Pesan</a>
        </div>
    @endif
    <!-- cart bottom end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->
@endsection

@push('addon-script')
    @include('includes.script-cart')
@endpush
