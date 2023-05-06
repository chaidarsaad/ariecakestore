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
          Edit Pengeluaran "{{ $spendings->description }}" 
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
        <form action="{{ url('update-spending/'.$spendings->id) }}" method="post" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="card">
            <div class="card-body">
              <div class="col-md-12">
                  <div class="form-group">
                      <label>Keterangan</label>
                      <input type="text" name="description" class="form-control" value="{{ $spendings->description }}">
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label>Pengeluaran</label>
                      <input type="number" name="total_spending" class="form-control" value="{{ $spendings->total_spending }}">
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

