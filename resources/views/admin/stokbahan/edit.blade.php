@extends('layouts.admin')

@section('title')
Stok Bahan
@endsection

@section('content')

<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
  <div class="dashboard-heading">
      <h2 class="dashboard-title">Stok Bahan</h2>
      <p class="dashboard-subtitle">
          Edit Stok Bahan "{{ $stok->name }}" 
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
        <form action="{{ url('update-stokbahan/'.$stok->id) }}" method="post" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="card">
            <div class="card-body">
              <div class="col-md-12">
                  <div class="form-group">
                      <label>Nama Stok</label>
                      <input type="text" name="name" class="form-control" value="{{ $stok->name }}">
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label>Netto</label>
                      <input type="number" name="netto" class="form-control" value="{{ $stok->netto }}">
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

@endsection

