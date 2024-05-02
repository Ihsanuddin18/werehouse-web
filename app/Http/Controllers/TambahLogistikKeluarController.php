<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahLogistikKeluarController extends Controller
{
    public function showTambahLogistikKeluar()
    {
        return view('tambah_logistik_keluar');
    }
}
