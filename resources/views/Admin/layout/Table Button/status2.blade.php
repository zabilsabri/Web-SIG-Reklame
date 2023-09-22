@if ($data->status() == 1)
<p class="status-monitor-blue p-2 m-0" >Sedang Disewa</p>

@elseif($data -> status() == 2)
<p class="status-monitor-yellow p-2 m-0" ><img class="me-1" src="{{ asset('img/clock yellow.png') }}" alt="">Mendekati Jatuh Tempo</p>

@else

@php
$date = $data->tgl_jatuh_tempo;
$dateParts = explode("/", $date);
$reklameYear = $dateParts[2];

$currentDate = new DateTime();
$thisYear = $currentDate->format("Y");

@endphp

@if ($reklameYear == $thisYear)
    <p class="status-monitor-red p-2 m-0"><img class="me-1" src="{{ asset('img/danger red.png') }}" width="25px" alt="">Melebihi Jatuh Tempo</p>
@else
    <p class="status-monitor-green p-2 m-0">
        <img class="me-1" src="{{ asset('img/green check.png') }}" width="25px" alt="">Selesai
    </p>
@endif

@endif
