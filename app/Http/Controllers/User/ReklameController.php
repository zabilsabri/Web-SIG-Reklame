<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reklame;

class ReklameController extends Controller
{
    public function index()
    {
        $reklames = Reklame::with('penyewaan')->get();
        return view('User.Reklame.index')
            ->with(compact('reklames'));
    }
}
