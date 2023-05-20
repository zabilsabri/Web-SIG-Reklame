@extends('Admin.layout.app', ['title' => 'Edit Akun'])
@section('content')

<style>
    .change-password-container{
        border-radius: 10px;
        border: 1px solid #2E50A6;
    }
</style>

<div class="profile-pic text-center mb-3">
    <img src="{{ asset('img/PP.png') }}" width="150px" height="auto" class="rounded-circle" alt="profile-pic">
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="namaLengkapInput" class="form-label text-blue">Nama Lengkap</label>
            <input type="text" class="form-control input-border-blue" id="namaLengkapInput" value="">
        </div>
        <div class="mb-3">
            <label for="nomorTelponInput" class="form-label text-blue">Nomor Telepon</label>
            <input type="text" class="form-control input-border-blue" id="nomorTelponInput" value="">
        </div>
        <div class="mb-3">
            <label for="emailUserInput" class="form-label text-blue">Email</label>
            <input type="text" class="form-control input-border-blue" id="emailUserInput" value="">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label text-blue">Peran</label>
            <input type="text" class="form-control input-border-blue" id="exampleFormControlInput1" value="">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label text-blue">Alamat</label>
            <input type="text" class="form-control input-border-blue" id="exampleFormControlInput1" value="">
        </div>
    </div>
</div>
<div class="change-password-container p-4">
    <h5>Ganti Password</h5>
    <div class="row mt-3">
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label text-blue">Password</label>
                <input type="password" class="form-control input-border-blue" id="exampleFormControlInput1" value="">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label text-blue">Ulangi Password</label>
                <input type="password" class="form-control input-border-blue" id="exampleFormControlInput1" value="">
            </div>
        </div>
    </div>
    <small class="text-blue" >*Password minimal 8 karakter dan harus mengandung huruf dan angka</small>
</div>
<div class="page-footer text-center">
<button type="button" class="btn btn-primary w-25 mt-3 mb-5">Simpan</button>
</div>

@endsection
