@extends('Admin.layout.app', ['title' => 'Laporan Penyewaan'])

@section('content')

<div class="card-border-blue p-5">
    <div class="card m-5">
        <div class="card-header title-blue">
            Laporan Data Penyewaan
        </div>
        <div class="card-body">
            <h5 class="card-title text-blue">Pilih Periode Data Penyewaan</h5>
            <form action="{{ route('laporan-detail.admin')}}" method="GET">
            <select class="form-select form-select-lg my-3 input-border-blue" name="year" aria-label=".form-select-lg example">
                <option selected>Periode Data</option>
                @foreach($res as $re)
                <option value="{{$re -> year}}">{{$re -> year}}</option>
                @endforeach
            </select>   
            <input class="btn btn-primary float-end" type="submit" value="Submit">    
            </form>
        </div>
    </div>
</div>

@endsection