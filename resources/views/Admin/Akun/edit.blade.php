@extends('Admin.layout.app', ['title' => 'Edit Akun'])
@section('content')

<style>
    .change-password-container{
        border-radius: 10px;
        border: 1px solid #2E50A6;
    }

    .my-box {
        background: #2E50A6;
        bottom: 14.64%;
        height: 40px;
        padding: 0.1rem;
        position: absolute;
        right: 14.64%;
        transform: translate(50%, 50%);
        width: 40px;
        z-index: 2;
        border-radius: 50%;
    }

    .avatar.avatar-xxl {
        font-size: 30px;
        height: auto;
        width: 160px;
    }

    .avatar {
        background: #FFFF;
        border-radius: 50%;
        color: #FFFF;
        display: block;
        font-size: 16px;
        font-weight: 300;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        line-height: 1.28;
        height: 45px;
        width: 45px;
        border: 5px solid #FFFF;
    }

    .profile-user-picture{
        display: block;
        width: 150px;
    }

    .avatar img {
        border-radius: 50%;
        height: 100%;
        position: relative;
        width: 100%;
        z-index: 1;
    }


</style>

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show mb-1" role="alert">
  <strong>Berhasil!</strong> {{$message}}.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show m-5" role="alert">
            <ul>
            @foreach ($errors->all() as $error)
                <li> {{$error}} </li>
            @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="profile-pic text-center mb-3">
    <figure class="avatar mr-2 avatar-xxl img-fluid">
    <img src="{{ asset('temp_file/profile/' . $user -> foto) }}" onerror="this.onerror=null;this.src='{{ asset('img/PP.png') }}';" class="rounded-circle" alt="profile-pic">
        <a class="my-box" href="" data-bs-toggle="modal" data-bs-target="#change-picture">
            <img src="{{ asset('img/pencil.png') }}" style="width: 20px;padding-bottom: 13px;" alt="">
        </a>
    </figure>
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

<!-- Modal -->
<div class="modal fade" id="change-picture" tabindex="-1" aria-labelledby="change-pictureLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="change-pictureLabel">Ubah Photo Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="{{ route('change-profile-picture', [$user -> id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <figure class="avatar mr-2 avatar-xxl">
            <img id="output_image" src="{{ asset('temp_file/profile/' . $user -> foto) }}" onerror="this.onerror=null;this.src='{{ asset('img/PP.png') }}';" class="rounded-circle" alt="profile-pic">
        </figure>
        <input type="file" name="profile_pic" onchange="preview(event)">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    </div>
</div>
</div>

<script type='text/javascript'>
    function preview(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output_image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection
