<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LokasiPengirimanController extends Controller
{
    public function showLokasiPengiriman()
    {
        return view('lokasi_pengiriman');
    }
}
