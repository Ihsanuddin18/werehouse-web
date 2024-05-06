<?php

namespace App\Http\Controllers;

use App\Models\LogistikKeluar;
use Illuminate\Http\Request;

class LogistikKeluarController extends Controller
{
    public function index()
    {
        $logistikKeluar = LogistikKeluar::all();
        return view('logistik_keluar.index', compact('logistikKeluar'));
    }

    public function edit($id)
    {
        $logistikKeluar = LogistikKeluar::findOrFail($id);
        return view('logistik_keluar.edit', compact('logistikKeluar'));
    }

    public function update(Request $request, $id)
    {
        $logistikKeluar = LogistikKeluar::findOrFail($id);
        $logistikKeluar->update($request->all());
        return redirect()->route('logistik_keluar.index')->with('success', 'Data logistik keluar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        LogistikKeluar::findOrFail($id)->delete();
        return redirect()->route('logistik_keluar.index')->with('success', 'Data logistik keluar berhasil dihapus.');
    }

    // Fungsi untuk mencetak laporan ke PDF
    public function printPdf()
    {
        // Logika untuk mencetak PDF
    }
}
