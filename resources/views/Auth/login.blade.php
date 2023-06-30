@extends('Auth.app', ['title' => 'Login'])

@section('content')
<div class="row">
    <div class="col-sm-6">
        <img src="{{asset('img\background.png')}}" class="img-login" alt="">
    </div>
    <div class="col-sm-6 p-5 align-self-center">
        <h5 class="login-title">Log In</h5>
        <p class="login-desc">Mohon masukkan username/email dan password Anda</p>
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="form-floating mb-3 w-75">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Username / Email</label>
            </div>
            <div class="form-floating mb-3 w-75">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="d-flex justify-content-between w-75 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old("remember") ? "checked" : "" }}>
                    <label class="form-check-label" for="flexCheckDefault">
                        Ingat Saya
                    </label>
                </div>
                <a class="text-decoration-none" href="{{ route('email-recovery') }}">Lupa Password?</a>
            </div>
            <div class="d-grid gap-2 w-75">
                <button class="btn btn-primary" type="submit">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection