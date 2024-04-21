<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahAkunAnggotaController extends Controller
{
    public function showTambahAkunAnggota()
    {
        return view('tambah_Akun_anggota');
    }
}
