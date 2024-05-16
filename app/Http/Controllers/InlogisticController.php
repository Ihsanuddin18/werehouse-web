<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inlogistic;
use App\Models\Logistic;

class InlogisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inlogistics = inlogistic::with('logistic')->get();
        $logistics = logistic::with('inlogistics')->get();

        return view('inlogistics.index', ['inlogistics' => $inlogistics]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $logistics = Logistic::all();
        return view('inlogistics.create', compact('logistics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_logistik_masuk' => 'required|string',
            'satuan_logistik_masuk' => 'required|string',
            'jumlah_logistik_masuk' => 'required|integer',
            'nama_supplier' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'expayer_logistik' => 'nullable|date',
            'keterangan_masuk' => 'nullable|string',
            'id_logistik' => 'required|exists:logistics,id', // Pastikan id_logistik ada di tabel logistics
        ]);

        // Menyimpan data baru ke dalam tabel inlogistics
        Inlogistic::create($validatedData);

        return redirect()->route('inlogistics.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inlogistic = Inlogistic::findOrFail($id);
        $logistics = Logistic::all(); // Mengambil semua data logistik untuk digunakan dalam dropdown/select box
        return view('inlogistics.show', compact('inlogistic', 'logistics'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inlogistic = Inlogistic::findOrFail($id);
        $logistics = Logistic::all(); // Mengambil semua data logistik untuk ditampilkan dalam dropdown/select box

        return view('inlogistics.edit', compact('inlogistic', 'logistics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $inlogistic = Inlogistic::findOrFail($id);

        $inlogistic->update($request->all());

        return redirect()->route('inlogistics')->with('success', 'Data berhasil Dirubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inlogistic = Inlogistic::findOrFail($id);

        $inlogistic->delete();

        return redirect()->route('inlogistics')->with('success', 'Data berhasil Dihapus !');
    }
}
