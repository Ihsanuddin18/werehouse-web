<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logistic;
use Barryvdh\DomPDF\Facade\Pdf;

class LogisticController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $query = Logistic::query();

        if ($month && $year) {
            $query->whereYear('created_at', $year)
                ->whereMonth('created_at', $month);
        } elseif ($year) {
            $query->whereYear('created_at', $year);
        }

        $logistics = $query->latest()->paginate(15);

        $firstYear = 2024;
        $currentYear = date('Y');

        return view('logistics.index', [
            'logistics' => $logistics,
            'firstYear' => $firstYear,
            'currentYear' => $currentYear,
        ]);
    }

    public function export_logistic_pdf(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $query = Logistic::query();

        if ($month && $year) {
            $query->whereYear('created_at', $year)
                ->whereMonth('created_at', $month);
        } elseif ($year) {
            $query->whereYear('created_at', $year);
        }

        $logistics = $query->latest()->get();

        $pdf = PDF::loadView('pdf.export_logistic_pdf', compact('logistics'));
        return $pdf->download('export_logistic.pdf');
    }


    public function export_show_logistic_pdf($id)
    {
        $logistic = Logistic::findOrFail($id);

        $pdf = PDF::loadView('pdf.export_show_logistic_pdf', compact('logistic'));
        return $pdf->download('export_show_logistic.pdf');
    }

    public function create()
    {
        return view('logistics.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_logistik' => 'required',
            'nama_logistik' => 'required',
            'satuan_logistik' => 'required',
        ]);

        Logistic::create($request->all());

        return redirect()->route('logistics')->with('success', 'Data berhasil ditambahkan !');
    }

    public function show(string $id)
    {
        $logistic = Logistic::findOrFail($id);

        return view('logistics.show', compact('logistic'));
    }

    public function edit(string $id)
    {
        $logistic = Logistic::findOrFail($id);

        return view('logistics.edit', compact('logistic'));
    }

    public function update(Request $request, string $id)
    {
        $logistic = Logistic::findOrFail($id);

        $logistic->update($request->all());

        return redirect()->route('logistics', $id)->with('success', 'Data berhasil diubah !');
    }

    public function destroy(string $id)
    {
        $logistic = Logistic::findOrFail($id);

        $logistic->delete();

        return redirect()->route('logistics')->with('success', 'Data berhasil dihapus !');
    }
}
