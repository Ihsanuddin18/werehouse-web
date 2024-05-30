<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Barryvdh\DomPDF\Facade\Pdf;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $query = Supplier::query();

        if ($month && $year) {
            $query->whereYear('created_at', $year)
                  ->whereMonth('created_at', $month);
        } elseif ($year) {
            $query->whereYear('created_at', $year);
        }

        $suppliers = $query->latest()->paginate(15);

        $firstYear = 2024;
        $currentYear = date('Y');

        return view('suppliers.index', [
            'suppliers' => $suppliers,
            'firstYear' => $firstYear,
            'currentYear' => $currentYear,
        ]);
    }

    public function export_supplier_pdf(Request $request)
    {
        $month = $request->input('month');
        $year = $request->input('year');

        $query = Supplier::query();

        if ($month && $year) {
            $query->whereYear('created_at', $year)
                  ->whereMonth('created_at', $month);
        } elseif ($year) {
            $query->whereYear('created_at', $year);
        }

        $suppliers = $query->latest()->get();

        $pdf = PDF::loadView('pdf.export_supplier_pdf', compact('suppliers'));
        return $pdf->download('export_supplier.pdf');
    }

    public function export_show_supplier_pdf($id)
    {
        $supplier = Supplier::findOrFail($id);

        $pdf = PDF::loadView('pdf.export_show_supplier_pdf', compact('supplier'));
        return $pdf->download('export_show_supplier.pdf');
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        Supplier::create($request->all());

        return redirect()->route('suppliers')->with('success', 'Data berhasil ditambahkan !');
    }

    public function show(string $id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('suppliers.show', compact('supplier'));
    }

    public function edit(string $id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, string $id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->update($request->all());

        return redirect()->route('suppliers')->with('success', 'Data berhasil diubah !');
    }

    public function destroy(string $id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return redirect()->route('suppliers')->with('success', 'Data berhasil dihapus !');
    }
}
