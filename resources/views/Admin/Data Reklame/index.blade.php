@extends('Admin.layout.app', ['title' => 'Data Reklame'])
<link rel="stylesheet" href="{{ asset('css/Admin/Penyewaan Reklame/sewaReklame.css') }}">

@section('content')
<div class="card-border-blue p-5">
<table id="tableReklame" class="table table-striped table-hover">
    <thead>
        <tr class="table-head" >
            <th scope="col">ID</th>
            <th scope="col">Nama Reklame</th>
            <th scope="col">Peta Lokasi Reklame</th>
            <th scope="col">Lama Pemasangan</th>
            <th scope="col">Harga Sewa</th>
            <th scope="col">Status Reklame</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <!-- Modal Data Reklame-->
    <div class="modal fade" id="detailReklame" tabindex="-1" aria-labelledby="detailReklameLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-black" id="detailReklameLabel">Reklame Kelurahan Tahoa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="col-sm-auto mb-3">
                                <p class="form-label-modal text-light-blue" >Lokasi Reklame</p>
                                <input type="text" class="form-control input-border-blue" id="nama" readonly>
                            </div>
                            <div class="col-sm-auto p-4 text-blue bg-light-blue mb-3">
                                <p class="form-label-modal text-black mb-3" >Titik Lokasi Reklame</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="form-label-modal text-light-blue" >Latitude</p>
                                        <input type="text" class="form-control input-border-blue" id="latitude" readonly>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="form-label-modal text-light-blue" >Longitude</p>
                                        <input type="text" class="form-control input-border-blue" id="longitude" readonly>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('img/background.png') }}" width="100%" height="200px" alt="peta">
                        </div>
                        <div class="col-sm-4">
                            <div class="col-sm-auto mb-3">
                                <p class="form-label-modal disable-label" >Status Reklame</p>
                                <input type="text" class="form-control input-border-blue" id="status" disabled>
                            </div>
                            <div class="col-sm-auto mb-3">
                                <p class="form-label-modal text-light-blue" >Harga Sewa</p>
                                <input type="text" class="form-control input-border-blue" id="harga" readonly>
                            </div>
                            <div class="col-sm-auto mb-3">
                                <p class="form-label-modal text-light-blue" >Tanggal Pemasangan</p>
                                <input type="text" class="form-control input-border-blue" id="tgl_pasang" readonly>
                            </div>
                            <div class="col-sm-auto mb-3">
                                <p class="form-label-modal text-light-blue" >Jatuh Tempo</p>
                                <input type="text" class="form-control input-border-blue" id="jth_tempo" readonly>
                            </div>
                            <div class="col-sm-auto mb-3">
                                <p class="form-label-modal text-light-blue" >Jenis Iklan</p>
                                <input type="text" class="form-control input-border-blue" id="jenis_iklan" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</table>
</div>


<div class="modal fade" id="tambahReklameModal" tabindex="-1" aria-labelledby="tambahReklameModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="tambahReklameModalLabel">Tambah Data Penyewaan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <div class="row">
                <div class="btn-group">
                    <form action="" method="POST" id="formReklame">
                    <select class="selectpicker mb-3">
                        <option value="">Pilih Status Reklame</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <p class="form-label-modal text-light-blue" >Nama Reklame</p>
                        <input type="text" class="form-control input-border-blue" id="nama-add">
                    </div>
                    <div class="mb-3 p-3 bg-light-blue">
                        <p class="form-label-modal text-black mb-3" >Titik Lokasi Reklame</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="form-label-modal text-light-blue" >Lattitude</p>
                                <input type="text" class="form-control input-border-blue" id="lattitude-add">
                            </div>
                            <div class="col-sm-6">
                                <p class="form-label-modal text-light-blue" >Longitude</p>
                                <input type="text" class="form-control input-border-blue" id="longitude-add">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="form-label-modal text-light-blue" >Tinggi Reklame</p>
                                <input type="text" class="form-control input-border-blue" id="tinggi-add">
                            </div>
                            <div class="col-sm-6">
                                <p class="form-label-modal text-light-blue" >Luas Reklame</p>
                                <input type="text" class="form-control input-border-blue" id="luas-add">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal" >Lama Pemasangan</p>
                        <input type="text" class="form-control input-border-blue" id="lama-add">
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal" >Harga Sewa</p>
                        <input type="text" class="form-control input-border-blue" id="harga-add">
                        <input id="reklame-token-add" name="_token" type="hidden" value="{{csrf_token()}}">
                    </div>
                </div>
            </div>            
        </div>
        <div class="modal-footer">
            <button type="button" id="add_reklame" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
  </div>
</div>

@endsection