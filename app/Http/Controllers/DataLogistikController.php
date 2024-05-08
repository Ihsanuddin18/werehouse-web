<?php

namespace App\Http\Controllers;

use App\Models\DataLogistik;
use Illuminate\Http\Request;

class DataLogistikController extends Controller
{
    public function showDataLogistik()
    {
        return view('data_logistik');
    }

    public function showEditDataLogistik($id)
    {
        // Mengambil data logistik berdasarkan ID
        $dataLogistik = DataLogistik::findOrFail($id);

        // Menampilkan halaman edit data logistik dengan data yang dipilih
        return view('data_logistik.edit', compact('dataLogistik'));
    }

    public function editDataLogistik(Request $request, $id)
    {
        // Validasi data yang dikirim
        $request->validate([
            'nama_logistik' => 'required|string',
            'satuan_logistik' => 'required|string',
        ]);

        // Mengambil data logistik berdasarkan ID
        $dataLogistik = DataLogistik::findOrFail($id);

        // Mengupdate data logistik
        $dataLogistik->update([
            'nama_logistik' => $request->nama_logistik,
            'satuan_logistik' => $request->satuan_logistik,
        ]);

        // Redirect ke halaman data logistik dengan pesan sukses
        return redirect()->route('data_logistik')->with('success', 'Data logistik berhasil diperbarui.');
    }

    public function hapusDataLogistik($id)
    {
        // Menghapus data logistik berdasarkan ID
        DataLogistik::findOrFail($id)->delete();

        // Redirect ke halaman data logistik dengan pesan sukses
        return redirect()->route('data_logistik')->with('success', 'Data logistik berhasil dihapus.');
    }

    public function cetakSticker($id)
    {
        // Mengambil data logistik berdasarkan ID
        $dataLogistik = DataLogistik::findOrFail($id);

        // Mengirim data logistik ke view untuk dicetak
        return view('data_logistik.print', compact('dataLogistik'));
    }
}
