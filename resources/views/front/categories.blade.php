@extends('layouts.front')

@section('title')
    Arie Cake Store | Kategori
@endsection

@push('addon-style')
@endpush

@section('content')
    <!-- header start -->
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header-panel">
                <h3>Kategori</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- search section starts -->
    <section>
        <div class="custom-container">
            <form class="theme-form search-head" id="search-form">
                <div class="form-group">
                    <div class="form-input w-100">
                        <input type="text" class="form-control search" id="search"
                            placeholder="Cari kategori disini..." />
                        <i class="iconsax search-icon" data-icon="search-normal-2"></i>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- search section end -->

    <!-- Categories section start -->
    <section>
        <div class="custom-container">
            <ul class="categories-list">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('front.category', $category->slug) }}" class="d-flex align-items-center">
                            <div class="ps-3">
                                <h2>{{ $category->name }}</h2>
                                <h4 class="mt-1">Total {{ $category->products_count }} produk tersedia</h4>
                                <div class="arrow">
                                    <i class="iconsax right-arrow" data-icon="arrow-right"></i>
                                </div>
                            </div>
                            <div class="categories-img">
                                <img class="img-fluid img" src="{{ Storage::url($category->image) }}" alt="p3" />
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <!-- Categories section start -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->
@endsection

@push('addon-script')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#search-form').on('submit', function(e) {
                e.preventDefault();
            });

            var route = "{{ url('autocomplete-search-category') }}";

            $('#search').typeahead({
                source: function(query, process) {
                    return $.get(route, {
                        query: query
                    }, function(data) {
                        return process(data);
                    });
                },
                updater: function(item) {
                    window.location.href = "/category/" + item.slug;
                    return item;
                }
            });
        });
    </script>
@endpush
