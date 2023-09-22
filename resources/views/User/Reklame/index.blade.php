@extends('User.layout.app', ['title' => 'Penyewaan Reklame'])
<link rel="stylesheet" href="{{ asset('css/Layout/dropdown.css') }}">
<link rel="stylesheet" href="{{ asset('css/Layout/map.css') }}">

<style>
    .modal-detail-map td{
        text-align: left !important;
    }

    .modal-detail-title-map{
        width: 180px;
    }
</style>

@section('content')

<div class="container">
    <div id="map"></div>
</div>

<div class="card-border-blue p-5 mb-5">
<table id="tableInfoReklame" class="table table-striped table-hover">
    <thead>
        <tr class="table-head" >
            <th scope="col">Nama Reklame</th>
            <th scope="col">Lokasi Reklame</th>
            <th scope="col">Perusahaan Penyewa</th>
            <th scope="col">Jenis Reklame</th>
            <th scope="col">Tanggal Pemasangan</th>
            <th scope="col">Jatuh Tempo</th>
            <th scope="col">Lama Pemasangan</th>
            <th scope="col">Harga Sewa</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($reklames as $reklame)
        <tr>
            @forelse($reklame -> penyewaan as $penyewaan)
                @if($loop->last)
                    @if($penyewaan -> status() == 0)
                        <td>{{ $reklame -> nama}}</td>
                        <td>{{ $reklame -> jalan }}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>{{ $reklame -> lama }}</td>
                        <td>{{ $reklame -> harga }}</td>
                        <td>Belum Disewa</td>
                    @else
                        <td>{{ $reklame -> nama}}</td>
                        <td>{{ $reklame -> jalan }}</td>
                        <td>{{ $penyewaan -> perusahaan }}</td>
                        <td>{{ $penyewaan -> jenis }}</td>
                        <td>{{ $penyewaan -> tgl_pasang }}</td>
                        <td>{{ $penyewaan -> tgl_jatuh_tempo }}</td>
                        <td>{{ $reklame -> lama }}</td>
                        <td>{{ $reklame -> harga }}</td>
                        @if ( $penyewaan->status() == 1 || $penyewaan->status() == 2)
                        <td>
                            <p class="status-monitor-blue p-2 m-0" >Sudah Disewa</p>
                        </td>
                        @endif
                    @endif
                @endif
            @empty
                <td>{{ $reklame -> nama}}</td>
                <td>{{ $reklame -> jalan }}</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>{{ $reklame -> lama }}</td>
                <td>{{ $reklame -> harga }}</td>
                <td>Belum Disewa</td>
            @endforelse
        </tr>
        @endforeach
    </tbody>
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

<script>
// Untuk memasukkan mapbox kedalam halaman
mapboxgl.accessToken = 'pk.eyJ1IjoiYWRtaW5yZWtsYW1lMjMiLCJhIjoiY2xqZGZoM3gzMDRyazNlbHMyaXE0b2tqMSJ9.71yErR2ww_Ip5OTTVp4nFA';
var map = new mapboxgl.Map({
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: [121.673138, -4.036445], // Posisi awal map (Kolaka) [lng, lat]
    zoom: 11 // starting zoom
});

// Untuk mengambil data dari database dan mengubahnya menjadi dalam bentuk json
var reklames = {!! json_encode($reklames) !!}

// Untuk menambahkan marker ke dalam map
reklames.forEach(function (location) {

    var tanggalSekarang = new Date();
    
    if (location.penyewaan.length != 0) {
        var [hari, bulan, tahun] = location.penyewaan.pop().tgl_jatuh_tempo.split('/');
        var tanggalBaru = `${bulan}/${hari}/${tahun}`;
    
        var tanggalDariDatabase = new Date(tanggalBaru);
        var selisihWaktu = tanggalDariDatabase - tanggalSekarang;
        var selisihHari = Math.ceil(selisihWaktu / (24 * 60 * 60 * 1000));

        if(selisihHari < 0 || selisihHari == -0){
        var color = 'green'
        } else if(selisihHari > 5){
            var color = 'red'
        } else{
            var color = 'yellow'
        }
    } else {
        var color = 'green'
    }

    var marker = new mapboxgl.Marker({
        color: color,
    })
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
</script>

@endsection