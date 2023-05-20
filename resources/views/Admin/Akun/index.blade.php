@extends('Admin.layout.app', ['title' => 'Kelola Akun'])
<link rel="stylesheet" href="{{ asset('css/Admin/Penyewaan Reklame/sewaReklame.css') }}">

@section('content')
<table id="tableKelolaAkun" class="table table-striped table-hover">
    <thead>
        <tr class="table-head" >
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">Peran</th>
            <th scope="col">Nomor Telpon</th>
            <th scope="col">Email</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
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
            <td class="text-center" >
                <a href="{{ route('akun-detail.admin') }}"><img src="{{ asset('img/ic_edit.png') }}" alt="edit"></a>
                <a href="#"><img src="{{ asset('img/ic_delete.png') }}" alt="delete"></a>
            </td>
        </tr>
    </tbody>
</table>
@endsection

<div class="modal fade" id="tambahAkunModal" tabindex="-1" aria-labelledby="tambahAkunModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="tambahAkunModalLabel">Tambah Data Penyewaan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
            <div class="mb-3">
                <div class="row">
                    <div class="col-sm-auto">
                        <div class="btn-group">
                            <select class="selectpicker">
                                <option data-tokens="ketchup mustard">Peran</option>
                                <option value="Pimpinan">Pimpinan</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <p class="form-label-modal" >Nama Reklame</p>
                        <input type="text" class="form-control input-border-blue" id="disabledTextInput">
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal" >Email</p>
                        <input type="email" class="form-control input-border-blue" id="disabledTextInput">
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal" >Alamat</p>
                        <input type="text" class="form-control input-border-blue" id="disabledTextInput">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <p class="form-label-modal" >Nomor Telpon</p>
                        <input type="text" class="form-control input-border-blue" name="penyewa">
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal" >Password</p>
                        <input type="text" class="form-control input-border-blue" name="penyewa">
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-primary w-50" type="button">SIMPAN</button>
                    </div>
                </div>
            </div>            
        </div>

    </div>
  </div>
</div>