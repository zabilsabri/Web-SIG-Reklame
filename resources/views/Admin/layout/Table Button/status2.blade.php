@if ($data->status() == 1)
<p class="status-monitor-blue p-2 m-0" >Sedang Disewa</p>

@elseif($data -> status() == 2)
<p class="status-monitor-yellow p-2 m-0" ><img class="me-1" src="{{ asset('img/clock yellow.png') }}" alt="">Mendekati Jatuh Tempo</p>

@else
<p class="status-monitor-green p-2 m-0" ><img class="me-1" src="{{ asset('img/green check.png') }}" width="25px" alt="">Selesai</p>

@endif
