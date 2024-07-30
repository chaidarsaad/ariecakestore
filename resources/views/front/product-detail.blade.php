@extends('layouts.front')

@section('title')
    Arie Cake Store | Produk {{ $product->name }}
@endsection

@push('addon-style')
    <!-- dropzone css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.min.css') }}" />
    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/swiper-bundle.min.css') }}" />
@endpush

@section('content')
    <!-- Top Header Image Start -->
    <div class="top-image">
        <img class="product-header img-fluid" src="{{ asset('assets/images/background/header-bg.png') }}" alt="header-bg" />
    </div>
    <!-- Top Header Image End -->

    <!-- header start -->
    <header class="product-page-header">
        <div class="header-panel">
            <a href="javascript:void(0);" onclick="window.history.back()" class="product-back">
                <i class="iconsax back-btn" data-icon="arrow-left"></i>
            </a>
            <h3 class="title">{{ $product->name }}</h3>
        </div>
    </header>
    <!-- header end -->

    <!-- product-image section start -->
    <section>
        <div class="product-image-slider">
            <div class="swiper product-1 ms-4">
                <div class="swiper-wrapper">
                    @if (is_array($image) && count($image) > 0)
                        @foreach ($image as $img)
                            <div class="swiper-slide">
                                <img class="img-fluid product-img" src="{{ Storage::url($img) }}" alt="p26" />
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="product-info d-flex justify-content-between">
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-image section end -->

    <!-- product-details section start -->
    <section class="pt-0">
        <div class="custom-container">
            <div class="product-details">
                <div class="product-name">
                    <h2 class="theme-color">{{ $product->name }}</h2>
                </div>

                <div class="product-price">
                    <h3 id="product-price">Rp {{ number_format($product->price) }}</h3>
                </div>

                <div class="accordion details-accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <div class="accordion-header" id="headingThree">
                            <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-p3">
                                Detail produk</div>
                        </div>
                        <div id="panelsStayOpen-p3" class="accordion-collapse collapse show" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="product-description">
                                    @if (!empty($product->description))
                                        <p>{{ $product->description }}</p>
                                    @else
                                        <p>Tidak ada detail produk</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- similer-product section start -->
    <section class="similer-product section-b-space">
        <div class="custom-container">
            <div class="title">
                <h2>Produk Sejenis</h2>
                <a href="{{ route('front.home') }}">Lihat semua</a>
            </div>

            <div class="swiper similer-product">
                <div class="swiper-wrapper">
                    @foreach ($relatedProducts as $rltp)
                        <div class="swiper-slide">
                            <div class="product-box">
                                <div class="product-box-img">
                                    <a href="{{ route('front.product', $rltp->slug) }}"> <img class="img"
                                            src="{{ Storage::url($rltp->thumbnail) }}" alt="p1" /></a>
                                    <div class="cart-box">
                                        <button class="cart-bag" data-slug="{{ $rltp->slug }}" data-quantity="1">
                                            <i class="iconsax bag" data-icon="basket-2"></i>
                                        </button>
                                    </div>
                                </div>
                                <a href="{{ route('front.product', $rltp->slug) }}">
                                    <div class="product-box-detail">
                                        <h4>{{ $rltp->name }}</h4>
                                        <h5>{{ $rltp->description }}</h5>
                                        <div class="bottom-panel">
                                            <div class="price">
                                                <h4>Rp {{ number_format($rltp->price) }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- similer-product section end -->

    <!-- cart box starts -->
    <section class="fixed-cart-btn section-b-space">
        <div class="custom-container">
            <a href="#" class="cart-box-sec" data-product-slug="{{ $product->slug }}">
                <div class="d-flex align-items-center gap-2">
                    <i class="iconsax bag" data-icon="basket-2"></i>
                    <h2>Tambah ke keranjang</h2>
                </div>
                <h2>Rp {{ number_format($product->price) }}</h2>
            </a>
        </div>
    </section>
    <!-- cart box end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->
@endsection

@push('addon-script')
    <!-- swiper js -->
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-swiper.js') }}"></script>

    <!-- range-slider js -->
    <script src="{{ asset('assets/js/range-slider.js') }}"></script>

    <!-- dropzone js -->
    <script src="{{ asset('assets/js/dropzone-min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Toastify JS -->
    <script src="{{ asset('assets/js/notify.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addToCartBtn = document.querySelector('.cart-box-sec');

            addToCartBtn.addEventListener('click', function(event) {
                event.preventDefault();

                const productSlug = this.getAttribute('data-product-slug');

                fetch(`/add-to-cart/${productSlug}`, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('total-price-detail').textContent =
                                `Rp ${data.totalPrice.toLocaleString('id-ID')}`;
                            $.notify("Produk ditambahkan ke keranjang", {
                                className: 'success',
                                globalPosition: 'top left',
                                style: 'bootstrap'
                            });
                        } else {
                            $.notify("Produk gagal ditambahkan. Coba lagi.", {
                                className: 'error',
                                globalPosition: 'top left',
                                style: 'bootstrap'
                            });
                        }
                    })
                    .catch(error => {
                        const errorMessage = error.message ||
                            "Eror. Coba lagi.";
                        $.notify(errorMessage, {
                            className: 'error',
                            globalPosition: 'top left',
                            style: 'bootstrap'
                        });
                    });
            });
        });
    </script>

    {{-- script toastify --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.cart-bag').forEach(button => {
                button.addEventListener('click', function() {
                    const slug = this.dataset.slug;
                    const quantity = this.dataset.quantity;

                    fetch(`{{ route('front.cart-add', '') }}/${slug}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                quantity: quantity
                            })
                        })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(data => {
                                    throw data;
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                $.notify("Produk ditambahkan ke keranjang", {
                                    className: 'success',
                                    globalPosition: 'top left',
                                    style: 'bootstrap'
                                });
                            } else {
                                $.notify("Produk gagal ditambahkan. Coba lagi.", {
                                    className: 'error',
                                    globalPosition: 'top left',
                                    style: 'bootstrap'
                                });
                            }
                        })
                        .catch(error => {
                            const errorMessage = error.message ||
                                "Eror. Coba lagi.";
                            $.notify(errorMessage, {
                                className: 'error',
                                globalPosition: 'top left',
                                style: 'bootstrap'
                            });
                        });
                });
            });
        });
    </script>
    {{-- end script toastify --}}
@endpush
