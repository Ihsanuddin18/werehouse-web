<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahAnggotaController extends Controller
{
    public function showTambahAnggota()
    {
        return view('tambah_anggota');
    }
}
