@extends('Pimpinan.layout.app', ['title' => 'Home'])
<link rel="stylesheet" href="{{ asset('css/Admin/homeStyle.css') }}">


@section('content')
<h3 class="title-blue" >Selamat Datang</h3>
<p class="text-blue text-center" >Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis, augue malesuada porttitor sodales, augue ante venenatis mi, at tincidunt nunc magna quis nulla. Curabitur vestibulum nibh orci. Curabitur aliquet diam in dolor scelerisque, sed sollicitudin nulla finibus. Praesent a placerat erat, vel varius mauris. Praesent tincidunt augue ultricies faucibus sollicitudin. Morbi ut sapien nec mauris tempus cursus suscipit vitae ante. Etiam vulputate sapien sit amet tellus vulputate sollicitudin. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque quis lacinia sem.</p>
<div class="row mt-5 mb-4">
    <div class="col-sm-5">
        <div class="card p-3" style="width: 100%;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item lgi-title">Jumlah Reklame yang Disewa</li>
                <li class="list-group-item">
                    <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('img/mdi_people-group.png') }}" height="30px" width="30px" alt="...">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <p class="mb-0 lh-0 card-body-title">56</p>
                        <p class="mb-0 lh-0 card-body-description">Jumlah Penyewa</p>
                    </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('img/loading.png') }}" height="30px" width="30px" alt="...">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-0 lh-0 card-body-title">15</p>
                            <p class="mb-0 lh-0 card-body-description">Reklame On Progress</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('img/stopwatch.png') }}" height="30px" width="30px" alt="...">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-0 lh-0 card-body-title">7</p>
                            <p class="mb-0 lh-0 card-body-description">Reklame Jatuh Tempo</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="chart-penyewaan-reklame" >
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>

@endsection