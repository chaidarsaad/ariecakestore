@extends('layouts.front')

@section('title')
    Arie Cake Store | Tentang Kami
@endsection

@push('addon-style')
@endpush

@section('content')
    <!-- header start -->
    <header class="section-t-space">
        <div class="custom-container">
            <div class="header-panel">
                <h3 class="mt-2">{{ $data->store_name ?? 'no store name' }}</h3>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- help section start -->
    <section class="section-b-space">
        <div class="custom-container">
            <div class="help-center">
                <img style="width: 150px" class="img-fluid help-pic mx-auto d-block mt-4"
                    src="{{ isset($data) && $data->logo ? Storage::url($data->logo) : asset('assets/images/logo/logo ariecakestore circle.png') }}"
                    alt="help" />
                <h2>Tentang Kami</h2>
                <p style="text-align: justify">Arie Cake Tart Decoration & Cookies yang berlokasi di Sumberanyar Paiton,
                    berdiri sejak tahun 2015 melayani pemesanan online maupun offline. <br><br>Arie Cake Tart Decoration &
                    Cookies
                    menyediakan kue tart, kue basah, kue kering, kue tradisional, puding, snackbox, ricebox, dan lain-lain
                    sesuai pesanan costumer. Dengan alat dan bahan yang digunakan mengutamakan kualitas, kebersihan,
                    kesehatan sesuai dengan standart kesehatan.
                </p>

                <h2>Mengapa memilih kami?</h2>
                <p style="text-align: justify">Seiring berjalan nya waktu Arie Cake Tart Decoration & Cookies. Terhitung
                    tanggal 11 desember 2021 , alhamdulillah sudah memiliki perizinan berusaha berbasis risiko dengan Nomor
                    Induk Usaha : 1112210007923. Dan telah lolos uji Sertifikat Halal terhitung tanggal 30 april 2024 dengan
                    nomor : ID35110017058840424
                </p>
                <p style="text-align: justify">Tidak perlu diragukan lagi untuk berbelanja di Arie Cake Tart Decoration &
                    Cookies
                    "Because Taste Never Lies"
                    (Sebab rasa tidak pernah bohong)

                </p>

                <h2>Jam Buka</h2>
                <p style="text-align: justify">
                    Senin - Jumat: 08.00 - 16.00 WIB<br>
                    Sabtu: 10.00 - 16.00 WIB<br>
                    Minggu: Via <a target="_blank" href="https://wa.me/+6285257436005">WhatsApp 085257436005</a><br>
                </p>

                <h2>Lokasi Toko</h2>
                <div class="row mt-2">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.6398746833493!2d113.52127417404856!3d-7.721732276510256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd703136504d563%3A0x82c39c8c196f31f0!2sArie%20Cake%20Tart%20Decoration%20%26%20Cookies!5e0!3m2!1sen!2sid!4v1721871468713!5m2!1sen!2sid"
                        allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade" height="350">
                    </iframe>
                </div>

                </br>
                <h3>Pertanyaan yang sering ditanyakan</h3>
                <div class="accordion accordion-flush help-accordion" id="accordionFlushExample">
                    @php
                        $ques = 0;
                        $ans = 0;
                    @endphp
                    @foreach ($questions as $question)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse{{ $ques++ }}"
                                    aria-expanded="false">{{ $question->question }}</button>
                            </h2>
                            <div id="flush-collapse{{ $ans++ }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">{{ $question->answer }}</div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- help section end -->

    <!-- footer start -->
    <footer class="section-t-space">
        <div class="custom-container">
            <div class="header-panel">
                <h3 class="mt-2">Sosial Media Kami</h3>
            </div>
        </div>
    </footer>
    <footer class="section-t-space">
        <div class="custom-container">
            <div class="header-panel">
                <div class="row justify-content-center mx-auto mt-2">
                    <div class="d-flex">
                        <a href="https://wa.me/+6285257436005" class="mx-2" target="_blank">
                            <img style="width: 40px" class=""
                                src="{{ asset('assets/images/svg/whatsapp-svgrepo-com.svg') }}" alt="help" />
                        </a>
                        <a href="https://www.facebook.com/share/xciHUHqD8RWXSjBd/?mibextid=LQQJ4d" class="mx-2"
                            target="_blank">
                            <img style="width: 40px" class="" src="{{ asset('assets/images/svg/facebook.svg') }}"
                                alt="help" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <!-- panel-space start -->
    <section class="panel-space"></section>
    <!-- panel-space end -->
@endsection

@push('addon-script')
@endpush
