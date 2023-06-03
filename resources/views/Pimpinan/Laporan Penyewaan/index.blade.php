@extends('Pimpinan.layout.app', ['title' => 'Laporan Penyewaan'])

@section('content')

<div class="card-border-blue p-5">
    <div class="card m-5">
        <div class="card-header title-blue">
            Laporan Data Penyewaan
        </div>
        <div class="card-body">
            <h5 class="card-title text-blue">Pilih Periode Data Penyewaan</h5>
            <select class="form-select form-select-lg my-3 input-border-blue" aria-label=".form-select-lg example">
                <option selected>Periode Data</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>    
            <input class="btn btn-primary float-end" type="submit" value="Submit">    
        </div>
    </div>
</div>

@endsection