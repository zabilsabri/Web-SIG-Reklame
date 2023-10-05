@extends('Admin.layout.app', ['title' => 'Home'])
<link rel="stylesheet" href="{{ asset('css/Admin/homeStyle.css') }}">

@section('content')
<div class="row">
    <div class="col-lg-7 welcome-section">
        <div class="welcome mb-3">
            <img src="{{ asset('img/welcome sentence.svg') }}" class="img-fluid" alt="reklame">
        </div>
    </div>
    <div class="col-lg-5 total-reklame-section">
        <div class="card p-3">
            <div class="row g-0">
                <div class="col-md-4 align-self-center text-center">
                    <img src="{{ asset('img/reklame.png') }}" id="" class="img-fluid rounded-start" alt="reklame">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <p class="card-text">{{ $jumlah_reklame }}</p>
                        <p class="card-text ct-sec"><small class="text-body-secondary">Total Reklame</small></p>
                    </div>
                </div>
                <div class="col-md-2 align-self-center text-end pe-3">
                    <a href="{{ route('data-reklame.admin') }}">
                    <svg width="10" height="20" viewBox="0 0 14 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.8999 10.8169L3.46656 1.40022C3.31162 1.24401 3.12728 1.12002 2.92418 1.03541C2.72108 0.950791 2.50324 0.907227 2.28322 0.907227C2.0632 0.907227 1.84536 0.950791 1.64226 1.03541C1.43916 1.12002 1.25483 1.24401 1.09989 1.40022C0.78947 1.71249 0.615234 2.13491 0.615234 2.57522C0.615234 3.01553 0.78947 3.43795 1.09989 3.75022L9.34989 12.0836L1.09989 20.3336C0.78947 20.6458 0.615234 21.0682 0.615234 21.5086C0.615234 21.9489 0.78947 22.3713 1.09989 22.6836C1.25425 22.841 1.43832 22.9663 1.64145 23.0521C1.84457 23.138 2.06271 23.1826 2.28322 23.1836C2.50373 23.1826 2.72187 23.138 2.925 23.0521C3.12812 22.9663 3.3122 22.841 3.46656 22.6836L12.8999 13.2669C13.0691 13.1108 13.2041 12.9214 13.2964 12.7106C13.3888 12.4997 13.4364 12.2721 13.4364 12.0419C13.4364 11.8117 13.3888 11.584 13.2964 11.3732C13.2041 11.1624 13.0691 10.973 12.8999 10.8169V10.8169Z" fill="black" />
                    </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-5 mb-4">
    <div class="col-lg-5">
        <div class="card p-3 mb-3" style="width: 100%;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item lgi-title">Jumlah Reklame yang Disewa</li>
                <li class="list-group-item">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('img/mdi_people-group.png') }}" height="30px" width="30px" alt="...">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-0 lh-0 card-body-title">{{ $jumlah_penyewaan }}</p>
                            <p class="mb-0 lh-0 card-body-description">Jumlah Penyewaan</p>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('img/loading.png') }}" height="30px" width="30px" alt="...">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <p class="mb-0 lh-0 card-body-title">{{ $on_progress }}</p>
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
                            <p class="mb-0 lh-0 card-body-title">{{ $jth_tempo }}</p>
                            <p class="mb-0 lh-0 card-body-description">Reklame Jatuh Tempo</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="chart-penyewaan-reklame">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
@endsection

@push('script')

<!-- Untuk memasukkan data ke dalam chart -->
<script>
    var datas =  {{ Js::from($data_penyewaan) }};

    const ctx = document.getElementById('myChart');
    const labels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Penyewaan Reklame',
                data: datas,
                fill: false,
                borderColor: 'rgb(46, 80, 166)',
                tension: 0.5
            }]
        },
    });
</script>
@endpush