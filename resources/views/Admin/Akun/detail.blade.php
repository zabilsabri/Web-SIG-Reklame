@extends('Admin.layout.app', ['title' => 'Detail Akun'])
@section('content')

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
  <strong>Berhasil!</strong> {{$message}}.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="profile-pic text-center mb-3">
    <img src="{{ asset('img/PP.png') }}" width="150px" height="auto" class="rounded-circle" alt="profile-pic">
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="namaLengkapInput" class="form-label text-blue">Nama Lengkap</label>
            <input type="text" class="form-control input-border-blue" id="namaLengkapInput" value="{{ $user -> nama }}" readOnly>
        </div>
        <div class="mb-3">
            <label for="nomorTelponInput" class="form-label text-blue">Nomor Telepon</label>
            <input type="text" class="form-control input-border-blue" id="nomorTelponInput" value="{{ $user -> no_telp }}" readOnly>
        </div>
        <div class="mb-3">
            <label for="emailUserInput" class="form-label text-blue">Email</label>
            <input type="text" class="form-control input-border-blue" id="emailUserInput" value="{{ $user -> email }}" readOnly>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label text-blue">Peran</label>
            <input type="text" class="form-control input-border-blue" id="exampleFormControlInput1" value="{{ $user -> role }}" readOnly>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label text-blue">Alamat</label>
            <input type="text" class="form-control input-border-blue" id="exampleFormControlInput1" value="{{ $user -> alamat }}" readOnly>
        </div>
    </div>
</div>
<div class="page-footer text-center">
<a href="{{ route('akun-edit.admin', [$user -> id]) }}" type="button" class="btn btn-primary w-25 mt-3 mb-5">Ubah Data</a>
</div>

@endsection
