<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlogistic;

class OutLogisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlogistics = outlogistic::all();
        return view('outlogistics.index', ['outlogistics' => $outlogistics]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('outlogistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Outlogistic::create($request->all());

        return redirect()->route('outlogistics')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $outlogistic = Outlogistic::findOrFail($id);

        return view('outlogistics.show', compact('outlogistic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $outlogistic = Outlogistic::findOrFail($id);

        return view('outlogistics.edit', compact('outlogistic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $outlogistic = Outlogistic::findOrFail($id);
  
        $outlogistic->update($request->all());
  
        return redirect()->route('outlogistics')->with('success', 'Data berhasil Dirubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $outlogistic = Outlogistic::findOrFail($id);
  
        $outlogistic->delete();
  
        return redirect()->route('outlogistics')->with('success', 'Data berhasil Dihapus !');
    }
}
