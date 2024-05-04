<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function showPengaturan()
    {
        return view('pengaturan');
    }
}
