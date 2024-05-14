<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inlogistic;

class InlogisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inlogistics = inlogistic::all();
        return view('inlogistics.index', ['inlogistics' => $inlogistics]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inlogistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Inlogistic::create($request->all());

        return redirect()->route('inlogistics')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $inlogistic = Inlogistic::findOrFail($id);

        return view('inlogistics.show', compact('inlogistic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $inlogistic = Inlogistic::findOrFail($id);

        return view('inlogistics.edit', compact('inlogistic'));
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
