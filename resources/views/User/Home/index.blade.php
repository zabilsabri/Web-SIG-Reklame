@extends('User.layout.app', ['title' => 'Home'])

@section('content')
<h3 class="title-blue">Selamat Datang</h3>
<p class="text-blue text-center" id="home-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mollis, augue malesuada porttitor sodales, augue ante venenatis mi, at tincidunt nunc magna quis nulla. Curabitur vestibulum nibh orci. Curabitur aliquet diam in dolor scelerisque, sed sollicitudin nulla finibus. Praesent a placerat erat, vel varius mauris. Praesent tincidunt augue ultricies faucibus sollicitudin. Morbi ut sapien nec mauris tempus cursus suscipit vitae ante. Etiam vulputate sapien sit amet tellus vulputate sollicitudin. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque quis lacinia sem.</p>
<div class="container text-center mb-5">
    <button type="button" class="btn btn-primary my-5 w-50">Cari Reklame</button>
    <div class="row align-items-center">
        <div class="col-lg-4 mt-2">
            <img src="{{ asset('img/home(1).png') }}" class="img-fluid" alt="Gambar Reklame">
        </div>
        <div class="col-lg-4 mt-2">
            <img src="{{ asset('img/home(1).png') }}" class="img-fluid" alt="Gambar Reklame">
        </div>
        <div class="col-lg-4 mt-2">
            <img src="{{ asset('img/home(1).png') }}" class="img-fluid" alt="Gambar Reklame">
        </div>
    </div>
</div>
@endsection