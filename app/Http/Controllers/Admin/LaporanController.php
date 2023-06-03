<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('Admin.Laporan Penyewaan.index');
    }

    public function detail()
    {
        return view('Admin.Laporan Penyewaan.detail');
    }
}
