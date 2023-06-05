@extends('User.layout.app', ['title' => 'Penyewaan Reklame'])
<link rel="stylesheet" href="{{ asset('css/Layout/dropdown.css') }}">

@section('content')
<table id="tableInfoReklame" class="table table-striped table-hover">
    <thead>
        <tr class="table-head" >
            <th scope="col">Nomor Reklame</th>
            <th scope="col">Perusahaan Penyewa</th>
            <th scope="col">Alamat Perusahaan</th>
            <th scope="col">Jenis Reklame</th>
            <th scope="col">Lokasi Reklame</th>
            <th scope="col">Tanggal Pemasangan</th>
            <th scope="col">Jatuh Tempo</th>
            <th scope="col">Lama Pemasangan</th>
            <th scope="col">Harga Sewa</th>
            <th scope="col">Status</th>
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
        </tr>
    </tbody>
</table>
@endsection
