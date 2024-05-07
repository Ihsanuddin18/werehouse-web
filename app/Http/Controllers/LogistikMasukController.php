<?php

namespace App\Http\Controllers;

use App\Models\LogistikMasuk;
use Illuminate\Http\Request;

class LogistikMasukController extends Controller
{
    public function index()
    {
        $logistikMasuk = LogistikMasuk::all();
        return view('logistik_masuk.index', compact('logistikMasuk'));
    }

    public function edit($id)
    {
        $logistikMasuk = LogistikMasuk::find($id);
        return view('logistik_masuk.edit', compact('logistikMasuk'));
    }

    public function update(Request $request, $id)
    {
        $logistikMasuk = LogistikMasuk::find($id);
        $logistikMasuk->update($request->all());
        return redirect()->route('logistik_masuk.index')->with('success', 'Data logistik berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $logistikMasuk = LogistikMasuk::find($id);
        $logistikMasuk->delete();
        return redirect()->route('logistik_masuk.index')->with('success', 'Data logistik berhasil dihapus.');
    }

    // Fungsi untuk mencetak laporan ke PDF
    public function printPdf()
    {
        // Logika untuk mencetak PDF
    }
}
