<?php

namespace App\Http\Controllers;
use App\Models\LogisticsRequest;
use Illuminate\Http\Request;

class LogisticsRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_anggota' => 'required|string|max:255',
            'list_logistik' => 'required|string',
            'lokasi_pengiriman' => 'required|string|max:255',
        ]);

        $logisticsRequest = new LogisticsRequest([
            'nama_anggota' => $request->nama_anggota,
            'list_logistik' => $request->list_logistik,
            'lokasi_pengiriman' => $request->lokasi_pengiriman,
        ]);

        $logisticsRequest->save();

        return response()->json(['message' => 'Permintaan logistik berhasil diajukan'], 201);
    }
}
