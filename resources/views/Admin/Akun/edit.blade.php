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
<form action="{{ route('akun-edit-process.admin', [$user -> id]) }}" id="changeUser" method="post">
    @csrf
    {{ method_field('PUT') }}
<div class="row">
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="namaLengkapInput" class="form-label text-blue">Nama Lengkap</label>
            <input type="text" class="form-control input-border-blue" name="nama" id="namaLengkapInput" value="{{ $user -> nama }}" required>
        </div>
        <div class="mb-3">
            <label for="nomorTelponInput" class="form-label text-blue">Nomor Telepon</label>
            <input type="text" class="form-control input-border-blue" name="no_telp" id="nomorTelponInput" value="{{ $user -> no_telp }}" required>
        </div>
        <div class="mb-3">
            <label for="emailUserInput" class="form-label text-blue">Email</label>
            <input type="text" class="form-control input-border-blue" name="email" id="emailUserInput" value="{{ $user -> email }}" required>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label text-blue">Peran</label>
            <br>
            <select class="selectpicker w-100" name="role">
                <option value="Pimpinan" {{ $user -> role == 'Pimpinan' ? 'selected' : '' }}>Pimpinan</option>
                <option value="Admin" {{ $user -> role == 'Admin' ? 'selected' : '' }} >Admin</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label text-blue">Alamat</label>
            <input type="text" class="form-control input-border-blue" name="alamat" id="exampleFormControlInput1" value="{{ $user -> alamat }}" required>
        </div>
    </div>
</div>
<div class="change-password-container p-4">
    <h5>Ganti Password</h5>
    <div class="row mt-3">
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label text-blue">Password</label>
                <input type="password" class="form-control input-border-blue" name="password" id="password">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label text-blue">Ulangi Password</label>
                <input type="password" class="form-control input-border-blue" name="password_confirmation" id="password_confirmation">
            </div>
        </div>
    </div>
    <small class="text-blue" >*Password minimal 8 karakter dan harus mengandung huruf dan angka</small>
    <br>
    <small class="text-danger" >*Silahkan Kosongkan Jika Tidak Ingin Mengubah Password</small>
</div>
<div class="page-footer text-center">
<button type="submit" id="test" class="btn btn-primary w-25 mt-3 mb-5">Simpan</button>
</form>
</div>

@endsection
