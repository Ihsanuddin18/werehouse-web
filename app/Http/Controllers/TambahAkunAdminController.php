<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahAkunAdminController extends Controller
{
    public function showTambahAkunAdmin()
    {
        return view('tambah_akun_admin');
    }
}
