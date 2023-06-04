@extends('Pimpinan.Layout.app', ['title' => 'Monitor-Reklame'])
<link rel="stylesheet" href="{{ asset('css/Layout/dropdown.css') }}">
<link rel="stylesheet" href="{{ asset('css/Layout/datatables.css') }}">

@section('content')

<h3 class="title-blue mb-3" >Monitoring Data Reklame</h3>
<table id="tableMonitorReklame" class="table table-striped table-hover">
    <thead>
        <tr class="table-head">
            <th scope="col">No.</th>
            <th scope="col">Nomor Reklame</th>
            <th scope="col">Perusahaan Penyewa</th>
            <th scope="col">Status</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>
                <p class="status-monitor-blue p-2 m-0" >Sedang Disewa</p>
            </td>
            <td>
                <a href="{{ route('monitor-detail.pimpinan') }}"><img src="{{ asset('img/blue i.png') }}" width="25px" alt="blue"></a>
                <a href="{{ route('monitor-detail.pimpinan') }}"><img src="{{ asset('img/yellow i.png') }}" width="25px" alt="yellow"></a>
                <a href="{{ route('monitor-detail.pimpinan') }}"><img src="{{ asset('img/red i.png') }}" width="25px" alt="red"></a>
            </td>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>
                <p class="status-monitor-yellow p-2 m-0" ><img class="me-1" src="{{ asset('img/clock yellow.png') }}" alt="">Mendekati Jatuh Tempo</p>
            </td>
            <td>
                <a href="{{ route('monitor-detail.pimpinan') }}"><img src="{{ asset('img/blue i.png') }}" width="25px" alt="blue"></a>
                <a href="{{ route('monitor-detail.pimpinan') }}"><img src="{{ asset('img/yellow i.png') }}" width="25px" alt="yellow"></a>
                <a href="{{ route('monitor-detail.pimpinan') }}"><img src="{{ asset('img/red i.png') }}" width="25px" alt="red"></a>
            </td>
        </tr>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>
                <p class="status-monitor-red p-2 m-0" ><img class="me-1" src="{{ asset('img/danger red.png') }}" alt="">Melebihi Jatuh Tempo</p>
            </td>
            <td>
                <a href="{{ route('monitor-detail.pimpinan') }}"><img src="{{ asset('img/blue i.png') }}" width="25px" alt="blue"></a>
                <a href="{{ route('monitor-detail.pimpinan') }}"><img src="{{ asset('img/yellow i.png') }}" width="25px" alt="yellow"></a>
                <a href="{{ route('monitor-detail.pimpinan') }}"><img src="{{ asset('img/red i.png') }}" width="25px" alt="red"></a>
            </td>
        </tr>
    </tbody>
</table>

@endsection