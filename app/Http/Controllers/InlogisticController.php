<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inlogistic;
use App\Models\Logistic;
use App\Models\Supplier;

class InlogisticController extends Controller
{

    public function index()
    {
        $inlogistics = Inlogistic::with('logistic', 'supplier')->get();
        $logistics = Logistic::with('inlogistics')->get();
        $suppliers = Supplier::all();

        return view('inlogistics.index', [
            'inlogistics' => $inlogistics,
            'logistics' => $logistics,
            'suppliers' => $suppliers
        ]);
    }

    public function create()
    {
        $logistics = Logistic::all();
        $suppliers = Supplier::all();
        return view('inlogistics.create', compact('logistics', 'suppliers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'jumlah_logistik_masuk' => 'required|integer',
        'tanggal_masuk' => 'required|date',
        'expayer_logistik' => 'nullable|date',
        'keterangan_masuk' => 'nullable|string',
        'id_logistik' => 'required|exists:logistics,id',
        'id_supplier' => 'required|exists:suppliers,id',
    ]);

        Inlogistic::create($validatedData);
        return redirect()->route('inlogistics.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show(string $id)
    {
        $inlogistic = Inlogistic::findOrFail($id);
        $logistics = Logistic::all();
        return view('inlogistics.show', compact('inlogistic', 'logistics'));
    }

    public function edit(string $id)
    {
        $inlogistic = Inlogistic::findOrFail($id);
        $logistics = Logistic::all(); 
        $suppliers = Supplier::all();
        return view('inlogistics.edit', compact('inlogistic', 'logistics', 'suppliers'));
    }

    public function update(Request $request, string $id)
    {
        $inlogistic = Inlogistic::findOrFail($id);
        $inlogistic->update($request->all());
        return redirect()->route('inlogistics')->with('success', 'Data berhasil Dirubah !');
    }

    public function destroy(string $id)
    {
        $inlogistic = Inlogistic::findOrFail($id);
        $inlogistic->delete();
        return redirect()->route('inlogistics')->with('success', 'Data berhasil Dihapus !');
    }
}
