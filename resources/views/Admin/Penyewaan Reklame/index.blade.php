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
                                    <form action="" id="formAddSewaReklame" method="POST">
                                    <select class="selectpicker" id="id_reklame" onchange="pilih_reklame()" data-live-search="true">
                                        <option value="">Pilih Reklame</option>
                                        @foreach($reklames as $reklame)
                                        <option data-tokens="{{ $reklame -> id }}" value="{{ $reklame -> id }}">{{ $reklame -> nama }} ({{ $reklame -> id }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <p class="form-label-modal disable-label" >Status Reklame</p>
                                <input type="text" id="status" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal disable-label" >Nama Reklame</p>
                        <input type="text" class="form-control" id="nama" disabled>
                    </div>
                    <div class="mb-3 p-3 bg-light-blue">
                        <p class="form-label-modal text-black mb-3" >Titik Lokasi Reklame</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="form-label-modal text-light-blue" >Lattitude</p>
                                <input type="text" class="form-control" id="lattitude-rek-sw" disabled>
                            </div>
                            <div class="col-sm-6">
                                <p class="form-label-modal text-light-blue" >Longitude</p>
                                <input type="text" class="form-control" id="longitude-rek-sw" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <p class="form-label-modal" >Nama Penyewa</p>
                        <input type="text" class="form-control" name="nama_penyewa" id="nama_penyewa">
                        <input id="reklame-token-add" name="_token" type="hidden" value="{{csrf_token()}}">
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal" >Nama Perusahaan</p>
                        <input type="text" class="form-control" name="penyewa" id="nama_perusahaan">
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal" >Jenis Iklan</p>
                        <input type="text" class="form-control" name="penyewa" id="jenis_iklan">
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="form-label-modal" >Tanggal Pemasangan</p>
                            <input type="date" class="form-control form-date" id="tgl_pasang">
                        </div>
                        <div class="col-sm-6">
                            <p class="form-label-modal" >Jatuh Tempo</p>
                            <input type="date"  class="form-control form-date" id="jth_tempo">
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <div class="modal-footer">
            <button type="button" id="add_sewa_reklame" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
  </div>
</div>

@push('script')

<script>
    $(document).ready( function () {
        $('#tableSewaReklame').DataTable({
            ajax: "{{ route('reklame-json.admin') }}",
            processing: true,
            scrollX: true,
            "dom": '<"sw-reklame-add">frtp',
            language: { search: '', searchPlaceholder: "Search...",
                paginate: {
                    next: ">",
                    previous: "<"
                } },
            responsive: true,
            columns: [{
                data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false
            },{
                data: 'reklame.nama',
                name: 'nama'
            },{
                data: 'reklame.jalan',
                name: 'lokasi'
            },{
                data: 'jenis',
                name: 'jenis'
            },{
                data: 'tgl_pasang',
                name: 'tgl_pasang'
            },{
                data: 'tgl_jatuh_tempo',
                name: 'tgl_jatuh_tempo'
            },{
                data: 'reklame.harga',
                name: 'harga'
            },{
                data: 'perusahaan',
                name: 'perusahaan'
            },{
                data: 'nama',
                name: 'nama'
            },{
                data: 'id',
                name: 'status'
            },{
                data: 'aksi',
                name: 'aksi'
            }]
            });
        $('div.sw-reklame-add').html('<button type="button" class="btn btn-primary float-start" data-bs-toggle="modal" data-bs-target="#tambahSewaReklameModal">+ Tambah Sewa Reklame</button>');
    });
</script>

<script>
 function pilih_reklame(){
    var id_reklame = $('#id_reklame').val();
    $.ajax({
        url: "penyewaan-reklame/json-modal/"+id_reklame,
        method: "get",
        datatype: "json",
        success: function(response){
            if(response.statusWeb == 'success'){
                $('#status').val(response.reklame.status);
                $('#nama').val(response.reklame.nama);
                $('#lattitude-rek-sw').val(response.reklame.latitude);
                $('#longitude-rek-sw').val(response.reklame.longitude);
            }
        }
    })
 }
</script>

<script>
    $(document).ready(function(){
        $(document).on('click', '#add_sewa_reklame', function(e){
            e.preventDefault();
            let id_reklame = $('#id_reklame').val();
            let nama_penyewa = $('#nama_penyewa').val();
            let nama_perusahaan = $('#nama_perusahaan').val();
            let jenis_iklan = $('#jenis_iklan').val();
            let tgl_pasang = $('#tgl_pasang').val();
            let jth_tempo = $('#jth_tempo').val();
            let _token = $('#reklame-token-add').val();

            $.ajax({
                method: 'POST',
                url:"{{ route('reklame-tambah.admin') }}",
                dataType: 'json',
                data:{id_reklame:id_reklame, nama_penyewa:nama_penyewa, nama_penyewa:nama_penyewa, nama_perusahaan:nama_perusahaan, jenis_iklan:jenis_iklan, tgl_pasang:tgl_pasang, jth_tempo:jth_tempo, _token:_token},
                success: function (response) {
                    if(response.status == 'success'){
                        $('#tambahSewaReklameModal').modal('hide');
                        $('#formAddSewaReklame')[0].reset();
                        $('#tableSewaReklame').DataTable().ajax.reload();
                        Swal.fire("Done!", "Data Penyewaan Reklame Berhasil Ditambahkan", "success");
                    }
                },
                error: function (response) {
                    var errors = response.responseJSON;
                    alert(errors);
                }
            })

        })
    })
</script>

<script>
$(document).ready(function(){
    $(document).on('click', '#btn-hapus-sw-reklame', function(e){
        var id = $(this).data('id');
        Swal.fire({
            title: 'Konfirmasi',
            icon: 'question',
            text: 'Apakah Anda Yakin Ingin Menghapus Data Penyewaan Reklame Ini?',
            showConfirmButton: true, 
            showCancelButton: true
        }).then((result) => {
            if(result.value){
            $.ajax({
                url: 'penyewaan-reklame/delete/'+id,
                method: 'DELETE',
                success: function (response) {
                if(response.status == 'success'){
                    $('#tableSewaReklame').DataTable().ajax.reload();
                    Swal.fire("Done!", "Data Penyewaan Reklame Berhasil Dihapus", "success");
                }
                },
                error: function (response) {
                    var errors = response.responseJSON;
                    alert(errors);
                }
            })
        }});
    })
})
</script>

@endpush