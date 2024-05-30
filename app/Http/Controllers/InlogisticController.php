<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inlogistic;
use App\Models\Logistic;
use App\Models\Outlogistic;
use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf;

class InlogisticController extends Controller
{
    public function index(Request $request)
    {
        $query = InLogistic::with('logistic', 'supplier');

        $month = $request->input('month');
        $year = $request->input('year');

        if ($month && $year) {
            $query->whereYear('tanggal_masuk', $year)
                ->whereMonth('tanggal_masuk', $month);
        } elseif ($year) {
            $query->whereYear('tanggal_masuk', $year);
        }

        $inlogistics = $query->latest()->paginate(15);

        $logistics = Logistic::with('inlogistics')->get();
        $suppliers = Supplier::all();

        $firstYearDate = InLogistic::min('tanggal_masuk');
        $firstYear = $firstYearDate ? date('Y', strtotime($firstYearDate)) : date('Y');
        $currentYear = date('Y');

        return view('inlogistics.index', [
            'inlogistics' => $inlogistics,
            'logistics' => $logistics,
            'suppliers' => $suppliers,
            'firstYear' => $firstYear,
            'currentYear' => $currentYear,
        ]);
    }

    public function export_inlogistic_pdf(Request $request)
    {
        $query = Inlogistic::with('logistic', 'supplier');

        $month = $request->input('month');
        $year = $request->input('year');

        if ($month && $year) {
            $query->whereYear('tanggal_masuk', $year)
                ->whereMonth('tanggal_masuk', $month);
        } elseif ($year) {
            $query->whereYear('tanggal_masuk', $year);
        }

        $inlogistics = $query->get();

        $pdf = PDF::loadView('pdf.export_inlogistic_pdf', ['inlogistics' => $inlogistics]);
        return $pdf->download('export_inlogistic_pdf.pdf');
    }


    public function export_show_inlogistic_pdf($id)
    {
        $inlogistic = Inlogistic::findOrFail($id);

        $pdf = PDF::loadView('pdf.export_show_inlogistic_pdf', compact('inlogistic'));
        return $pdf->download('export_show_inlogistic.pdf');
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
            'id_logistik' => 'required|exists:logistics,id',
            'id_supplier' => 'required|exists:suppliers,id',
            'jumlah_logistik_masuk' => 'required|integer',
            'tanggal_masuk' => 'required|date',
            'expayer_logistik' => 'date',
            'keterangan_masuk' => 'string',
            'dokumentasi_masuk' => 'string|max:20000',
        ]);
        if ($request->hasFile('dokumentasi_masuk')) {
            $fileName = time() . $request->file('dokumentasi_masuk')->getClientOriginalName();
            $path = $request->file('dokumentasi_masuk')->storeAs('images', $fileName, 'public');
            $validatedData['dokumentasi_masuk'] = '/storage/' . $path;
        }
        Inlogistic::create($validatedData);
        return redirect()->route('inlogistics.index')->with('success', 'Data berhasil ditambahkan !');
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
        return redirect()->route('inlogistics')->with('success', 'Data berhasil diubah !');
    }

    // InlogisticController.php

    public function destroy($id)
    {
        $inlogistic = Inlogistic::findOrFail($id);

        $inlogistic->delete();

        $outlogistic = Outlogistic::where('id_inlogistik', $id)->first();
        if ($outlogistic) {
            $outlogistic->delete();
        }

        return redirect()->route('inlogistics.index')->with('success', 'Data berhasil dihapus !');
    }

}
