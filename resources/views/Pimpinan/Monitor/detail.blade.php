@extends('Pimpinan.Layout.app', ['title' => 'Detail-Monitor-Reklame'])

<style>
    td{
        padding-right: 20px;
        padding-bottom: 15px;
        text-align: left !important;
    }
</style>

@section('content')

<div class="d-flex align-items-center">
  <div class="flex-shrink-0">
    <a href="{{ route('reklame.admin') }}"><img src="{{ asset('img/back.png') }}" class="img-fluid" alt="back"></a>
  </div>
  <h3 class="title-blue mb-0" >Detail Data Penyewaan</h3>
</div>

<div class="row gap-5">
    <div class="col-sm-6">
        <div class="map mb-4">
            <img src="{{ asset('img/home(1).png') }}" class="img-fluid" height = 600; alt="reklame picture">
        </div>
        <div class="reklame-pic mb-4">
            <img src="{{ asset('img/home(1).png') }}" class="img-fluid" alt="reklame picture">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="data-reklame mb-3">
            <div class="text-light-blue">
                <h4>Data Reklame</h4>
            </div>
            <table>
                <tr>
                    <td class="text-black" >ID Sewa Reklame</td>
                    <td>:</td>
                    <td class="text-light-blue" >{{ $penyewaan->id }}</td>
                </tr>
                <tr>
                    <td class="text-black" >Nama Reklame</td>
                    <td>:</td>
                    <td class="text-light-blue" >{{ $penyewaan->reklame->nama }}</td>
                </tr>
                <tr>
                    <td class="text-black" >Lokasi Reklame</td>
                    <td>:</td>
                    <td class="text-light-blue" >{{ $penyewaan->reklame->jalan }}</td>
                </tr>
                <tr>
                    <td class="text-black" >Jenis Iklan</td>
                    <td>:</td>
                    <td class="text-light-blue" >test</td>
                </tr>
                <tr>
                    <td class="text-black" >Tanggal Pemasangan</td>
                    <td>:</td>
                    <td class="text-light-blue" >{{ $penyewaan->tgl_pasang }}</td>
                </tr>
                <tr>
                    <td class="text-black" >Harga Sewa</td>
                    <td>:</td>
                    <td class="text-light-blue" >{{ $penyewaan->reklame->harga }}</td>
                </tr>
                <tr>
                    <td class="text-black" >Jatuh Tempo</td>
                    <td>:</td>
                    <td class="text-light-blue" >{{ $penyewaan->tgl_jatuh_tempo }}</td>
                </tr>
                <tr>
                    <td class="text-black" >Status</td>
                    <td>:</td>
                    <td class="text-light-blue" >
                    @if ($penyewaan->status() == 1)
                    Sedang Disewa
                    @elseif ($penyewaan->status() == 2)
                    Mendekati Jatuh Tempo
                    @else
                    Melebihi Jatuh Tempo
                    @endif
                    </td>
                </tr>
            </table>
        </div>
        <div class="data-perusahaan">
        <div class="text-light-blue">
                <h4>Data Perusahaan</h4>
            </div>
            <table>
                <tr>
                    <td class="text-black" >Nama Perusahaan</td>
                    <td>:</td>
                    <td class="text-light-blue" >{{ $penyewaan->perusahaan }}</td>
                </tr>
                <tr>
                    <td class="text-black" >PIC Perusahaan</td>
                    <td>:</td>
                    <td class="text-light-blue" >{{ $penyewaan->nama }}</td>
                </tr>
                <tr>
                    <td class="text-black" >Alamat Perusahaan</td>
                    <td>:</td>
                    <td class="text-light-blue" >test</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection
