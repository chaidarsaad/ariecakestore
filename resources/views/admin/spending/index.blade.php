@extends('layouts.admin')

@section('title')
    Pengeluaran
@endsection

@section('content')

<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Pengeluaran</h2>
        <p class="dashboard-subtitle">
            List Pengeluaran
        </p>
    </div>
    <div class="dashboard-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{  url('add-spendings') }}" class="btn btn-primary mb-3">
                            + Pengeluaran
                        </a>
                        <div class="table-responsive">
                            <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                <thead>
                                <tr>
                                    <th class="">Keterangan</th>
                                    <th class="">Pengeluaran</th>
                                    <th class="">Tanggal</th>
                                    <th class="">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <hr>
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
                { data: 'description', name: 'description' },
                { data: 'total_spending', name: 'total_spending' },
                { data: 'created_at', name: 'created_at' },
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

