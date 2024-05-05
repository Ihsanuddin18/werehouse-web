<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CetakBarcodeLabelController extends Controller
{
    public function showCetakBarcodeLabel()
    {
        return view('cetak_barcode_label');
    }
}
