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

<div class="card-edit p-5 mt-4">
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <p class="form-label-modal disable-label" >ID Reklame</p>
                <input type="text" class="form-control w-50" id="disabledTextInput" disabled>
            </div>
            <div class="mb-3">
                <p class="form-label-modal disable-label" >Nama Reklame</p>
                <input type="text" class="form-control" id="disabledTextInput" disabled>
            </div>
            <div class="mb-3">
                <p class="form-label-modal disable-label" >Lokasi Reklame</p>
                <input type="text" class="form-control" id="disabledTextInput" disabled>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <p class="form-label-modal" >Nama Penyewa</p>
                <input type="text" class="form-control" id="disabledTextInput">
            </div>
            <div class="mb-3">
                <p class="form-label-modal" >Nama Perusahaan</p>
                <input type="text" class="form-control" id="disabledTextInput">
            </div>
            <div class="mb-3">
                <p class="form-label-modal" >Jenis Iklan</p>
                <input type="text" class="form-control" id="disabledTextInput">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <p class="form-label-modal" >Tanggal Pemasangan</p>
                    <input type="date" class="form-control form-date">
                </div>
                <div class="col-sm-6">
                    <p class="form-label-modal" >Jatuh Tempo</p>
                    <input type="date"  class="form-control form-date">
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-5">
        <button class="btn btn-primary w-25" type="button">Simpan</button>
    </div>
</div>

@endsection