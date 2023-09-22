@extends('Auth.app', ['title' => 'Email Recovery'])

@section('content')
<div class="row">
    <div class="col-sm-6">
        <img src="{{asset('img\background.png')}}" class="img-login" alt="">
    </div>
    <div class="col-sm-6 p-5 align-self-center">
        <h5 class="login-title">Email Recovery</h5>
        <p class="login-desc">Mohon isi inputan dibawah untuk mengubah password akun anda.</p>
        @if ($errors->any())
            @foreach ($errors->all() as $v)
                <div class="alert alert-danger alert-dismissible fade show w-75" role="alert">
                    <strong> {{$v}} </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        @if($message = Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade show w-75" role="alert">
                <strong> Gagal! </strong> {{$message}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <form action="{{ route('reset-password.post') }}" method="POST">
            @csrf
            <div class="form-floating mb-3 w-75">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating mb-3 w-75">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-3 w-75">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Password Confirmation">
                <label for="password">Password Confirmation</label>
            </div>
            <div class="d-grid gap-2 w-75">
                <input type="hidden" name="token" value="{{ $token }}">
                <button class="btn btn-primary" type="submit">Kirim</button>
            </div>
        </form>
    </div>
</div>
@endsection