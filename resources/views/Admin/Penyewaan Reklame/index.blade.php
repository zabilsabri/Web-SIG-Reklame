@extends('Admin.layout.app', ['title' => 'Penyewaan Reklame'])
<link rel="stylesheet" href="{{ asset('css/Admin/Penyewaan Reklame/sewaReklame.css') }}">

@section('content')
<table id="tableSewaReklame" class="table table-striped table-hover">
    <thead>
        <tr class="table-head" >
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Jenis Iklan</th>
            <th scope="col">Tanggal Pemasangan</th>
            <th scope="col">Jatuh Tempo</th>
            <th scope="col">Harga Sewa</th>
            <th scope="col">Perusahaan Penyewa</th>
            <th scope="col">PIC Perusahaan Penyewa</th>
            <th scope="col">Status</th>
            <th width="13%" scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td class="text-center" >
                <a href="{{ route('reklame-edit.admin') }}"><img src="{{ asset('img/ic_edit.png') }}" alt="edit"></a>
                <a href=""><img src="{{ asset('img/ic_delete.png') }}" alt="delete"></a>
            </td>
        </tr>
    </tbody>
</table>
@endsection

<div class="modal fade" id="tambahSewaReklameModal" tabindex="-1" aria-labelledby="tambahSewaReklameModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="tambahSewaReklameModalLabel">Tambah Data Penyewaan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-sm-auto">
                                <p class="form-label-modal" >ID Reklame</p>
                                <div class="btn-group">
                                    <select class="selectpicker" data-live-search="true">
                                        <option data-tokens="ketchup mustard">Kosong</option>
                                        <option data-tokens="mustard">1</option>
                                        <option data-tokens="frosting">2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <p class="form-label-modal disable-label" >Status Reklame</p>
                                <input type="text" id="disabledTextInput" class="form-control" disabled>
                            </div>
                        </div>
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
                        <input type="text" class="form-control" name="penyewa">
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal" >Nama Penyewa</p>
                        <input type="text" class="form-control" name="penyewa">
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal" >Nama Penyewa</p>
                        <input type="text" class="form-control" name="penyewa">
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
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary">Simpan</button>
        </div>
    </div>
  </div>
</div>