<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlogistic;
use App\Models\Logistic;
use Barryvdh\DomPDF\Facade\Pdf;

class OutLogisticController extends Controller
{
    public function index()
    {
        $outlogistics = Outlogistic::with('logistic')->get();
        $logistics = Logistic::with('outlogistics')->get();
        $outlogistics = Outlogistic::all();
        return view('outlogistics.index', [
            'outlogistics' => $outlogistics,
            'logistics' => $logistics,
        ]);
    }

    public function export_outlogistic_pdf()
    {
        $outlogistics = Outlogistic::all();
        $pdf = PDF::loadView('pdf.export_outlogistic_pdf', ['outlogistics' => $outlogistics]);
        return $pdf->download('export_outlogistic_pdf.pdf');
    }

    public function create()
    {
        $logistics = Logistic::all();
        $outlogistics = Outlogistic::all();
        return view('outlogistics.create', compact('logistics'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_logistik' => 'required|exists:logistics,id',
            'jumlah_logistik_keluar' => 'required|integer',
            'tanggal_keluar' => 'required|date',
            'nama_penerima' => 'required|string|max:255',
            'alamat_penerima' => 'required|string|max:255',
            'keterangan_keluar' => 'nullable|string',
            'nik_kk_penerima' => 'required|string|max:255',
            'dokumentasi_keluar' => 'nullable|string|max:20000',
        ]);
        if ($request->hasFile('dokumentasi_keluar')) {
            $fileName = time(). $request->file('dokumentasi_keluar')->getClientOriginalName();
            $path = $request->file('dokumentasi_keluar')->storeAs('images', $fileName, 'public');
            $validatedData['dokumentasi_keluar'] = '/storage/' . $path;
        }
        Outlogistic::create($validatedData);
        return redirect()->route('outlogistics.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function show(string $id)
    {
        $outlogistic = Outlogistic::findOrFail($id);
        $logistics = Logistic::all();
        return view('outlogistics.show', compact('outlogistic','logistics'));
    }

    public function edit(string $id)
    {
        $outlogistic = Outlogistic::findOrFail($id);
        $logistics = Logistic::all(); 
        return view('outlogistics.edit', compact('outlogistic','logistics'));
    }

    public function update(Request $request, string $id)
    {
        $outlogistic = Outlogistic::findOrFail($id);
        $outlogistic->update($request->all());
        return redirect()->route('outlogistics')->with('success', 'Data berhasil Dirubah !');
    }

    public function destroy(string $id)
    {
        $outlogistic = Outlogistic::findOrFail($id);
        $outlogistic->delete();
        return redirect()->route('outlogistics')->with('success', 'Data berhasil Dihapus !');
    }
}
