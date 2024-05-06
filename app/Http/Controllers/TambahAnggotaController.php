<?php

namespace App\Http\Controllers;

use App\Models\TambahAnggota;
use Illuminate\Http\Request;

class TambahAnggotaController extends Controller
{
    public function index()
    {
        // Mengambil semua anggota dari database
        $anggota = TambahAnggota::all();

        // Menampilkan halaman daftar anggota dengan data yang diambil
        return view('tambah_anggota.index', compact('anggota'));
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim
        $request->validate([
            'nama_anggota' => 'required|string',
            'email_anggota' => 'required|email|unique:tambah_anggota,email_anggota',
            'password_anggota' => 'required|string|min:8',
        ]);

        // Simpan data anggota baru ke dalam database
        TambahAnggota::create([
            'nama_anggota' => $request->nama_anggota,
            'email_anggota' => $request->email_anggota,
            'password_anggota' => bcrypt($request->password_anggota),
        ]);

        // Redirect kembali ke halaman daftar anggota dengan pesan sukses
        return redirect()->route('tambah_anggota')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        // Temukan anggota berdasarkan ID
        $anggota = TambahAnggota::findOrFail($id);

        // Hapus anggota dari database
        $anggota->delete();

        // Redirect kembali ke halaman daftar anggota dengan pesan sukses
        return redirect()->route('tambah_anggota')->with('success', 'Anggota berhasil dihapus.');
    }
}
