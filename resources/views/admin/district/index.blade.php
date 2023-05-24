@extends('layouts.admin')

@section('title')
    Ongkos Kirim
@endsection

@section('content')

<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Ongkos Kirim</h2>
        <p class="dashboard-subtitle">
            Ongkos Kirim Berdasarkan Kecamatan
        </p>
    </div>
    <div class="dashboard-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{  url('add-districts') }}" class="btn btn-primary mb-3">
                            + Ongkos Kirim
                        </a>
                        <div class="table-responsive">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                <thead>
                                <tr>
                                    <th class="">Kecamatan</th>
                                    <th class="">Harga</th>
                                    <th class="">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <h4>Hitung Ongkos Kirim Disini</h4>
                        <form method="POST" action="{{ url('calculator') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="namakec" class="form-control" placeholder="Nama Kecamatan" >
                                <input type="number" name="first" class="form-control" placeholder="Jarak Ke Kecamatan Tujuan Satuan Kilometer" >
                                <button class="btn btn-success" type="submit">Hitung</button>
                            </div>
                        </form>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2035.3822249686716!2d113.52291911607841!3d-7.72161105107196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd703136504d563%3A0x82c39c8c196f31f0!2sArie%20Cake%20Tart%20Decoration%20%26%20Cookies!5e0!3m2!1sen!2sid!4v1684812424749!5m2!1sen!2sid" width="300" height="300" style="border:0;" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('addon-script')
    <script>
        // AJAX DataTable
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'name', name: 'name' },
                { data: 'price', name: 'price' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush

