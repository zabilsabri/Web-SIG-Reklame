@extends('Admin.layout.app', ['title' => 'Data Reklame'])
<link rel="stylesheet" href="{{ asset('css/Admin/Penyewaan Reklame/sewaReklame.css') }}">
<link rel="stylesheet" href="{{ asset('css/Layout/map.css') }}">

<style>
    #spinner-backdrop {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9998;
    }

    .modal-detail-map td{
        text-align: left !important;
    }

    .modal-detail-title-map{
        width: 180px;
    }

    #spinner {
        display: none;
        position: fixed;
        top: 50%;
        left: 55%;
        z-index: 9999;
    }

</style>

@section('content')

<div id="spinner-backdrop"></div>

<div id="spinner" class="spinner-border text-dark" role="status">
    <span class="visually-hidden">Loading...</span>
</div>

<div class="container">
    <div id="map"></div>
</div>

<div class="card-border-blue p-5 mb-5">
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
                            <div id="mapDetail"></div>
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

<!-- Modal Map Detail -->
<div class="modal fade" id="reklameMapDetailModal" tabindex="-1" aria-labelledby="reklameMapDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="reklameMapDetailModalLabel">Detail Reklame</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="foto-reklame-map"></div>
        <table class="modal-detail-map m-3">
            <tr>
                <td class="modal-detail-title-map">Nama</td>
                <td>:</td>
                <td id="nama-reklame-map"></td>
            </tr>
            <tr>
                <td class="modal-detail-title-map">Lokasi</td>
                <td>:</td>
                <td id="lokasi-reklame-map"></td>
            </tr>
            <tr>
                <td class="modal-detail-title-map">Lama Pemasangan</td>
                <td>:</td>
                <td id="lama-reklame-map"></td>
            </tr>
            <tr>
                <td class="modal-detail-title-map">Harga Sewa</td>
                <td>:</td>
                <td id="harga-reklame-map"></td>
            </tr>
        </table>
      </div>
    </div>
  </div>
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
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <p class="form-label-modal text-light-blue" >Nama Reklame</p>
                        <input type="text" class="form-control input-border-blue" id="nama-add">
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal text-light-blue" >Lokasi Jalan Reklame</p>
                        <input type="text" class="form-control input-border-blue" id="jalan-add">
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
                        <p class="form-label-modal text-light-blue" >Lama Pemasangan</p>
                        <input type="text" class="form-control input-border-blue" id="lama-add">
                    </div>
                    <div class="mb-3">
                        <p class="form-label-modal text-light-blue" >Harga Sewa</p>
                        <input type="text" class="form-control input-border-blue" id="harga-add" pattern="^\Rp.\d{1,3}(,\d{3})*(\.\d+)?Rp." data-type="currency" placeholder="">
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

@push('script')

<script>

// Fungsi untuk menampilkan spinner
function showSpinner() {
    $('#spinner-backdrop').show();
    $('#spinner').show();
}

// Fungsi untuk menyembunyikan spinner
function hideSpinner() {
    $('#spinner-backdrop').hide();
    $('#spinner').hide();
}

// Untuk memasukkan mapbox kedalam halaman
mapboxgl.accessToken = 'pk.eyJ1IjoiYWRtaW5yZWtsYW1lMjMiLCJhIjoiY2xqZGZoM3gzMDRyazNlbHMyaXE0b2tqMSJ9.71yErR2ww_Ip5OTTVp4nFA';
var map = new mapboxgl.Map({
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: [121.673138, -4.036445], // posisi awal map (Kolaka) [lng, lat]
    zoom: 11 // starting zoom
});

// Untuk mengambil data dari database dan mengubahnya menjadi dalam bentuk json
var reklames = {!! json_encode($reklames) !!}

// Untuk menambahkan marker ke dalam map
reklames.forEach(function (location) {
    var marker = new mapboxgl.Marker()
        .setLngLat([location.longitude, location.latitude])
        .addTo(map);
        marker.getElement().addEventListener('click', function(e) {
            var baseUrl = '{{ url('/') }}';
            var imageUrl = baseUrl + '/img/background.png';
            var listItem = $('<img src="' + imageUrl + '" width="100%" height="250px" alt="foto">');
            $('#foto-reklame-map').html(listItem);
            $('#nama-reklame-map').html(location.nama);
            $('#lokasi-reklame-map').html(location.jalan);
            $('#lama-reklame-map').html(location.lama);
            $('#harga-reklame-map').html(location.harga);
            $('#reklameMapDetailModal').modal('show');
        });
        
});

// Untuk mengambil data dari database dalam bentuk json dan memasukkannya ke dalam kolom tabel
$(document).ready( function () {
    $('#tableReklame').DataTable({
        ajax: "{{ route('data-reklame-json.admin') }}",
        scrollX: true,
        "dom": '<"btn-sr">frtp',
        language: { search: '', searchPlaceholder: "Search...",
            paginate: {
                next: ">",
                previous: "<"
            } },
        responsive: true,
        columns: [{
            data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false
        },{
            data: 'nama',
            name: 'nama'
        },{
            data: 'detail',
            name: 'detail'
        },{
            data: 'lama',
            name: 'lama'
        },{
            data: 'harga',
            name: 'harga'
        },{
            data: 'status',
            name: 'status'
        },{
            data: 'aksi',
            name: 'aksi'
        }],
        "columnDefs": [
            { "width": "100px", "targets": 6 }
        ]
    });
    $('div.btn-sr').html('<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahReklameModal">+ Tambah Data</button>');
});

