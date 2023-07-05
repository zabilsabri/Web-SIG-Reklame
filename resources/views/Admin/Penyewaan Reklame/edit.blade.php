@extends('Admin.layout.app', ['title' => 'Penyewaan Reklame'])
<link rel="stylesheet" href="{{ asset('css/Admin/Penyewaan Reklame/sewaReklame.css') }}">

@section('content')

<div class="d-flex align-items-center">
  <div class="flex-shrink-0">
    <a href="{{ route('reklame.admin') }}"><img src="{{ asset('img/back.png') }}" alt="back"></a>
  </div>
  <div class="flex-grow-1 ms-3 back-title">
    Ubah Data Penyewaan Reklame
  </div>
</div>

@if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
  <strong>Berhasil!</strong> {{$message}}.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card-edit p-5 mt-4 mb-5">
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <p class="form-label-modal disable-label" >ID Reklame</p>
                <form action="{{ route('reklame-edit-process.admin', [$penyewaan -> id]) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <input type="text" value="{{ $penyewaan->reklame_id }}" name="id_reklame" class="form-control w-50" id="disabledTextInput" disabled>
            </div>
            <div class="mb-3">
                <p class="form-label-modal disable-label" >Nama Reklame</p>
                <input type="text" class="form-control" id="disabledTextInput" value="{{ $penyewaan->reklame->nama }}" disabled>
            </div>
            <div class="mb-3">
                <p class="form-label-modal disable-label" >Lokasi Reklame</p>
                <input type="text" class="form-control" id="disabledTextInput" value="{{ $penyewaan -> reklame -> jalan }}" disabled>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <p class="form-label-modal" >Nama Penyewa</p>
                <input type="text" class="form-control" id="disabledTextInput" name="nama_penyewa" value="{{ $penyewaan -> nama }}" required>
            </div>
            <div class="mb-3">
                <p class="form-label-modal" >Nama Perusahaan</p>
                <input type="text" class="form-control" id="disabledTextInput" name="nama_perusahaan" value="{{ $penyewaan -> perusahaan }}" required>
            </div>
            <div class="mb-3">
                <p class="form-label-modal" >Jenis Iklan</p>
                <input type="text" class="form-control" id="disabledTextInput" name="jenis_iklan" value="{{ $penyewaan -> jenis }}" required>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p class="form-label-modal" >Tanggal Pemasangan</p>
                    <input type="date" class="form-control form-date" name="tgl_pasang" value="{{ $penyewaan -> getRawOriginal('tgl_pasang') }}" required>
                </div>
                <div class="col-sm-6">
                    <p class="form-label-modal" >Jatuh Tempo</p>
                    <input type="date"  class="form-control form-date" name="jth_tempo" value="{{ $penyewaan -> getRawOriginal('tgl_jatuh_tempo') }}" required>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-5">
        <button class="btn btn-primary w-25" type="submit">Simpan</button>
        </form>
    </div>
</div>

@endsection