<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataLogistikController extends Controller
{
    public function showDataLogistik()
    {
        return view('data_logistik');
    }
}
