@extends('Pimpinan.Layout.app', ['title' => 'Monitor-Reklame'])
<link rel="stylesheet" href="{{ asset('css/Layout/dropdown.css') }}">
<link rel="stylesheet" href="{{ asset('css/Layout/datatables.css') }}">

@section('content')

<h3 class="title-blue mb-3" >Monitoring Data Reklame</h3>
<table id="tableMonitorReklame" class="table table-striped table-hover">
    <thead>
        <tr class="table-head">
            <th scope="col">No.</th>
            <th scope="col">Nama Reklame</th>
            <th scope="col">Perusahaan Penyewa</th>
            <th scope="col">Status</th>
            <th scope="col">Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reklames as $reklame)
        <tr>
            <th></th>
            <td>{{ $reklame->nama }}</td>
            <td>
            @forelse($reklame -> penyewaan as $penyewaanr)
                @if($loop->last)
                    {{ $penyewaanr -> perusahaan }}
                @endif
            @empty
                -
            @endforelse
            </td>
            @forelse($reklame -> penyewaan as $penyewaanr)
                @if($loop->last)
                    @if ($penyewaanr->status() == 1)
                        <td>
                            <p class="status-monitor-grey p-2 m-0" >Sedang Disewa</p>
                        </td>
                        <td>
                            <a href="{{ route('monitor-detail.pimpinan', ['id' => $reklame->id]) }}"><img src="{{ asset('img/grey i.png') }}" width="25px" alt="blue"></a>
                        </td>
                    @elseif ($penyewaanr->status() == 2)
                        <td>
                            <p class="status-monitor-yellow p-2 m-0" ><img class="me-1" src="{{ asset('img/clock yellow.png') }}" alt="">Mendekati Jatuh Tempo</p>
                        </td>
                        <td>
                            <a href="{{ route('monitor-detail.pimpinan', ['id' => $reklame->id]) }}"><img src="{{ asset('img/yellow i.png') }}" width="25px" alt="yellow"></a>
                        </td>
                    @else
                    @php
                        $date = $penyewaanr->tgl_jatuh_tempo;
                        $dateParts = explode("/", $date);
                        $reklameYear = $dateParts[2];

                        $currentDate = new DateTime();
                        $thisYear = $currentDate->format("Y");
                    @endphp
                    @if ($reklameYear == $thisYear)
                        <td>
                            <p class="status-monitor-green p-2 m-0" ><img class="me-1" src="{{ asset('img/green check.png') }}" width="25px" alt="">Selesai</p>
                        </td>
                        <td>
                            <a href="{{ route('monitor-detail.pimpinan', ['id' => $reklame->id]) }}"><img src="{{ asset('img/green i.png') }}" width="25px" alt="green"></a>
                        </td>
                    @else
                        <td>
                            <p class="status-monitor-red p-2 m-0" ><img class="me-1" src="{{ asset('img/danger red.png') }}" width="25px" alt="">Melebihi Jatuh Tempo</p>
                        </td>
                        <td>
                            <a href="{{ route('monitor-detail.pimpinan', ['id' => $reklame->id]) }}"><img src="{{ asset('img/red i.png') }}" width="25px" alt="red"></a>
                        </td>
                    @endif
                    @endif
                    @endif
            @empty
                <td>
                    <p class="status-monitor-blue p-2 m-0" >Belum Disewa</p>
                </td>
                <td>
                    <a href="{{ route('monitor-detail.pimpinan', ['id' => $reklame->id]) }}"><img src="{{ asset('img/blue i.png') }}" width="25px" alt="blue"></a>
                </td>
            @endforelse
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
