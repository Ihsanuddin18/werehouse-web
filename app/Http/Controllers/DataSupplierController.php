<?php

namespace App\Http\Controllers;

use App\Models\DataSupplier;
use Illuminate\Http\Request;

class DataSupplierController extends Controller
{
    public function index()
    {
        $suppliers = DataSupplier::all();
        return view('data-supplier.index', compact('suppliers'));
    }

    public function edit($id)
    {
        $supplier = DataSupplier::findOrFail($id);
        return view('data-supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $supplier = DataSupplier::findOrFail($id);
        $supplier->update($request->all());
        return redirect()->route('data-supplier.index')->with('success', 'Data supplier berhasil diperbarui');
    }

    public function destroy($id)
    {
        $supplier = DataSupplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('data-supplier.index')->with('success', 'Data supplier berhasil dihapus');
    }
}

