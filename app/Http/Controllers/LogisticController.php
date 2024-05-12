<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logistic;

class LogisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logistics = Logistic::all();
        return view('logistics.index', ['logistics' => $logistics]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('logistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Logistic::create($request->all());

        return redirect()->route('logistics')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $logistic = Logistic::findOrFail($id);

        return view('logistics.show', compact('logistic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $logistic = Logistic::findOrFail($id);

        return view('logistics.edit', compact('logistic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $logistic = Logistic::findOrFail($id);
  
        $logistic->update($request->all());
  
        return redirect()->route('logistics')->with('success', 'Data berhasil Dirubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $logistic = Logistic::findOrFail($id);
  
        $logistic->delete();
  
        return redirect()->route('logistics')->with('success', 'Data berhasil Dihapus !');
    }
}
