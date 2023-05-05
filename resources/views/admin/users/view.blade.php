@extends('layouts.admin')

@section('title')
    Akun
@endsection

@section('content')

<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
  <div class="dashboard-heading">
      <h2 class="dashboard-title">Akun</h2>
      <p class="dashboard-subtitle">
          Edit "" Akun
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
        <form action="" method="" enctype="multipart/form-data">
          {{-- @method('PUT') --}}
          @csrf
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama User</label>
                    <input type="text" class="form-control" name="name" value="{{ $users->name }}" required />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Email User</label>
                    <input type="text" class="form-control" name="email" value="{{ $users->email }}" required />
                  </div>
                </div>
                {{-- <div class="col-md-12">
                  <div class="form-group">
                    <label>Password User</label>
                    <input type="text" class="form-control" name="password" />
                    <small>Kosongkan jika tidak ingin mengganti password</small>
                  </div>
                </div> --}}
                {{-- <div class="col-md-12">
                  <div class="form-group">
                    <label>Roles</label>
                    <select name="roles" required class="form-control">
                        <option value="{{ $item->roles }}" selected>Tidak diganti</option>
                        <option value="ADMIN">Admin</option>
                        <option value="USER">User</option>
                        <option value="KARYAWAN">Karyawan</option>
                      </select>
                  </div>
                </div> --}}
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

<div class="container" style="display: none">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>User Detail
                        <a href="{{ url('users') }}" class="btn btn-primary btn-sm float-right">Kembali</a>
                    </h4>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mt-3">
                            <label for="">Role</label>
                            <div class="p-2 border">{{ $users->role_as == '0'? 'User':'Admin' }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Nama Lengkap</label>
                            <div class="p-2 border">{{ $users->name }}</div>
                        </div>
                    
                        <div class="col-md-4 mt-3">
                            <label for="">Email</label>
                            <div class="p-2 border">{{ $users->email }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">No WhatsApp</label>
                            <div class="p-2 border">{{ $users->phone }}</div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <label for="">Alamat Lengkap</label>
                            <div class="p-2 border">{{ $users->address1 }}</div>
                        </div>
                        

                        <div class="col-md-4 mt-3">
                            <label for="">Kecamatan</label>
                            <div class="p-2 border">{{ $users->city }}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

