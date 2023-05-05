@extends('layouts.admin')

@section('title')
    Kategori
@endsection

@section('content')

<div class="section-content section-dashboard-home" data-aos="fade-up" >
    <div class="container-fluid">
      <div class="dashboard-heading">
          <h2 class="dashboard-title">Kateogri</h2>
          <p class="dashboard-subtitle">
              Edit "{{ $category->name }}" Kategori
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
            <form action="{{ url('update-category/'.$category->id) }}" method="post" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="card">
                <div class="card-body">
                    <a href="{{  url('categories') }}" class="btn btn-primary mb-3">
                        Kembali
                    </a>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="name" required value="{{ $category->name }}"/>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="image" placeholder="Photo" />
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="">Tampil di semua kategori?</label>
                      <input type="checkbox" {{ $category->status == "1" ? 'checked':'' }} name="status" >
                  </div>
                  <div class="col-md-6 mb-3">
                      <label for="">Tampil di Trending?</label>
                      <input type="checkbox" {{ $category->popular == "1" ? 'checked':'' }} name="popular">
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
            <h4>Edit/Update "{{ $category->name }}" Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Name</label>
                        <input type="text" value="{{ $category->name }}" class="form-control" name="name">
                    </div>
                    
                    @if($category->image)
                        <img src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="Category image" class="cate-image">
                    @endif
                    <div class="col-md-12 mb-3">
                        <label>Foto Category</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="">Tampil di semua kategori?</label>
                        <input type="checkbox" {{ $category->status == "1" ? 'checked':'' }} name="status" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Tampil di Trending?</label>
                        <input type="checkbox" {{ $category->popular == "1" ? 'checked':'' }} name="popular">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

