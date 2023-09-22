<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function emailRecIndex()
    {
        return view('Auth.email');
    }

    public function re_pass (Request $request) 
    {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $checkAccount = DB::table('password_reset_tokens')->where('email', $request->email)->first();

        if($checkAccount != null){
            DB::table('password_reset_tokens')->where('email', $request->email)->delete();
        }

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
          ]);

        Mail::send('Auth.emailFormat', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('success', 'Silahkan Cek Email Anda!');

    }

    public function showResetPasswordForm($token) {
        return view('Auth.reset', [
            'token' => $token,
            "title" => "Forget Password"
        ]);
    }

    public function submitResetPasswordForm(Request $request)

    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|confirmed',
        ],[
            'exists' => 'Masukkan Email Yang Anda Gunakan Mendaftar!',
            'confirmed' => 'Password Berbeda Dengan Password Confirmation!'
        ]);

        $updatePassword = DB::table('password_reset_tokens')
        ->where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if(!$updatePassword){
            return back()->with('failed', 'Masukkan Email Yang Anda Gunakan Mendaftar!');
        }

        $user = User::where('email', $request->email)
        ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('success', 'Password Anda Berhasil Diubah!');
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if(Auth::attempt($credentials, $request->has('remember'))){
            if (Auth::user()->role == 'Admin') {
                return redirect()->route('home.admin');
            } else if (Auth::user()->role == 'Pimpinan'){
                return redirect()->route('home.pimpinan');
            }
        }else{
            return back()->with('failed', 'Email Atau Password Anda Salah!');
        }
    }

    public function logout()
    {
        Auth::Logout(); 
        return redirect()->route('login');
    }

}
