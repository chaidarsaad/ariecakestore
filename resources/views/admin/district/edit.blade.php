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
          Edit Ongkos Kirim "{{ $districts->name }}" 
      </p>
  </div>
  <div class="dashboard-content">
    <div class="row">
      <div class="col-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('update-district/'.$districts->id) }}" method="post" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="card">
            <div class="card-body">
              <div class="col-md-12">
                  <div class="form-group">
                      <label>Nama Kecamatan</label>
                      <input type="text" name="name" class="form-control" value="{{ $districts->name }}">
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label>Ongkos Kirim</label>
                      <input type="number" name="price" class="form-control" value="{{ $districts->price }}">
                  </div>
              </div>
              <div class="row">
                <div class="col text-right">
                  <button
                    type="submit"
                    class="btn btn-success px-5"
                  >
                    Simpan
                  </button>
                </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

    <div class="card" style="display: none">
        <div class="card-header">
            <h4>Edit Produk "{{ $districts->name }}"</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-district/'.$districts->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Kecamatan</label>
                        <input type="text" class="form-control" value="{{ $districts->name }}" name="name" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Harga Ongkos Kirim</label>
                        <input type="number" class="form-control" value="{{ $districts->price }}" name="price" >
                    </div>
                    
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

