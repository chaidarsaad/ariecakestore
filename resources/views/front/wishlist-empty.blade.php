@extends('layouts.front')

@section('title')
    Arie Cake Store | Wishlist
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
                    <h3>Wishlist</h3>
                </div>
            </div>
        </header>
        <!-- header end -->

        <!-- wishlist start -->
        <section class="section-b-space pt-0">
            <div class="custom-container">
                <div class="empty-tab">
                    <img class="img-fluid empty-img img1 w-100" src="assets/images/gif/wishlist.gif" alt="empty-wishlist" />

                    <h2>Your Wishlist is Empty!!</h2>
                    <h5 class="mt-3">If you haven't made any wishes yet, do so now for a better life.</h5>

                    <a href="{{ route('front.home') }}" class="btn theme-btn w-100 mt-5" role="button">Add Now</a>
                </div>
            </div>
        </section>
        <!-- Notification end -->

        <!-- iconsax js -->
        <script src="assets/js/iconsax.js"></script>

        <!-- bootstrap js -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>

        <!-- script js -->
        <script src="assets/js/script.js"></script>
    </body>
@endsection

@push('addon-script')
@endpush
