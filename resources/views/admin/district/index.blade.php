@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>List Ongkos Kirim</h4>
        </div>
        <div class="col-md-12">
            <a href="{{ url('add-districts') }}" class="btn btn-primary">Tambah Kecamatan</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="">Kecamatan</th>
                        <th class="">Harga</th>
                        <th class="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($districts as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ number_format($item->price) }}</td>
    
                            <td>
                                <a href="{{ url('edit-district/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ url('delete-district/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

