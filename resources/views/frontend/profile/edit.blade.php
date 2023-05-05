@extends('layouts.front')

@section('title')
    My Profile
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Edit Profile {{ $user->name }}
                            <a href="{{ url('my-profile') }}" class="btn btn-warning float-end">Kembali</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('my-profile/editprofile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12 order-details">
                                    <h4>Detail Profil
                                        <a href="{{ url('') }}" class="btn btn-primary float-end">Simpan</a>
                                    </h4>
                                    <hr>
                                    <label for="">Nama Lengkap</label>
                                    <div class="border">{{ $user->name }}</div>
                                    <label for="">Email</label>
                                    <div class="border">{{ $user->email }}</div>
                                    <label for="">No WhatsApp</label>
                                    <div class="border">{{ $user->phone }}</div>
                                    <label for="">Alamat Lengkap</label>
                                    <div class="border">
                                        {{ $user->address1 }}<br>
                                        {{ $user->districts_id }}<br>
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
