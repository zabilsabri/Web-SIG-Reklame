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
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailReklame"><img src="{{ asset('img/peta.png') }}" alt="icon peta"></button></td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td class="text-center" >
                <a href="{{ route('data-reklame-edit.admin') }}"><img src="{{ asset('img/ic_edit.png') }}" alt="edit"></a>
                <a href=""><img src="{{ asset('img/ic_delete.png') }}" alt="delete"></a>
            </td>
        </tr>
    </tbody>
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
                                <input type="text" class="form-control input-border-blue" readonly>
                            </div>
                            <div class="col-sm-auto p-4 text-blue bg-light-blue mb-3">
                                <p class="form-label-modal text-black mb-3" >Titik Lokasi Reklame</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="form-label-modal text-light-blue" >Lokasi Reklame</p>
                                        <input type="text" class="form-control input-border-blue" readonly>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="form-label-modal text-light-blue" >Lokasi Reklame</p>
                                        <input type="text" class="form-control input-border-blue" readonly>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('img/background.png') }}" width="100%" height="200px" alt="peta">
                        </div>
                        <div class="col-sm-4">
                            <div class="col-sm-auto mb-3">
                                <p class="form-label-modal disable-label" >Status Reklame</p>
                                <input type="text" class="form-control input-border-blue" disabled>
                            </div>
                            <div class="col-sm-auto mb-3">
                                <p class="form-label-modal text-light-blue" >Harga Sewa</p>
                                <input type="text" class="form-control input-border-blue" readonly>
                            </div>
                            <div class="col-sm-auto mb-3">
                                <p class="form-label-modal text-light-blue" >Tanggal Pemasangan</p>
                                <input type="text" class="form-control input-border-blue" readonly>
                            </div>
                            <div class="col-sm-auto mb-3">
                                <p class="form-label-modal text-light-blue" >Jatuh Tempo</p>
                                <input type="text" class="form-control input-border-blue" readonly>
                            </div>
                            <div class="col-sm-auto mb-3">
                                <p class="form-label-modal text-light-blue" >Jenis Iklan</p>
                                <input type="text" class="form-control input-border-blue" readonly>
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
                    <select class="selectpicker mb-3">
                        <option data-tokens="ketchup mustard">Pilih Status Reklame</option>
                        <option data-tokens="mustard">1</option>
                        <option data-tokens="frosting">2</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <p class="form-label-modal text-light-blue" >Nama Reklame</p>
                        <input type="text" class="form-control input-border-blue" id="disabledTextInput">
                    </div>
                    <div class="mb-3 p-3 bg-light-blue">
                        <p class="form-label-modal text-black mb-3" >Titik Lokasi Reklame</p>
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
                </div>
                <div class="col-sm-6">
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
                        <p class="form-label-modal" >Lama Pemasangan</p>
                        <input type="text" class="form-control input-border-blue" name="penyewa">
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal" >Harga Sewa</p>
                        <input type="text" class="form-control input-border-blue" name="penyewa">
                    </div>
                </div>
            </div>            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Simpan</button>
        </div>
    </div>
  </div>
</div>

@endsection