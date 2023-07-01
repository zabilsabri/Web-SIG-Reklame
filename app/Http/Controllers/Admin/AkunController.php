<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use DataTables;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AkunController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('Admin.Akun.index')
            ->with(compact('users'));
    }

    public function json()
    {
        $users = User::get();
        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('aksi', function($users){
                return view('Admin.layout.Table Button.akun')->with('data', $users);
            })
            ->make(true);
    }

    public function detail($id)
    {
        $user = User::find($id);
        return view('Admin.Akun.detail')
            ->with(compact('user'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->nama = $request->nama;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->alamat = $request->alamat;
        $user->no_telp = $request->no_telp;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('Admin.Akun.edit')
            ->with(compact('user'));
    }

    public function editProcess(Request $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();
        if($data['password'] == null){
            $data['password'] = $user->password;
        } else {
            $request->validate([
                'password' => [
                    'confirmed',
                    Password::min(8)
                        ->letters()
                        ->numbers()
                ]
            ]);
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        if($id == Auth::user()->id){
            return redirect()->route('login')->with('success', 'Data Anda Berhasil Diedit. Silahkan Login Kembali!');
        } else {
            return redirect()->route('akun-detail.admin', [$user -> id])->with('success', 'Data User Telah Diedit!');
        }
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();
        return response()->json([
            'status' => 'success'
        ]);
    }
}
