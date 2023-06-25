@extends('User.layout.app', ['title' => 'Penyewaan Reklame'])
<link rel="stylesheet" href="{{ asset('css/Layout/dropdown.css') }}">

@section('content')
<table id="tableInfoReklame" class="table table-striped table-hover">
    <thead>
        <tr class="table-head" >
            <th scope="col">Nomor Reklame</th>
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
                        <th scope="row"> {{ $reklame -> id }} </th>
                        <td>{{ $reklame -> nama}}</td>
                        <td>{{ $reklame -> jalan }}</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>{{ $reklame -> lama }}</td>
                        <td>-</td>
                        <td>Belum Disewa</td>
                    @else
                        <th scope="row"> {{ $reklame -> id }} </th>
                        <td>{{ $reklame -> nama}}</td>
                        <td>{{ $reklame -> jalan }}</td>
                        <td>{{ $penyewaan -> perusahaan }}</td>
                        <td>{{ $penyewaan -> jenis }}</td>
                        <td>{{ $penyewaan -> tgl_pasang }}</td>
                        <td>{{ $penyewaan -> tgl_jatuh_tempo }}</td>
                        <td>{{ $reklame -> lama }}</td>
                        <td>{{ $penyewaan -> total_harga }}</td>
                        @if ( $penyewaan->status() == 1 || $penyewaan->status() == 2)
                        <td>
                            <p class="status-monitor-blue p-2 m-0" >Sudah Disewa</p>
                        </td>
                        @endif
                    @endif
                @endif
            @empty
                <th scope="row"> {{ $reklame -> id }} </th>
                <td>{{ $reklame -> nama}}</td>
                <td>{{ $reklame -> jalan }}</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>{{ $reklame -> lama }}</td>
                <td>-</td>
                <td>Belum Disewa</td>
            @endforelse
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
