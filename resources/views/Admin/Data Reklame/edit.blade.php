@extends('Admin.layout.app', ['title' => 'Edit Data Reklame'])
<link rel="stylesheet" href="{{ asset('css/Admin/Penyewaan Reklame/sewaReklame.css') }}">

@section('content')

<div class="d-flex align-items-center">
  <div class="flex-shrink-0">
    <a href="{{ route('data-reklame.admin') }}"><img src="{{ asset('img/back.png') }}" alt="back"></a>
  </div>
  <div class="flex-grow-1 ms-3 back-title">
    Ubah Data Reklame
  </div>
</div>

<div class="card-edit p-5 mt-4 mb-5">
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <p class="form-label-modal text-light-blue" >Nama Reklame</p>
                <input type="text" class="form-control input-border-blue" id="disabledTextInput">
            </div>
            <div class="mb-3">
                <p class="form-label-modal text-black" >Titik Lokasi Reklame :</p>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="form-label-modal text-light-blue" >Lokasi Reklame</p>
                        <input type="text" class="form-control input-border-blue">
                    </div>
                    <div class="col-sm-6">
                        <p class="form-label-modal text-light-blue" >Lokasi Reklame</p>
                        <input type="text" class="form-control input-border-blue">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="form-label-modal text-light-blue" >Tinggi Reklame</p>
                        <input type="text" class="form-control input-border-blue">
                    </div>
                    <div class="col-sm-6">
                        <p class="form-label-modal text-light-blue" >Luas Reklame</p>
                        <input type="text" class="form-control input-border-blue">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="form-label-modal text-light-blue" >Lama Pemasangan</p>
                        <input type="text" class="form-control input-border-blue">
                    </div>
                    <div class="col-sm-6">
                        <p class="form-label-modal text-light-blue" >Harga Sewa</p>
                        <input type="text" class="form-control input-border-blue">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <img src="{{ asset('img/background.png') }}" width="100%" height="350px" alt="foto">
        </div>
    </div>
    <div class="text-center mt-5">
        <button class="btn btn-primary w-25" type="button">Simpan</button>
    </div>
</div>

@endsection