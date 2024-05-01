<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogistikKeluarController extends Controller
{
    public function showLogistikKeluar()
    {
        return view('logistik_keluar');
    }
}
