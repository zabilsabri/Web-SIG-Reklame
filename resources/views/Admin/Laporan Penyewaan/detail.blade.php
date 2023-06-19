@extends('Admin.layout.app', ['title' => 'Laporan Penyewaan'])

@section('content')

<div class="card-border-blue p-5">
    <table id="tableLaporan" class="table table-striped table-hover">
        <thead>
            <tr class="table-head" >
                <th scope="col">ID</th>
                <th scope="col">PIC Perusahaan Penyewa</th>
                <th scope="col">Perusahaan Penyewa</th>
                <th scope="col">Tanggal Penyewa</th>
                <th scope="col">Jenis Iklan</th>
                <th scope="col">Lokasi Reklame</th>
                <th scope="col">Total Bayar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penyewaans as $index => $penyewaan)
            <tr>
                <th scope="row">{{ $index++ }}</th>
                <td>{{ $penyewaan -> nama }}</td>
                <td>{{ $penyewaan -> perusahaan }}</td>
                <td>{{ $penyewaan -> tgl_pasang }}</td>
                <td>{{ $penyewaan -> jenis }}</td>
                <td>{{ $penyewaan -> reklame -> jalan }}</td>
                <td>{{ $penyewaan -> reklame ->harga }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('script')

<script>
$(document).ready( function () {
    $('#tableLaporan').DataTable({
        scrollX: true,
        "dom": 'frtp',
        language: { search: '', searchPlaceholder: "Search...",
            paginate: {
                next: ">",
                previous: "<"
            } },
        responsive: true,
    });
});
</script>

@endpush