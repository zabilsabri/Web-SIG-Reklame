@extends('Auth.app', ['title' => 'Email Recovery'])

@section('content')
<div class="row">
    <div class="col-sm-6">
        <img src="{{asset('img\background.png')}}" class="img-login" alt="">
    </div>
    <div class="col-sm-6 p-5 align-self-center">
        <h5 class="login-title">Email Recovery</h5>
        <p class="login-desc">Mohon masukkan email yang Anda gunakan, untuk dikirimkan link recovery.</p>
        <form action="{{ route('email-recovery.post') }}" method="POST">
            @csrf
            <div class="form-floating mb-3 w-75">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>
            <div class="d-grid gap-2 w-75">
                <button class="btn btn-primary" type="submit">Kirim</button>
            </div>
        </form>
    </div>
</div>
@endsection