// Untuk menghapus data dari tabel
$(document).ready(function(){
    $(document).on('click', '#btn-hapus-reklame', function(e){
        var id = $(this).data('id');
        Swal.fire({
            title: 'Konfirmasi',
            icon: 'question',
            text: 'Apakah Anda Yakin Ingin Menghapus Data User Ini?',
            showConfirmButton: true, 
            showCancelButton: true
        }).then((result) => {
            if(result.value){
            $.ajax({
                url: 'data-reklame/delete/'+id,
                method: 'DELETE',
                success: function (response) {
                if(response.status == 'success'){
                    Swal.fire("Done!", "Data Penyewaan Reklame Berhasil Dihapus. Tekan OK Untuk Memperbarui Halaman.", "success")
                    .then(function(){
                        location.reload();
                    });
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

// Untuk menambahkan data pada tabel
$(document).ready(function(){
    $(document).on('click', '#add_reklame', function(e){
        e.preventDefault();
        let nama = $('#nama-add').val();
        let jalan = $('#jalan-add').val();
        let lattitude = $('#lattitude-add').val();
        let longitude = $('#longitude-add').val();
        let tinggi = $('#tinggi-add').val();
        let luas = $('#luas-add').val();
        let lama = $('#lama-add').val();
        let harga = $('#harga-add').val();
        let _token = $('#reklame-token-add').val();

        $.ajax({
            method: 'POST',
            url:"{{ route('data-reklame-tambah.admin') }}",
            dataType: 'json',
            data:{nama:nama, jalan:jalan, lattitude:lattitude, longitude:longitude, tinggi:tinggi, luas:luas, lama:lama, harga:harga,_token:_token},
            success: function (response) {
                if(response.status == 'success'){
                    $('#tambahReklameModal').modal('hide');
                    Swal.fire("Done!", "Data Reklame Berhasil Ditambahkan. Tekan OK Untuk Memperbarui Halaman.", "success")
                    .then(function(){
                        location.reload();
                    });
                }
            },
            error: function (response) {
                var errors = response.responseJSON;
                alert(errors);
            }
        })

    })
})

// untuk membuka detail reklame pada tabel
$(document).ready(function(){
    $(document).on('click', '#detail-reklame', function(e){
        e.preventDefault();
        hideSpinner();
        var id = $(this).data('id');
        mapboxgl.accessToken = 'pk.eyJ1IjoiYWRtaW5yZWtsYW1lMjMiLCJhIjoiY2xqZGZoM3gzMDRyazNlbHMyaXE0b2tqMSJ9.71yErR2ww_Ip5OTTVp4nFA';

        $.ajax({
            method: 'GET',
            url:'data-reklame/json-detail/'+id,
            dataType: 'json',
            beforeSend: function() {
                showSpinner(); // Tampilkan spinner sebelum permintaan data dimulai
            },
            success: function (response) {
                if(response.statusWeb == 'success'){
                    var mapDetail = new mapboxgl.Map({
                        container: 'mapDetail', // container ID
                        style: 'mapbox://styles/mapbox/streets-v11', // style URL
                        center: [response.reklame.longitude, response.reklame.latitude], // starting position [lng, lat]
                        zoom: 16 // starting zoom
                    });
                    var marker = new mapboxgl.Marker()
                    .setLngLat([response.reklame.longitude, response.reklame.latitude])
                    .addTo(mapDetail);
                    $('#nama').val(response.reklame.nama);
                    $('#latitude').val(response.reklame.latitude);
                    $('#longitude').val(response.reklame.longitude);
                    $('#status').val(response.reklame.status);
                    $('#harga').val(response.reklame.harga);
                    $('#tgl_pasang').val(response.reklame.tgl_pasang);
                    $('#jth_tempo').val(response.reklame.jth_tempo);
                    $('#jenis_iklan').val(response.reklame.jenis_iklan);
                    $('#detailReklame').modal('show');
                    hideSpinner();
                }
            },
            error: function (response) {
                var errors = response.responseJSON;
                alert(errors);
                hideSpinner();
            }
        })
    })
})

// Untuk mengubah format uang pada add reklame
$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});

// Untuk mengubah format uang pada add reklame
function formatNumber(n) {
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}

// Untuk mengubah format uang pada add reklame
function formatCurrency(input, blur) {
  var input_val = input.val();
  
  if (input_val === "") { return; }
  
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  if (input_val.indexOf(".") >= 0) {

    var decimal_pos = input_val.indexOf(".");

    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    left_side = formatNumber(left_side);

    right_side = formatNumber(right_side);
    
    right_side = right_side.substring(0, 2);

    input_val = "Rp" + left_side + "." + right_side;

  } else {
    input_val = formatNumber(input_val);
    input_val = "Rp" + input_val;
  }
  
  input.val(input_val);
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}

</script>

@endpush