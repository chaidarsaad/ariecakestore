@extends('layouts.front')

@section('title')
    Arie Cake Store | Product {{ $product->name }}
@endsection

@push('addon-style')
    <!-- dropzone css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/dropzone.min.css') }}" />
    <!-- swiper css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/swiper-bundle.min.css') }}" />
@endpush

@section('content')
    <!-- header start -->
    <header class="product2-header">
        <div class="custom-container">
            <div class="header-panel">
                <a href="javascript:void(0);" onclick="window.history.back()">
                    <i class="iconsax back-btn" data-icon="arrow-left"></i>
                </a>
                <h3>{{ $product->name }}</h3>
                <div class="d-flex gap-2">
                    <a href="search.html" class="search">
                        <i class="iconsax icons" data-icon="search-normal-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- product-image section start -->
    <section class="product2-image-section">
        <div class="custom-container">
            <div class="product2-img-slider">
                <img class="img-fluid product2-bg" src="{{ asset('assets') }}/images/background/product-img-bg.png"
                    alt="product-bg" />
                <div class="swiper product-2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="img-fluid product-img" src="{{ asset('assets') }}/images/product/29.png"
                                alt="p26" />
                        </div>
                    </div>
                    <div class="swiper-button-next">
                        <i class="iconsax arrow" data-icon="arrow-right"></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class="iconsax arrow" data-icon="arrow-left"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-image section end -->

    <!-- product-details section start -->
    <section class="position-relative">
        <img class="img-fluid product-details-effect-dark" src="{{ asset('assets') }}/images/effect-dark.png"
            alt="effect-dark" />
        <div class="custom-container">
            <div class="product-details">
                <div class="product-name">
                    <h2 class="theme-color">{{ $product->name }}</h2>
                </div>
                <p class="mt-1">The buddy chair with modern comfort and durable fabric.</p>

                <div class="product-price">
                    <h3>Rp {{ number_format($product->price) }}</h3>
                    <div class="plus-minus">
                        <i class="iconsax sub" data-icon="minus"></i>
                        <input type="number" value="1" min="1" max="10" />
                        <i class="iconsax add" data-icon="add"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- similar product section starts -->
    <section class="similer-product">
        <div class="custom-container">
            <div class="title">
                <h2>Similar Products</h2>
                <a href="shop.html">View All</a>
            </div>

            <div class="swiper similer-product">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
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
                    <div class="swiper-slide">
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

                    <div class="swiper-slide">
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

                    <div class="swiper-slide">
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

                    <div class="swiper-slide">
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

                    <div class="swiper-slide">
                        <div class="product-box">
                            <div class="product-box-img">
                                <a href="product-details.html">
                                    <img class="img" src="{{ asset('assets') }}/images/product/17.png"
                                        alt="p17" />
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
        </div>
    </section>
    <!-- similar product section end -->

    <!-- my-review offcanvas start -->
    <div class="offcanvas offcanvas-bottom my-review-offcanvas" tabindex="-1" id="my-review">
        <div class="offcanvas-header review-head">
            <h4 class="offcanvas-title" id="offcanvasBottomLabel">Create Review</h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body review-body">
            <div class="rating-sec d-flex align-items-center justify-content-start gap-1 border-0 p-0">
                <h4 class="theme-color fw-normal">Rating :</h4>

                <ul class="rating-stars">
                    <li><img class="img-fluid stars" src="{{ asset('assets') }}/images/svg/Star.svg" alt="star" />
                    </li>
                    <li><img class="img-fluid stars" src="{{ asset('assets') }}/images/svg/Star.svg" alt="star" />
                    </li>
                    <li><img class="img-fluid stars" src="{{ asset('assets') }}/images/svg/Star.svg" alt="star" />
                    </li>
                    <li><img class="img-fluid stars" src="{{ asset('assets') }}/images/svg/Star.svg" alt="star" />
                    </li>
                    <li><img class="img-fluid stars" src="{{ asset('assets') }}/images/svg/star1.svg" alt="star" />
                    </li>
                </ul>
            </div>

            <form class="theme-form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="name" class="form-check-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter Your name"
                                required="" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mt-3">
                            <label for="email" class="form-check-label">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Email"
                                required="" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label class="form-check-label" for="review">Review Title</label>
                            <input type="text" class="form-control" id="review"
                                placeholder="Enter your Review Subjects" required="" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label class="form-check-label">Add a Photo or Video</label>
                            <div class="upload-image">
                                <div id="upload-file" class="my-dropzone"></div>
                                <div class="upload-icon">
                                    <i class="iconsax add-icon" data-icon="add"></i>
                                    <h6>Upload</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-3">
                            <label for="review" class="form-check-label">Review</label>
                            <textarea class="form-control" placeholder="Write Your Review Here" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <a href="product-details.html" class="btn theme-btn mt-3">Submit Your Review</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- my-review offcanvas end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- cart box starts -->
    <section class="fixed-cart-btn section-b-space">
        <div class="custom-container">
            <a href="cart.html" class="cart-box-sec">
                <div class="d-flex align-items-center gap-2">
                    <i class="iconsax bag" data-icon="basket-2"></i>
                    <h2>Add to cart</h2>
                </div>
                <h2>$102.25</h2>
            </a>
        </div>
    </section>
    <!-- cart box end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->

    <!-- product-details section end -->
@endsection

@push('addon-script')
    <!-- swiper js -->
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom-swiper.js') }}"></script>

    <!-- range-slider js -->
    <script src="{{ asset('assets/js/range-slider.js') }}"></script>

    <!-- dropzone js -->
    <script src="{{ asset('assets/js/dropzone-min.js') }}"></script>
@endpush
