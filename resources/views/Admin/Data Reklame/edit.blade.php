@extends('Admin.layout.app', ['title' => 'Edit Data Reklame'])
<link rel="stylesheet" href="{{ asset('css/Admin/Penyewaan Reklame/sewaReklame.css') }}">
<link rel="stylesheet" href="{{ asset('css/Layout/map.css') }}">

@section('content')

<div class="d-flex align-items-center">
  <div class="flex-shrink-0">
    <a href="{{ route('data-reklame.admin') }}"><img src="{{ asset('img/back.png') }}" alt="back"></a>
  </div>
  <div class="flex-grow-1 ms-3 back-title">
    Ubah Data Reklame
  </div>
</div>

<div class="card-edit p-5 mt-4 mb-5">
    <div class="row">
        <div class="col-sm-6">
            <form action="{{ route('data-reklame-edit-process.admin', [$reklame -> id]) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}
            <div class="mb-3">
                <p class="form-label-modal text-light-blue" >Nama Reklame</p>
                <input type="text" class="form-control input-border-blue" value="{{ $reklame -> nama }}" name="nama" id="disabledTextInput">
            </div>
            <div class="mb-3">
                <p class="form-label-modal text-black" >Titik Lokasi Reklame :</p>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="form-label-modal text-light-blue" >Latitude</p>
                        <input type="text" class="form-control input-border-blue" name="latitude" value="{{ $reklame -> latitude }}">
                    </div>
                    <div class="col-sm-6">
                        <p class="form-label-modal text-light-blue" >Longitude</p>
                        <input type="text" class="form-control input-border-blue" name="longitude" value="{{ $reklame -> longitude }}">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="form-label-modal text-light-blue" >Tinggi Reklame</p>
                        <input type="text" class="form-control input-border-blue" name="tinggi" value="{{ $reklame -> tinggi }}">
                    </div>
                    <div class="col-sm-6">
                        <p class="form-label-modal text-light-blue" >Luas Reklame</p>
                        <input type="text" class="form-control input-border-blue" name="luas" value="{{ $reklame -> luas }}">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-sm-6">
                        <p class="form-label-modal text-light-blue" >Lama Pemasangan</p>
                        <input type="text" class="form-control input-border-blue" name="lama" value="{{ $reklame -> lama }}">
                    </div>
                    <div class="col-sm-6">
                        <p class="form-label-modal text-light-blue" >Harga Sewa</p>
                        <input type="text" class="form-control input-border-blue" name="harga" pattern="^\Rp\d{1,3}(,\d{3})*(\.\d+)?Rp" data-type="currency" value="{{ $reklame -> harga }}" placeholder="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div id="mapEdit"></div>
        </div>
    </div>
    <div class="text-center mt-5">
        <button class="btn btn-primary w-25" type="submit">Simpan</button>
        </form>
    </div>
</div>

@endsection

@push('script')

<script>

var reklames = {!! json_encode($reklame) !!}

mapboxgl.accessToken = 'pk.eyJ1IjoiYWRtaW5yZWtsYW1lMjMiLCJhIjoiY2xqZGZoM3gzMDRyazNlbHMyaXE0b2tqMSJ9.71yErR2ww_Ip5OTTVp4nFA';
var map = new mapboxgl.Map({
    container: 'mapEdit', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: [reklames.longitude, reklames.latitude], // starting position [lng, lat]
    zoom: 17 // starting zoom
});

var marker = new mapboxgl.Marker()
    .setLngLat([reklames.longitude, reklames.latitude])
    .addTo(map);

$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  var input_val = input.val();
  
  if (input_val === "") { return; }
  
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  if (input_val.indexOf(".") >= 0) {

    var decimal_pos = input_val.indexOf(".");

    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    left_side = formatNumber(left_side);

    right_side = formatNumber(right_side);
    
    right_side = right_side.substring(0, 2);

    input_val = "Rp" + left_side + "." + right_side;

  } else {
    input_val = formatNumber(input_val);
    input_val = "Rp" + input_val;
  }
  
  input.val(input_val);
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}

</script>

@endpush