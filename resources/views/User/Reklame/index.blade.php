@extends('User.layout.app', ['title' => 'Penyewaan Reklame'])

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
