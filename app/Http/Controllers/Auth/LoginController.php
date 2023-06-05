<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            if (Auth::user()->role == 'Admin') {
                return redirect()->route('home.admin');
            } else if (Auth::user()->role == 'Pimpinan'){
                return redirect()->route('home.pimpinan');
            }
        }else{
            return redirect()->to('/')->send()->with('failed', 'Email Atau Password Anda Salah!');
        }
    }

    public function logout()
    {
        Auth::Logout(); 
        return redirect()->route('login');
    }

}
